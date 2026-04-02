<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing settings to re-initialize with new branding
        Setting::truncate();

        $settings = [
            // General & Branding
            ['key' => 'site_name', 'value' => 'HealoraHealth', 'group' => 'general', 'type' => 'text'],
            ['key' => 'site_slogan', 'value' => 'Your Health, Our Trust', 'group' => 'general', 'type' => 'text'],
            ['key' => 'site_logo', 'value' => 'logo/color.png', 'group' => 'general', 'type' => 'image'],
            ['key' => 'site_logo_white', 'value' => 'logo/white.png', 'group' => 'general', 'type' => 'image'],
            ['key' => 'site_favicon', 'value' => 'logo/icon.png', 'group' => 'general', 'type' => 'image'],

            // SEO Meta Settings
            ['key' => 'meta_title_suffix', 'value' => 'HealoraHealth - Premium Home Care & Nursing Services', 'group' => 'seo', 'type' => 'text'],
            ['key' => 'meta_description_default', 'value' => 'HealoraHealth offers compassionate, hospital-quality caregiver and nursing services at your doorstep in Bangladesh. 24/7 doctor consultations and home health packages.', 'group' => 'seo', 'type' => 'textarea'],
            ['key' => 'meta_keywords_default', 'value' => 'caregiver, home nursing, medical care, HealoraHealth, patient care dhaka, elderly care bangladesh', 'group' => 'seo', 'type' => 'text'],

            // Contact Information
            ['key' => 'contact_email', 'value' => 'info@healorahealth.com', 'group' => 'contact', 'type' => 'email'],
            ['key' => 'contact_phone', 'value' => '+880 1700 000 000', 'group' => 'contact', 'type' => 'text'],
            ['key' => 'address', 'value' => 'Dhaka, Bangladesh', 'group' => 'contact', 'type' => 'text'],

            // Social Media
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/healorahealth', 'group' => 'social', 'type' => 'url'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/healorahealth', 'group' => 'social', 'type' => 'url'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/company/healorahealth', 'group' => 'social', 'type' => 'url'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/healorahealth', 'group' => 'social', 'type' => 'url'],
            ['key' => 'youtube_url', 'value' => 'https://youtube.com/healorahealth', 'group' => 'social', 'type' => 'url'],
            ['key' => 'whatsapp_url', 'value' => 'https://wa.me/8801700000000', 'group' => 'social', 'type' => 'url'],
            ['key' => 'messenger_url', 'value' => 'https://m.me/healorahealth', 'group' => 'social', 'type' => 'url'],

            // SMTP Configuration
            ['key' => 'mail_transport', 'value' => 'smtp', 'group' => 'smtp', 'type' => 'text'],
            ['key' => 'mail_host', 'value' => 'smtp.mailtrap.io', 'group' => 'smtp', 'type' => 'text'],
            ['key' => 'mail_port', 'value' => '2525', 'group' => 'smtp', 'type' => 'text'],
            ['key' => 'mail_username', 'value' => '', 'group' => 'smtp', 'type' => 'text'],
            ['key' => 'mail_password', 'value' => '', 'group' => 'smtp', 'type' => 'password'],
            ['key' => 'mail_encryption', 'value' => 'tls', 'group' => 'smtp', 'type' => 'text'],
            ['key' => 'mail_from_address', 'value' => 'noreply@healorahealth.com', 'group' => 'smtp', 'type' => 'email'],
            ['key' => 'mail_from_name', 'value' => 'HealoraHealth', 'group' => 'smtp', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
