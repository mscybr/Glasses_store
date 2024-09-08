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
                <div class="row">
                    <div class="col-12">
                        <div class="heading text-center">New Arrival</div>
                        <p class="text-center text-2 text_black-2 mt_5">Shop through our latest selection of Fashion</p> 
                    </div>
                </div>
            </div>
        </div>
        <!-- /page-title -->

        <section class="flat-spacing-1">
            <div class="container">
                <div class="tf-shop-control grid-3 align-items-center">
                    <div></div>
                    <!-- <div class="tf-control-filter">
                        <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="tf-btn-filter"><span class="icon icon-filter"></span><span class="text">Filter</span></a>
                    </div> -->
                    <ul class="tf-control-layout d-flex justify-content-center">
                        <li class="tf-view-layout-switch sw-layout-2" data-value-grid="grid-2">
                            <div class="item"><span class="icon icon-grid-2"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-3" data-value-grid="grid-3">
                            <div class="item"><span class="icon icon-grid-3"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-4 active" data-value-grid="grid-4">
                            <div class="item"><span class="icon icon-grid-4"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-5" data-value-grid="grid-5">
                            <div class="item"><span class="icon icon-grid-5"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-6" data-value-grid="grid-6">
                            <div class="item"><span class="icon icon-grid-6"></span></div>
                        </li>
                    </ul>
                    <div class="tf-control-sorting d-flex justify-content-end">
                        <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                            <div class="btn-select">
                                <span class="text-sort-value">Featured</span>
                                <span class="icon icon-arrow-down"></span>
                            </div>
                            <div class="dropdown-menu">
                                <div class="select-item active">
                                    <span class="text-value-item">Featured</span>
                                </div>
                                <div class="select-item">
                                    <span class="text-value-item">Best selling</span>
                                </div>
                                <div class="select-item">
                                    <span class="text-value-item">Alphabetically, A-Z</span>
                                </div>
                                <div class="select-item">
                                    <span class="text-value-item">Alphabetically, Z-A</span>
                                </div>
                                <div class="select-item">
                                    <span class="text-value-item">Price, low to high</span>
                                </div>
                                <div class="select-item">
                                    <span class="text-value-item">Price, high to low</span>
                                </div>
                                <div class="select-item">
                                    <span class="text-value-item">Date, old to new</span>
                                </div>
                                <div class="select-item">
                                    <span class="text-value-item">Date, new to old</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-sidebar-main p-0">
                    <div class="tf-section-sidebar wrap-sidebar-mobile flex-shrink-0">
                        <div class="widget-facet wd-categories">
                            <div class="facet-title" data-bs-target="#categories" data-bs-toggle="collapse" aria-expanded="true" aria-controls="categories">
                                <span>Categories</span>
                                <span class="icon icon-arrow-up"></span>
                            </div>
                            @php
							$request_array = request()->all();
							if( isset( $request_array["Subcategory"] ) ) unset($request_array["Subcategory"]);
							if( isset( $request_array["Category"] ) ) unset($request_array["Category"]);
							@endphp
                            <div id="categories" class="collapse show">
                                <ul class="list-categoris current-scrollbar mb_36">
                                    {{-- <li class="cate-item current"><a href="#"><span>Fashion</span></a></li> --}}
                                    <li class="cate-item"><a href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Category' => null], request()->all()) }}"><span>All</span></a></li>
                                    @foreach ($categories as $category)
                                        <li class="cate-item"><a href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Category' => $category->id], $request_array) }}"><span>{{ $category->categoryName }}</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="widget-facet wd-categories">
                            <div class="facet-title" data-bs-target="#subcategories" data-bs-toggle="collapse" aria-expanded="true" aria-controls="subcategories">
                                <span>Subcategories</span>
                                <span class="icon icon-arrow-up"></span>
                            </div>
                            @php
							$request_array = request()->all();
							if( isset( $request_array["Subcategory"] ) ) unset($request_array["Subcategory"]);
							if( isset( $request_array["Category"] ) ) unset($request_array["Category"]);
							@endphp
                            <div id="subcategories" class="collapse show">
                                <ul class="list-categoris current-scrollbar mb_36">
                                    {{-- <li class="cate-item current"><a href="#"><span>Fashion</span></a></li> --}}
                                    <li class="cate-item"><a href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Subcategory' => null], request()->all()) }}"><span>All</span></a></li>
                                    @foreach ($categories as $category)
                                        @if (isset($category->subcategory))
                                            @foreach ($category->subcategory as $subcategory)
                                                <li class="cate-item"><a href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Subcategory' => $subcategory->id], $request_array) }}"><span>{{$subcategory->subcategoryName}}</span></a></li>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div action="#" id="facet-filter-form" class="facet-filter-form">
                            {{-- <div class="widget-facet">
                                <div class="facet-title" data-bs-target="#availability" data-bs-toggle="collapse" aria-expanded="true" aria-controls="availability">
                                    <span>Availability</span>
                                    <span class="icon icon-arrow-up"></span>
                                </div>
                                <div id="availability" class="collapse show">
                                    <ul class="tf-filter-group current-scrollbar mb_36">
                                        <li class="list-item d-flex gap-12 align-items-center">
                                            <input type="checkbox" name="availability" class="tf-check" id="availability-1">
                                            <label for="availability-1" class="label"><span>In stock</span>&nbsp;<span>(14)</span></label>
                                        </li>
                                        <li class="list-item d-flex gap-12 align-items-center">
                                            <input type="checkbox" name="availability" class="tf-check" id="availability-2">
                                            <label for="availability-2" class="label"><span>Out of stock</span>&nbsp;<span>(2)</span></label>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                            <div class="widget-facet">
                                <div class="facet-title" data-bs-target="#brand" data-bs-toggle="collapse" aria-expanded="true" aria-controls="brand">
                                    <span>Brand</span>
                                    <span class="icon icon-arrow-up"></span>
                                </div>
                                <div id="brand" class="collapse show">
                                    <ul class="tf-filter-group current-scrollbar mb_36">
                                        @foreach ($brands as $brand)
                                            <li class="list-item d-flex gap-12 align-items-center">
                                                <input onchange="location.href=this.getAttribute('href')" href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Brand' => $brand->id]) }}" type="checkbox" {{ isset(request()->all()["Brand"]) && request()->all()["Brand"] == $brand->id ? ' checked' : '' }} name="brand" class="tf-check" id="brand-1">
                                                {{-- <label for="brand-1" class="label"><span>{{ $brand->brandName }}</span>&nbsp;<span>(8)</span></label> --}}
                                                <label for="brand-1" class="label"><span>{{ $brand->brandName }}</label>
                                            </li>
                                        @endforeach
                                       
                                    </ul>
                                </div>
                            </div>
                           
                            <form class="widget-facet mb-2" action="{{ request()->route()->uri()}}">
                            	@foreach (request()->all() as $key=> $item)
											@if ( $key != "Color" )
												@if ( is_array($item) )
													@foreach ($item as $query_param_key => $query_param)
														<input type="hidden" name="{{"$key"."[".$query_param_key."]"}}" value="{{$query_param}}">
													@endforeach
												@else
													<input type="hidden" name="{{"$key"}}" value="{{$item}}">
												@endif
											@endif
										@endforeach
                                <div class="widget-facet mb-2" >
                                    <div class="facet-title" data-bs-target="#color" data-bs-toggle="collapse" aria-expanded="true" aria-controls="color">
                                        <span>Color</span>
                                        <span class="icon icon-arrow-up"></span>
                                    </div>
                                    <div id="color" class="collapse show">
                                        <ul class="tf-filter-group filter-color current-scrollbar mb_36">
                                            @foreach ($colors as $color)
											<li class="list-item d-flex gap-12 align-items-center">
                                                <input {{ isset(request()->all()["Color"]) && (is_array(request()->all()["Color"]) and in_array($color->colorName, request()->all()["Color"])) ? ' checked' : '' }} type="checkbox" name="Color[{{$color->id}}]" value="{{$color->colorName}}" class="tf-check-color" style="background: {{$color->colorName}}">
                                                <label for="beige" class="label"><span>{{$color->colorName}}</span></label>
                                            </li>
										@endforeach
                                        </ul>
                                        <div class="button-submit">
                                            <button class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn mt-3" type="submit">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form class="widget-facet mb-2" action="{{ request()->route()->uri()}}">
                                @foreach (request()->all() as $key=> $item)
											@if ( $key != "Size" )
												@if ( is_array($item) )
													@foreach ($item as $query_param_key => $query_param)
														<input type="hidden" name="{{"$key"."[".$query_param_key."]"}}" value="{{$query_param}}">
													@endforeach
												@else
													<input type="hidden" name="{{"$key"}}" value="{{$item}}">
												@endif
											@endif
										@endforeach
                                <div class="widget-facet">
                                    <div class="facet-title" data-bs-target="#size" data-bs-toggle="collapse" aria-expanded="true" aria-controls="size">
                                        <span>Size</span>
                                        <span class="icon icon-arrow-up"></span>
                                    </div>
                                    <div id="size" class="collapse show">
                                        <ul class="tf-filter-group current-scrollbar">
                                            @foreach ($sizes as $size)
                                                <li class="list-item d-flex gap-12 align-items-center">
                                                    <input type="checkbox" name="Size[{{$size->id}}]" class="tf-check" id="s" value="{{$size->sizeName}}" {{ isset(request()->all()["Size"]) && (is_array(request()->all()["Size"]) and in_array($size->sizeName, request()->all()["Size"])) ? ' checked' : '' }}>
                                                    <label for="s" class="label"><span>{{$size->sizeName}}</span></label>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="button-submit">
                                            <button class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn mt-3" type="submit">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                          
                            <form class="widget-facet mb-2" action="{{ request()->route()->uri()}}">
                                @foreach (request()->all() as $key=> $item)
                                    @if ( $key != "MaxPrice" && $key != "MinPrice" )
                                        @if ( is_array($item) )
                                            @foreach ($item as $query_param_key => $query_param)
                                                <input type="hidden" name="{{"$key"."[".$query_param_key."]"}}" value="{{$query_param}}">
                                            @endforeach
                                        @else
                                            <input type="hidden" name="{{"$key"}}" value="{{$item}}">
                                        @endif
                                    @endif
                                @endforeach
                                <div class="widget-facet">
                                    <div class="facet-title" data-bs-target="#price" data-bs-toggle="collapse" aria-expanded="true" aria-controls="price">
                                        <span>Price</span>
                                        <span class="icon icon-arrow-up"></span>
                                    </div>
                                    <div id="price" class="collapse show">
                                            <div class="tf-field style-1 mb_15" >
                                                <input class="tf-field-input tf-input" type="number" id="property4"  name="MinPrice" value="{{ isset(request()->all()["MinPrice"]) && (is_array(request()->all()["MinPrice"])) ? request()->all()["MinPrice"] : '' }}" placeholder="Min Price" >
                                                <label class="tf-field-label fw-4 text_black-2" for="property4">Min Price</label>
                                            </div>
                                            <div class="tf-field style-1 mb_15" >
                                                <input class="tf-field-input tf-input" type="number" id="property4"  name="MaxPrice" value="{{ isset(request()->all()["MaxPrice"]) && (is_array(request()->all()["MaxPrice"])) ? request()->all()["MaxPrice"] : '' }}" placeholder="Max Price" >
                                                <label class="tf-field-label fw-4 text_black-2" for="property4">Max Price</label>
                                            </div>
                                        <div class="button-submit">
                                            <button class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn mt-3" type="submit">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>   
                    </div>
                    <div>
                        <div class="grid-layout wrapper-shop" data-grid="grid-4">

                            @php
								$favs = (array)json_decode(Cookie::get('favs'));
							@endphp
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
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{$thumbnail_src}}" src="{{$thumbnail_src}}" alt="image-product">
                                            @if ($hover_img != "")
                                                <img class="lazyload img-hover" data-src="{{$hover_img}}" src="{{$hover_img}}" alt="image-product">
                                            @endif
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a class="box-icon bg_white wishlist btn-icon-action {{ isset($favs[$product->id]) ? "active" : "" }}"  {{ isset($favs[$product->id]) ? "faved" : "" }} fav-url="{{route("fav", ["product"=> $product->id])}}"  unfav-url="{{route("unfav", ["product"=> $product->id])}}" onclick="toggle_fav(this)">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add/Remove Wishlist</span>
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
                                            @php
                                                $_sizes = explode(",", $product->sizes); 
                                            @endphp
                                            <?php foreach( $_sizes as $_size){?>
                                                <span>{{$_size}}</span>
                                            <?php } ?>
                                        </div>
                                        {{-- <div class="countdown-box">
                                            <div class="js-countdown" data-timer="1007500" data-labels="d :,h :,m :,s"></div>
                                        </div> --}}
                                        @if ( $product->sale > 0  )
                                            
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
                        <div class="tf-pagination-wrap">
                            <ul class="wg-pagination justify-content-center">
                                <li class="active">
                                    <div class="pagination-item">1</div>
                                </li>
                                <li>
                                    <a href="#" class="pagination-item animate-hover-btn">2</a>
                                </li>
                                <li>
                                    <a href="#" class="pagination-item animate-hover-btn">3</a>
                                </li>
                                <li>
                                    <a href="#" class="pagination-item animate-hover-btn"><i class="icon-arrow-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="btn-sidebar-mobile start-0">
            <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                <button class="type-hover">
                    <i class="icon-open"></i>
                    <span class="fw-5">Open sidebar</span>
                </button>
            </a>
        </div>
        <div class="offcanvas offcanvas-start canvas-filter" id="filterShop">
            <div class="canvas-wrapper">
                <header class="canvas-header">
                    <div class="filter-icon">
                        <span class="icon icon-filter"></span>
                        <span>Filter</span>
                    </div>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
                </header>
                <div class="canvas-body">
                    <div class="widget-facet wd-categories">
                        <div class="facet-title" data-bs-target="#categories" data-bs-toggle="collapse" aria-expanded="true" aria-controls="categories">
                            <span>Categories</span>
                            <span class="icon icon-arrow-up"></span>
                        </div>
                        @php
                        $request_array = request()->all();
                        if( isset( $request_array["Subcategory"] ) ) unset($request_array["Subcategory"]);
                        if( isset( $request_array["Category"] ) ) unset($request_array["Category"]);
                        @endphp
                        <div id="categories" class="collapse show">
                            <ul class="list-categoris current-scrollbar mb_36">
                                {{-- <li class="cate-item current"><a href="#"><span>Fashion</span></a></li> --}}
                                <li class="cate-item"><a href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Category' => null], request()->all()) }}"><span>All</span></a></li>
                                @foreach ($categories as $category)
                                    <li class="cate-item"><a href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Category' => $category->id], $request_array) }}"><span>{{ $category->categoryName }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget-facet wd-categories">
                        <div class="facet-title" data-bs-target="#subcategories" data-bs-toggle="collapse" aria-expanded="true" aria-controls="subcategories">
                            <span>Subcategories</span>
                            <span class="icon icon-arrow-up"></span>
                        </div>
                        @php
                        $request_array = request()->all();
                        if( isset( $request_array["Subcategory"] ) ) unset($request_array["Subcategory"]);
                        if( isset( $request_array["Category"] ) ) unset($request_array["Category"]);
                        @endphp
                        <div id="subcategories" class="collapse show">
                            <ul class="list-categoris current-scrollbar mb_36">
                                {{-- <li class="cate-item current"><a href="#"><span>Fashion</span></a></li> --}}
                                <li class="cate-item"><a href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Subcategory' => null], request()->all()) }}"><span>All</span></a></li>
                                @foreach ($categories as $category)
                                    @if (isset($category->subcategory))
                                        @foreach ($category->subcategory as $subcategory)
                                            <li class="cate-item"><a href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Subcategory' => $subcategory->id], $request_array) }}"><span>{{$subcategory->subcategoryName}}</span></a></li>
                                        @endforeach
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div action="#" id="facet-filter-form" class="facet-filter-form">
                        {{-- <div class="widget-facet">
                            <div class="facet-title" data-bs-target="#availability" data-bs-toggle="collapse" aria-expanded="true" aria-controls="availability">
                                <span>Availability</span>
                                <span class="icon icon-arrow-up"></span>
                            </div>
                            <div id="availability" class="collapse show">
                                <ul class="tf-filter-group current-scrollbar mb_36">
                                    <li class="list-item d-flex gap-12 align-items-center">
                                        <input type="checkbox" name="availability" class="tf-check" id="availability-1">
                                        <label for="availability-1" class="label"><span>In stock</span>&nbsp;<span>(14)</span></label>
                                    </li>
                                    <li class="list-item d-flex gap-12 align-items-center">
                                        <input type="checkbox" name="availability" class="tf-check" id="availability-2">
                                        <label for="availability-2" class="label"><span>Out of stock</span>&nbsp;<span>(2)</span></label>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                        <div class="widget-facet">
                            <div class="facet-title" data-bs-target="#brand" data-bs-toggle="collapse" aria-expanded="true" aria-controls="brand">
                                <span>Brand</span>
                                <span class="icon icon-arrow-up"></span>
                            </div>
                            <div id="brand" class="collapse show">
                                <ul class="tf-filter-group current-scrollbar mb_36">
                                    @foreach ($brands as $brand)
                                        <li class="list-item d-flex gap-12 align-items-center">
                                            <input onchange="location.href=this.getAttribute('href')" href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Brand' => $brand->id]) }}" type="checkbox" {{ isset(request()->all()["Brand"]) && request()->all()["Brand"] == $brand->id ? ' checked' : '' }} name="brand" class="tf-check" id="brand-1">
                                            {{-- <label for="brand-1" class="label"><span>{{ $brand->brandName }}</span>&nbsp;<span>(8)</span></label> --}}
                                            <label for="brand-1" class="label"><span>{{ $brand->brandName }}</label>
                                        </li>
                                    @endforeach
                                   
                                </ul>
                            </div>
                        </div>
                       
                        <form class="widget-facet mb-2" action="{{ request()->route()->uri()}}">
                            @foreach (request()->all() as $key=> $item)
                                        @if ( $key != "Color" )
                                            @if ( is_array($item) )
                                                @foreach ($item as $query_param_key => $query_param)
                                                    <input type="hidden" name="{{"$key"."[".$query_param_key."]"}}" value="{{$query_param}}">
                                                @endforeach
                                            @else
                                                <input type="hidden" name="{{"$key"}}" value="{{$item}}">
                                            @endif
                                        @endif
                                    @endforeach
                            <div class="widget-facet mb-2" >
                                <div class="facet-title" data-bs-target="#color" data-bs-toggle="collapse" aria-expanded="true" aria-controls="color">
                                    <span>Color</span>
                                    <span class="icon icon-arrow-up"></span>
                                </div>
                                <div id="color" class="collapse show">
                                    <ul class="tf-filter-group filter-color current-scrollbar mb_36">
                                        @foreach ($colors as $color)
                                        <li class="list-item d-flex gap-12 align-items-center">
                                            <input {{ isset(request()->all()["Color"]) && (is_array(request()->all()["Color"]) and in_array($color->colorName, request()->all()["Color"])) ? ' checked' : '' }} type="checkbox" name="Color[{{$color->id}}]" value="{{$color->colorName}}" class="tf-check-color" style="background: {{$color->colorName}}">
                                            <label for="beige" class="label"><span>{{$color->colorName}}</span></label>
                                        </li>
                                    @endforeach
                                    </ul>
                                    <div class="button-submit">
                                        <button class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn mt-3" type="submit">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form class="widget-facet mb-2" action="{{ request()->route()->uri()}}">
                            @foreach (request()->all() as $key=> $item)
                                        @if ( $key != "Size" )
                                            @if ( is_array($item) )
                                                @foreach ($item as $query_param_key => $query_param)
                                                    <input type="hidden" name="{{"$key"."[".$query_param_key."]"}}" value="{{$query_param}}">
                                                @endforeach
                                            @else
                                                <input type="hidden" name="{{"$key"}}" value="{{$item}}">
                                            @endif
                                        @endif
                                    @endforeach
                            <div class="widget-facet mb-2">
                                <div class="facet-title" data-bs-target="#size" data-bs-toggle="collapse" aria-expanded="true" aria-controls="size">
                                    <span>Size</span>
                                    <span class="icon icon-arrow-up"></span>
                                </div>
                                <div id="size" class="collapse show">
                                    <ul class="tf-filter-group current-scrollbar">
                                        @foreach ($sizes as $size)
                                            <li class="list-item d-flex gap-12 align-items-center">
                                                <input type="checkbox" name="Size[{{$size->id}}]" class="tf-check" id="s" value="{{$size->sizeName}}" {{ isset(request()->all()["Size"]) && (is_array(request()->all()["Size"]) and in_array($size->sizeName, request()->all()["Size"])) ? ' checked' : '' }}>
                                                <label for="s" class="label"><span>{{$size->sizeName}}</span></label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="button-submit">
                                        <button class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn mt-3" type="submit">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                      
                        <form class="widget-facet mb-2" action="{{ request()->route()->uri()}}">
                            @foreach (request()->all() as $key=> $item)
                                @if ( $key != "MaxPrice" && $key != "MinPrice" )
                                    @if ( is_array($item) )
                                        @foreach ($item as $query_param_key => $query_param)
                                            <input type="hidden" name="{{"$key"."[".$query_param_key."]"}}" value="{{$query_param}}">
                                        @endforeach
                                    @else
                                        <input type="hidden" name="{{"$key"}}" value="{{$item}}">
                                    @endif
                                @endif
                            @endforeach
                            <div class="widget-facet">
                                <div class="facet-title" data-bs-target="#price" data-bs-toggle="collapse" aria-expanded="true" aria-controls="price">
                                    <span>Price</span>
                                    <span class="icon icon-arrow-up"></span>
                                </div>
                                <div id="price" class="collapse show">
                                        <div class="tf-field style-1 mb_15" >
                                            <input class="tf-field-input tf-input" type="number" id="property4"  name="MinPrice" value="{{ isset(request()->all()["MinPrice"]) && (is_array(request()->all()["MinPrice"])) ? request()->all()["MinPrice"] : '' }}" placeholder="Min Price" >
                                            <label class="tf-field-label fw-4 text_black-2" for="property4">Min Price</label>
                                        </div>
                                        <div class="tf-field style-1 mb_15" >
                                            <input class="tf-field-input tf-input" type="number" id="property4"  name="MaxPrice" value="{{ isset(request()->all()["MaxPrice"]) && (is_array(request()->all()["MaxPrice"])) ? request()->all()["MaxPrice"] : '' }}" placeholder="Max Price" >
                                            <label class="tf-field-label fw-4 text_black-2" for="property4">Max Price</label>
                                        </div>
                                    <div class="button-submit">
                                        <button class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn mt-3" type="submit">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>  
                </div>
                
            </div>       
        </div>
         
    <script>
        function toggle_fav(element){
            console.log("favign")
            if(element.getAttribute("faved") == null){
                 fav(element);
            }else{
                un_fav(element);
            }
        }

        function fav(element){
            let fav_element_nav = document.querySelectorAll("#nav-fav");
            element.setAttribute('faved', "1");
            fetch(element.getAttribute('fav-url'));
            fav_element_nav.forEach(element => {
                element.innerHTML = Number(element.innerHTML) + 1;
            });
        }

        function un_fav(element){
            let fav_element_nav = document.querySelectorAll("#nav-fav");
            element.removeAttribute('faved');
            fav_element_nav.forEach(element => {
                element.innerHTML = Number(element.innerHTML) - 1;
            });
            fetch(element.getAttribute('unfav-url'));
        }

    </script>
@endsection