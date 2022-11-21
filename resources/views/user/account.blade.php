<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.user.head')
    <title>Account - 2HAND</title>
    {{--    <link id="pagestyle" href="{{asset('css/custom.css')}}" rel="stylesheet"/>--}}
</head>

<body>
@include('layouts.user.navbar')
{{--@yield('content')--}}
<div class="container py-5">
    <div class="card border-0">
        @include('layouts.user.sidebar')

        <div class="card-body my-3">
            <form action="account" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="d-flex justify-content-center mb-4">
                            <img src="{{asset('assets/uploads/avatar/'.Auth::user()->avatar)}}"
                                 class="rounded-circle" alt="example placeholder" style="width: 200px;"/>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-dark btn-rounded">
                                <label class="form-label text-white m-1" for="avatar">Change avatar</label>
                                <input type="file" class="form-control d-none" id="avatar"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label text-sm" for="name">Name </label>
                        <input class="form-control form-control-lg" type="text" id="name" name="name"
                               placeholder="Enter your name" value="{{Auth::user()->name}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-sm" for="email">Email address </label>
                        <input class="form-control form-control-lg" type="email" id="email" name="email"
                               placeholder="e.g. Jason@example.com" value="{{Auth::user()->email}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-sm" for="phone">Phone number </label>
                        <input class="form-control form-control-lg" type="tel" id="phone" name="phone"
                               placeholder="e.g. +02 245354745" value="{{Auth::user()->phone}}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label text-sm" for="city">Town/City </label>
                        <input class="form-control form-control-lg" type="text" id="city" name="city"
                               placeholder="Town/city name" value="{{Auth::user()->city}}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label text-sm" for="country">Country</label>
                        <input class="form-control form-control-lg" type="text" id="country" name="country"
                               placeholder="Country name" value="{{Auth::user()->country}}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label text-sm" for="postcode">Postcode </label>
                        <input class="form-control form-control-lg" type="text" id="postcode"
                               name="postcode"
                               placeholder="Postcode" value="{{Auth::user()->postcode}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label text-sm" for="address1">Address line
                            1 </label>
                        <input class="form-control form-control-lg" type="text" id="address1"
                               name="address1"
                               placeholder="House number and street name"
                               value="{{Auth::user()->address1}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label text-sm" for="address2">Address line
                            2 </label>
                        <input class="form-control form-control-lg" type="text" id="address2"
                               name="address2"
                               placeholder="Apartment, Suite, Unit, etc (optional)"
                               value="{{Auth::user()->address2}}">
                    </div>
                    <div class="col-md-12 mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('layouts.user.footer')

<!--   Core JS Files   -->
<script src="{{ asset('js/core/popper.min.js') }}"></script>
<script src="{{ asset('js/core/jquery.js') }}"></script>
<script src="{{ asset('js/core/bootstrap.js') }}"></script>
<script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
<script src="{{asset('js/chart.js')}}"></script>

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
        swal('{{$errors}}', '', 'warning');
    </script>
@endif

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/material-admin.js') }}"></script>
@yield('scripts')
</body>
</html>
