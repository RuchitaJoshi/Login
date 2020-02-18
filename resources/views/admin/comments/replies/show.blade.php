@extends('layouts.admin')


@section('content')


    @if(count($comments->replies)>0)
        <h1>Replies</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Comment</th>
                <th>Post</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments->replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post',$reply->comment->post->id)}}">View Comment</a></td>
                    <td>

                        @if($reply->is_active == 1)
                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id],'files'=>true]) !!}

                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id],'files'=>true]) !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}
                        @endif
                    </td>

                    <td>
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
                                        {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id],'files'=>true]) !!}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger trigger-btn','id'=>'deleteButton']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Modal html ends--}}
                    </td>
                </tr>
            @endforeach
            @else
                <h1>No Reply on this Comment</h1>
            @endif
            </tbody>
        </table>

@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $("#deleteButton").submit(function(e) {
            e.preventDefault();
        });
    </script>
@stop