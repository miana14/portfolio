<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_title', 'value' => 'MonPortfolio'],
            ['key' => 'favicon', 'value' => 'favicon.ico'],
            ['key' => 'seo_keywords', 'value' => 'portfolio, développeur web'],
            ['key' => 'footer_text', 'value' => '© 2025 MonPortfolio. Tous droits réservés.'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], ['value' => $setting['value']]);
        }
    }
}