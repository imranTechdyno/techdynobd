<?php

namespace App\Providers;
use App\Models\GeneralSetting;
use App\Models\Language;
use App\Models\Page;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('backend.layout.navbar', function ($view) {
            $notifications = auth()->guard('admin')->user()->unreadNotifications;
            $view->with('notifications',  $notifications);
        });

        $general = GeneralSetting::first();
        view()->share('language_top', Language::latest()->get());

        view()->share('general', $general);

        $urlSections = [];

        $jsonUrl = resource_path('views/') . 'sections.json';

        $urlSections = array_filter(json_decode(file_get_contents($jsonUrl), true));

        $pages = Page::where('name', '!=', 'home')->where('status', 1)->get();

        view()->share('pages', $pages);
        view()->share('urlSections', $urlSections);
    }

    function removeSpecialChar($str)
    {

        $res = trim(str_replace(array(
            '[', ']',
            '\''
        ), '', $str));
        return $res;
    }
}
