@extends('layouts.Interface', ['activePage' => 'Category Management', 'titlePage' => __('category')])

@section('content')
<title>Product Data - Lelo</title>
<div class="content">
    <div class="container-fluid">
      @include('layouts.partials.alert')
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Category Data</h4>
                  <p class="card-category">This is Category Data</p>
                </div>
                <div class="card-body">
                <div class="row">
                <div class="col-12 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah" data-backdrop="static" data-keyboard="false">
                Add Category
              </button>
                </div>
                </div>
                <div class="table-responsive">
                <table class="table">
              <thead class="text-primary">
                <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
            </tr>
             </thead>
                      <tbody>
                      @foreach ($categories as $c => $ct)
                        <tr>
                          <td>
                          {{++$c}}
                          </td>
                          <td>
                          {{$ct->namec}}
                          </td>
                          <td class="td-actions">
                          <a type="button" rel="tooltip" class="btn btn-success btn-round" href="/Category/edit/{{ $ct->id_cat}}">
                          <i class="material-icons">edit</i>
                          </a>
                            <form action="/Category/{{ $ct->id_cat}}" method="post" class="d-inline" onsubmit="return confirm('Are you sure ?')">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-round">
                            <i class="material-icons">delete</i>
                            </button>
                            </form>                      
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
        <h4 class="modal-title">Add Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form action="/Category/store" method="post">
        {{ csrf_field() }}
  <div class="form-group">
    <label for="Name">Name Category</label>
    <input type="text" class="form-control" name="namec" id="namec" required>
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