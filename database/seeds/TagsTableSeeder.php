<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Event;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('tags')->truncate();
        DB::table('tags')->delete();

        $party = new Tag();
        $party->name = "Party";
        $party->slug= "party";
        $party->save();

        $boatRide = new Tag();
        $boatRide->name = "Boat Ride";
        $boatRide->slug= "boat-ride";
        $boatRide->save();

        $wedding = new Tag();
        $wedding->name = "Wedding";
        $wedding->slug= "wedding";
        $wedding->save();

        $allInclusive = new Tag();
        $allInclusive->name = "All Inclusive";
        $allInclusive->slug= "all-inclusive";
        $allInclusive->save();

        $tagId = [
            $party->id,
            $boatRide->id,
            $wedding->id,
            $allInclusive->id
        ];
        foreach(Event::all() as $event){

            shuffle($tagId);

            for ($i = 0; $i < rand(0, count($tagId)-1); $i++){
                
                $event->tags()->detach($tagId[$i]);
                $event->tags()->attach($tagId[$i]);
            
            }
        }


    }
}
