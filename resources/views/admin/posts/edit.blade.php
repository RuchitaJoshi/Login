@extends('layouts.admin')


@section('content')

    <h1>Edit Post</h1>
    <div class="form-group">
    <div class="row">


    {!! Form::model($post, ['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}

    <!--  Form Input -->
        <div class="form-group">
            {{ Form::label('title', 'Title:', ['class' => 'control-label']) }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}
        </div>

        <!--  Form Input -->
        <div class="form-group">
            {{ Form::label('category_id', 'Category:', ['class' => 'control-label']) }}
            {{ Form::select('category_id', $category ,null, ['class' => 'form-control']) }}
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
            {{ Form::submit('Update Post', ['class' => 'btn btn-primary']) }}
        </div>


        {!! Form::model($post, ['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id],'files'=>true]) !!}

        <div class="form-group">
            {{--data-toggle="modal" data-url="{!! URL::route('post-delete', $value->id) !!}" data-id="{{$value->id}}" data-target="#custom-width-modal"--}}
            {{ Form::submit('Delete Post', ['class' => 'btn btn-danger','data-toggle'=>'modal','data-url'=>"{!! URL::route('post-delete', $post->id) !!}", 'data-id'=>$post->id, 'data-target'=>'#custom-width-modal','data-backdrop'=>true,'data-keyboard'=>true]) }}
        </div>

        {!! Form::close() !!}

        <form action="" method="POST" class="remove-record-model">
            <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" style="width:55%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" id="custom-width-modalLabel">Delete Record</h4>
                        </div>
                        <div class="modal-body">
                            <h4>You Want You Sure Delete This Record?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>




    </div>
@section('scripts')
            {{--<script>--}}
                {{--$( document ).ready(function() {--}}
                    {{--$('#custom-width-modal').modal('show');--}}
                {{--});--}}
            {{--</script>--}}
            <script src="{{ asset('/js/custom.js') }}"></script>
        @endsection
        <div class="row">
             @include('includes.form_error')
        </div>

    </div>
@endsection