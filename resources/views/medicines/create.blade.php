@extends('admin_layouts.admin')
@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" >Adding a new medicine</a>
</nav>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
<form method="POST" action="/medicines">
 @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Quantity</label>
    <input type="text" name="quantity" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Type</label>
    <input type="text" name="type" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Price</label>
    <input type="text" name="price" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection