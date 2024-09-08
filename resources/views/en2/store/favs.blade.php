@extends("en.store.layout")
@section("content")

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{route("shop")}}" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Favourite List
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Remove</th>
								</tr>

                                @foreach ($products as $item)
                                @php
                                    $thumb = explode(",", $item->images)[0];
                                    $thumbnail_array = explode("/", $thumb);
                                    $thumbnail = $thumbnail_array[ sizeof($thumbnail_array) -1 ];
                                @endphp
                                    <tr class="table_row">
                                        <td class="column-1">
											<div class="d-flex align-items-center" >
												<img style="width:80px" src="{{asset("storage/images/$thumbnail")}}" alt="IMG">
											</div>

										</td>
                                        <td class="column-2">
											<div class="d-flex align-items-center" >
												<a class="ml-3" href={{route("product", ["product_id"=>$item->id])}}>{{ $item->name }}</a>
											</div>

										</td>
                                        <td class="column-3">
											<a onclick="un_fav(this)" unfav-url="{{route("unfav", ["product"=> $item->id])}}">X</a>
										</td>
                                    
                                    </tr>
                                @endforeach

							</table>
						</div>

						{{-- <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div> --}}
					</div>
				</div>

			

				</div>
			</div>
		</div>
	</div>
		
	

	<script>
			
	
		function un_fav(element){
			let fav_element_nav = document.querySelector("#nav-fav");
			fav_element_nav.setAttribute("data-notify", Number(fav_element_nav.getAttribute("data-notify")) - 1);
			fetch(element.getAttribute('unfav-url'));
			element.parentElement.parentElement.remove();
		}

	</script>
		
@endsection