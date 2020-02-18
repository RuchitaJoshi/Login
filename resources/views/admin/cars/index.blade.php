<h1>Car Details</h1>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<!--  Form Input -->
<div class="form-group">
    {{ Form::label('name', 'Name:', ['class' => 'control-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control','id'=>'txtName']) }}
</div>

<h2 id="txtH"></h2>

<!--  Form Input -->
<div class="form-group">
    {{ Form::submit('Click', ['class' => 'btn btn-primary', 'id'=>'btnClick']) }}
</div>

<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Car Name</th>
      </tr>
    </thead>
    <tbody>

    @if($cars)
        @foreach($cars as $car)
          <tr>
            <td>{{$car->id}}</td>
            <td>{{$car->name}}</td>
              <td>
                  <a href="{{asset('admin/cars/' . $car->id)}}">Edit</a>
                  <a href="{{asset('admin/cars/' . $car->id)}}">Delete</a>
              </td>
          </tr>
        @endforeach
     @endif
    </tbody>
  </table>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function(){
        $('#txtName').keyup(function () {
           let name = $('#txtName').val();
           console.log(name);
            $.get( '/admin/cars/ajax'  + '/' + name, function (data) {
                //success data
                console.log(data);

            });
        });
    });
</script>