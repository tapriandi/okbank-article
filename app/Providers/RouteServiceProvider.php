<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Http\Controllers\StaticPageController;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapStaticPageRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define all routes for static pages
     *
     * Static pages are configured from config/static.php
     *
     * @return void
     */
    protected function mapStaticPageRoutes()
    {
        $staticPageRoute = array_keys(config('static.pages'));
        $homeUriPosition = array_search('__home__', $staticPageRoute);
        if (is_int($homeUriPosition))
        {
            $staticPageRoute[$homeUriPosition] = '';
        }

        foreach ($staticPageRoute as $uri)
        {
            Route::middleware('web')->group(function() use ($uri) {
                Route::get($uri, 'App\Http\Controllers\StaticPageController@_default');
                Route::get('{locale}/' . $uri, 'App\Http\Controllers\StaticPageController@_default')->where('locale', implode('|', config('app.supported_locale')));
            });
        }
    }
}
