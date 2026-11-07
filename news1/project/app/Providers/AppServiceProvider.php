<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\GeneralSettings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App;
use App\Models\Font;
use App\Models\Language;
use App\Models\SocialLink;
use App\Models\View;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        // ভিউ কম্পোজার (অপরিবর্তিত)
        view()->composer(['*'], function ($view) {
            try {
                if (Session::has('language')) {
                    $default_language = Language::find(Session::get('language'));
                } else {
                    $default_language = Language::where('is_default', 1)->first();
                }

                if ($default_language) {
                    App::setLocale($default_language->name);
                }

                $gs = GeneralSettings::find(1);
                $seo = DB::table('seotools')->first();

                $view->with([
                    'gs' => $gs,
                    'seo' => $seo,
                    'categories' => Category::orderBy('category_order', 'asc')
                        ->where('language_id', $default_language->id ?? 1)
                        ->where('parent_id', null)
                        ->where('show_on_menu', 1)
                        ->get(),
                    'social_links' => SocialLink::orderBy('id', 'desc')->get(),
                    'top_views' => DB::table('views')
                        ->select(DB::raw('count(*) as top_viwes, post_id'))
                        ->groupBy('post_id')
                        ->orderBy('top_viwes', 'desc')
                        ->take(6)
                        ->get(),
                    'tags' => isset($gs->tags) ? explode(',', $gs->tags) : [],
                    'default_language' => $default_language,
                    'default_font' => Font::where('is_default', 1)->first(),
                    'languages' => Language::orderBy('id', 'desc')->get()
                ]);
            } catch (\Exception $e) {
                // ডাটাবেস এরর ইগনোর করবে
            }
        });
    }
}