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

     // Dynamic Flasher Position
        $position = app()->getLocale() == 'ar' ? 'top-left' : 'top-right';

        // Update configuration for multiple adapters
        config([
            // Default flasher (notyf/native)
            'flasher.options.position' => $position,

            // SweetAlert2
            'flasher.plugins.sweetalert.position' => $position == 'top-left' ? 'top-start' : 'top-end',

            // Toastr (if used)
            'flasher.plugins.toastr.positionClass' => 'toast-' . $position,
        ]);




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
