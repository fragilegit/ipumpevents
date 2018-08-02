<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use App\Http\Requests;


class UsersController extends BackendController
{

    public function __construct(){
        parent::__construct();
    }
    public function index(Request $request)
    {
        $users = User::orderBy('name')->paginate($this->limit);
        $usersCount = User::count();

        return view('backend.users.index', compact('users', 'usersCount'));
    }

    public function create()
    {
        $user  = new User();

        // dd($user);
        return view('backend.users.create', compact('user'));
    }

    public function store(Requests\UserStoreRequest $request)
    {   
        $request->except(['role']);
        $request->except(['slug']);
        $data = $request->except(['slug']);
        
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        // $user->slug = str_slug($data['slug']);
        $user->attachRole($request->role);
        return redirect('dashboard/users/')->with('success', 'New User was created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user  = User::findOrFail($id);
        return view('backend.users.edit', compact('user'));
    }

    public function update(Requests\UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(!isset($request->password) ? $request->except(['password']) : $request->except(['slug']));
        // dd(!isset($request->password) ? $request->except(['password']) : $request->all());
        // $user->slug = str_slug($request->only('slug'));
        $user->detachRoles();
        $user->attachRole($request->role);

        return  redirect('dashboard/users/')->with('success', 'User was updated successfully');
        // ->render();

    }

    public function destroy(Requests\UserDestroyRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $deleteOption = $request->delete_option;
        $selectedUser = $request->selected_user;

        if($deleteOption == 'delete'){
            //delete user post
            $user->events()->withTrashed()->forceDelete();
            
            
        }elseif($deleteOption == 'attribute'){
            $user->events()->update(['user_id' => $selectedUser]);
        }
        //delete user
        $user->delete();

        return redirect('dashboard/users/')->with('success', 'User was deleted successfully');

    }  

    public function confirm(Requests\UserDestroyRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $users = User::where('id', '!=', $user->id)->pluck('name', 'id');

        return view('backend.users.confirm', compact('user', 'users'));

    } 
}
