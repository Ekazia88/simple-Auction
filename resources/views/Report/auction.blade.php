@extends('layouts.Interface', ['activePage' => 'Auction Data', 'titlePage' => __('Auction Data')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Auction Data</h4>
                    <p class="card-category">This is Auction Data</p>
                </div>
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold text-dark">Select</h6>
                    <form action="{{route('input_auction')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Out of</label>
                                    <input type="date" name="first" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Till</label>
                                    <input type="date" name="last" required class="form-control">
                                </div>
                            </div>
                        </div>
                        <center><input type="submit" class="btn btn-success"></center>
                    </form>
                    <br>
                </div>
            </div>
        </div>
<div class="card shadow mb-4">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-dark">Report Auction</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
    @if ($count == 0)
        
    @else
    <form action="export_auction">
        <input type="hidden" name="first" value="{{$req1}}">
        <input type="hidden" name="last" value="{{$req2}}">
       <input type="submit" class="btn btn-warning" value="EXPORT  KE EXCEL">
       </form>
    @endif
       <br>
    @include('Report.table_auction', $auction )

  </div>
</div>

  
@endsection