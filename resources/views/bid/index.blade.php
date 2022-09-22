@extends('layouts.Interface', ['activePage' => 'Bid', 'titlePage' => __('Bid')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Bidding Data</h4>
                  <p class="card-category">This is product data</p>
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
            <th>Name Product</th>
            <th>Bidder</th>
            <th>Phone</th>
            <th>Bid</th>
            <th>Status</th>
            <th>Select the winner</th>
             </thead>
                      <tbody>
                      @foreach ($data as $da => $ta)
                        <tr>
                          <td>
                          {{++$da}}
                          </td>
                          <td>
                          {{$ta->namep}}
                          </td>
                          <td>
                           {{$ta->Full_name}}
                          </td>
                          <td>
                            {{$ta->telp}}
                           </td>
                          <td>
                           {{$ta->bid}}
                          </td>
                          
                        
                          <td>
                          @if($ta->auction_status == 'delayed') 
                          Bid Stage
                          @endif        
                          @if($ta->auction_status == 'selected') 
                          winner
                          @endif
                          @if($ta->auction_status == 'not_selected')
                          lose
                          @endif
                          </td>
                          @if($ta->auction_status == 'delayed')
                          <td><a href="/Bid/status/{{$ta->id_history}}" class="btn btn-success btn-sm" onclick="return confirm('Are you sure ?')">Select The Winner</a></td>
                          @elseif($ta->auction_status == 'not_selected')
                          <td>Lose</td>
                          @else
                          <td>Winner</td>
                          @endif
                      </tr>
                      @endforeach
                      </tbody>
                  </thead>
                    </table>
                  </div>
                </div>
            </div>
    </div>
</div>
</div>
</div>
@endsection