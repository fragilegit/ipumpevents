<?php

function checkUserPermissions($request, $actionName = NULL, $id = NULL){
    // get current user login
    $currentUser = $request->user();

    // get current action name
    if($actionName){
        $currentActionName = $actionName;
    }else{
        $currentActionName = $request->route()->getActionName();
    }
    // dd($currentActionName);
    list($controller, $method) = explode('@', $currentActionName);
    $controller  = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);

    $crudPermissionsMap = [
        // 'create' => ['create', 'store'],
        // 'update' => ['edit', 'update'],
        // 'delete' => ['destroy', 'restore', 'forceDestroy'],
        // 'read' => ['index', 'view']

        'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view']
    ];

    $classesMap = [
        'Event' => 'event',
        'Categories' => 'category',
        'Users' => 'user'
    ];

    foreach($crudPermissionsMap as $permissions => $methods){

        if(in_array($method, $methods) && isset($classesMap[$controller])){

            $className = $classesMap[$controller];

            if($className == 'event' && in_array($method, ['edit', 'update', 'destroy', 'restore', 'forceDestroy'])){
                // dd("current user tried to edit/delete event");
                $id = !is_null($id) ? $id : $request->route("event");

                if( $id && (!$currentUser->can('update-others-event') || !$currentUser->can('delete-others-event'))){
                        $event = \App\Event::withTrashed()->find($id);
                        if($event->user_id !== $currentUser->id){
                            // dd("cannot update or delete other posts");
                             // redirect->back();
                            // abort(403, "Forbidden Access!!");
                            return false;
                        }
                }
            }
            elseif(! $currentUser->can("{$permissions}-{$className}")){
                // redirect->back();
                // abort(403, "Forbidden Access!!");
                return false;
            }
            break;
            // dd("{$permissions}-{$className}");
        }
    }
    // dd("C: $controller M: $method");
    // return $next($request);
    return true;
}