<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Display settings page
     */
    public function index()
    {
        $settings = SiteSetting::getAllSettings();
        return view('admin.settings', compact('settings'));
    }

    /**
     * Update settings
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'site_tagline' => 'nullable|string|max:255',
            'site_description' => 'nullable|string',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'office_address' => 'nullable|string',
            'twitter_url' => 'nullable|url|max:500',
            'facebook_url' => 'nullable|url|max:500',
            'youtube_url' => 'nullable|url|max:500',
            'instagram_url' => 'nullable|url|max:500',
        ]);

        // General settings
        SiteSetting::set('site_name', $request->site_name, 'general');
        SiteSetting::set('site_tagline', $request->site_tagline, 'general');
        SiteSetting::set('site_description', $request->site_description, 'general');
        
        // Contact settings
        SiteSetting::set('contact_email', $request->contact_email, 'contact');
        SiteSetting::set('contact_phone', $request->contact_phone, 'contact');
        SiteSetting::set('office_address', $request->office_address, 'contact');
        
        // Social media settings
        SiteSetting::set('twitter_url', $request->twitter_url, 'social');
        SiteSetting::set('facebook_url', $request->facebook_url, 'social');
        SiteSetting::set('youtube_url', $request->youtube_url, 'social');
        SiteSetting::set('instagram_url', $request->instagram_url, 'social');

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully!');
    }
}
