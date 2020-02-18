@extends('layouts.admin')


@section('content')

    <h1>Users</h1>
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
              <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>

              {{--@if($user->photo)--}}
                  {{--<td><img height="50" src="/images/{{$user->photo->file}}" alt=""></td>--}}
              {{--@else--}}
                  {{--<td>No user photo</td>--}}
              {{--@endif--}}

              <td><img height="50" src="{{asset('images/' . $user->photo->file)}}" alt=""></td>
              <td><a href="{{asset('admin/users/' . $user->id . '/edit')}}">{{$user->name}}</a></td>
              <td>{{$user->email}}</td>
              <td>{{$user->role->name}}</td>
              <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
              <td>{{$user->created_at}}</td>
              <td>{{$user->updated_at}}</td>
          </tr>
          @endforeach
        @endif
        </tbody>
      </table>
@endsection