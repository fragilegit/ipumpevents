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

        DB::table('tags')->delete();
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
