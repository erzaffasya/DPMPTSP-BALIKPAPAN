<?php

namespace App\Providers;

use App\Models\LinkTerkait;
use App\Models\Menu;
use App\Models\Pengumuman;
use App\Models\ProfileWebsite;
use Illuminate\Pagination\Paginator;
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
        // View::share('Menu', Menu::tree()->get()->toTree());
        // Paginator::useBootstrapFive();
        // View::share('getProfileWebsite', ProfileWebsite::find(1));
        // View::share('getLinkTerkait', LinkTerkait::all());
        // View::share('Pengumuman', Pengumuman::latest()->paginate(4));
    }
}
