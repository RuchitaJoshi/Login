@extends('layouts.admin')

@section('styles')
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@stop

@section('content')

    @if(count($comments) > 0)
    <h1>Comments</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Post</th>
            <th>Replies</th>
        </tr>
        </thead>
        <tbody>
        @if($comments)
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
                    <td><a href="{{asset('admin/comments/replies/' . $comment->id)}}">View Replies</a></td>
                    <td>

                    @if($comment->is_active == 1)
                            {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id],'files'=>true]) !!}

                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id],'files'=>true]) !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}
                        @endif
                    </td>

                    <td>
                        {{--{!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id],'files'=>true]) !!}--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::submit('Delete', ['class'=>'btn btn-danger trigger-btn','data-target'=>'#myModal','data-toggle'=>'modal']) !!}--}}
                        {{--</div>--}}

                        <a href="#myModal" class="trigger-btn btn btn-danger" data-toggle="modal">Delete</a>

                        {{--Modal html--}}
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="icon-box">
                                            <i class="material-icons">&#xE5CD;</i>
                                        </div>
                                        <h4 class="modal-title">Are you sure?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                        {{--<button type="button" class="btn btn-danger">Delete</button>--}}
                                        {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id],'files'=>true]) !!}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger trigger-btn','id'=>'deleteButton']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Modal html ends--}}

                        {{--{!! Form::close() !!}--}}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    @else
    <h1>No Comments</h1>
    @endif

    <div class="row">
        <div class="col-sm-6 offset-5">
        {{$comments->render()}}
        </div>
    </div>

@stop

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@stop