<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\Category;
// use App\Event;
use App\Views\Composers\NavigationComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('inc.sidebar', NavigationComposer::class);
        // view()->composer('inc.sidebar', function($view){
        //     $categories = Category::with(['events' => function($query){
        //         $query->published();
        //     }])->orderBy('title', 'asc')->get();
        //     return $view->with('categories', $categories);
        // });

        // view()->composer('inc.sidebar', function($view){
            
        //     $popularEvents = Event::published()->popular()->take(4)->get();

        //     return $view->with('popularEvents', $popularEvents);
        // });
        
      
    }



    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
