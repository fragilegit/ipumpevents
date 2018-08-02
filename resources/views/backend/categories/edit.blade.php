@extends('layouts.backend')

@section('title', config('app.name').' | Edit Category')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{-- {{ config('app.name', 'Ipumpevents')}} --}}
            Categories
            <small>Edit Category</small>
        
        </h1>
        <ol class="breadcrumb">
            <li>
            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="">
                <a href="{{ route('categories.index') }}">Category</a>
            </li>
            <li>
            Edit Category
            </li>
        </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
        <div class="row">
            {!! Form::model($category,[
                'method' => 'PUT',
                'route' =>['categories.update', $category->id],
                'files' => TRUE,
                'enctype' => 'multipart/form-data',
                'id' => 'category-form'
            ])!!}

                @include('backend.categories.form')
                
            {!! Form::close() !!}
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
@endsection


  