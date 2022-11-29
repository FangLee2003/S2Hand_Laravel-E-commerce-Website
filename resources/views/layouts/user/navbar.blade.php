<!-- navbar-->
<header class="header bg-white">
    <div class="container px-lg-3">
        <nav class="navbar navbar-light py-3 px-lg-0">
            <ul class="col-3 px-0 flex justify-start">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link px-0" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-compass"></i> S2HAND
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="nav-link text-dark" href="{{url('/')}}">Home</a>
                        <a class="nav-link text-dark" href="{{url('clothes')}}">Clothes</a>
                        <a class="nav-link text-dark" href="{{url('accessory')}}">Accessory</a>
                        <a class="nav-link text-dark" href="{{url('shoes')}}">Shoes</a>
                        <a class="nav-link text-dark" href="{{url('electronics')}}">Electronics</a>
                    </div>
                </li>
            </ul>
            <ul class="col-6 px-0 flex justify-center">
                <li class="nav-item">
                    <form action="{{url('search-product')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            {{-- <div class="form-inline">--}}
                            <input type="search" id="search-input" class="form-control" name="product_name"
                                   placeholder="Search" required/>
                            <button id="search-button" type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                            {{-- </div>--}}
                        </div>
                    </form>
                </li>
            </ul>
            {{--            <div class="navbar-collapse" id="navbarSupportedContent">--}}

            {{--                    <a class="navbar-item"--}}
            {{--                   href="{{url('/')}}"><span--}}
            {{--                        class="fw-bold text-uppercase text-dark">S2HAND</span></a>--}}
            <ul class="col-3 px-0 flex justify-end">
                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link px-0" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <i class="fas fa-compass"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="nav-link text-dark" href="/account">Account</a>
                            <a class="nav-link text-dark" href="{{url('/cart')}}">
                                {{--                                    <i class="fas fa-dolly-flatbed me-1"></i>--}}
                                <span class="countCart text-primary"> 0 </span> Cart
                            </a>
                            <a class="nav-link text-dark" href="/wishlist">
                                {{--                                    <i class="fas fa-heart me-1"></i>        --}}
                                <span class="countWishlist text-primary"> 0 </span> Wishlist
                            </a>
                            <a class="nav-link text-dark" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{url("/login")}}">
                            <i class="fas fa-user me-1 text-gray fw-normal"></i>Login
                        </a>
                    </li>
                @endif
            </ul>
            {{--            </div>--}}
        </nav>
    </div>
</header>
