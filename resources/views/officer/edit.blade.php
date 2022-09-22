@extends('layouts.Interface', ['activePage' => 'Officer Management', 'titlePage' => __('Officer Management')])

@section('content')
<title> Edit | Officer Management </title>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title "> Officer Management</h4>
          <p class="card-category">This is Officer Management edit</p>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 text-left">
              <form action="/Officer Management/update" method="post">
                @csrf
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="hidden" value="{{$officer->id}}" name="id">
                  <input type="text" name="name" value="{{$officer->name}}" class="form-control"  required>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control"  value="{{$officer->username}}"  required>
                </div>
                <div class="form-group">
                  <label for="">Telephone</label>
                  <input type="text" name="telp" class="form-control"  value="{{$officer->telp}}"  required>
              </div>
                <input type="submit" value="Update" class="btn btn-warning">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection