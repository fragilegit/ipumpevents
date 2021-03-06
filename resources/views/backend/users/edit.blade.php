@extends('layouts.backend')

@section('title', config('app.name').' | Edit User')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{-- {{ config('app.name', 'Ipumpevents')}} --}}
            User
            <small>Edit user</small>
        
        </h1>
        <ol class="breadcrumb">
            <li>
            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="">
                <a href="{{ route('users.index') }}">User</a>
            </li>
            <li>
            Edit User
            </li>
        </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
        <div class="row">
            {!! Form::model($user,[
                'method' => 'PUT',
                'route' =>['users.update', $user->id],
                'files' => TRUE,
                'enctype' => 'multipart/form-data',
                'id' => 'user-form'
            ])!!}

                @include('backend.users.form')
                
            {!! Form::close() !!}
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
@endsection


  