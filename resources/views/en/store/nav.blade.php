<div class="tf-top-bar bg_white line">
    <div class="px_15 lg-px_40">
        <div class="tf-top-bar_wrap grid-3 gap-30 align-items-center">
            <ul class="tf-top-bar_item tf-social-icon d-flex gap-10">
                <li><a href="#" class="box-icon w_28 round social-facebook bg_line"><i class="icon fs-12 icon-fb"></i></a></li>
                <li><a href="#" class="box-icon w_28 round social-twiter bg_line"><i class="icon fs-10 icon-Icon-x"></i></a></li>
                <li><a href="#" class="box-icon w_28 round social-instagram bg_line"><i class="icon fs-12 icon-instagram"></i></a></li>
                <li><a href="#" class="box-icon w_28 round social-tiktok bg_line"><i class="icon fs-12 icon-tiktok"></i></a></li>
                <li><a href="#" class="box-icon w_28 round social-pinterest bg_line"><i class="icon fs-12 icon-pinterest-1"></i></a></li>
            </ul>
            <div class="text-center overflow-hidden">
                <div class="swiper tf-sw-top_bar" data-preview="1" data-space="0" data-loop="true" data-speed="1000" data-delay="2000">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <p class="top-bar-text fw-5">Spring Fashion Sale <a href="{{route("shop")}}" title="all collection" class="tf-btn btn-line">Shop now<i class="icon icon-arrow1-top-left"></i></a></p>
                        </div>
                        <div class="swiper-slide">
                            <p class="top-bar-text fw-5">Summer sale discount off 70%</p>
                        </div>
                        <div class="swiper-slide">
                            <p class="top-bar-text fw-5">Time to refresh your wardrobe.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="top-bar-language tf-cur justify-content-end">


                <div class="tf-currencies">
                    <select class="image-select center style-default type-currencies" onchange="location.href=this.value">

                        @php
                            $currencies = [];
                            $_currencies = DB::select('SELECT value FROM site_configs WHERE key = "currencies"');
                            if(count( $_currencies ) > 0 ) $currencies = json_decode($_currencies[0]->value);
                            $selected_currency = Cookie::get('currency');
                        @endphp
                        @if ($selected_currency == null)
                            <option selected disabled> USD</option>
                        @endif

                        @foreach ( $currencies as $currency => $currencyData)
                            <option {{ $currency == $selected_currency ? "selected" : "" }} value="{{route("toggle_currency", ["currency" => $currency])}}"><span>{{ $currency }}</span></option>
                        @endforeach
                    </select>
                </div>
                <div class="tf-languages">
                    <select class="image-select center style-default type-languages">
                        <option>English</option>
                        <option>العربية</option>
                    </select>
                </div>
                
            </div>
    </div>
    
   
    </div>
