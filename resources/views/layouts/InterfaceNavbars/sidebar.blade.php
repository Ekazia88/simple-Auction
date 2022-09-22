<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    
    <a class="simple-text logo-normal">
       welcome {{Auth::user()->username}}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      @if (auth()->user()->level === 'admin')
      <li class="nav-item{{ $activePage == 'dashboardadmin' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('dashboardadmin') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('dashboard') }}</p>
        </a>
      </li>
      <div class="sidebar-heading">
        Management
      </div>
      <li class="nav-item{{ (request()->is('category*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('category') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Category Management') }}</p>
        </a>
      </li>
      <li class="nav-item{{ (request()->is('product*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('product') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Product Management') }}</p>
        </a>
      </li>
      <li class="nav-item{{ (request()->is('AdminManagement*')) ? ' active' : '' }}">
        <a class="nav-link" href="{{route('AdminManagement') }}">
          <i class="material-icons">assignment_ind</i>
            <p>{{ __('Admin Management') }}</p>
        </a>
      </li>
      <li class="nav-item{{ (request()->is('OfficerManagement*')) ? ' active' : '' }}">
        <a class="nav-link" href="{{route('OfficerManagement')}}">
          <i class="material-icons">supervisor_account</i>
            <p>{{ __('Officer Management') }}</p>
        </a>
      </li>
      <li class="nav-item{{ (request()->is('UserManagement*')) ? ' active' : '' }}">
        <a class="nav-link" href="{{route('UserManagement')}}">
          <i class="material-icons">groups</i>
            <p>{{ __('User Management') }}</p>
        </a>
      </li>
      <div class="sidebar-heading">
        Data Report
      </div>
      <li class="nav-item{{ (request()->is('report_history*')) ? ' active' : '' }}">
        <a class="nav-link" href="{{route('report_history')}}">
          <i class="material-icons">import_contacts</i>
            <p>{{ __('History') }}</p>
        </a>
      </li>
      <li class="nav-item{{ (request()->is('report_auction*')) ? ' active' : '' }}">
        <a class="nav-link" href="{{route('report_auction')}}">
          <i class="material-icons">event_note</i>
            <p>{{ __('Auction') }}</p>
        </a>
      </li>
      @endif
      @if (auth()->user()->level === 'officer')
      <li class="nav-item{{ $activePage == 'dashboardofficer' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('dashboardofficer') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('dashboard') }}</p>
        </a>
      </li>
      <div class="sidebar-heading">
        Management
      </div>
      <li class="nav-item{{ (request()->is('category*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('category') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Category Management') }}</p>
        </a>
      </li>
      <li class="nav-item{{ (request()->is('product*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('product') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Product Management') }}</p>
        </a>
      </li>
      <li class="nav-item{{ (request()->is('Auctionx*')) ? ' active' : '' }}">
        <a class="nav-link" href="{{route('Auctionx')}}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Auction') }}</p>
        </a>
      </li>
      <li class="nav-item{{ (request()->is('Bid*')) ? ' active' : '' }}">
        <a class="nav-link" href="{{route('Bid')}}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Bid') }}</p>
        </a>
      </li>
      <div class="sidebar-heading">
        Data Report
      </div>
      <li class="nav-item{{ (request()->is('report_history*')) ? ' active' : '' }}">
        <a class="nav-link" href="{{route('report_history')}}">
          <i class="material-icons">import_contacts</i>
            <p>{{ __('History') }}</p>
        </a>
      </li>
      <li class="nav-item{{ (request()->is('report_auction*')) ? ' active' : '' }}">
        <a class="nav-link" href="{{route('report_auction')}}">
          <i class="material-icons">event_note</i>
            <p>{{ __('Auction') }}</p>
        </a>
      </li>
      @endif
      @if (auth()->user()->level === 'bidder')
      <li class="nav-item{{ $activePage == 'home' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('products') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            @if (  $category = DB::table('categories')->get())
            @foreach ($category as $c)
            <li class="nav-item{{ $activePage == 'product' ? ' active' : '' }}">
              <a class="nav-link" href="{{url('/')}}/product/{{$c->namec}}">
                <span class="sidebar-mini"></span>
                <span class="sidebar-normal">{{$c->namec}}</span>
              </a>
            </li>
            @endforeach
            @endif
          </ul>
      </div>  
      </li>
      @endif
    </ul>
  </div>
</div>