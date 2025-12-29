<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Slider;

class AdminController extends Controller
{
    /**
     * Show the admin login form
     */
    public function showLogin()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.login');
    }

    /**
     * Handle admin login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->is_admin) {
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'))->with('success', 'Welcome back, Administrator!');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'You do not have administrator privileges.',
                ])->withInput($request->except('password'));
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->except('password'));
    }

    /**
     * Show the admin dashboard
     */
    public function dashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'admin_users' => User::where('is_admin', true)->count(),
            'recent_logins' => User::where('updated_at', '>=', now()->subDays(7))->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Handle admin logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'You have been logged out successfully.');
    }

    /**
     * Show content management page
     */
    public function content()
    {
        return view('admin.content');
    }

    /**
     * Show media management page
     */
    public function media()
    {
        return view('admin.media');
    }

    /**
     * Show settings page
     */
    public function settings()
    {
        return view('admin.settings');
    }

    /**
     * Manage Home Section Methods
     */
    public function manageSlider()
    {
        $sliders = Slider::ordered()->get();
        return view('admin.manage.slider', compact('sliders'));
    }

    /**
     * Store a new slider
     */
    public function storeSlider(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'paragraph_en' => 'required|string',
            'paragraph_kn' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/sliders', $imageName);
        }

        // Get next sort order if not provided
        $sortOrder = $request->sort_order ?? (Slider::max('sort_order') + 1);

        Slider::create([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'paragraph_en' => $request->paragraph_en,
            'paragraph_kn' => $request->paragraph_kn,
            'image' => $imageName,
            'sort_order' => $sortOrder,
            'status' => $request->status
        ]);

        return redirect()->route('admin.manage.slider')->with('success', 'Slider item created successfully!');
    }

    /**
     * Update slider
     */
    public function updateSlider(Request $request, Slider $slider)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'paragraph_en' => 'required|string',
            'paragraph_kn' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive'
        ]);

        $data = [
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'paragraph_en' => $request->paragraph_en,
            'paragraph_kn' => $request->paragraph_kn,
            'sort_order' => $request->sort_order ?? $slider->sort_order,
            'status' => $request->status
        ];

        // Handle image upload if new image provided
        if ($request->hasFile('image')) {
            // Delete old image
            if ($slider->image && Storage::exists('public/sliders/' . $slider->image)) {
                Storage::delete('public/sliders/' . $slider->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/sliders', $imageName);
            $data['image'] = $imageName;
        }

        $slider->update($data);

        return redirect()->route('admin.manage.slider')->with('success', 'Slider item updated successfully!');
    }

    /**
     * Delete slider
     */
    public function destroySlider(Slider $slider)
    {
        // Delete associated image
        if ($slider->image && Storage::exists('public/sliders/' . $slider->image)) {
            Storage::delete('public/sliders/' . $slider->image);
        }

        $slider->delete();

        return redirect()->route('admin.manage.slider')->with('success', 'Slider item deleted successfully!');
    }

    /**
     * Delete slider
     */
    public function deleteSlider(Slider $slider)
    {
        // Delete image file
        if ($slider->image && Storage::exists('public/sliders/' . $slider->image)) {
            Storage::delete('public/sliders/' . $slider->image);
        }

        $slider->delete();

        return redirect()->route('admin.manage.slider')->with('success', 'Slider item deleted successfully!');
    }

    public function manageHeroContent()
    {
        return view('admin.manage.hero-content');
    }

    public function manageImpactNumbers()
    {
        return view('admin.manage.impact-numbers');
    }

    public function manageMission()
    {
        return view('admin.manage.mission');
    }

    /**
     * Other Management Section Methods
     */
    public function managePages()
    {
        return view('admin.manage.pages');
    }

    public function manageVisualMedia()
    {
        return view('admin.manage.visual-media');
    }

    public function managePaperClips()
    {
        return view('admin.manage.paper-clips');
    }

    public function manageGallery()
    {
        return view('admin.manage.gallery');
    }

    public function manageEnquiries()
    {
        return view('admin.manage.enquiries');
    }

    public function manageNewsletter()
    {
        return view('admin.manage.newsletter');
    }
}
