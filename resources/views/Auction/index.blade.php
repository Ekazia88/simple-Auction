@extends('layouts.Interface', ['activePage' => 'Auction', 'titlePage' => __('Auction')])

@section('content')
<title> Auction | LELO </title>
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
                 ADD Data Auction
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
            <th>Last Bid</th>
            <th>Winner</th>
            <th>Picture</th>
            <th>category</th>
            <th>Status</th>
            <th><center>Time</center></th>
            <th class="text-right">Actions</th>
            </tr>
             </thead>
                      <tbody>
                      @foreach ($auction as $an => $auc)
                        <tr>
                          <td>
                          {{++$an}}
                          </td>
                          <td>
                          {{$auc->namep}}
                          </td>
                          <td>
                           @currency($auc->first_bid)
                          </td>
                          <td>
                            @currency($auc->last_bid)
                          </td>
                          <td>{{$users->where('id', $auc->id_bidders)->first()->name ?? 'Nothing' }}</td>
                          <td>
                            <img src="{{asset('pict/'.$auc->picture_product)}}"style="width:100px;height:100px">
                          </td>
                          <td>
                          {{$auc->namec}}
                          </td>                          
                          <td>
                          {{$auc->status}}                                
                          </td>
                          <center>
                          <td>
                          </td>
                          </center>
                          <td class="td-actions text-right">
                          <a type="button" rel="tooltip" class="btn btn-success btn-round" href="/Auction/edit/{{ $auc->id_bid}}">
                          <i class="material-icons">edit</i>
                          </a>
                            <form action="/Auction/{{ $auc->id_bid}}" method="post" class="d-inline" onsubmit="return confirm('Are you sure ?')">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-round">
                            <i class="material-icons">delete</i>
                            </button>
                            </form>                      
                          <a type="button" rel="tooltip" class="btn btn-success btn-round" href="/Auction/show/{{ $auc->id_bid}}" class="btn btn-info btn-sm ml-2">
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
        <h4 class="modal-title">Add Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form action="{{route('Astore')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
  <div class="form-group">
    <label for="Name">Product</label>
    <select name="id_product" class="select2 form-control" style="width:100%" required>
        <option value="" disabled selected>Select Product</option>
                @foreach($product as $p)
                <option value="{{$p->id_product}}">{{$p->namep}}</option>
                @endforeach
            </select>
  </div>
  <div class="form-group">
  <select name="id_cat" class="select2 form-control" style="width:100%" required>
    <option value="" disabled selected>Select Category</option>
            @foreach($cat as $c)
            <option value="{{$c->id_cat}}">{{$c->namec}}</option>
            @endforeach
        </select>
</div>
<div class="form-group">
  <label for="label-control">Date Start</label>
  <input type="text" class="form-control datetimepicker" name="date_bid_start" id="date" value="" required>
</div>
  <div class="form-group">
    <label for="label-control">Date End</label>
    <input type="text" class="form-control datetimepicker" name="date_bid_end" id="date" value="" required>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>  
    </div>
    </div>
</div>
</div>
<script type="text/javascript">
if($auc = null){
var countDownDate = new Date().getTime();
}
else{
var countDownDate = new Date("$auction->date_bid_start").getTime();
}
// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d" + hours + "h"
  + minutes + "m" + seconds + "s";


  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Time Out";
    var intx = $inter;
    console.log(intx);
  }
  }
}, 1000);
});
  </script>
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
$('.modal').on('shown.bs.modal', function () {
  $('#date').datetimepicker();
});
$('.datetimepicker').datetimepicker({
    icons: {
        time: "fa fa-clock",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
    }
});
</script>
@endpush