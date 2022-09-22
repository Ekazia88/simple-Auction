@extends('layouts.Interface', ['activePage' => 'Auction', 'titlePage' => __('Auction')])

@section('content')
<title> Auction | Edit </title>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Auction Data</h4>
                    <p class="card-category">This is Auction Data edit</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{asset('pict/'.$auction->picture_product)}}" style="width:300px;height:300px">
                        </div>
                        <div class="col-md-8">
                            <table>
                                <tr>
                                    <span><td><h3>Name Product</h3></td></span>
                                    <span><td><h3>:</h3></td></span>
                                    <span><td><h3> {{$auction->namep}}</h3></td></span>
                                </tr>
                                <tr>
                                    <td><h3>Date</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><h3> {{$auction->date_bid_end}}</h3></td>
                                </tr>
                                <tr>
                                    <td><h3>First Bid</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><h3> IDR{{$auction->first_bid}}</h3></td>
                                </tr>
                                <tr>
                                    <td><h3>Description</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><h3> {{$auction->description}}</h3></td>
                                </tr>
                                <tr>
                                    <td><h3>Status</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><h3> {{$auction->status}}</h3></td>
                                </tr>
                                <tr>
                                    <td><h3>Winner</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><h3>{{$users->where('id', $auction->id_bidder)->first()->name ?? null}}</h3></td>
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
<div class="row">
    <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Product {{$auction->namep}}</h4>
        </div>
        <div class="card-body">
        <div class="row">
        <div class="col-12 text-right">
        </div>
        </div>
        <div class="table-responsive">
        <table class="table">
      <thead class="text-primary">
        <tr>
    <th>No</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Bid</th>
    <th>Winner</th>
    <th>Status</th>
    <th>Change Status</th>
     </thead>
              <tbody>
              @foreach ($data as $d => $t)
                <tr>
                  <td>
                  {{++$d}}
                  </td>
                  <td>
                  {{$t->name}}
                  </td>
                  <td>
                   {{$t->telp}}
                  </td>
                  <td>
                    {{$t->bid}}
                  </td>
                  <td>
                    {{$t->bid}}
                  <td>
                    {{$t->auction_status}}
                  </td>
                  @if($t->auction_status == 'delayed')
                  <td>
                    <a href="/Bid/status/{{$t->id_history}}" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin ?')">Pilih Jadi Pemenang</a></td>
                  </td>
                  @elseif($t->status == 'not_selected')
                  <td>
                    Not Selected
                  </td>
                  @else
                  <td>
                      Selected
                  </td>
                  @endif
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
    
  }
}, 1000);
</script>
@endpush