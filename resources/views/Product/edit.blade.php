@extends('layouts.Interface', ['activePage' => 'Product Management', 'titlePage' => __('Product Management')])

@section('content')
<title> Edit Data Product </title>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Product Data</h4>
          <p class="card-category">This is Product Data edit</p>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 text-left">
              <form action="{{route('updateproduct')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="hidden" value="{{$product->id_product}}" name="id_product">
                  <input type="text" name="namep" value="{{$product->namep}}" class="form-control"  required>
                </div>
                <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" name="date" class="form-control"  value="{{$product->date}}"  required>
                </div>
                <div class="form-group">
                    <label for="">First Bid</label>
                    <input type="number" name="first_bid" class="form-control"  value="{{$product->first_bid}}"  required>
                </div>
                <div class="text-left">
                <label for="">Picture</label>
                </div>
                <div class="col-12 text-left">
                  <div class="col-sm 6">
                  <img src="{{url('pict/'.$product->picture_product)}}" style= "width:200px;height:200px">
                  <input type="file" name="picture_product" size = "50">
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Category</label>
                  <select id="id_cats" name="id_cats" class="form-control">
                    <option value="">select a category</option>
                    @foreach(App\Models\category::all() as $cd)
                    <option value="{{$cd->id_cat}}">{{$cd->namec}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control"  value="{{$product->description}}" required>
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

      