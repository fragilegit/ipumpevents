@extends('layouts.backend')

@section('title', config('app.name').' | Users')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Users
            <small>Display all users </small>
          </h1>
          <ol class="breadcrumb">
              <li>
                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
              </li>
              <li class="">
                  <a href="{{ route('users.index') }}">Users</a>
              </li>
              <li>
                All Users
              </li>
          </ol>
        </section>
  
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header clearfix">
                        <div class="pull-left">
                            <a href="{{ route('users.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                        </div>
                        <div class="pull-right" style="padding: 7px 0;">
                        
                        </div>
                    </div>
                  <!-- /.box-header -->
                  <div class="box-body ">
                        @include('backend.partials.message')

                        @if(! $users->count())

                            <div class="alert alert-danger">
                                <strong>No Event Found</strong>
                            </div>
                        @else
                            @include('backend.users.table')
                        @endif
                  </div>
                  <div class="box-footer clearfix">
                      <div class="pull-left">
                           {{ $users->appends( Request::query() )->render() }}
                      </div>
                      <div class="pull-right">
                          
                          <small>{{ $usersCount}} {{ str_plural('item', $usersCount)}}</small>
                      </div>
                      
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            </div>
        <!-- ./row -->
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection
  