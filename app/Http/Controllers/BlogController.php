<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('featuredMedia')->latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $media = Media::images()->latest()->get();
        return view('admin.blogs.create', compact('media'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'short_description_en' => 'nullable|string',
            'short_description_kn' => 'nullable|string',
            'content_en' => 'required|string',
            'content_kn' => 'nullable|string',
            'featured_media_id' => 'nullable|exists:media,id',
            'author' => 'nullable|string|max:255',
            'published_date' => 'nullable|date',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $slug = Str::slug($request->title_en);
        $originalSlug = $slug;
        $counter = 1;
        
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        Blog::create([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'slug' => $slug,
            'short_description_en' => $request->short_description_en,
            'short_description_kn' => $request->short_description_kn,
            'content_en' => $request->content_en,
            'content_kn' => $request->content_kn,
            'featured_media_id' => $request->featured_media_id,
            'author' => $request->author,
            'published_date' => $request->published_date,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!');
    }

    public function edit(Blog $blog)
    {
        $media = Media::images()->latest()->get();
        return view('admin.blogs.edit', compact('blog', 'media'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'short_description_en' => 'nullable|string',
            'short_description_kn' => 'nullable|string',
            'content_en' => 'required|string',
            'content_kn' => 'nullable|string',
            'featured_media_id' => 'nullable|exists:media,id',
            'author' => 'nullable|string|max:255',
            'published_date' => 'nullable|date',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $blog->update([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'short_description_en' => $request->short_description_en,
            'short_description_kn' => $request->short_description_kn,
            'content_en' => $request->content_en,
            'content_kn' => $request->content_kn,
            'featured_media_id' => $request->featured_media_id,
            'author' => $request->author,
            'published_date' => $request->published_date,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully!');
    }

    public function publicIndex()
    {
        $blogs = Blog::latest()->with('featuredMedia')->paginate(12);
        return view('pages.blogs.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->active()->with('featuredMedia')->firstOrFail();
        $recentBlogs = Blog::active()->where('id', '!=', $blog->id)->ordered()->limit(5)->get();
        return view('pages.blogs.show', compact('blog', 'recentBlogs'));
    }
}
