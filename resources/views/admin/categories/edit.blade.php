@extends('layouts.admin')


@section('content')
    <div class="col-6">

    {!! Form::model($category, ['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id]]) !!}
    <!--  Form Input -->
        <div class="form-group">
            {{ Form::label('name', 'Category Name:', ['class' => 'control-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>

        <!--  Form Input -->
        <div class="form-group">
            {{ Form::submit('Update Category', null, ['class' => 'btn btn-primary']) }}
        </div>

        {!! Form::close() !!}


        {!! Form::model($category, ['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}

        <div class="form-group">
            {{ Form::submit('Delete Category', null, ['class' => 'btn btn-danger']) }}
        </div>

        {!! Form::close() !!}

    </div>

@endsection