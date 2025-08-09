<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        // Register Blade directives for image handling
        Blade::directive('courseImage', function ($expression) {
            return "<?php echo getImageUrl($expression, 'course'); ?>";
        });
        
        Blade::directive('userAvatar', function ($expression) {
            return "<?php echo getAvatarUrl($expression); ?>";
        });
        
        Blade::directive('safeImage', function ($expression) {
            return "<?php echo getImageUrl($expression); ?>";
        });
    }
}
