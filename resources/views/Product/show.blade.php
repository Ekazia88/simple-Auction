@extends('layouts.Interface', ['activePage' => 'Product Management', 'titlePage' => __('Product Management')])

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
                            <img src="{{url('pict/'.$product->picture_product)}}" style="width:300px;height:300px">
                        </div>
                        <div class="col-md-8">
                            <table>
                                <tr>
                                    <span><td><h3>Name</h3></td></span>
                                    <span><td><h3>:</h3></td></span>
                                    <span><td><h3> {{$product->namep}}</h3></td></span>
                                </tr>
                                <tr>
                                    <td><h3>Date</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><h3> {{$product->date}}</h3></td>
                                </tr>
                                <tr>
                                    <td><h3>First Bid</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><h3> IDR{{$product->first_bid}}</h3></td>
                                </tr>
                                <tr>
                                    <td><h3>Description</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><h3> {{$product->description}}</h3></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection