@extends('layouts.Interface', ['activePage' => 'Admin Management', 'titlePage' => __('Admin Managemet')])

@section('content')
<title> Admin Management | Edit </title>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Admin Management</h4>
          <p class="card-category">This is Admin Management edit</p>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 text-left">
              <form action="/Admin Management/update" method="post">
                @csrf
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="hidden" value="{{$admin->id}}" name="id">
                  <input type="text" name="name" value="{{$admin->name}}" class="form-control"  required>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control"  value="{{$admin->username}}"  required>
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