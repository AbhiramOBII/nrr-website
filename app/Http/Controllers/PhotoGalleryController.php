<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $galleryItems = PhotoGallery::active()
            ->with('media')
            ->ordered()
            ->paginate(24);
        
        return view('pages.photo-gallery', compact('galleryItems'));
    }

    public function adminIndex()
    {
        $allMedia = Media::latest()->get();
        $selectedMediaIds = PhotoGallery::pluck('media_id')->toArray();
        
        return view('admin.photo-gallery.index', compact('allMedia', 'selectedMediaIds'));
    }

    public function adminUpdate(Request $request)
    {
        $request->validate([
            'media_ids' => 'nullable|array',
            'media_ids.*' => 'exists:media,id',
        ]);

        PhotoGallery::truncate();

        if ($request->has('media_ids') && is_array($request->media_ids)) {
            foreach ($request->media_ids as $index => $mediaId) {
                PhotoGallery::create([
                    'media_id' => $mediaId,
                    'sort_order' => $index,
                    'is_active' => true,
                ]);
            }
        }

        return redirect()->route('admin.photo-gallery.index')->with('success', 'Photo gallery updated successfully!');
    }
}
