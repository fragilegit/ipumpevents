@extends('layouts.backend')

@section('title', config('app.name').' | Edit Account')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{-- {{ config('app.name', 'Ipumpevents')}} --}}
            Account
            <small>Edit account</small>
        
        </h1>
        <ol class="breadcrumb">
            <li>
            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
            Edit account
            </li>
        </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
        <div class="row">
            {{-- @include('backend.partials.message') --}}
            {!! Form::model($user,[
                'method' => 'PUT',
                'route' => 'edit.account',
                'files' => TRUE,
                'enctype' => 'multipart/form-data',
                'id' => 'user-form'
            ])!!}

                @include('backend.users.form', ['hideRoleDropdown' => 'true'])
                
            {!! Form::close() !!}
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
@endsection


  