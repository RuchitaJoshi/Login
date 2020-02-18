@extends('layouts.admin')


@section('content')

    {{--Accordion Div to Create posts--}}
    <div class="container">
        {{--<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Create Project</button>--}}
        {{--<div id="demo" class="collapse">--}}

            {{--<div class="row">--}}

            {{--{!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true]) !!}--}}

            {{--<!--  Form Input -->--}}
                {{--<div class="form-group">--}}
                    {{--{{ Form::label('title', 'Title:', ['class' => 'control-label']) }}--}}
                    {{--{{ Form::text('title', null, ['class' => 'form-control']) }}--}}
                {{--</div>--}}

                {{--<!--  Form Input -->--}}
                {{--<div class="form-group">--}}
                    {{--{{ Form::label('category_id', 'Category:', ['class' => 'control-label']) }}--}}
                    {{--{{ Form::select('category_id', [''=>'Choose Option'] + \App\Category::pluck('name','id')->toArray() ,null, ['class' => 'form-control']) }}--}}
                {{--</div>--}}

                {{--<!--  Form Input -->--}}
                {{--<div class="form-group">--}}
                    {{--{{ Form::label('photo_id', 'Photo:', ['class' => 'control-label']) }}--}}
                    {{--{{ Form::file('photo_id', null, ['class' => 'form-control']) }}--}}
                {{--</div>--}}

                {{--<!--  Form Input -->--}}
                {{--<div class="form-group">--}}
                    {{--{{ Form::label('content', 'Description:', ['class' => 'control-label']) }}--}}
                    {{--{{ Form::textarea('content', null, ['class' => 'form-control']) }}--}}
                {{--</div>--}}

                {{--<!--  Form Input -->--}}
                {{--<div class="form-group">--}}
                    {{--{{ Form::submit('Create Post', ['class' => 'btn btn-primary']) }}--}}
                {{--</div>--}}

                {{--{!! Form::close() !!}--}}

            {{--</div>--}}

        {{--</div>--}}

        <div id="DeleteModal" class="modal fade text-danger" role="dialog">
            <div class="modal-dialog">
                {{--Modal Content--}}
                {!! Form::open(['method'=>'POST', 'id'=>'deleteForm']) !!}
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <p class="text-center">Are You Sure Want To Delete ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


    <table class="table">
        <thead>
          <tr>
              <th>Project</th>
              <th>Description</th>
              <th>Status</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @if($projects)
            @foreach($projects as $project)
                <tr>
                    <td><a href="{{ url('admin/projects/' . $project->id . '/edit') }}">{{ $project->title }}</a></td>
                    <td><a href="{{ url('admin/projects/' . $project->id . '/edit') }}">{{ $project->description }}</a></td>
                    <td>{{ $project->status->name }}</td>
                    <td>
                        <a class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Update</a>
                        <a data-toggle="modal"
                           onclick="deleteData({{$project->id}})"
                           data-target="#DeleteModal"
                           class="btn btn-xs btn-danger">
                            <i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            @endforeach
        @endif
        {{--@if($posts)--}}
            {{--@foreach($posts as $post)--}}


                {{--<tr>--}}
                    {{--<td>{{$post->id}}</td>--}}
                    {{--<td><img height="50" src="{{asset('images/'. $post->photo->file)}}" alt=""></td>--}}
                    {{--<td><a href="{{ url('admin/posts/' . $post->id . '/edit')}}">{{$post->title}}</a></td>--}}
                    {{--<td>{{str_limit($post->content,20)}}</td>--}}
                    {{--<td>{{$post->user->name}}</td>--}}
                    {{--<td>{{$post->category->name}}</td>--}}
                    {{--<td>{{$post->category ? $post->category->category_name : 'Uncategorized'}}</td>--}}
                    {{--<td><a href="{{route('home.post',$post->id)}}">View Post</a></td>--}}
                    {{--<td><a href="{{'comments/' . $post->id}}">View Comment</a></td>--}}
                    {{--<td>{{$post->created_at}}</td>--}}
                    {{--<td>{{$post->updated_at}}</td>--}}
                {{--</tr>--}}

            {{--@endforeach--}}
        {{--@endif--}}
        </tbody>
      </table>

    <div class="row">
        <div class="col-sm-6 offset-5">
            {{--{{$posts->render()}}--}}
        </div>
    </div>

@endsection

<script type="text/javascript">
    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("project-delete", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit()
    {
        $("#deleteForm").submit();
    }
</script>

