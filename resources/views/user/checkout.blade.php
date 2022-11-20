@extends('layouts.user')

@section('head')
    <title>Checkout - 2HAND</title>
@endsection

@section('content')
    <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 mb-0">Checkout</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                <li class="breadcrumb-item"><a class="text-dark" href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item"><a class="text-dark" href="{{url('/cart')}}">Cart</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <!-- BILLING ADDRESS-->
            <h2 class="h5 mb-4">Billing details</h2>
            <form action="/checkout" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row gy-3">
                            <div class="col-lg-12">
                                <label class="form-label text-sm" for="name">Name </label>
                                <input class="form-control form-control-lg" type="text" id="name" name="name"
                                       placeholder="Enter your name" value="{{Auth::user()->name}}">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label text-sm" for="email">Email address </label>
                                <input class="form-control form-control-lg" type="email" id="email" name="email"
                                       placeholder="e.g. Jason@example.com" value="{{Auth::user()->email}}">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label text-sm" for="phone">Phone number </label>
                                <input class="form-control form-control-lg" type="tel" id="phone" name="phone"
                                       placeholder="e.g. +02 245354745" value="{{Auth::user()->phone}}">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label text-sm" for="city">Town/City </label>
                                <input class="form-control form-control-lg" type="text" id="city" name="city"
                                       placeholder="Town/city name" value="{{Auth::user()->city}}">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label class="form-label text-sm" for="country">Country</label>
                                <select class="country" id="country" name="country"
                                        data-customclass="form-control form-control-lg rounded-0">
                                    <option value>Choose your country</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label text-sm" for="postcode">Postcode </label>
                                <input class="form-control form-control-lg" type="text" id="postcode" name="postcode"
                                       placeholder="Postcode" value="{{Auth::user()->postcode}}">
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label text-sm" for="address1">Address line 1 </label>
                                <input class="form-control form-control-lg" type="text" id="address1" name="address1"
                                       placeholder="House number and street name" value="{{Auth::user()->address1}}">
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label text-sm" for="address2">Address line
                                    2 </label>
                                <input class="form-control form-control-lg" type="text" id="address2" name="address2"
                                       placeholder="Apartment, Suite, Unit, etc (optional)"
                                       value="{{Auth::user()->address2}}">
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label text-sm" for="notes">Order notes
                                </label>
                                <textarea class="form-control form-control-lg" type="text" id="notes" name="notes"
                                          placeholder="Order notes"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- ORDER SUMMARY-->
                    <div class="col-lg-4 mt-lg-0 mt-5">
                        <div class="card border-0 rounded-0 p-lg-4 bg-light">
                            <div class="card-body">
                                <h4>Your order</h4>
                                <ul class="list-unstyled my-4">
                                    @foreach($cartItems as $item)
                                        <li class="d-flex align-items-center justify-content-between"><strong
                                                class="small fw-bold">{{$item->findProduct->name}}
                                                x{{$item->product_quantity}}</strong><span
                                                class="text-muted small">${{$item->findProduct->selling_price*$item->product_quantity}}</span>
                                        </li>
                                        <li class="border-bottom my-2"></li>
                                    @endforeach
                                    <li class="d-flex align-items-center justify-content-between mt-3"><strong
                                            class= "small fw-bold">Total</strong>
                                        <span class="justify-content-end"><input class="form-control bg-transparent border-0 p-0 text-right" type="text"
                                                     value="{{$sum}}" name="total_price" readonly></span>
                                    </li>

                                </ul>
                                <button class="btn btn-dark form-control" type="submit">Place order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
