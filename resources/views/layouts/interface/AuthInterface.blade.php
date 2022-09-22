<div class="wrapper ">
  @include('layouts.InterfaceNavbars.sidebar')
  <div class="main-panel">
  @include('layouts.InterfaceNavbars.navs.AuthAdmin')
    @yield('content')
    
    @include('layouts.footers.auth')
    </div>
</div>