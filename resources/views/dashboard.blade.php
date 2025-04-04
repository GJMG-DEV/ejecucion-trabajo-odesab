@include('layouts.header')
       @include('layouts.navbar')
        <div id="layoutSidenav">
           @include('layouts.sidebar')
            <div id="layoutSidenav_content">
                @yield('content')
            </div>
        </div>
@include('layouts.footer')
