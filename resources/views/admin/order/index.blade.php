@extends('layouts.admin');

@section('head')
    <title>Orders - 2HAND</title>
    <link id="pagestyle" href="{{asset('css/app.css')}}" rel="stylesheet"/>
    <link id="pagestyle" href="{{asset('css/custom.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    {{--@yield('content')--}}
    <div class="card">
        <div class="card-header">
            <h4>Orders</h4>
        </div>
        <div class="card-body my-3">
            <table class="table">
                <thead>
                <tr class="border-0">
                    <th class="border-0">ID</th>
                    <th class="border-0">Time</th>
                    <th class="border-0">Tracking number</th>
                    <th class="border-0">Total price</th>
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
                        <td class="border-0">{{$order->status == 0?'pending':'completed'}}</td>
                        <td class="border-0">
                            <a class="btn btn-primary" href="{{'/order/'.$order->id}}">
                                View details
                            </a>
                            <a class="btn btn-success" href="{{'/admin/complete-order/'.$order->id}}">
                                Complete
                            </a>
                            @if($order->status == '0')
                                <a class="btn btn-dark" href="{{'/cancel-order/'.$order->id}}">
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
@endsection

@section('scripts')
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/material-admin.js') }}"></script>
@endsection
