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


	<!-- breadcrumb -->

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="POST" action="{{ route("authenticate") }}">
		@csrf
		<div class="container">
			<div class="row">
		
				<div class="col-9 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					
                        @if($errors->any())
							@foreach ($errors->all(':message') as $message)
								<div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ $message }}</div>
							@endforeach
                        @endif
						<h1 class="mtext-109 cl2  p-b-30 text-center">
							login
						</h1>

						<div class="flex-w flex-t p-b-13" style="border-bottom:1px solid #e6e6e6">

						</div>

						<div class="flex-w flex-t p-t-15 p-b-30 mb-3" style="border-bottom:1px solid #e6e6e6">
							

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm m-lr-auto">
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Enter Your Email
									</span>
									<div class="bor8 bg0 m-b-12">
										<input value="{{old("email")}}" class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" name="email" placeholder="Email" required>
									</div>
									<span class="stext-112 cl8">
										Enter Your Password
									</span>
									<div class="bor8 bg0 m-b-12">
										<input value="{{old("password")}}" class="stext-111 cl8 plh3 size-111 p-lr-15" type="password" name="password" placeholder="Password" required>
									</div>
								</div>
							</div>
						</div>
						<button class="flex-c-m stext-101 cl0 size-112 m-lr-auto bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							login
						</button>
					</div>
				</div>
			</div>
		</div>
		
	</form>
@endsection