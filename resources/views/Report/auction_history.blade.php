@extends('layouts.Interface', ['activePage' => 'Auction History', 'titlePage' => __('Auction History')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">History Auction</h4>
                    <p class="card-category">This is History Auction</p>
                </div>
                    <div class="card-body">
                        <form action="{{route('input_history')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 text-right">
                                </div>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <div class="form-group">
                                                <label for="">Bidder Status</label>
                                                <select name="auction_status" class="form-control" required>
                                                    <option value="" disabled selected>Select Status</option>
                                                    <option value="delayed">Bid Stage</option>
                                                    <option value="selected">Winner Bid</option>
                                                    <option value="not_selected">Lose Bid</option>
                                                </select>
                                            </div>
                                        </thead>
                                    </table>
                                </div>
                                <center><input type="submit" class="btn btn-success"></center>
                        </form>
                    </div>
                <br>
            </div>
        </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Histroy Report</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if ($count == 0)
                        
                            @else
                    
                            <form action="export_history/{{$req1x}}">
                            <input type="hidden" name="action_status" value="{{$req1x}}">
                            <input type="submit" class="btn btn-warning" value="EXPORT EXCEL">
                            </form>
                            @endif
                            <br>
                            @include('Report.table_history', $historyx)
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection