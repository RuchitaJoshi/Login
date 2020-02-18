@extends('layouts.admin')


@section('content')
    <h1>Edit User</h1>

    <div class="col-3">
        <img height="100" src="/images/{{$user->photo ? $user->photo->file : 'no image'}}" alt="" class="img-responsive">
    </div>

    <div class="col-9">
        {!! Form::model($user, ['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
    
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <!--  Form Input -->
        <div class="form-group">
            {{ Form::label('email', 'Email:', ['class' => 'control-label']) }}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
        </div>
        <!--  Form Input -->
        <div class="form-group">
            {{ Form::label('role_id', 'Role:', ['class' => 'control-label']) }}
            {{ Form::select('role_id', $roles ,null, ['class' => 'form-control']) }}
        </div>
        <!--  Form Input -->
        <div class="form-group">
            {{ Form::label('is_active', 'Status:', ['class' => 'control-label']) }}
            {{ Form::select('is_active', array(1=>'Active', 0=>'Not Active') , null, ['class' => 'form-control']) }}
        </div>
        <!--  Form Input -->
        <div class="form-group">
            {{ Form::label('password', 'Password:', ['class' => 'control-label']) }}
            {{ Form::password('password', null, ['class' => 'form-control']) }}
        </div>
        <!--  Form Input -->
        <div class="form-group">
            {{ Form::label('photo_id', 'Photo:', ['class' => 'control-label']) }}
            {{ Form::file('photo_id', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
        </div>
    
        {!! Form::close() !!}

    </div>

    @include('includes.form_error')

@endsection