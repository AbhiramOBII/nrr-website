<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\ElectronicMedia;
use App\Models\PrintMedia;
use App\Models\PhotoGallery;

class HomeController extends Controller
{
    /**
     * Show the home page with dynamic slider data
     */
    public function index()
    {
        $sliders = Slider::active()->ordered()->get();
        
        // Get latest electronic media (YouTube videos) - limit to 3 for carousel
        $electronicMedia = ElectronicMedia::active()->ordered()->get();
        
        // Get latest print media - limit to 6 for grid
        $printMedia = PrintMedia::with('media')->active()->ordered()->limit(6)->get();
        
        // Get latest photos from photo gallery table - limit to 8 for grid
        $galleryPhotos = PhotoGallery::with('media')
            ->active()
            ->whereHas('media', function ($query) {
                $query->where('type', 'image');
            })
            ->ordered()
            ->limit(8)
            ->get();
        
        return view('home', compact('sliders', 'electronicMedia', 'printMedia', 'galleryPhotos'));
    }
}
