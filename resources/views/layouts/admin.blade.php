<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.admin.head')
    @yield('head')
</head>
<body class="g-sidenav-show bg-gray-200">
@include('layouts.admin.sidebar')
{{--@yield('content')--}}
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg mr-0">
    @include('layouts.admin.navbar')
    <div class="container-fluid py-4">
        <div class="content">
            @yield('content')
            @include('layouts.admin.footer')
        </div>
    </div>
</main>
<!--   Core JS Files   -->
<script src="{{ asset('js/core/popper.min.js') }}"></script>
<script src="{{ asset('js/core/jquery.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="{{ asset('js/core/bootstrap.js') }}"></script>
<script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
<script src="{{asset('js/chart.js')}}"></script>
<script src="{{asset('js/cart.js')}}"></script>
<script src="{{asset('js/countCartWishlist.js')}}"></script>
<script src="{{asset('js/search.js')}}"></script>

<x:notify-messages/>
@notifyJs

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('success'))
    <script>
        swal('{{session('success')}}', '', 'success');
    </script>
@endif
@if(session('warning'))
    <script>
        swal('{{session('warning')}}', '', 'warning');
    </script>
@endif
@if ($errors->any())
    <script>
        swal("{{$errors}}", '', 'warning');
    </script>
@endif
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/material-admin.js') }}"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/6385834fdaff0e1306d9f095/1gj0ohrv7';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->

@yield('scripts')
</body>
</html>
