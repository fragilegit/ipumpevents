<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 'event title '.$i
        // 'event description '.$i
        // 'event excerpt '.$i
        // str_slug('event slug '.$i.'');
        // DB::table('events')->delete();
        DB::table('events')->truncate();
    //generate 20 events
        $events = [];
        $faker = Factory::create();
       $date = Carbon::create(2018, 6, 4, 9);
        // $date = Carbon::now()->modify('-1 year');
       
        for($i = 1; $i <= 20; $i++){

            $image = "Event_Image_".rand(1,10).".jpg";
            // $date = date("Y-m-d H:i:s", strtotime("2018-06-05 08:00:00 +{$i} days"));
            $date->addDays(10);
            $publishedDate = clone($date);
            $createdDate = clone($date);

            $events[] = [
                'created_at' => $createdDate,
                'updated_at' => $createdDate,
                'event_name' => 'event title '.$i,
                'start_date' => $date,
                'end_date' => $date,
                'description' => 'event description '.$i,
                'event_image' => rand(0, 1) == 1 ? $image : NULL,
                'lat' => rand(10, 100),
                'lng' => rand(10, 100),
                'user_id' => rand(1, 4),
                'slug' => str_slug('event slug '.$i.''),
                'excerpt' => 'event excerpt '.$i,
                'published_at' => $i < 30 ? $publishedDate : ( rand(0, 1) == 0 ? NULL : $publishedDate->addDays(4)),
                'category_id' => rand(1, 6),
                'view_count' => rand(1, 10) * 10,
            ];
        }

        DB::table('events')->insert($events);
    }
}