</div>
<header id="header" class="header-default">
    <div class="px_15 lg-px_40">
        <div class="row wrapper-header align-items-center">
            <div class="col-md-4 col-3 tf-lg-hidden">
                <a href="#mobileMenu" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none">
                        <path d="M2.00056 2.28571H16.8577C17.1608 2.28571 17.4515 2.16531 17.6658 1.95098C17.8802 1.73665 18.0006 1.44596 18.0006 1.14286C18.0006 0.839753 17.8802 0.549063 17.6658 0.334735C17.4515 0.120408 17.1608 0 16.8577 0H2.00056C1.69745 0 1.40676 0.120408 1.19244 0.334735C0.978109 0.549063 0.857702 0.839753 0.857702 1.14286C0.857702 1.44596 0.978109 1.73665 1.19244 1.95098C1.40676 2.16531 1.69745 2.28571 2.00056 2.28571ZM0.857702 8C0.857702 7.6969 0.978109 7.40621 1.19244 7.19188C1.40676 6.97755 1.69745 6.85714 2.00056 6.85714H22.572C22.8751 6.85714 23.1658 6.97755 23.3801 7.19188C23.5944 7.40621 23.7148 7.6969 23.7148 8C23.7148 8.30311 23.5944 8.59379 23.3801 8.80812C23.1658 9.02245 22.8751 9.14286 22.572 9.14286H2.00056C1.69745 9.14286 1.40676 9.02245 1.19244 8.80812C0.978109 8.59379 0.857702 8.30311 0.857702 8ZM0.857702 14.8571C0.857702 14.554 0.978109 14.2633 1.19244 14.049C1.40676 13.8347 1.69745 13.7143 2.00056 13.7143H12.2863C12.5894 13.7143 12.8801 13.8347 13.0944 14.049C13.3087 14.2633 13.4291 14.554 13.4291 14.8571C13.4291 15.1602 13.3087 15.4509 13.0944 15.6653C12.8801 15.8796 12.5894 16 12.2863 16H2.00056C1.69745 16 1.40676 15.8796 1.19244 15.6653C0.978109 15.4509 0.857702 15.1602 0.857702 14.8571Z" fill="currentColor"></path>
                    </svg>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="{{route("shop")}}" class="logo-header">
                    <img src={{asset("assets3/images/logo/logo.svg")}} alt="logo" class="logo">
                </a>
            </div>
            <div class="col-xl-6 tf-md-hidden">
                <nav class="box-navigation text-center">
                    <ul class="box-nav-ul d-flex align-items-center justify-content-center gap-30">
                        @auth
                            @if ( Auth::user()->role == "admin" )
                                <li class="menu-item position-relative">
                                    <a href="#" class="item-link">Admin<i class="icon icon-arrow-down"></i></a>
                                    <div class="sub-menu submenu-default">
                                        <ul class="menu-list">
                                                <li><a class="menu-link-text link text_black-2" href="{{route("brand_form")}}">Brand</a></li>
                                                <li><a class="menu-link-text link text_black-2" href="{{route("color_form")}}">Color</a></li>
                                                <li><a class="menu-link-text link text_black-2" href="{{route("lens_form")}}">Lens</a></li>
                                                <li><a class="menu-link-text link text_black-2" href="{{route("size_form")}}">Size</a></li>
                                                <li><a class="menu-link-text link text_black-2" href="{{route("subcategory_form")}}">Subcategory</a></li>
                                                <li><a class="menu-link-text link text_black-2" href="{{route("category_form")}}">Category</a></li>
                                                <li><a class="menu-link-text link text_black-2" href="{{route("site_config_form")}}">Site Confirgurations</a></li>
                                                <li><a class="menu-link-text link text_black-2" href="{{route("product_form")}}">Product</a></li>
                                                <li><a class="menu-link-text link text_black-2" href="{{route("inventory")}}">Inventory</a></li>
                                                <li><a class="menu-link-text link text_black-2" href="{{route("orders")}}" >Orders</a></li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                        @endauth
                        <li class="menu-item position-relative">
                            <a href="{{route("shop")}}" class="item-link">Home</a>
                        </li>
                        <li class="menu-item">
                            <a href={{route("shop")}} class="item-link">Shop</a>
                            {{-- <div class="sub-menu mega-menu">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="mega-menu-item">
                                                <div class="menu-heading">Product layouts</div>
                                                <ul class="menu-list">
                                                    <li><a href="product-detail.html" class="menu-link-text link">Product default</a></li>
                                                    <li><a href="product-grid-1.html" class="menu-link-text link">Product grid 1</a></li>
                                                    <li><a href="product-grid-2.html" class="menu-link-text link">Product grid 2</a></li>
                                                    <li><a href="product-stacked.html" class="menu-link-text link">Product stacked</a></li>
                                                    <li><a href="product-right-thumbnails.html" class="menu-link-text link">Product right thumbnails</a></li>
                                                    <li><a href="product-bottom-thumbnails.html" class="menu-link-text link">Product bottom thumbnails</a></li>
                                                    <li><a href="product-drawer-sidebar.html" class="menu-link-text link">Product drawer sidebar</a></li>
                                                    <li><a href="product-description-accordion.html" class="menu-link-text link">Product description accordion</a></li>
                                                    <li><a href="product-description-list.html" class="menu-link-text link">Product description list</a></li>
                                                    <li><a href="product-description-vertical.html" class="menu-link-text link">Product description vertical</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mega-menu-item">
                                                <div class="menu-heading">Product details</div>
                                                <ul class="menu-list">
                                                    <li><a href="product-inner-zoom.html" class="menu-link-text link">Product inner zoom</a></li>
                                                    <li><a href="product-zoom-magnifier.html" class="menu-link-text link">Product zoom magnifier</a></li>
                                                    <li><a href="product-no-zoom.html" class="menu-link-text link">Product no zoom</a></li>
                                                    <li><a href="product-photoswipe-popup.html" class="menu-link-text link">Product photoswipe popup</a></li>
                                                    <li><a href="product-zoom-popup.html" class="menu-link-text link">Product external zoom and photoswipe popup</a></li>
                                                    <li><a href="product-video.html" class="menu-link-text link">Product video</a></li>
                                                    <li><a href="product-3d.html" class="menu-link-text link">Product 3D, AR models</a></li>
                                                    <li><a href="product-options-customizer.html" class="menu-link-text link">Product options & customizer</a></li>
                                                    <li><a href="product-advanced-types.html" class="menu-link-text link">Advanced product types</a></li>
                                                    <li><a href="product-giftcard.html" class="menu-link-text link">Recipient information form for gift card products</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mega-menu-item">
                                                <div class="menu-heading">Product swatchs</div>
                                                <ul class="menu-list">
                                                    <li><a href="product-color-swatch.html" class="menu-link-text link">Product color swatch</a></li>
                                                    <li><a href="product-rectangle.html" class="menu-link-text link">Product rectangle</a></li>
                                                    <li><a href="product-rectangle-color.html" class="menu-link-text link">Product rectangle color</a></li>
                                                    <li><a href="product-swatch-image.html" class="menu-link-text link">Product swatch image</a></li>
                                                    <li><a href="product-swatch-image-rounded.html" class="menu-link-text link">Product swatch image rounded</a></li>
                                                    <li><a href="product-swatch-dropdown.html" class="menu-link-text link">Product swatch dropdown</a></li>
                                                    <li><a href="product-swatch-dropdown-color.html" class="menu-link-text link">Product swatch dropdown color</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mega-menu-item">
                                                <div class="menu-heading">Product features</div>
                                                <ul class="menu-list">
                                                    <li><a href="product-frequently-bought-together.html" class="menu-link-text link">Frequently bought together</a></li>
                                                    <li><a href="product-frequently-bought-together-2.html" class="menu-link-text link">Frequently bought together 2</a></li>
                                                    <li><a href="product-upsell-features.html" class="menu-link-text link">Product upsell features</a></li>
                                                    <li><a href="product-pre-orders.html" class="menu-link-text link">Product pre-orders</a></li>
                                                    <li><a href="product-notification.html" class="menu-link-text link">Back in stock notification</a></li>
                                                    <li><a href="product-pickup.html" class="menu-link-text link">Product pickup</a></li>
                                                    <li><a href="product-images-grouped.html" class="menu-link-text link">Variant images grouped</a></li>
                                                    <li><a href="product-complimentary.html" class="menu-link-text link">Complimentary products</a></li>
                                                    <li><a href="product-quick-order-list.html" class="menu-link-text link position-relative">Quick order list<div class="demo-label"><span class="demo-new">New</span></div></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="menu-heading">Best seller</div>
                                            <div class="hover-sw-nav hover-sw-2">
                                                <div class="swiper tf-product-header wrap-sw-over">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide" lazy="true">
                                                            <div class="card-product">
                                                                <div class="card-product-wrapper">
                                                                    <a href="#" class="product-img">
                                                                        <img class="lazyload img-product" data-src={{asset("assets3/images/products/orange-1.jpg")}} src={{asset("assets3/images/products/orange-1.jpg")}} alt="image-product">
                                                                        <img class="lazyload img-hover" data-src={{asset("assets3/images/products/white-1.jpg")}} src={{asset("assets3/images/products/white-1.jpg")}} alt="image-product">
                                                                    </a>
                                                                    <div class="list-product-btn">
                                                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                                                            <span class="icon icon-bag"></span>
                                                                            <span class="tooltip">Quick Add</span>
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                                                            <span class="icon icon-heart"></span>
                                                                            <span class="tooltip">Add to Wishlist</span>
                                                                            <span class="icon icon-delete"></span>
                                                                        </a>
                                                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                                                            <span class="icon icon-compare"></span>
                                                                            <span class="tooltip">Add to Compare</span>
                                                                            <span class="icon icon-check"></span>
                                                                        </a>
                                                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                                                            <span class="icon icon-view"></span>
                                                                            <span class="tooltip">Quick View</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="card-product-info">
                                                                    <a href="#" class="title link">Ribbed Tank Top</a>
                                                                    <span class="price">$16.95</span>
                                                                    <ul class="list-color-product">
                                                                        <li class="list-color-item color-swatch active">
                                                                            <span class="tooltip">Orange</span>
                                                                            <span class="swatch-value bg_orange-3"></span>
                                                                            <img class="lazyload" data-src={{asset("assets3/images/products/orange-1.jpg")}} src={{asset("assets3/images/products/orange-1.jpg")}} alt="image-product">
                                                                        </li>
                                                                        <li class="list-color-item color-swatch">
                                                                            <span class="tooltip">Black</span>
                                                                            <span class="swatch-value bg_dark"></span>
                                                                            <img class="lazyload" data-src={{asset("assets3/images/products/black-1.jpg")}} src={{asset("assets3/images/products/black-1.jpg")}} alt="image-product">
                                                                        </li>
                                                                        <li class="list-color-item color-swatch">
                                                                            <span class="tooltip">White</span>
                                                                            <span class="swatch-value bg_white"></span>
                                                                            <img class="lazyload" data-src={{asset("assets3/images/products/white-1.jpg")}} src={{asset("assets3/images/products/white-1.jpg")}} alt="image-product">
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide" lazy="true">
                                                            <div class="card-product">
                                                                <div class="card-product-wrapper">
                                                                    <div class="product-img">
                                                                        <img class="lazyload img-product" data-src={{asset("assets3/images/products/white-3.jpg")}} src={{asset("assets3/images/products/white-3.jpg")}} alt="image-product">
                                                                        <img class="lazyload img-hover" data-src={{asset("assets3/images/products/white-4.jpg")}} src={{asset("assets3/images/products/white-4.jpg")}} alt="image-product">
                                                                    </div>
                                                                    <div class="list-product-btn absolute-2">
                                                                        <a href="#shoppingCart" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                                                            <span class="icon icon-bag"></span>
                                                                            <span class="tooltip">Add to cart</span>
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                                                            <span class="icon icon-heart"></span>
                                                                            <span class="tooltip">Add to Wishlist</span>
                                                                            <span class="icon icon-delete"></span>
                                                                        </a>
                                                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                                                            <span class="icon icon-compare"></span>
                                                                            <span class="tooltip">Add to Compare</span>
                                                                            <span class="icon icon-check"></span>
                                                                        </a>
                                                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                                                            <span class="icon icon-view"></span>
                                                                            <span class="tooltip">Quick View</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="card-product-info">
                                                                    <a href="#" class="title link">Oversized Printed T-shirt</a>
                                                                    <span class="price">$10.00</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide" lazy="true">
                                                            <div class="card-product">
                                                                <div class="card-product-wrapper">
                                                                    <div class="product-img">
                                                                        <img class="lazyload img-product" data-src={{asset("assets3/images/products/white-2.jpg")}} src={{asset("assets3/images/products/white-2.jpg")}} alt="image-product">
                                                                        <img class="lazyload img-hover" data-src={{asset("assets3/images/products/pink-1.jpg")}} src={{asset("assets3/images/products/pink-1.jpg")}} alt="image-product">
                                                                    </div>
                                                                    <div class="list-product-btn">
                                                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                                                            <span class="icon icon-bag"></span>
                                                                            <span class="tooltip">Quick Add</span>
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                                                            <span class="icon icon-heart"></span>
                                                                            <span class="tooltip">Add to Wishlist</span>
                                                                            <span class="icon icon-delete"></span>
                                                                        </a>
                                                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                                                            <span class="icon icon-compare"></span>
                                                                            <span class="tooltip">Add to Compare</span>
                                                                            <span class="icon icon-check"></span>
                                                                        </a>
                                                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                                                            <span class="icon icon-view"></span>
                                                                            <span class="tooltip">Quick View</span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="size-list">
                                                                        <span>S</span>
                                                                        <span>M</span>
                                                                        <span>L</span>
                                                                        <span>XL</span>
                                                                    </div>
                                                                </div>
                                                                <div class="card-product-info">
                                                                    <a href="#" class="title">Oversized Printed T-shirt</a>
                                                                    <span class="price">$16.95</span>
                                                                    <ul class="list-color-product">
                                                                        <li class="list-color-item color-swatch active">
                                                                            <span class="tooltip">White</span>
                                                                            <span class="swatch-value bg_white"></span>
                                                                            <img class="lazyload" data-src={{asset("assets3/images/products/white-2.jpg")}} src={{asset("assets3/images/products/white-2.jpg")}} alt="image-product">
                                                                        </li>
                                                                        <li class="list-color-item color-swatch">
                                                                            <span class="tooltip">Pink</span>
                                                                            <span class="swatch-value bg_purple"></span>
                                                                            <img class="lazyload" data-src={{asset("assets3/images/products/pink-1.jpg")}} src={{asset("assets3/images/products/pink-1.jpg")}} alt="image-product">
                                                                        </li>
                                                                        <li class="list-color-item color-swatch">
                                                                            <span class="tooltip">Black</span>
                                                                            <span class="swatch-value bg_dark"></span>
                                                                            <img class="lazyload" data-src={{asset("assets3/images/products/black-2.jpg")}} src={{asset("assets3/images/products/black-2.jpg")}} alt="image-product">
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide" lazy="true">
                                                            <div class="card-product">
                                                                <div class="card-product-wrapper">
                                                                    <div class="product-img">
                                                                        <img class="lazyload img-product" data-src={{asset("assets3/images/products/brown-2.jpg")}} src={{asset("assets3/images/products/brown-2.jpg")}} alt="image-product">
                                                                        <img class="lazyload img-hover" data-src={{asset("assets3/images/products/brown-3.jpg")}} src={{asset("assets3/images/products/brown-3.jpg")}} alt="image-product">
                                                                    </div>
                                                                    <div class="size-list">
                                                                        <span>S</span>
                                                                        <span>M</span>
                                                                        <span>L</span>
                                                                        <span>XL</span>
                                                                    </div>
                                                                    <div class="list-product-btn">
                                                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                                                            <span class="icon icon-bag"></span>
                                                                            <span class="tooltip">Quick Add</span>
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                                                            <span class="icon icon-heart"></span>
                                                                            <span class="tooltip">Add to Wishlist</span>
                                                                            <span class="icon icon-delete"></span>
                                                                        </a>
                                                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                                                            <span class="icon icon-compare"></span>
                                                                            <span class="tooltip">Add to Compare</span>
                                                                            <span class="icon icon-check"></span>
                                                                        </a>
                                                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                                                            <span class="icon icon-view"></span>
                                                                            <span class="tooltip">Quick View</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="card-product-info">
                                                                    <a href="#" class="title link">V-neck linen T-shirt</a>
                                                                    <span class="price">$114.95</span>
                                                                    <ul class="list-color-product">
                                                                        <li class="list-color-item color-swatch active">
                                                                            <span class="tooltip">Brown</span>
                                                                            <span class="swatch-value bg_brown"></span>
                                                                            <img class="lazyload" data-src={{asset("assets3/images/products/brown-2.jpg")}} src={{asset("assets3/images/products/brown-2.jpg")}} alt="image-product">
                                                                        </li>
                                                                        <li class="list-color-item color-swatch">
                                                                            <span class="tooltip">White</span>
                                                                            <span class="swatch-value bg_white"></span>
                                                                            <img class="lazyload" data-src={{asset("assets3/images/products/white-5.jpg")}} src={{asset("assets3/images/products/white-5.jpg")}} alt="image-product">
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nav-sw nav-next-slider nav-next-product-header box-icon w_46 round"><span class="icon icon-arrow-left"></span></div>
                                                <div class="nav-sw nav-prev-slider nav-prev-product-header box-icon w_46 round"><span class="icon icon-arrow-right"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </li>
                        <li class="menu-item position-relative">
                            <a href="{{route("contact")}}" class="item-link">About</a>
                        </li>
                        <li class="menu-item position-relative">
                            <a href="{{route("contact")}}" class="item-link">Contact</a>
                        </li>
                        <li class="menu-item position-relative">
                            <a href="#" class="item-link">Account<i class="icon icon-arrow-down"></i></a>
                            <div class="sub-menu submenu-default">
                                <ul class="menu-list">
                                    @guest
                                        <li><a href="{{route("login")}}" class="menu-link-text link text_black-2">Login</a></li>
                                        <li><a href="{{route("register_form")}}" class="menu-link-text link text_black-2">Register</a></li>
                                    @endguest
                                    @auth
                                        <li><a href="{{route("profile")}}" class="menu-link-text link text_black-2">Profile</a></li>
                                        <li><a href="{{route("logout")}}" class="menu-link-text link text_black-2">Logout</a></li>
                                    @endauth

                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-xl-3 col-md-4 col-3">
                <ul class="nav-icon d-flex justify-content-end align-items-center gap-20">
                    <li class="nav-search"><a href="#canvasSearch" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="nav-icon-item"><i class="icon icon-search"></i></a></li>
                    <li class="nav-wishlist"><a href="{{route("favs")}}" class="nav-icon-item"><i class="icon icon-heart"></i><span class="count-box" id="nav-fav">{{ Cookie::get('favs') ? count( (array)json_decode( Cookie::get('favs')) ) : 0 }}</span></a></li>
                    @auth
                        @php
                            $_orders = DB::select('select count(id) as orders from orders where user_id = ? AND status=0', [Auth::user()->id]);
                            $orders = $_orders[0]->orders;
                        @endphp
                        <li class="nav-cart"><a href="#shoppingCart" data-bs-toggle="modal" class="nav-icon-item"><i class="icon icon-bag"></i><span class="count-box">{{$orders}}</span></a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</header>