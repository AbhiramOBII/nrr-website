<?php

namespace App\Http\Controllers;

use App\Models\ScamExposed;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ScamExposedController extends Controller
{
    /**
     * Display listing
     */
    public function index()
    {
        $scams = ScamExposed::with('featuredMedia')->ordered()->paginate(10);
        return view('admin.scams-exposed.index', compact('scams'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $media = Media::latest()->get();
        return view('admin.scams-exposed.create', compact('media'));
    }

    /**
     * Store new scam
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
        
        while (ScamExposed::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $scam = ScamExposed::create([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'slug' => $slug,
            'short_description_en' => $request->short_description_en,
            'short_description_kn' => $request->short_description_kn,
            'description_en' => $request->description_en,
            'description_kn' => $request->description_kn,
            'featured_media_id' => $request->featured_media_id,
            'sort_order' => $request->sort_order ?? (ScamExposed::max('sort_order') + 1),
            'status' => $request->status,
        ]);

        // Attach media
        if ($request->has('media_ids') && is_array($request->media_ids)) {
            $mediaData = [];
            foreach ($request->media_ids as $index => $mediaId) {
                $mediaData[$mediaId] = ['sort_order' => $index];
            }
            $scam->media()->attach($mediaData);
        }

        return redirect()->route('admin.scams-exposed.index')->with('success', 'Scam Exposed created successfully!');
    }

    /**
     * Show edit form
     */
    public function edit(ScamExposed $scamExposed)
    {
        $media = Media::latest()->get();
        $scamExposed->load('media');
        return view('admin.scams-exposed.edit', compact('scamExposed', 'media'));
    }

    /**
     * Update scam
     */
    public function update(Request $request, ScamExposed $scamExposed)
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

        $scamExposed->update([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'short_description_en' => $request->short_description_en,
            'short_description_kn' => $request->short_description_kn,
            'description_en' => $request->description_en,
            'description_kn' => $request->description_kn,
            'featured_media_id' => $request->featured_media_id,
            'sort_order' => $request->sort_order ?? $scamExposed->sort_order,
            'status' => $request->status,
        ]);

        // Sync media
        if ($request->has('media_ids') && is_array($request->media_ids)) {
            $mediaData = [];
            foreach ($request->media_ids as $index => $mediaId) {
                $mediaData[$mediaId] = ['sort_order' => $index];
            }
            $scamExposed->media()->sync($mediaData);
        } else {
            $scamExposed->media()->detach();
        }

        return redirect()->route('admin.scams-exposed.index')->with('success', 'Scam Exposed updated successfully!');
    }

    /**
     * Delete scam
     */
    public function destroy(ScamExposed $scamExposed)
    {
        $scamExposed->media()->detach();
        $scamExposed->delete();

        return redirect()->route('admin.scams-exposed.index')->with('success', 'Scam Exposed deleted successfully!');
    }

    /**
     * Public index page
     */
    public function publicIndex()
    {
        $scams = ScamExposed::active()->latest()->with('featuredMedia')->paginate(12);
        return view('pages.scams-exposed', compact('scams'));
    }

    /**
     * Public show page
     */
    public function show($slug)
    {
        $scam = ScamExposed::where('slug', $slug)->active()->with(['featuredMedia', 'media'])->firstOrFail();
        return view('pages.scam-exposed', compact('scam'));
    }
}
