@extends('layouts.backend')

@section('title', config('app.name').' | Events')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dasbhboard
          </h1>
          <ol class="breadcrumb">
              <li>
                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
              </li>
              <li class="">
                  <a href="{{ route('event.index') }}">Event</a>
              </li>
              <li>
                All Events
              </li>
          </ol>
        </section>
  
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-xs-12">
                    <div class="box box-info">
                        <div class="box-header clearfix">
                            <div class="pull-left">
                                <a href="{{ route('event.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                            <div class="pull-right" style="padding: 7px 0;">
                                <?php $links = [] ?>
                                @foreach($statusList as $key => $value)
                                    @if($value)
                                        <?php $selected = Request::get('status') == $key ? 'selected-status' : '' ?>
                                        <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})</a>" ?>
                                    @endif  
                                @endforeach
                                {!! implode(' | ', $links) !!}
                                
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                                @include('backend.partials.message')

                                @if(! $events->count())
                                <div class="alert alert-danger">
                                    <strong>No Event Found</strong>
                                </div>
                                @else
                                    @if($onlyTrashed)
                                        @include('backend.event.table-trash')
                                    @else
                                        @include('backend.event.table')
                                    @endif
                                @endif
                        </div>
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                {{ $events->appends( Request::query() )->render() }}
                            </div>
                            <div class="pull-right">
                                
                                <small>{{ $eventCount}} {{ str_plural('item', $eventCount)}}</small>
                            </div>
                            
                        </div>
                        <!-- /.box-body -->
                       
                    </div> 
                    <!-- /.box -->
              </div>
            </div>
          <!-- ./row -->
<!--                    SECOND ROW                         -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-left">
                                <a href="#" class="btn btn-success">Your Calender of Events</a>
                            </div>
                        </div>
                        {{-- /.box-headr --}}
                        <div class="box-body">
                            @if(! $events->count())
                            <div class="alert alert-danger">
                                <strong>No Event Found</strong>
                            </div>
                            @else
                                @if(isset($calendar_details))
                                    {!!  $calendar_details->calendar() !!}
                                @else
                                    <div class="alert alert-danger">
                                        <strong>No Event Found or Posted</strong>
                                    </div>
                                @endif
                            @endif
                        </div>
                        {{-- /.box-body --}}
                        <div class="box-footer  clear-fix">
                        </div>
                        {{-- /.box-footer --}}
                    </div>
                    {{-- /.box --}}
                </div>
                {{-- /.col --}}
            </div>
            {{-- /.row --}}
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    @if(isset($calendar_details))
    {!! $calendar_details->script() !!}
    @endif
@endsection
  