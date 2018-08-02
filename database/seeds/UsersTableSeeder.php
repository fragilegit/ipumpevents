<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset the users table

        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // DB::table('users')->truncate();
        DB::table('users')->delete();

        

        if(env('APP_ENV') === 'local'){
            
            $faker = \Faker\Factory::create();

            DB::table('users')->insert([
                [
                    'name' => "Shaquille Babb",
                    'slug' => "shaquille-babb",
                    'email' => "shaqbabb@yahoo.com",
                    'password' => bcrypt('secret'),
                    'bio' => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "John Doe",
                    'slug' => "john-doe",
                    'email' => "john@yahoo.com",
                    'password' => bcrypt('secret'),
                    'bio' => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "Jane Doe",
                    'slug' => "jane-doe",
                    'email' => "jane@yahoo.com",
                    'password' => bcrypt('secret'),
                    'bio' => $faker->text(rand(250, 300))
                ]
            ]);
        }else{
            DB::table('users')->insert([
                [
                    'name' => "Shaquille Babb",
                    'slug' => "shaquille-babb",
                    'email' => "shaqbabb@yahoo.com",
                    'password' => bcrypt('secret'),
                    'bio' => "Super Admin - Web Developer for iPumpEvents"
                ]
            ]);
        }

    }
}
