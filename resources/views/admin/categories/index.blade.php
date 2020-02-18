@extends('layouts.admin')


@section('content')
    <div class="col-6">

        {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}
        <!--  Form Input -->
            <div class="form-group">
                {{ Form::label('name', 'Category Name:', ['class' => 'control-label']) }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>

            <!--  Form Input -->
            <div class="form-group">
                {{ Form::submit('Create Category', null, ['class' => 'btn btn-primary']) }}
            </div>

        {!! Form::close() !!}

    </div>

    <div class="col-6">
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created_at</th>
          </tr>
        </thead>
        <tbody>
        @if($categories)
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{url('admin/categories/' . $category->id . '/edit')}}">{{$category->name}}</a></td>
                    <td>{{$category->created_at}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
      </table>
    </div>
@endsection