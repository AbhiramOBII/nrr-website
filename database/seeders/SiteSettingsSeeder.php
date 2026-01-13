<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'N. R. Ramesh Official Website', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Results Over Rhetoric', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Official website of N. R. Ramesh - Anti-corruption crusader and advocate for transparent governance.', 'group' => 'general'],
            
            // Contact
            ['key' => 'contact_email', 'value' => 'contact@nrramesh.com', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+91 98765 43210', 'group' => 'contact'],
            ['key' => 'office_address', 'value' => 'Bengaluru South, Karnataka, India', 'group' => 'contact'],
            
            // Social Media
            ['key' => 'twitter_url', 'value' => 'https://x.com/RameshNR_BJP', 'group' => 'social'],
            ['key' => 'facebook_url', 'value' => 'https://www.facebook.com/RameshNRBJP', 'group' => 'social'],
            ['key' => 'youtube_url', 'value' => 'https://www.youtube.com/@RameshNROfficial', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => 'https://www.instagram.com/rameshnrofficial', 'group' => 'social'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value'], 'group' => $setting['group']]
            );
        }

        $this->command->info('Site settings seeded successfully!');
    }
}
