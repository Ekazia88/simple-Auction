@extends('layouts.Interface', ['activePage' => 'History', 'titlePage' => __('History')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Product Data</h4>
                    <p class="card-category">This is detail Product</p>
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
                                </tr>
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
                          <td>{{$ta->status}}</td>
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
@endsection