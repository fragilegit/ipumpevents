<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('categories')->delete();
        DB::statement("TRUNCATE categories RESTART IDENTITY CASCADE");

        if(env('APP_ENV') === 'local'){

        
            DB::table('categories')->insert([
                [
                    'title' => 'Boat Ride',
                    'slug' => 'boat-ride'
                ],
                [
                    'title' => 'All Inculsive',
                    'slug' => 'all-inculsive'
                ],
                [
                    'title' => 'Birthday',
                    'slug' => 'birthday'
                ],
                [
                    'title' => 'Wedding',
                    'slug' => 'Wedding'
                ],
                [
                    'title' => 'Photography',
                    'slug' => 'photography'
                ],
                [
                    'title' => 'Uncategorised',
                    'slug' => 'uncategorised'
                ]
            ]);
        }else{
            DB::table('categories')->insert([
                [
                    'title' => 'Uncategorised',
                    'slug' => 'uncategorised'
                ],
                [
                    'title' => 'Boat Ride',
                    'slug' => 'boat-ride'
                ],
                [
                    'title' => 'All Inculsive',
                    'slug' => 'all-inculsive'
                ],
                [
                    'title' => 'Birthday',
                    'slug' => 'birthday'
                ],
                [
                    'title' => 'Wedding',
                    'slug' => 'Wedding'
                ],
                [
                    'title' => 'Photography',
                    'slug' => 'photography'
                ]
            ]);
        }
        
        // for($event_id = 1; $event_id <= 10; $event_id++ ){
        $categories = Category::pluck('id');
        foreach(Event::pluck('id') as $eventId){

            $categoryId = $categories[rand(0, $categories->count()-1)];
            DB::table('events')
                ->where('id', $eventId)
                ->update(['category_id' => $categoryId]);
        }

    }
}
