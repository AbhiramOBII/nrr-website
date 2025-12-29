<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class HomeController extends Controller
{
    /**
     * Show the home page with dynamic slider data
     */
    public function index()
    {
        $sliders = Slider::active()->ordered()->get();
        return view('home', compact('sliders'));
    }
}
