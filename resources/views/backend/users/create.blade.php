@extends('layouts.backend')

@section('title', config('app.name').' | Add New User')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{-- {{ config('app.name', 'Ipumpevents')}} --}}
            User
            <small>Add New user</small>
        
        </h1>
        <ol class="breadcrumb">
            <li>
            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="">
                <a href="{{ route('users.index') }}">Users</a>
            </li>
            <li>
            Add new
            </li>
        </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
        <div class="row">
            {!! Form::model($user,[
                'method' => 'POST',
                'route' => 'users.store',
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


  