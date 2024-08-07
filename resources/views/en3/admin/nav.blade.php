    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
       
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="{{route("shop")}}"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li {{ Route::currentRouteName() == "home" ? "active" : ""  }} ><a href="./index.html">Home</a></li>
                            
                            @auth
                                @if ( Str::contains(Auth::user()->role, 'admin') )
                                <li><a href="#">Admin</a>
                                    <ul class="dropdown">
                                        <li><a href="{{route("brand_form")}}">Brand</a></li>
                                        <li><a href="{{route("color_form")}}">Color</a></li>
                                        <li><a href="{{route("lens_form")}}">Lens</a></li>
                                        <li><a href="{{route("size_form")}}">Size</a></li>
                                        <li><a href="{{route("subcategory_form")}}">Subcategory</a></li>
                                        <li><a href="{{route("category_form")}}">Category</a></li>
                                        <li><a href="{{route("site_config_form")}}">Site Confirgurations</a></li>
                                        <li><a href="{{route("product_form")}}">Product</a></li>
                                    </ul>
                                </li>
                                @endif
                            @endauth
                            <li class="{{ Route::currentRouteName() == "shop" ? "active" : ""  }}"><a href="{{route("shop")}}">Shop</a></li>
                            <li {{ Route::currentRouteName() == "contact" ? "active" : ""  }}><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                             @guest
                                 <a href="{{route("login")}}">Login</a>
                                <a href="{{route("register_form")}}">Register</a>
                            @endguest
                            @auth
                                <a href="{{route("profile")}}">Profile</a>
                                <a href="{{route("logout")}}">Logout</a>
                            @endauth
                        </div>
                        @auth
                        @php
                            $_orders = DB::select('select count(id) as orders from orders where user_id = ? AND status=0', [Auth::user()->id]);
                            $orders = $_orders[0]->orders;
                        @endphp
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            {{-- <li>
                                <a href="#"><span class="icon_heart_alt"></span>
                                <div class="tip">2</div>
                                </a>
                            </li> --}}
                            <li><a href="{{route("cart_items")}}"><span class="icon_bag_alt"></span>
                                <div class="tip">{{$orders}}</div>
                            </a></li>
                        </ul>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->