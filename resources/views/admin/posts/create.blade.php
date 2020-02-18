@extends('layouts.admin')

@include('includes.tinymce')

@section('content')

    <h1>Create Post</h1>
    <div class="row">
    
    {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true]) !!}

    <!--  Form Input -->
    <div class="form-group">
        {{ Form::label('title', 'Title:', ['class' => 'control-label']) }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
    </div>

    <!--  Form Input -->
    <div class="form-group">
        {{ Form::label('category_id', 'Category:', ['class' => 'control-label']) }}
        {{ Form::select('category_id', [''=>'Choose Option'] + \App\Category::pluck('name','id')->toArray() ,null, ['class' => 'form-control']) }}
    </div>

    <!--  Form Input -->
    <div class="form-group">
        {{ Form::label('photo_id', 'Photo:', ['class' => 'control-label']) }}
        {{ Form::file('photo_id', null, ['class' => 'form-control']) }}
    </div>

    <!--  Form Input -->
    <div class="form-group">
        {{ Form::label('content', 'Description:', ['class' => 'control-label']) }}
        {{ Form::textarea('content', null, ['class' => 'form-control', 'id'=>'mytextarea']) }}
    </div>

    <!--  Form Input -->
    <div class="form-group">
        {{ Form::submit('Create Post', ['class' => 'btn btn-primary']) }}
    </div>
    
    {!! Form::close() !!}

    </div>

    <div class="row">
        @include('includes.form_error')
    </div>
@endsection