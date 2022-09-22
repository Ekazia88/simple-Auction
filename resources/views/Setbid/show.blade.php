@extends('layouts.Interface', ['activePage' => 'History', 'titlePage' => __('History')])

@section('content')
<title> Edit Data Product </title>
<div class="content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Product Data</h4>
                    <p class="card-category">This is detail Product</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{url('pict/'.$auction->picture_product)}}" style="width:300px;height:300px">
                        </div>
                        <div class="col-md-8">
                            <table>
                                <tr>
                                    <span><td><h3>Name</h3></td></span>
                                    <span><td><h3>:</h3></td></span>
                                    <span><td><h3> {{$auction->namep}}</h3></td></span>
                                </tr>
                                <tr>
                                    <td><h3>Date</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><h3> {{$auction->date_bid_end}}</h3></td>
                                </tr>
                                <tr>
                                    <td><h3>Bid Amount</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><h3> @currency($auction->first_bid)</h3></td>
                                </tr>                    
                                <tr>
                                    <td><h3>Description</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><h3> {{$auction->description}}</h3></td>
                                </tr>
                                <tr>
                                    <td><h3>Status</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><h3>{{$auction->status}}</h3></td>
                                </tr>
                                <tr>
                                    <td><h3>Highest Bid</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><h3>
                                    @if($high == null)
                                    @currency($auction->first_bid)            
                                    @else                                                                    
                                    @currency($high)             
                                    @endif
                                    </h3></td>
                                </tr>                                                    
                                <tr>
                                    <td><h3>Until</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><h3 id="demo"></h3></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.partials.alert')
        @if($bidding == null)
        <div id="hide">
        <div class="card shadow mb-4" style="display:none;">
            <div class="card-body">
                <center><h3 class="m-0 font-weight-bold text-primary">Bidding {{$auction->namep}} Is Close</h3></center>
            </div> 
        </div>
        </div>
        <div id="show">
        <div class="card shadow mb-4" style="display:block;">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bidding {{$auction->namep}}</h6>
            </div>
            <form action="/Setbid/store" method="post">
            @csrf
            <div class="card-body" style="display: block;">
                <div class="form-group">
                    <label for="">Bid Amount</label>
                    <input type="hidden" name="id_bids" value="{{$auction->id_bid}}">
                    <input type="number" class="form-control" name="bid" required>
                </div>
                <center><input type="submit" class="btn btn-danger" value="Submit"></center>
            </div>
            </form>
        </div>
    @else
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Penawaran {{$auction->namep}}</h6>
            </div>
            <div class="card-body">
                <h5 class="card-title">Your Bid @if($bidding->bid == null) 0 @else @currency($bidding->bid) @endif</h5>
            </div>
        </div>
        </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Bidder {{$auction->namep}}</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered"  id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bidder</th>
                            <th>Phone</th>
                            <th>bid</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $i => $u)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->telp}}</td>
                            <td>{{$u->bid}}</td>
                            <td>
                                @if($u->auction_status == 'delayed')
                                bid stage
                                @elseif($u->auction_status == 'selected')
                                win
                                @elseif($u->auction_status =='not_selected')
                                lose
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
@push('js')
<script>
var countDownDate = new Date("{{$auction->date_bid_end}}").getTime();

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
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";


  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Time Out";
    document.getElementById("hide").style.display= 'block';
    document.getElementById("show").style.display= 'none';
  }
}, 1000);
</script>
@endpush

















