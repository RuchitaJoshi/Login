@extends('layouts.admin')


@section('content')

    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{asset('images/' . $post->photo->file)}}" alt="">

        <hr>

        <!-- Post Content -->

        <p>{{$post->content}}</p>

        <hr>

        <!-- Blog Comments -->

        @if(Auth::check())
        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>

            {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">
        <!--  Form Input -->
            <div class="form-group">
                {{ Form::label('body', 'Body:', ['class' => 'control-label']) }}
                {{ Form::textarea('body', null, ['class' => 'form-control', 'row'=>3]) }}
            </div>

            <!--  Form Input -->
            <div class="form-group">
                {{ Form::submit('Submit Comment', null, ['class' => 'btn btn-primary']) }}
            </div>

            {!! Form::close() !!}


        </div>
        @endif

        <hr>

        <!-- Posted Comments -->

       @if(count($post->comments) > 0)
        <!-- Comment -->
        @foreach($post->comments as $comment)

        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>
                <p>{{$comment->body}}</p>

                @if(count($comment->replies) > 0)

                    @foreach($comment->replies as $reply)
                <!-- Nested Comment -->
                <div class="nested-comment media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$reply->author}}
                            <small>{{$reply->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$reply->body}}
                    </div>

                    <div class="comment-reply-container">

                        <button class="toggle-reply btn btn-primary" data-target="#demo" data-toggle="collapse">Reply</button>

                        <div class="comment-reply collapse" id="demo">

                {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@store']) !!}

                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                <!--  Form Input -->
                    <div class="form-group">
                        {{ Form::label('body', 'Reply:', ['class' => 'control-label']) }}
                        {{ Form::textarea('body', null, ['class' => 'form-control','rows'=>1]) }}
                    </div>

                    <div class="form-group">
                        {{ Form::submit('submit', ['class' => 'btn btn-primary']) }}
                    </div>

                    {!! Form::close() !!}
                    </div>
                </div>
                <!-- End Nested Comment -->
                </div>
                    @endforeach

                    @endif

            </div>
        </div>
        @endforeach
        @endif

    @stop