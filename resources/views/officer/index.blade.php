@extends('layouts.Interface', ['activePage' => 'Officer Management', 'titlePage' => __('Officer Management')])

@section('content')
<title>Admin Management - Lelo</title>
<div class="content">
    <div class="container-fluid">
      @include('layouts.partials.alert')
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Officer Management</h4>
                  <p class="card-category">This is Officer Management</p>
                </div>
                <div class="card-body">
                <div class="row">
                <div class="col-12 text-right">
        
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah" data-backdrop="static" data-keyboard="false">
                Add User
              </button>
                </div>
                </div>
                <div class="table-responsive">
                <table class="table">
              <thead class="text-primary">
                <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Password</th>
            <th class="text-right">Actions</th>
            </tr>
             </thead>
                      <tbody>
                      @foreach ($user as $i => $us)
                        <tr>
                          <td>
                          {{++$i}}
                          </td>
                          <td>
                          {{$us->name}}
                          </td>
                          <td>
                          {{$us->username}}
                          </td>
                          <td>
                          {{$us->email}}
                          </td>
                          <td>
                          {{$us->telp}}
                          </td>
                          <td>
                          ********
                          </td>
                          <td class="td-actions text-right">
                          <a type="button" rel="tooltip" class="btn btn-success btn-round" href="/Officer Management/edit/{{$us->id}}">
                          <i class="material-icons">edit</i>
                          </a>
                            <form action="/Officer Management/{{ $us->id}}" method="post" class="d-inline" onsubmit="return confirm('Apakah anda mau menghapus barang ini?')">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-round">
                            <i class="material-icons">delete</i>
                            </button>
                            </form>
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
<!-- Add Data Modal Add-->
<div  id="tambah" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Add User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form action="{{route('storeofficer') }}" method="post">
        @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" required>
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" id="username" required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" id="email" required>
  </div>
  <div class="form-group">
    <label for="telp">Telephone</label>
    <input type="telp" class="form-control" name="telp" id="telp" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" required>
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