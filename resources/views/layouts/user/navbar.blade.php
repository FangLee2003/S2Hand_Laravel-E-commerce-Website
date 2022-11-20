<!-- navbar-->
<header class="header bg-white">
    <div class="container px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand"
                                                                          href="{{url('/')}}"><span
                    class="fw-bold text-uppercase text-dark">2HAND</span></a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <!-- Link--><a class="nav-link {{Request::is('/')?'active':''}}" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <!-- Link--><a class="nav-link {{Request::is('clothes')?'active':''}}"
                                       href="{{url('clothes')}}">Clothes</a>
                    </li>
                    <li class="nav-item">
                        <!-- Link--><a class="nav-link {{Request::is('accessory')?'active':''}}"
                                       href="{{url('accessory')}}">Accessory</a>
                    </li>
                    <li class="nav-item">
                        <!-- Link--><a class="nav-link {{Request::is('shoes')?'active':''}}" href="{{url('shoes')}}">Shoes</a>
                    </li>
                    <li class="nav-item">
                        <!-- Link--><a class="nav-link {{Request::is('electronics')?'active':''}}"
                                       href="{{url('electronics')}}">Electronics</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{url('/cart')}}"> <i
                                class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!"> <i class="far fa-heart me-1"></i><small
                                class="text-gray fw-normal"> (0)</small></a></li>
                    @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
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
            </div>
        </nav>
    </div>
</header>
