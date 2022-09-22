@extends('layouts.Interface', ['activePage' => 'Category Management', 'titlePage' => __('Category')])

@section('content')
<title> Edit Category </title>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Category</h4>
          <p class="card-category">This is Category edit</p>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 text-right">
              <form action="{{route('updatecat')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="hidden" value="{{$cat->id_cat}}" name="id_cat">
                  <input type="text" name="namec" value="{{$cat->namec}}" class="form-control"  required>
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

      