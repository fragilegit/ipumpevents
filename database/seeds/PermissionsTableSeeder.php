<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role; 

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('permissions')->delete();
        // DB::table('permissions')->truncate();
        DB::statement("TRUNCATE permissions RESTART IDENTITY CASCADE");
        
        $crudEvent = new Permission();
        $crudEvent->name = "crud-event";
        $crudEvent->save();

        $updateOthersEvent = new Permission();
        $updateOthersEvent->name = "update-others-event";
        $updateOthersEvent->save();

        $deleteOthersEvent = new Permission();
        $deleteOthersEvent->name = "delete-others-event";
        $deleteOthersEvent->save();

        $crudCategory = new Permission();
        $crudCategory->name = "crud-category";
        $crudCategory->save();

        $crudUser = new Permission();
        $crudUser->name = "crud-user";
        $crudUser->save();

        // attach roles permissions
        $admin = Role::whereName('admin')->first();
        // $editor = Role::whereName('editor')->first();
        $author = Role::whereName('author')->first();

        $admin->detachPermissions([$crudEvent, $updateOthersEvent, $deleteOthersEvent, $crudCategory, $crudUser]);
        $admin->attachPermissions([$crudEvent, $updateOthersEvent, $deleteOthersEvent, $crudCategory, $crudUser]);
        
        // $editor->detachPermissions([$crudEvent, $updateOthersEvent, $deleteOthersEvent, $crudCategory]);
        // $editor->attachPermissions([$crudEvent, $updateOthersEvent, $deleteOthersEvent, $crudCategory]);
        
        $author->detachPermission($crudEvent);
        $author->attachPermission($crudEvent);

    }
}
