<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.user.head')
    <title>Orders - 2HAND</title>
    {{--    <link id="pagestyle" href="{{asset('css/custom.css')}}" rel="stylesheet"/>--}}
</head>

<body>
@include('layouts.user.navbar')
{{--@yield('content')--}}
<div class="container py-3">
    <div class="card border-0">
        @include('layouts.user.sidebar')

        <div class="card-body my-3">
            <table class="table">
                <thead>
                <tr class="border-0">
                    <th class="border-0">ID</th>
                    <th class="border-0">Time</th>
                    <th class="border-0">Tracking number</th>
                    <th class="border-0">Total price</th>
                    <th class="border-0">Payment method</th>
                    <th class="border-0">Status</th>
                    <th class="border-0">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr class="border-0">
                        <td class="border-0">{{$order->id}}</td>
                        <td class="border-0">{{$order->created_at}}</td>
                        <td class="border-0">{{$order->tracking_number}}</td>
                        <td class="border-0">{{$order->total_price}}</td>
                        <td class="border-0">{{$order->payment_method}}</td>
                        <td class="border-0">{{$order->status == 0?'pending':'completed'}}</td>
                        <td class="border-0">
                            <a class="btn btn-primary btn-round" href="{{'/order/'.$order->id}}">
                                View details
                            </a>
                            @if($order->status == '0')
                                <a class="btn btn-dark btn-round" href="{{'/cancel-order/'.$order->id}}">
                                    Cancel
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
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
