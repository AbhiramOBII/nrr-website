<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'group',
    ];

    /**
     * Get a setting value by key
     */
    public static function get(string $key, $default = null)
    {
        $setting = Cache::rememberForever('site_setting_' . $key, function () use ($key) {
            return static::where('key', $key)->first();
        });

        return $setting ? $setting->value : $default;
    }

    /**
     * Set a setting value
     */
    public static function set(string $key, $value, string $group = 'general')
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group]
        );

        Cache::forget('site_setting_' . $key);
        Cache::forget('site_settings_all');

        return $setting;
    }

    /**
     * Get all settings as key-value array
     */
    public static function getAllSettings()
    {
        return Cache::rememberForever('site_settings_all', function () {
            return static::pluck('value', 'key')->toArray();
        });
    }

    /**
     * Get settings by group
     */
    public static function getByGroup(string $group)
    {
        return static::where('group', $group)->pluck('value', 'key')->toArray();
    }

    /**
     * Clear all settings cache
     */
    public static function clearCache()
    {
        $settings = static::all();
        foreach ($settings as $setting) {
            Cache::forget('site_setting_' . $setting->key);
        }
        Cache::forget('site_settings_all');
    }
}
