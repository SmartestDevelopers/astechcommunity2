<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use App\Course;
use App\Category;

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
        
        // Share popular course categories with all views
        View::composer('*', function ($view) {
            // Get popular course categories for mega menu
            $popularCourseCategories = Category::whereHas('courses', function($query) {
                $query->where('is_active', true);
            })
            ->withCount(['courses' => function($query) {
                $query->where('is_active', true);
            }])
            ->where('is_active', true)
            ->orderBy('courses_count', 'desc')
            ->limit(6)
            ->get();
            
            $view->with('popularCourseCategories', $popularCourseCategories);
        });
    }
}
