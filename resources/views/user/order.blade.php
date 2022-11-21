<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.user.head')
    <title>Order detail - 2HAND</title>
    {{--    <link id="pagestyle" href="{{asset('css/custom.css')}}" rel="stylesheet"/>--}}
</head>

<body>
@include('layouts.user.navbar')
{{--@yield('content')--}}
<div class="container py-3">
    <div class="card border-0">
        @include('layouts.user.sidebar')

        <div class="card-body my-3">
            <section class="py-5">
                <!-- ORDER ADDRESS-->
                <h2 class="mb-4">Order details</h2>
                <form action="/cancel-order/{{$order->id}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row gy-3">
                                <div class="col-lg-12">
                                    <label class="form-label text-sm" for="name">Name </label>
                                    <input class="form-control form-control-lg bg-transparent" type="text" id="name"
                                           name="name"
                                           placeholder="Enter your name" value="{{Auth::user()->name}}" readonly>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label text-sm" for="email">Email address </label>
                                    <input class="form-control form-control-lg bg-transparent" type="email" id="email"
                                           name="email"
                                           placeholder="e.g. Jason@example.com" value="{{Auth::user()->email}}"
                                           readonly>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label text-sm" for="phone">Phone number </label>
                                    <input class="form-control form-control-lg bg-transparent" type="tel" id="phone"
                                           name="phone"
                                           placeholder="e.g. +02 245354745" value="{{Auth::user()->phone}}" readonly>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label text-sm" for="city">Town/City </label>
                                    <input class="form-control form-control-lg bg-transparent" type="text" id="city"
                                           name="city"
                                           placeholder="Town/city name" value="{{Auth::user()->city}}" readonly>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label text-sm" for="country">Country </label>
                                    <input class="form-control form-control-lg bg-transparent" type="text" id="country"
                                           name="country"
                                           placeholder="Country name" value="{{Auth::user()->country}}" readonly>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label text-sm" for="postcode">Postcode </label>
                                    <input class="form-control form-control-lg bg-transparent" type="text" id="postcode"
                                           name="postcode"
                                           placeholder="Postcode" value="{{Auth::user()->postcode}}" readonly>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label text-sm" for="address1">Address line 1 </label>
                                    <input class="form-control form-control-lg bg-transparent" type="text" id="address1"
                                           name="address1"
                                           placeholder="House number and street name"
                                           value="{{Auth::user()->address1}}" readonly>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label text-sm" for="address2">Address line
                                        2 </label>
                                    <input class="form-control form-control-lg bg-transparent" type="text" id="address2"
                                           name="address2"
                                           placeholder="Apartment, Suite, Unit, etc (optional)"
                                           value="{{Auth::user()->address2}}" readonly>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label text-sm" for="notes">Order notes
                                    </label>
                                    <textarea class="form-control form-control-lg bg-transparent" type="text" id="notes"
                                              name="notes"
                                              placeholder="Order notes" readonly></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- ORDER SUMMARY-->
                        <div class="col-lg-4 mt-lg-0 mt-5">
                            <div class="card border-0 rounded-0 p-lg-4 bg-light">
                                <div class="card-body">
                                    <h4>Your order</h4>
                                    <ul class="list-unstyled mt-4 mb-0">
                                        @foreach($orderItems as $item)
                                            <li class="d-flex align-items-center justify-content-between"><a
                                                    class="small fw-bold"
                                                    href="{{url($item->findProduct->findCategory->slug . '/'.$item->findProduct->slug)}}">{{$item->findProduct->name}}
                                                    x{{$item->product_quantity}}</a>
                                                <span
                                                    class="text-muted small">${{$item->findProduct->selling_price*$item->product_quantity}}</span>
                                            </li>
                                            <li class="border-bottom my-2"></li>
                                        @endforeach
                                        <li class="d-flex align-items-center justify-content-between mt-3"><strong
                                                class="small fw-bold">Total</strong>
                                            <span class="justify-content-end"><input
                                                    class="form-control bg-transparent border-0 p-0 text-right"
                                                    type="text"
                                                    value="{{$order->total_price}}" name="total_price"></span>
                                        </li>
                                    </ul>
                                    @if($order->status == '0')
                                        <button class="btn btn-dark form-control mt-4" type="submit">Cancel</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
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
        swal("{{$errors}}", '', 'warning');
    </script>
@endif

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/material-admin.js') }}"></script>
@yield('scripts')
</body>
</html>
