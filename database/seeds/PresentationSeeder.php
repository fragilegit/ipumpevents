<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Event;
use App\Category;

class PresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = \Faker\Factory::create();


        DB::table('users')->insert([
            [
                'name' => 'Stacey Williams',
                'name' => 'stacey-williams',
                'name' => 'stacey@costaatt.edu.tt',
                'name' => bcrypt('finals'),
                'bio' => $faker->text(rand(250, 300))
            ],
            [
                'name' => 'Roger Chung',
                'name' => 'roger-chung',
                'name' => 'roger@costaatt.edu.tt',
                'name' => bcrypt('finals'),
                'bio' => $faker->text(rand(250, 300))
            ],
            [
                'name' => 'Edward Cameron',
                'name' => 'edward-cameron',
                'name' => 'edward@costaatt.edu.tt',
                'name' => bcrypt('finals'),
                'bio' => $faker->text(rand(250, 300))
            ]
        ]);
        
        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "Admin";
        $admin->save();
        
        $author = new Role();
        $author->name = "author";
        $author->display_name = "author";
        $author->save();

        $user1 = User::first(2);
        $user1->detachRole($admin);
        $user1->attachRole($admin);

        $user1 = User::first(3);
        $user1->detachRole($admin);
        $user1->attachRole($admin);

        $user1 = User::first(4);
        $user1->detachRole($admin);
        $user1->attachRole($admin);

        
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
        
        $categories = Category::pluck('id');
        foreach(Event::pluck('id') as $eventId){

            $categoryId = $categories[rand(0, $categories->count()-1)];
            DB::table('events')
                ->where('id', $eventId)
                ->update(['category_id' => $categoryId]);
        }

        DB::table();
    }
}
