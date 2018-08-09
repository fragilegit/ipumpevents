<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('roles')->delete();
        DB::statement("TRUNCATE roles RESTART IDENTITY CASCADE");
        //create admin role
        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "Admin";
        $admin->save();

        //create admin role
        // $editor = new Role();
        // $editor->name = "editor";
        // $editor->display_name = "Editor";
        // $editor->save();

        //create author role
        $author = new Role();
        $author->name = "author";
        $author->display_name = "author";
        $author->save();

        //attach role
        // $user1 = User::find(1);
        $user1 = User::first();
        $user1->detachRole($admin);
        $user1->attachRole($admin);

        //for final presentations
        $user2 = User::find(2);
        $user2->detachRole($admin);
        $user2->attachRole($admin);

        $user3 = User::find(3);
        $user3->detachRole($author);
        $user3->attachRole($author);

        $user4 = User::find(4); 
        $user4->detachRole($author);
        $user4->attachRole($author);

        if(env('APP_ENV') === 'local'){
            $user2 = User::find(2);
            $user2->detachRole($author);
            $user2->attachRole($author);
    
            $user3 = User::find(3);
            $user3->detachRole($author);
            $user3->attachRole($author);
        }
     
    }
}
