<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Settings for all views (including admin)
        View::composer('*', function ($view) {
            $settings = \App\Models\Setting::getSettings();
            
            // Sync AdminLTE logo if on admin pages
            if (isset($settings['site_logo_white'])) {
                config(['adminlte.logo_img' => asset($settings['site_logo_white'])]);
                config(['adminlte.logo' => '']); // Hide text when logo exists
            } elseif (isset($settings['site_name'])) {
                config(['adminlte.logo' => '<b>' . $settings['site_name'] . '</b>']);
            }
            
            $view->with('settings', $settings);
        });

        // Menus for frontend only
        View::composer('layouts.frontend', function ($view) {
            $baseMenuQuery = function($location) {
                return Menu::whereNull('parent_id')
                    ->where('is_active', true)
                    ->where(function($q) use ($location) {
                        $q->whereIn('location', [$location, 'both'])
                          ->orWhereHas('children', function($query) use ($location) {
                              $query->where('is_active', true)
                                    ->whereIn('location', [$location, 'both']);
                          });
                    })
                    ->with(['children' => function($query) use ($location) {
                        $query->where('is_active', true)
                              ->whereIn('location', [$location, 'both'])
                              ->orderBy('order_index');
                    }])
                    ->orderBy('order_index')
                    ->get();
            };

            $view->with('menus', $baseMenuQuery('header')); // Kept for backwards compatibility if needed
            $view->with('header_menus', $baseMenuQuery('header'));
            $view->with('footer_menus', $baseMenuQuery('footer'));
        });
    }
}
