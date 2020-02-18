@extends('layouts.admin')


@section('content')

    {{--Accordion Div to Create posts--}}
    <div class="container">
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Create Post</button>
        <div id="demo" class="collapse">

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
                    {{ Form::textarea('content', null, ['class' => 'form-control']) }}
                </div>

                <!--  Form Input -->
                <div class="form-group">
                    {{ Form::submit('Create Post', ['class' => 'btn btn-primary']) }}
                </div>

                {!! Form::close() !!}

            </div>

        </div>
    </div>


    <table class="table">
        <thead>
          <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>Title</th>
              <th>Content</th>
              <th>User</th>
              <th>Category</th>
              <th>Post</th>
              <th>Comment</th>
              <th>Created At</th>
              <th>Updated At</th>
          </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)


                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="50" src="{{asset('images/'. $post->photo->file)}}" alt=""></td>
                    <td><a href="{{ url('admin/posts/' . $post->id . '/edit')}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->content,20)}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category->name}}</td>
                    {{--<td>{{$post->category ? $post->category->category_name : 'Uncategorized'}}</td>--}}
                    <td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
                    <td><a href="{{'comments/' . $post->id}}">View Comment</a></td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                </tr>

            @endforeach
        @endif
        </tbody>
      </table>

    <div class="row">
        <div class="col-sm-6 offset-5">
            {{$posts->render()}}
        </div>
    </div>

@endsection

