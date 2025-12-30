<?php

namespace App\Http\Controllers;

use App\Models\PrintMedia;
use App\Models\Media;
use Illuminate\Http\Request;

class PrintMediaController extends Controller
{
    public function index()
    {
        $printMedia = PrintMedia::with('media')->latest()->paginate(10);
        return view('admin.print-media.index', compact('printMedia'));
    }

    public function create()
    {
        $media = Media::images()->latest()->get();
        return view('admin.print-media.create', compact('media'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_kn' => 'nullable|string',
            'media_id' => 'required|exists:media,id',
            'published_date' => 'nullable|date',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        PrintMedia::create([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'description_en' => $request->description_en,
            'description_kn' => $request->description_kn,
            'media_id' => $request->media_id,
            'published_date' => $request->published_date,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.print-media.index')->with('success', 'Print Media added successfully!');
    }

    public function edit(PrintMedia $printMedia)
    {
        $media = Media::images()->latest()->get();
        return view('admin.print-media.edit', compact('printMedia', 'media'));
    }

    public function update(Request $request, PrintMedia $printMedia)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_kn' => 'nullable|string',
            'media_id' => 'required|exists:media,id',
            'published_date' => 'nullable|date',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $printMedia->update([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'description_en' => $request->description_en,
            'description_kn' => $request->description_kn,
            'media_id' => $request->media_id,
            'published_date' => $request->published_date,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.print-media.index')->with('success', 'Print Media updated successfully!');
    }

    public function destroy(PrintMedia $printMedia)
    {
        $printMedia->delete();
        return redirect()->route('admin.print-media.index')->with('success', 'Print Media deleted successfully!');
    }

    // Public method
    public function publicIndex()
    {
        $printMedia = PrintMedia::active()->ordered()->with('media')->paginate(24);
        return view('pages.print-media', compact('printMedia'));
    }
}
