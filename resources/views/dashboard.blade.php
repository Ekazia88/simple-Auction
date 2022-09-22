@extends('layouts.Interface', ['activePage' => 'dashboardadmin', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-user-tie"></i>
                  </div>
                  <p class="card-category">Officer</p>
                  <h3 class="card-title">{{$officerc}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">Product</p>
                  <h3 class="card-title">{{$productc}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">
                      perm_identity
                    </i>
                  </div>
                  <p class="card-category">Bidder</p>
                  <h3 class="card-title">{{$bidderc}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-gavel"></i>
                  </div>
                  <p class="card-category">Auction</p>
                  <h3 class="card-title">{{$auctionc}}</h3>
                </div>
                  <div class="card-footer">
                </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush