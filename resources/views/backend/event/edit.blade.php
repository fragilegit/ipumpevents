@extends('layouts.backend')

@section('title', config('app.name').' | Edit Event')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ config('app.name', 'Ipumpevents')}}
            <small>Edit Event</small>
        </h1>
        <ol class="breadcrumb">
            <li>
            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="">
                <a href="{{ route('event.index') }}">Event</a>
            </li>
            <li>
            Edit Event
            </li>
        </ol>
    </section>
    
   <?php 
        $string = url()->current();
        $newstring = explode('/', $string);
        ?>
        {{--  echo $newstring[6];
     --}}
    <!-- Main content --> 
    <section class="content">
        <div class="row">
            {!! Form::model($event,[
                'method' => 'PUT',
                'route' =>['event.update', $event->id],
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


  