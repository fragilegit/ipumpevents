@extends('layouts.backend')

@section('title', config('app.name').' | Add New Event')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ config('app.name', 'Ipumpevents')}}
            <small>Add New Event</small>
        
        </h1>
        <ol class="breadcrumb">
            <li>
            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="">
                <a href="{{ route('event.index') }}">Event</a>
            </li>
            <li>
            Add new
            </li>
        </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
        <div class="row">
            {!! Form::model($event,[
                'method' => 'POST',
                'route' => 'event.store',
                'files' => TRUE,
                'enctype' => 'multipart/form-data',
                'id' => 'event-form'
            ])!!}

                @include('backend.event.form')
            {!! Form::close() !!}
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
@endsection

  