@extends("en.store.layout")
@section("content")
@php
    $currencies = null;
    if( count(DB::select('SELECT value FROM site_configs WHERE key = "currencies"')) > 0 ){
        $currencies = DB::select('SELECT value FROM site_configs WHERE key = "currencies"')[0]->value;
        $currencies = json_decode($currencies);
    }
    $currency = Cookie::get('currency');
    $selected_currency = [
        "cost" => 1,
        "currencySymbol" => "$"
    ];
    // dd($currency);
    if( $currency !== null && $currencies !== null ){
        $selected_currency = (array)$currencies->{$currency};
    }

    function isRtl($value) {
        $rtlChar = '/[\x{0590}-\x{083F}]|[\x{08A0}-\x{08FF}]|[\x{FB1D}-\x{FDFF}]|[\x{FE70}-\x{FEFF}]/u';
        return preg_match($rtlChar, $value) != 0;
    }
    // ddd(1);
@endphp

        <!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">Your wishlist</div>
            </div>
        </div>
        <!-- /page-title -->
       
        <!-- Section Product -->
        <section class="flat-spacing-2">
            <div class="container">
                <div class="grid-layout wrapper-shop" data-grid="grid-4">
                    @foreach ($products as $product)
                    @php
                        $thumb = explode(",", $product->images)[0];
                        $thumbnails_array = explode(",", $product->images);
                        $thumbnail_array = explode("/", $thumb);
                        $thumbnail = $thumbnail_array[ sizeof($thumbnail_array) -1 ];
                        $thumbnail_src = asset("storage/images/$thumbnail");
                        $hover_img = "";
                        if(sizeof($thumbnails_array) > 1){
                            $_thumbnail_array = explode("/", $thumbnails_array[1]);
                            $hover_img = $_thumbnail_array[ sizeof($_thumbnail_array) -1 ];
                            $hover_img = asset("storage/images/$hover_img");
                        }
                    @endphp
                        <!-- card product 2 -->
                        <div class="card-product">
                            <div class="card-product-wrapper">
                                <a href="{{route("product", ["product_id"=>$product->id ])}}" class="product-img">
                                    <img class="lazyload img-product" data-src="{{$thumbnail_src}}" src="{{$thumbnail_src}}" alt="image-product">
                                    @if ($hover_img != "")
                                        <img class="lazyload img-hover" data-src="{{$hover_img}}" src="{{$hover_img}}" alt="image-product">
                                    @endif
                                </a>
                                <div class="list-product-btn type-wishlist">
                                    <a href="javascript:void(0);" class="box-icon bg_white wishlist" unfav-url="{{route("unfav", ["product"=> $product->id])}}" onclick="un_fav(this)">
                                        <span class="tooltip">Remove Wishlist</span>
                                        <span class="icon icon-delete"></span>
                                    </a>
                                </div>
                                <div class="list-product-btn">
                                    <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                        <span class="icon icon-bag"></span>
                                        <span class="tooltip">Quick Add</span>
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
                                    @php
                                        $_sizes = explode(",", $product->sizes); 
                                    @endphp
                                    <?php foreach( $_sizes as $_size){?>
                                        <span>{{$_size}}</span>
                                    <?php } ?>
                                </div>
                                @if ( $product->sale > 0  )
                                <div class="countdown-box">
                                    <div class="js-countdown" data-timer="1007500" data-labels="d :,h :,m :,s"></div>
                                </div>
                                            
                                <div class="on-sale-wrap text-end">
                                    <div class="on-sale-item">-{{ number_format((float)($product->sale * 100), 0, '.', '')}}%</div>
                                </div>
                            @endif
                            </div>
                            <div class="card-product-info">
                                <a href="{{route("product", ["product_id" => $product->id])}}" class="title link">{{$product->name}}</a>
                                @if (isRtl($selected_currency["currencySymbol"]))
                                    <span class="price" dir="rtl" style="text-align: left;">
                                        {{  number_format((($product->price - ( $product->sale * $product->price )) / $selected_currency["cost"]), 2, ".", "")." ". $selected_currency["currencySymbol"]}}
                                    </span>
                                @else
                                    <span class="price" >
                                        {{ $selected_currency["currencySymbol"] . number_format((($product->price - ( $product->sale * $product->price )) / $selected_currency["cost"]), 2, ".", "")}}
                                    </span>
                                @endif
                                @php
                                            $_colors = explode( ",", $product->colors);
                                        @endphp
                                        <ul class="list-color-product">
                                            @foreach ($_colors as $_color)
                                                <li class="list-color-item color-swatch active">
                                                    <span class="tooltip">{{$_color}}</span>
                                                    <span class="swatch-value" style="background: {{$_color}}"></span>
                                                    {{-- <img class="lazyload" data-src="images/products/brown.jpg" src="images/products/brown.jpg" alt="image-product"> --}}
                                                </li>
                                            @endforeach

                                        </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- /Section Product -->

    
        <script>
            function un_fav(element){
                let fav_element_nav = document.querySelectorAll("#nav-fav");
                fav_element_nav.forEach(element => {
                    element.innerHTML = Number(element.innerHTML) - 1;
                });
                fetch(element.getAttribute('unfav-url'));
                element.parentElement.parentElement.parentElement.remove()
            }
        </script>

@endsection