@extends('layouts.user')

@section('head')
    <title>{{$category->name}} - 2HAND</title>
@endsection

@section('content')
    <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Shop</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                <li class="breadcrumb-item"><a class="text-dark" href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <div class="container p-0">
                <div class="row">
                    <!-- SHOP SIDEBAR-->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <h5 class="text-uppercase mb-4">Filter</h5>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="checkbox_1">
                            <label class="form-check-label" for="checkbox_1">Hot deals</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="checkbox_2">
                            <label class="form-check-label" for="checkbox_2">Trending</label>
                        </div>
                        <div class="price-range pt-4 mb-5">
                            <div id="range"></div>
                            <div class="row pt-2">
                                <div class="col-6"><strong class="small fw-bold text-uppercase">From</strong>
                                </div>
                                <div class="col-6 text-end"><strong class="small fw-bold text-uppercase">To</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SHOP LISTING-->
                    <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                        <div class="row mb-3 align-items-center">
                            <div class="col-lg-6 mb-2 mb-lg-0">
                                <p class="text-sm text-muted mb-0">Showing 1–12 of {{count($product)}} results</p>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                                    <li class="list-inline-item text-muted me-3"><a class="reset-anchor p-0"
                                                                                    href="#!"><i
                                                class="fas fa-th-large"></i></a></li>
                                    <li class="list-inline-item text-muted me-3"><a class="reset-anchor p-0"
                                                                                    href="#!"><i class="fas fa-th"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <select class="selectpicker" data-customclass="form-control form-control-sm">
                                            <option value>Sort By</option>
                                            <option value="default">Default sorting</option>
                                            <option value="popularity">Popularity</option>
                                            <option value="low-high">Price: Low to High</option>
                                            <option value="high-low">Price: High to Low</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <!-- PRODUCT-->
                            @foreach($product as $item)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product text-center">
                                        <div class="mb-3 position-relative">
                                            <div class="badge text-white bg-"></div>
                                            <a class="d-block" href="{{url($item->findCategory->slug . '/' . $item->slug)}}">
                                                <img class="img-fluid w-100"
                                                     src="{{asset('assets/uploads/product/'.$item->image)}}" alt="..."></a>
{{--                                            <div class="product-overlay">--}}
{{--                                                <ul class="mb-0 list-inline">--}}
{{--                                                    <li class="list-inline-item m-0 p-0"><a--}}
{{--                                                            class="btn btn-sm btn-outline-dark" href="#!"><i--}}
{{--                                                                class="far fa-heart"></i></a></li>--}}
{{--                                                    <li class="list-inline-item m-0 p-0"><button class="addToCartBtn btn btn-sm btn-dark"--}}
{{--                                                                                            href="cart.html">Add to--}}
{{--                                                            cart</button>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="list-inline-item mr-0"><a--}}
{{--                                                            class="btn btn-sm btn-outline-dark"--}}
{{--                                                            href="#productView"--}}
{{--                                                            data-bs-toggle="modal"><i--}}
{{--                                                                class="fas fa-expand"></i></a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
                                        </div>
                                        <h6><a class="reset-anchor" href="detail.html">{{$item->name}}</a></h6>
                                        <p class="small text-muted">{{$item->selling_price}}$</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- PAGINATION-->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center justify-content-lg-end">
                                <li class="page-item mx-1"><a class="page-link" href="#!" aria-label="Previous"><span
                                            aria-hidden="true">«</span></a></li>
                                <li class="page-item mx-1 active"><a class="page-link" href="#!">1</a></li>
                                <li class="page-item mx-1"><a class="page-link" href="#!">2</a></li>
                                <li class="page-item mx-1"><a class="page-link" href="#!">3</a></li>
                                <li class="page-item ms-1"><a class="page-link" href="#!" aria-label="Next"><span
                                            aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <!-- Nouislider Config-->
    <script>
        var range = document.getElementById('range');
        noUiSlider.create(range, {
            range: {
                'min': 0,
                'max': 2000
            },
            step: 5,
            start: [100, 1000],
            margin: 300,
            connect: true,
            direction: 'ltr',
            orientation: 'horizontal',
            behaviour: 'tap-drag',
            tooltips: true,
            format: {
                to: function (value) {
                    return '$' + value;
                },
                from: function (value) {
                    return value.replace('', '');
                }
            }
        });
    </script>
@endsection
