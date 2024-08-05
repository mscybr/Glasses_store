@extends("en.store.layout")
@section("content")

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="shop__sidebar">
                    <div class="sidebar__categories">
                        <div class="section-title">
                            <h4>Categories</h4>
                        </div>
                        <div class="categories__accordion">
                            <div class="accordion" id="accordionExample">
                            @php
                                $request_array = request()->all();
                                if( isset( $request_array["Subcategory"] ) ) unset($request_array["Subcategory"]);
                                if( isset( $request_array["Category"] ) ) unset($request_array["Category"]);
                            @endphp
                                @foreach ($categories as $category)
                                    <div class="card">
                                        <div class="card-heading active">
                                            <span data-toggle="collapse" data-target="#collapse{{$category->id}}" >
                                                <a onclick="location.href='{{  \App\Helpers\AppHelper::instance()->combine_get(['Category' => $category->id], $request_array) }}'" class="text-danger" style="width: fit-content">{{ $category->categoryName }}</a>
                                            </span>
                                        </div>
                                        <div id="collapse{{$category->id}}" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    @if (isset($category->subcategory))
                                                        @foreach ($category->subcategory as $subcategory)
                                                            <li><a href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Subcategory' => $subcategory->id], $request_array) }}">{{$subcategory->subcategoryName}}</a></li>
                                                        @endforeach
                                                    @endif

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="sidebar__categories">
                        <div class="section-title">
                            <h4>Brands</h4>
                        </div>
                        <div class="">
                            <div class="row ml-1" id="accordionExample"style="width: 100px;">
                                @foreach ($brands as $brand)
                                            <a href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Brand' => $brand->id]) }}" class="text-danger" style="width: fit-content">{{ $brand->brandName }}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="sidebar__filter">
                        <div class="section-title">
                            <h4>Shop by price</h4>
                        </div>
                        <div class="filter-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                            data-min="33" data-max="99"></div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <p>Price:</p>
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                        <a href="#">Filter</a>
                    </div>
                    <div class="sidebar__sizes sidebar__filter">
                        <form action="{{ request()->route()->uri()}}" method="GET">
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
                            <div class="section-title">
                                <h4>Shop by size</h4>
                            </div>
                            <div class="size__list">
                                @foreach ($sizes as $size)
                                    <label for="size-{{$size->id}}">
                                        {{$size->sizeName}}
                                        <input type="checkbox" id="size-{{$size->id}}" name="Size[{{$size->id}}]" value="{{$size->id}}" {{ isset(request()->all()["Size"]) && (is_array(request()->all()["Size"]) and in_array($size->id, request()->all()["Size"])) ? ' checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                                <a onclick="this.parentElement.parentElement.submit()">Filter</a>
                            </div>
                        </form>
                    </div>
                    <div class="sidebar__sizes sidebar__filter">
                        <form action="{{ request()->route()->uri()}}" method="GET">
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
                            <div class="section-title">
                                <h4>Shop by color</h4>
                            </div>
                            <div class="size__list">
                                @foreach ($colors as $color)
                                    <label for="color-{{$color->id}}">
                                        {{$color->colorName}}
                                        <input type="checkbox" id="color-{{$color->id}}" name="Color[{{$color->id}}]" value="{{$color->id}}" {{ isset(request()->all()["Color"]) && (is_array(request()->all()["Color"]) and in_array($color->id, request()->all()["Color"])) ? ' checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                                <a onclick="this.parentElement.parentElement.submit()">Filter</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="row">
                    @foreach ($products as $product)

                        <div class="col-lg-4 col-md-6">
                            @if ($product->sale > 0 )
                            <div class="product__item sale">
                            @else
                            <div class="product__item">
                            @endif
                                @php
                                    $thumb = explode(",", $product->images)[0];
                                    $thumbnail_array = explode("/", $thumb);
                                    $thumbnail = $thumbnail_array[ sizeof($thumbnail_array) -1 ];
                                    $thumbnail_src = asset("storage/images/$thumbnail");
                                @endphp 
                                <div class="product__item__pic set-bg" data-setbg="{{$thumbnail_src}}">
                                    {{-- <div class="label new">New</div> --}}
                                    {{-- <div class="label stockout stockblue">Out Of Stock</div> --}}
                                    @if ($product->sale > 0 )
                                    <div class="label">Sale</div>
                                    @endif
                                    <ul class="product__hover">
                                        <li><a href="{{$thumbnail_src}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        {{-- <li><a href="#"><span class="icon_bag_alt"></span></a></li> --}}
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{route("product", ["product_id" => $product->id])}}">{{$product->name}}</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    @if ($product->sale > 0 )
                                    <div class="product__price">$ {{$product->price - ( $product->sale * $product->price )}} <span>$ {{$product->price}}</span></div>
                                    @else
                                    <div class="product__price">$ {{$product->price}}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@endsection