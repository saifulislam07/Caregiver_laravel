<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    /**
     * Display general and branding settings.
     */
    public function index()
    {
        $settings = Setting::whereIn('group', ['general', 'contact', 'seo'])->get()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Display SMTP settings.
     */
    public function smtp()
    {
        $settings = Setting::where('group', 'smtp')->get();
        return view('admin.settings.smtp', compact('settings'));
    }

    /**
     * Display Payment Account settings.
     */
    public function payment()
    {
        return view('admin.settings.payment');
    }

    /**
     * Display Social Media settings.
     */
    public function social()
    {
        $settings = Setting::where('group', 'social')->get();
        return view('admin.settings.social', compact('settings'));
    }

    /**
     * Update settings.
     */
    public function update(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            if ($setting) {
                if ($setting->type === 'image' && $request->hasFile($key)) {
                    // Delete old image if exists AND it's not a default one we want to keep (optional)
                    // But user asked to delete old files, so we delete.
                    if ($setting->value && file_exists(public_path($setting->value))) {
                        @unlink(public_path($setting->value));
                    }
                    
                    $file = $request->file($key);
                    // Use the key as base filename for clarity (e.g. site_logo_12345.png)
                    $filename = $key . '_' . time() . '.' . $file->getClientOriginalExtension();
                    
                    if (!file_exists(public_path('logo'))) {
                        mkdir(public_path('logo'), 0777, true);
                    }
                    
                    $file->move(public_path('logo'), $filename);
                    $setting->value = 'logo/' . $filename;
                } else {
                    $setting->value = $value;
                }
                $setting->save();
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
