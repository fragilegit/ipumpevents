<?php

namespace App\Views\Composers;

use Illuminate\View\View;
use App\Category;
use App\Event;
use App\Tag;

Class NavigationComposer{

    public function compose(View $view){
        $this->composeCategories($view);
        $this->composeTags($view);
        // $this->composeArchives($view);
        $this->composePopularEvents($view);
    }

    private function composeCategories(View $view){
        $categories = Category::with(['events' => function($query){
                    $query->published();
                    }])->orderBy('title', 'asc')->get();
        $view->with('categories', $categories);
    }

    private function composeTags(View $view){
        $tags = Tag::has('events')->get();

        $view->with('tags', $tags);
    }
    // private function composeArchives(View $view){
    //     $archives = Event::archives();

    //     $view->with('archives', $archives);
    // }

    private function composePopularEvents(View $view){

        $popularEvents = Event::published()->popular()->take(4)->get();

        $view->with('popularEvents', $popularEvents);
    }
}