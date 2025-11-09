<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        foreach (config('global.permissions') as $ability => $value) {
            Gate::define($ability, function ($auth) use ($ability) {
                return $auth->hasAbility($ability);
            });
        }

        \Illuminate\Http\Request::macro('hasValidSignature', function ($absolute = true) {
            if ('livewire/upload-file' || 'livewire/preview-file' == request()->path()) {
                return true;
            }
            return \Illuminate\Support\Facades\URL::hasValidSignature($this, $absolute);
        });
    }
}
