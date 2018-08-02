@extends('layouts.backend')

@section('title', 'IPumpEvnts | Dashboard')

@section('content')
     
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dasbhboard
        </h1>
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body ">
                      <h3>Welcome to {{ config('app.name', 'Laravel') }}!</h3>
                      <p class="lead text-muted">Hallo {{ Auth::user()->name }}, Welcome to your Dashboard</p>

                      <h4>Get started</h4>
                      <p><a href="{{route('event.create')}}" class="btn btn-primary">Create your first event</a> </p>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
        <!-- ./row -->
        @if(checkUserPermissions(Request(), "Users@index"))
        <div class="row">
          <div class="col-xs-12 col-sm-3">
            <div class="small-box bg-green">
              <div class="inner">
                <h3>{{ $user->count() }}</h3>
                <p>Registered users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('users.index') }}" class="small-box-footer">More info
              <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
            {{-- /.small-box --}}
          </div>

          <div class="col-xs-12 col-sm-3">
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{ $event->count() }}</h3>
                <p>All Events</p>
              </div>
              <div class="icon">
                <i class="fa fa-files-o"></i>
              </div>
              <a href="{{ url('dashboard/event?status=all') }}" class="small-box-footer">More info
              <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
            {{-- /.small-box --}}
          </div>
          
          <div class="col-xs-12 col-sm-3">
            <div class="small-box bg-green">
              <div class="inner">
                <h3>{{ $publishedCount }}</h3>
                <p>Published Events</p>
              </div>
              <div class="icon">
                <i class="fa fa-files-o"></i>
              </div>
              <a href="{{ url('dashboard/event?status=published') }}" class="small-box-footer">More info
              <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
            {{-- /.small-box --}}
          </div>

          <div class="col-xs-12 col-sm-3">
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{ $scheduledCount }}</h3>
                <p>Scheduled Events</p>
              </div>
              <div class="icon">
                <i class="fa fa-files-o"></i>
              </div>
              <a href="{{ url('dashboard/event?status=scheduled') }}" class="small-box-footer">More info
              <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
            {{-- /.small-box --}}
          </div>

          <div class="col-xs-12 col-sm-3">
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>{{ $draftCount }}</h3>
                <p>Draft Events</p>
              </div>
              <div class="icon">
                <i class="fa fa-files-o"></i>
              </div>
              <a href="{{ url('dashboard/event?status=draft') }}" class="small-box-footer">More info
              <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
            {{-- /.small-box --}}
          </div>

          <div class="col-xs-12 col-sm-3">
            <div class="small-box bg-red">
              <div class="inner">
                <h3>{{ $trashedCount }}</h3>
                <p>Trashed Events</p>
              </div>
              <div class="icon">
                <i class="fa fa-files-o"></i>
              </div>
              <a href="{{ url('dashboard/event?status=trash') }}" class="small-box-footer">More info
              <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
            {{-- /.small-box --}}
          </div>
          
        </div>
        {{-- /.row --}}
        @endif
      </section>
      <!-- /.content -->
    </div>

@endsection
