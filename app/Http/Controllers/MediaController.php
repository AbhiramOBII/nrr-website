<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    /**
     * Display media library
     */
    public function index(Request $request)
    {
        $type = $request->get('type', 'all');
        
        $query = Media::query()->latest();
        
        if ($type === 'image') {
            $query->images();
        } elseif ($type === 'video') {
            $query->videos();
        }
        
        $media = $query->paginate(24);
        
        return view('admin.media.index', compact('media', 'type'));
    }

    /**
     * Store new media
     */
    public function store(Request $request)
    {
        $request->validate([
            'files.*' => 'required|file|mimes:jpeg,png,jpg,gif,webp,mp4,webm,mov|max:51200',
            'alt_text' => 'nullable|string|max:255',
        ]);

        $uploadedMedia = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $originalName = $file->getClientOriginalName();
                $fileName = time() . '_' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
                
                $mimeType = $file->getMimeType();
                $type = str_starts_with($mimeType, 'video') ? 'video' : 'image';
                
                $path = $file->storeAs('media', $fileName, 'public');
                
                $media = Media::create([
                    'name' => pathinfo($originalName, PATHINFO_FILENAME),
                    'file_name' => $fileName,
                    'file_path' => 'media/' . $fileName,
                    'mime_type' => $mimeType,
                    'type' => $type,
                    'size' => $file->getSize(),
                    'alt_text' => $request->alt_text,
                ]);
                
                $uploadedMedia[] = $media;
            }
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => count($uploadedMedia) . ' file(s) uploaded successfully!',
                'media' => $uploadedMedia,
            ]);
        }

        return redirect()->route('admin.media.index')->with('success', count($uploadedMedia) . ' file(s) uploaded successfully!');
    }

    /**
     * Update media details
     */
    public function update(Request $request, Media $media)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'alt_text' => 'nullable|string|max:255',
        ]);

        $media->update([
            'name' => $request->name,
            'alt_text' => $request->alt_text,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Media updated successfully!',
                'media' => $media,
            ]);
        }

        return redirect()->route('admin.media.index')->with('success', 'Media updated successfully!');
    }

    /**
     * Delete media
     */
    public function destroy(Media $media)
    {
        // Delete the file from public disk
        if (Storage::disk('public')->exists($media->file_path)) {
            Storage::disk('public')->delete($media->file_path);
        }

        $media->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Media deleted successfully!',
            ]);
        }

        return redirect()->route('admin.media.index')->with('success', 'Media deleted successfully!');
    }

    /**
     * Get media for picker (AJAX)
     */
    public function picker(Request $request)
    {
        $type = $request->get('type', 'all');
        
        $query = Media::query()->latest();
        
        if ($type === 'image') {
            $query->images();
        } elseif ($type === 'video') {
            $query->videos();
        }
        
        $media = $query->paginate(20);
        
        return response()->json([
            'success' => true,
            'media' => $media->items(),
            'hasMore' => $media->hasMorePages(),
            'nextPage' => $media->currentPage() + 1,
        ]);
    }
}
