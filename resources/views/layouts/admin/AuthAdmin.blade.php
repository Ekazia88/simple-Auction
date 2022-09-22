<div class="wrapper ">
  @include('layouts.AdminNavbars.sidebar')
  <div class="main-panel">
    @yield('content')
    @include('layouts.footers.auth')
    </div>
</div>