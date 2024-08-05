@extends("en.store.layout")
@section("content")
	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-02.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-03.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>

							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				{{-- <div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
						Women
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
						Men
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
						Bag
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
						Shoes
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
						Watches
					</button>
				</div> --}}

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
					
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Brand
							</div>

							<ul>
								@foreach ($brands as $brand)
									<li class="p-b-6">
										<a href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Brand' => $brand->id]) }}" class="filter-link stext-106 trans-04">
											{{ $brand->brandName }}
										</a>
									</li>
								@endforeach
							</ul>
						</div>
						@php
						$request_array = request()->all();
						if( isset( $request_array["Subcategory"] ) ) unset($request_array["Subcategory"]);
						if( isset( $request_array["Category"] ) ) unset($request_array["Category"]);
					@endphp
					<div class="filter-col4 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Categories
						</div>
						<div class="flex-w p-t-4 m-r--5">
							<a href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Category' => null], request()->all()) }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								All
							</a>
							@foreach ($categories as $category)
								<a href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Category' => $category->id], $request_array) }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									{{ $category->categoryName }}
								</a>
							@endforeach
						</div>
					</div>
					<div class="filter-col4 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Subcategories
						</div>

						<div class="flex-w p-t-4 m-r--5">
							<a href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Subcategory' => null], request()->all()) }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								All
							</a>
							@foreach ($categories as $category)
								@if (isset($category->subcategory))
									@foreach ($category->subcategory as $subcategory)
															
										<a href="{{  \App\Helpers\AppHelper::instance()->combine_get(['Subcategory' => $subcategory->id], $request_array) }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
											{{$subcategory->subcategoryName}}
										</a>
									@endforeach
								@endif
							@endforeach
						</div>
					</div>
{{-- 
						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div> --}}

						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sizes
							</div>
							<form action="{{ request()->route()->uri()}}" method="GET" class="row ml-2">
								{{-- <ul> --}}
									@foreach ($sizes as $size)
										{{-- <li class="p-b-6"> --}}
											<div class="mb-3 form-check col-12">
												<input type="checkbox" class="form-check-input" id="exampleCheck1" name="Size[{{$size->id}}]" value="{{$size->id}}" {{ isset(request()->all()["Size"]) && (is_array(request()->all()["Size"]) and in_array($size->id, request()->all()["Size"])) ? ' checked' : '' }}>
												<label class="form-check-label" for="exampleCheck1">{{$size->sizeName}}</label>
											  </div>
										{{-- </li> --}}
									@endforeach
								{{-- </ul> --}}
								<button type="submit"  class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Filter
								</button>
								{{-- <a onclick="this.parentElement.parentElement.submit()">Filter</a> --}}
							</form>
						</div>

						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Colors
							</div>
							<form action="{{ request()->route()->uri()}}" method="GET" class="row ml-2">
								{{-- <ul> --}}
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
									@foreach ($colors as $color)
										{{-- <li class="p-b-6"> --}}
											<div class="mb-3 form-check col-12">
												<input type="checkbox" class="form-check-input" id="exampleCheck1" name="Color[{{$color->id}}]" value="{{$color->id}}" {{ isset(request()->all()["Color"]) && (is_array(request()->all()["Color"]) and in_array($color->id, request()->all()["Color"])) ? ' checked' : '' }}>
												<label class="form-check-label" for="exampleCheck1"> {{$color->colorName}}</label>
											  </div>
										{{-- </li> --}}
									@endforeach
								{{-- </ul> --}}
								<button type="submit"  class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Filter
								</button>
								{{-- <a onclick="this.parentElement.parentElement.submit()">Filter</a> --}}
							</form>
						</div>

{{-- 						
						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>
						 --}}
					
					</div>
				</div>
			</div>

			
			<div class="row isotope-grid">
				@foreach ($products as $product)
					@php
						$thumb = explode(",", $product->images)[0];
						$thumbnail_array = explode("/", $thumb);
						$thumbnail = $thumbnail_array[ sizeof($thumbnail_array) -1 ];
						$thumbnail_src = asset("storage/images/$thumbnail");
					@endphp
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{$thumbnail_src}}" alt="IMG-PRODUCT">

							<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{route("product", ["product_id" => $product->id])}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{$product->name}}
								</a>

								<span class="stext-105 cl3">
									${{$product->price - ( $product->sale * $product->price )}}
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="{{asset("assets/images/icons/icon-heart-01.png")}}" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset("assets/images/icons/icon-heart-02.png")}}" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach

			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</div>

@endsection