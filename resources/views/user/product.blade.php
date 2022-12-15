@extends('layouts.user')

@section('head')
    <title>{{$product->name}} - 2HAND</title>
@endsection

@section('content')
    <section class="py-5 offset-1">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 col-md-6 mb-3">
                    <!-- PRODUCT SLIDER-->
                    <div class="row m-sm-0">
                        <div class="col-sm-12 order-1 order-sm-2">
                            <div class="swiper product-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide h-auto">
                                        <a class="glightbox product-view"
                                           href="{{asset('assets/uploads/product/'.$product->image)}}"
                                           data-gallery="gallery2"
                                           data-glightbox="Product item 1">
                                            <img
                                                class="img-fluid"
                                                src="{{asset('assets/uploads/product/'.$product->image)}}"
                                                alt="{{$product->image}}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT DETAILS-->
                <div class="col-lg-8 col-md-6">
                    <!-- PRODUCT DETAILS-->
                    <h1>{{$product->name}}</h1>
                    <input type="hidden" class="product_id" value="{{$product->id}}">
                    <ul class="list-inline mb-2 text-sm">
                        @for($i = 0; $i< $rating;$i++)
                            <li class="list-inline-item m-0">
                                <i class="fas fa-star text-warning"></i>
                            </li>
                        @endfor
                        @for($i = 0; $i <5-$rating; $i++)
                            <li class="list-inline-item m-0">
                                <i class="far fa-star text-warning"></i>
                            </li>
                        @endfor
                    </ul>
                    <p class="text-muted lead">{{$product->selling_price}}$</p>
                    <p class="text-sm mb-4">{{$product->description}}</p>
                    @if($product->quantity - $cartItem_quantity > 0)
                        <div class="row justify-content-start align-items-stretch mb-4">
                            <div class="col-sm-4 pr-sm-0">
                                <div
                                    class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white">
                                    <span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                                    <div class="quantity">
                                        <button class="dec-btn p-0">
                                            <i class="fas fa-caret-left"></i>
                                        </button>
                                        <input class="quantity-input form-control border-0 shadow-0 p-0 bg-transparent"
                                               type="text"
                                               value="1"
                                               max="{{$product->quantity - $cartItem_quantity}}"
                                               name="quantity" readonly>
                                        <button class="inc-btn p-0">
                                            <i class="fas fa-caret-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 pl-sm-0 mb-4">
                            <button
                                class="addToCartBtn d-inline-block btn btn-dark btn-outline-light"
                                href="cart.html"><i class="fas fa-cart-plus px-1"></i>Add to cart
                            </button>
                        </div>
                    @else
                        <div class="alert alert-danger">OUT OF STOCK</div>
                    @endif
                    <button class="updateWishlistBtn mb-3 d-inline-block btn btn-outline-dark" href="#!">
                        <span class="wishlist-text">
                            @if($checkWishlist == '1')
                                <i class="fas fa-heart me-2"></i>
                                Remove from wishlist
                            @else
                                <i class="far fa-heart me-2"></i>
                                Add to wishlist
                            @endif
                        </span>
                    </button>
                    <br>
                    <ul class="list-unstyled small d-inline-block">
                        <li class="pl-1 py-2 mb-1 bg-white text-muted">
                            <strong class="text-uppercase text-dark">Category:</strong>
                            <a class="reset-anchor ms-2"
                               href="{{url($product->findCategory->slug)}}"> {{$product->findCategory->name}} </a></li>
                    </ul>
                </div>
            </div>
            <!-- DETAILS TABS-->
            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                {{--            <li class="nav-item"><a class="nav-link text-uppercase active" id="description-tab" data-bs-toggle="tab"--}}
                {{--                                    href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>--}}
                {{--            </li>--}}
                <li class="nav-item">
                    <a class="nav-link text-uppercase" id="reviews-tab" data-bs-toggle="tab"
                       href="#reviews" role="tab" aria-controls="reviews"
                       aria-selected="false">
                        <h4>Reviews</h4>
                    </a>
                </li>
            </ul>
            <div class="tab-content mb-4" id="myTabContent">
                {{--            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">--}}
                {{--                <div class="p-4 p-lg-5 bg-white">--}}
                {{--                    <h6 class="text-uppercase">Product description </h6>--}}
                {{--                    <p class="text-muted text-sm mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do--}}
                {{--                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis--}}
                {{--                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure--}}
                {{--                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur--}}
                {{--                        sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est--}}
                {{--                        laborum.</p>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="p-4 bg-white">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="d-flex mb-3">
                                    <button
                                        class="mb-3 d-inline-block btn btn-outline-dark"
                                        data-bs-toggle="modal" data-bs-target=".rating-modal"><i
                                            class="fas fa-feather px-1"></i>Write a review
                                    </button>
                                    <div class="modal fade rating-modal" tabindex="-1"
                                         aria-labelledby="ratingModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content px-3">
                                                <form action="/add-review" method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h1 class="modal-title" id="ratingModalLabel">Review</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                        <div class="star-icon">
                                                            <input type="radio" value="1" name="rating"
                                                                   id="rating1"
                                                                   checked>
                                                            <label for="rating1" class="fa fa-star"></label>
                                                            <input type="radio" value="2" name="rating"
                                                                   id="rating2">
                                                            <label for="rating2" class="fa fa-star"></label>
                                                            <input type="radio" value="3" name="rating"
                                                                   id="rating3">
                                                            <label for="rating3" class="fa fa-star"></label>
                                                            <input type="radio" value="4" name="rating"
                                                                   id="rating4">
                                                            <label for="rating4" class="fa fa-star"></label>
                                                            <input type="radio" value="5" name="rating"
                                                                   id="rating5">
                                                            <label for="rating5" class="fa fa-star"></label>
                                                        </div>
                                                        <textarea class="form-control form-control-lg" type="text"
                                                                  id="review" name="review"
                                                                  placeholder="Write your review"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-dark">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @foreach($reviews as $review)
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0">
                                            <img class="rounded-circle"
                                                 src="{{asset('assets/uploads/avatar/'.$review->findUser->avatar)}}"
                                                 alt=""
                                                 width="50"/>
                                        </div>
                                        <div class="ms-3 flex-shrink-1">
                                            <h6 class="mb-0">{{$review->findUser->name}}</h6>
                                            <p class="small mb-0 text-muted">{{$review->created_at->format('d M y')}}</p>
                                            <ul class="list-inline mb-1 text-xs">
                                                @for($i = 0; $i< $review->rating;$i++)
                                                    <li class="list-inline-item m-0">
                                                        <i class="fas fa-star text-warning"></i>
                                                    </li>
                                                @endfor
                                                @for($i = 0; $i <5-$review->rating; $i++)
                                                    <li class="list-inline-item m-0">
                                                        <i class="far fa-star text-warning"></i>
                                                    </li>
                                                @endfor
                                                {{--                                                <li class="list-inline-item m-0"><i--}}
                                                {{--                                                        class="fas fa-star-half-alt text-warning"></i>--}}
                                                {{--                                                </li>--}}
                                            </ul>
                                            <p class="text-sm mb-0">{{ $review->review}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- RELATED PRODUCTS-->
            <h4 class="text-uppercase mx-3">Related products</h4>
            <div class="row mx-3 mt-5">
                <!-- PRODUCT-->
                @foreach($related_product as $item)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product text-center skel-loader">
                            <div class="d-block mb-3 position-relative">
                                <a class="d-block" href="{{url($item->findCategory->slug . '/' . $item->slug)}}">
                                    <img class="img-fluid w-100" src="{{asset('assets/uploads/product/'.$item->image)}}"
                                         alt="...">
                                </a>
                                {{--                                <div class="product-overlay">--}}
                                {{--                                    <ul class="mb-0 list-inline">--}}
                                {{--                                        <li class="list-inline-item m-0 p-0">--}}
                                {{--                                            <a class="btn btn-sm btn-outline-dark" href="#!"><i--}}
                                {{--                                                    class="far fa-heart"></i></a></li>--}}
                                {{--                                        <li class="list-inline-item m-0 p-0">--}}
                                {{--                                            <button class="addToCartBtn btn btn-sm btn-dark" href="#!">Add to cart--}}
                                {{--                                            </button>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark"--}}
                                {{--                                                                             href="#productView" data-bs-toggle="modal"><i--}}
                                {{--                                                    class="fas fa-expand"></i></a></li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </div>--}}
                            </div>
                            <h6><a class="reset-anchor"
                                   href="{{url($item->findCategory->slug . '/' . $item->slug)}}">{{$item->name}}</a>
                            </h6>
                            <p class="small text-muted">{{$item->selling_price}}$</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('script')

@endsection
