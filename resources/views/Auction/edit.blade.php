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
            <div class="col-12 text-left">
              <form action="{{route('Aupdate')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Product</label>
                    <input type="hidden" name="id_bid" value="{{$auction->id_bid}}">
                    <select name="id_products" class="select2 form-control" style="width:100%" required>
                        <option value="" disabled selected>Select Product</option>
                        @foreach($product as $p)
                        @if($auction->id_products == $p->id_product)
                        <option value="{{$p->id_product}}" selected>{{$p->namep}}</option>
                        @else
                        <option value="{{$p->id_product}}">{{$p->namep}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="">Date Start</label>
              <input type="text" name="date_bid_start" class="form-control datetimepicker"  id="date" value="{{$auction->date_bid_start}}" required>
          </div>
                <div class="form-group">
                    <label for="">Date End</label>
                <input type="text" name="date_bid_end" class="form-control datetimepicker"  id="date" value="{{$auction->date_bid_end}}" required>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" class="form-control">
                    @if($auction->status == 'open')
                    <option value="{{$auction->status}}" selected>open</option>
                    <option value="closed" >closed</option>
                    @else
                    <option value="open" >open</option>
                    <option value="closed" selected>closed</option>
                    @endif
                </select>
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
@push('js')
<script>
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

      