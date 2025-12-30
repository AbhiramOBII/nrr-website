<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $media = Media::latest()->paginate(24);
        return view('pages.photo-gallery', compact('media'));
    }
}
