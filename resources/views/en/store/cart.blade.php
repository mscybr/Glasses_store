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
	@endphp

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{route("shop")}}" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
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
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

								@php
									$total = 0;
								@endphp
                                @foreach ($orders as $item)
                                @php
                                    $thumb = explode(",", $item->product->images)[0];
                                    $thumbnail_array = explode("/", $thumb);
                                    $thumbnail = $thumbnail_array[ sizeof($thumbnail_array) -1 ];
                                    $price = $item->product->price - ( $item->product->price * $item->product->sale);
									$total += $price * $item->amount;
                                @endphp
                                    <tr class="table_row">
                                        <td class="column-1">
											<form action="{{route("delete_cart")}}" method="post">
												@csrf
												<input type="hidden" name="item_id" value="{{$item->id}}">
												<button class="how-itemcart1">
													<img src="{{asset("storage/images/$thumbnail")}}" alt="IMG">
												</button>
											</form>

										</td>
                                        <td class="column-2">{{$item->product->name}}</td>
                                        {{-- <td class="column-3">$ {{ $price }}</td> --}}
										@if (isRtl($selected_currency["currencySymbol"]))
											<td class="column-3 text-left" dir="rtl">
												{{  number_format(( $price / $selected_currency["cost"]), 2, ".", ""). $selected_currency["currencySymbol"]}}
											</td>
										@else
											<td class="column-3">
												{{ $selected_currency["currencySymbol"] . number_format(($price / $selected_currency["cost"]), 2, ".", "")}}
											</td>
										@endif
                                        <td class="column-4">
                                            {{ $item->amount }}
                                            {{-- <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="1">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div> --}}
                                        </td>
										
										@if (isRtl($selected_currency["currencySymbol"]))
											<td class="column-5" dir="rtl">
												{{  number_format(( $price * $item->amount / $selected_currency["cost"]), 2, ".", ""). $selected_currency["currencySymbol"]}}
											</td>
										@else
											<td class="column-5">
												{{ $selected_currency["currencySymbol"] . number_format(($price * $item->amount / $selected_currency["cost"]), 2, ".", "")}}
											</td>
										@endif
                                        {{-- <td class="column-5">$ {{ $price * $item->amount }}</td> --}}
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

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<form action="{{route("send_to_check_out")}}" method="post">

					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								@if (isRtl($selected_currency["currencySymbol"]))
									<span class="mtext-110 cl2" dir="rtl">
										{{  number_format(( $total / $selected_currency["cost"]), 2, ".", ""). $selected_currency["currencySymbol"]}}
									</span>
								@else
									<span class="mtext-110 cl2">
										{{ $selected_currency["currencySymbol"] . number_format(($total / $selected_currency["cost"]), 2, ".", "")}}
									</span>
								@endif
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>
							<div class="size-209">
								@if (isRtl($selected_currency["currencySymbol"]))
									<span class="mtext-110 cl2" dir="rtl">
										{{  number_format((  $shipping_cost  / $selected_currency["cost"]), 2, ".", ""). $selected_currency["currencySymbol"]}}
									</span>
								@else
									<span class="mtext-110 cl2">
										{{ $selected_currency["currencySymbol"] . number_format(( $shipping_cost  / $selected_currency["cost"]), 2, ".", "")}}
									</span>
								@endif
							</div>

							{{-- <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option>Select a country...</option>
											<option>USA</option>
											<option>UK</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>
									
									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>
										
								</div>
							</div> --}}
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									@if (isRtl($selected_currency["currencySymbol"]))
										<span class="mtext-110 cl2" dir="rtl">
											{{  number_format((  ($total + $shipping_cost)  / $selected_currency["cost"]), 2, ".", ""). $selected_currency["currencySymbol"]}}
										</span>
									@else
										<span class="mtext-110 cl2">
											{{ $selected_currency["currencySymbol"] . number_format(( ($total + $shipping_cost)  / $selected_currency["cost"]), 2, ".", "")}}
										</span>
									@endif
								</span>
							</div>
						</div>
						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Address:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<div class="rs1-select2 bor8 bg0">
									<select class="js-select2" name="address">
										<option selected disabled>Choose an option</option>
										@foreach ( Auth::user()->billing_addresses as $address )
										<option value={{$address->id}}>{{ $address->address }}</option>
										@endforeach
									</select>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
						</div>

							@csrf
							<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								Proceed to Checkout
							</button>
					</div>
				</form>

				</div>
			</div>
		</div>
	</div>
		
	
		
@endsection