@extends('layouts.admin')

@section('content')
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
              <th>Image</th>
            <th>Created At</th>
          </tr>
        </thead>
        <tbody>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        .......
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src=".../100px180/" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <button type="button"  class="btn btn-success">Hello world</button>


        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td>{{$photo->file ? $photo->file : 'no photo'}}</td>
                    <td><img height="50" src="{{asset('images/' . $photo->file)}}" alt=""></td>
                    {{--<td><img height="100" src="{{(public_path() . '/images/' . $photo->file) ? public_path() . '/images/' . $photo->file : 'no photo'}}" alt=""></td>--}}
                    <td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy', $photo->id]]) !!}
                        <!--  Form Input -->
                            <div class="form-group">
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'data-toggle'=>'modal','data-target'=>'#myModal']) }}
                            </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
      </table>
@endsection