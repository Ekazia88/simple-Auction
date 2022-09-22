@extends('layouts.Interface', ['activePage' => 'home', 'titlePage' => __('dashboard')])

@section('content')
<div class="content" id="res">
    <div class="container-fluid">
        <div class="card shadow mb-4">
          @foreach($cax as $c)
            <div class="card-body">
            <h2 align="center">{{$c->namec}}</h2>
            @endforeach
            </div>
            </div>
            @foreach($auction as $a)
            <div class="row mb-3">
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="{{url('pict/'.$a->picture_product)}}" style="height:200px">
          <div class="card-body">
            <h5 class="card-title">{{$a->namep}}</h5>
            <h6 class="card-title">Price : @currency($a->first_bid)</h6>
            <h6 class="card-title">Highest Price :
              @if($a->last_bid == 0)
              @currency($a->first_bid)
              @else
              @currency($a->last_bid)
              @endif
            </h6>
            <p class="card-title">{{$a->description}}</p>
            <a href="/Bid/show/{{$a->id_bid}}" class="btn btn-danger btn-block">Bid</a>
          </div>
        </div>
        </div>
        @endforeach
            </div>
        </div>  
    </div>
</div>
@endsection
@push('js')

@endpush