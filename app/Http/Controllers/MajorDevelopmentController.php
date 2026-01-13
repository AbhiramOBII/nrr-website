<?php

namespace App\Http\Controllers;

use App\Models\MajorDevelopment;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MajorDevelopmentController extends Controller
{
    /**
     * Display listing
     */
    public function index()
    {
        $developments = MajorDevelopment::with('featuredMedia')->ordered()->paginate(10);
        return view('admin.major-developments.index', compact('developments'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $media = Media::latest()->get();
        return view('admin.major-developments.create', compact('media'));
    }

    /**
     * Store new development
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'short_description_en' => 'required|string',
            'short_description_kn' => 'nullable|string',
            'description_en' => 'required|string',
            'description_kn' => 'nullable|string',
            'featured_media_id' => 'nullable|exists:media,id',
            'media_ids' => 'nullable|array',
            'media_ids.*' => 'exists:media,id',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $slug = Str::slug($request->title_en);
        $originalSlug = $slug;
        $counter = 1;
        
        while (MajorDevelopment::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $development = MajorDevelopment::create([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'slug' => $slug,
            'short_description_en' => $request->short_description_en,
            'short_description_kn' => $request->short_description_kn,
            'description_en' => $request->description_en,
            'description_kn' => $request->description_kn,
            'featured_media_id' => $request->featured_media_id,
            'sort_order' => $request->sort_order ?? (MajorDevelopment::max('sort_order') + 1),
            'status' => $request->status,
        ]);

        // Attach media
        if ($request->has('media_ids') && is_array($request->media_ids)) {
            $mediaData = [];
            foreach ($request->media_ids as $index => $mediaId) {
                $mediaData[$mediaId] = ['sort_order' => $index];
            }
            $development->media()->attach($mediaData);
        }

        return redirect()->route('admin.major-developments.index')->with('success', 'Major Development created successfully!');
    }

    /**
     * Show edit form
     */
    public function edit(MajorDevelopment $majorDevelopment)
    {
        $media = Media::latest()->get();
        $majorDevelopment->load('media');
        return view('admin.major-developments.edit', compact('majorDevelopment', 'media'));
    }

    /**
     * Update development
     */
    public function update(Request $request, MajorDevelopment $majorDevelopment)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'short_description_en' => 'required|string',
            'short_description_kn' => 'nullable|string',
            'description_en' => 'required|string',
            'description_kn' => 'nullable|string',
            'featured_media_id' => 'nullable|exists:media,id',
            'media_ids' => 'nullable|array',
            'media_ids.*' => 'exists:media,id',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $majorDevelopment->update([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'short_description_en' => $request->short_description_en,
            'short_description_kn' => $request->short_description_kn,
            'description_en' => $request->description_en,
            'description_kn' => $request->description_kn,
            'featured_media_id' => $request->featured_media_id,
            'sort_order' => $request->sort_order ?? $majorDevelopment->sort_order,
            'status' => $request->status,
        ]);

        // Sync media
        if ($request->has('media_ids') && is_array($request->media_ids)) {
            $mediaData = [];
            foreach ($request->media_ids as $index => $mediaId) {
                $mediaData[$mediaId] = ['sort_order' => $index];
            }
            $majorDevelopment->media()->sync($mediaData);
        } else {
            $majorDevelopment->media()->detach();
        }

        return redirect()->route('admin.major-developments.index')->with('success', 'Major Development updated successfully!');
    }

    /**
     * Delete development
     */
    public function destroy(MajorDevelopment $majorDevelopment)
    {
        $majorDevelopment->media()->detach();
        $majorDevelopment->delete();

        return redirect()->route('admin.major-developments.index')->with('success', 'Major Development deleted successfully!');
    }

    /**
     * Public index page
     */
    public function publicIndex()
    {
        $developments = MajorDevelopment::active()->with('featuredMedia')->latest()->get();
        return view('pages.major-developments-index', compact('developments'));
    }

    /**
     * Public show page
     */
    public function show($slug)
    {
        $development = MajorDevelopment::where('slug', $slug)->active()->with(['featuredMedia', 'media'])->firstOrFail();
        return view('pages.major-development', compact('development'));
    }
}
