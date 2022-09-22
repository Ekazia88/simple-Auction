@extends('layouts.Interface', ['activePage' => 'Product Management', 'titlePage' => __('Prodcut Management')])

@section('content')
<title>Product Data - Lelo</title>
<div class="content">
    <div class="container-fluid">
      @include('layouts.partials.alert')
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Product Data</h4>
                  <p class="card-category">This is product data</p>
                </div>
                <div class="card-body">
                <div class="row">
                <div class="col-12 text-right">
        
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah" data-backdrop="static" data-keyboard="false">
                Add Product
              </button>
                </div>
                </div>
                <div class="table-responsive">
                <table class="table">
              <thead class="text-primary">
                <tr>
            <th>ID</th>
            <th>Name</th>
            <th>First Bid</th>
            <th>Picture</th>
            <th>Category</th>
            <th>Description</th>
            <th class="text-right">Actions</th>
            </tr>
             </thead>
                      <tbody>
                      @foreach ($product as $pos => $tx)
                        <tr>
                          <td>
                          {{++$pos}}
                          </td>
                          <td>
                          {{$tx->namep}}
                          </td>
                          <td>
                            @currency($tx->first_bid)
                          </td>
                          <td>
                            <img src="{{asset('pict/'.$tx->picture_product)}}"style="width:100px;height:100px">
                          </td>
                          <td>
                            {{$tx->namec}}
                          </td>
                          <td>
                            {{$tx->description}}
                          </td>
                          <td class="td-actions text-right">
                          <a type="button" rel="tooltip" class="btn btn-success btn-round" href="/Product/edit/{{ $tx->id_product}}">
                          <i class="material-icons">edit</i>
                          </a>
                            <form action="/Product/{{ $tx->id_product}}" method="post" class="d-inline" onsubmit="return confirm('Are you sure ?')">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-round">
                            <i class="material-icons">delete</i>
                            </button>
                            </form>                      
                          <a type="button" rel="tooltip" class="btn btn-success btn-round" href="/Product/show/{{ $tx->id_product}}" class="btn btn-info btn-sm ml-2">
                          <i class="material-icons">web</i>
                          </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
    </div>
</div>
</div>
</div>
<!-- Add Data Modal-->
<div  id="tambah" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Add Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form action="{{route('storeproduct') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
  <div class="form-group">
    <label for="Name">Name Product</label>
    <input type="text" class="form-control" name="namep" id="name" aria-describedby="emailHelp" required>
  </div>
  <div class="form-group">
    <label for="first_bid">First Bid</label>
    <input type="number" class="form-control" name="first_bid" id="first_bid" required>
  </div>
    <label for="picture_product">Picture</label>
    <input type="file"  accept="image/*" class="form-control" name="picture_product" id="picture_product" required multiple/>
    <div class="form-group">
      <label for="category">Category</label>
      <select id="id_cats" name="id_cats" class="form-control">
        <option value="">select a category</option>
        @foreach(App\Models\Category::all() as $cd)
        <option value="{{$cd->id_cat}}">{{$cd->namec}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" name="description" id="description" required>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Add</button>
    </form>  
    </div>
    </div>
</div>
</div>
@endsection

@push('js')
<script>
$(document).ready(function(){
	$('.launch-modal').click(function(){
		$('#tambah').modal({
			backdrop: 'static'
		});
	}); 
});
</script>
@endpush