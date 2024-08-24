	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						A special offer here
					</div>

					<div class="right-top-bar flex-w h-full">
						{{-- <a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a> --}}

						@guest
							<a href="{{route("login")}}"class="flex-c-m trans-04 p-lr-25">Login</a>
							<a href="{{route("register_form")}}"class="flex-c-m trans-04 p-lr-25">Register</a>
						@endguest
						@auth
							<a href="{{route("profile")}}"class="flex-c-m trans-04 p-lr-25">Profile</a>
							<a href="{{route("logout")}}"class="flex-c-m trans-04 p-lr-25">Logout</a>
						@endauth

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							USD
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							@auth
								@if ( Auth::user()->role == "admin" )
									<li>
										<a href="">Admin</a>
										<ul class="sub-menu">
											<li><a href="{{route("brand_form")}}">Brand</a></li>
											<li><a href="{{route("color_form")}}">Color</a></li>
											<li><a href="{{route("lens_form")}}">Lens</a></li>
											<li><a href="{{route("size_form")}}">Size</a></li>
											<li><a href="{{route("subcategory_form")}}">Subcategory</a></li>
											<li><a href="{{route("category_form")}}">Category</a></li>
											<li><a href="{{route("site_config_form")}}">Site Confirgurations</a></li>
											<li><a href="{{route("product_form")}}">Product</a></li>
											<li><a href="{{route("orders")}}">Orders</a></li>
										</ul>
									</li>
								@endif

							@endauth

							<li>
								<a href="{{route("shop")}}">Home</a>
							</li>
							<li class="label1" data-label1="hot">
								<a href="{{route("shop")}}">Shop</a>
								<ul class="sub-menu">
									@php
										$categories = App\Models\Category::all();
									@endphp
									@foreach ($categories as $category)
										<li><a href="{{route("shop", ["Category" =>$category->id])}}">{{$category->categoryName}}</a></li>
									@endforeach
								</ul>
							</li>

							<li>
								<a href="about.html">About</a>
							</li>

							<li>
								<a href="contact.html">Contact</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>
						@auth
							@php
								$_orders = DB::select('select count(id) as orders from orders where user_id = ? AND status=0', [Auth::user()->id]);
								$orders = $_orders[0]->orders;
							@endphp
							<a href="{{route("cart_items")}}" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="{{$orders}}">
								<i class="zmdi zmdi-shopping-cart"></i>
							</a>
						@endauth
{{-- 
						<a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a> --}}
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>
				@auth
				@php
					$_orders = DB::select('select count(id) as orders from orders where user_id = ? AND status=0', [Auth::user()->id]);
					$orders = $_orders[0]->orders;
				@endphp
				<a href="{{route("cart_items")}}" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="{{$orders}}">
					<i class="zmdi zmdi-shopping-cart"></i>
				</a>
			@endauth
		

				{{-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a> --}}
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						A special offer here
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						
						@guest
							<a href="{{route("login")}}"class="flex-c-m p-lr-10 trans-04">Login</a>
							<a href="{{route("register_form")}}"class="flex-c-m p-lr-10 trans-04">Register</a>
						@endguest
						@auth
							<a href="{{route("profile")}}"class="flex-c-m p-lr-10 trans-04">Profile</a>
							<a href="{{route("logout")}}"class="flex-c-m p-lr-10 trans-04">Logout</a>
						@endauth

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					@auth
					@if ( Auth::user()->role == "admin" )
					<a href="">Admin</a>
							<ul class="sub-menu-m">
								<li><a href="{{route("brand_form")}}">Brand</a></li>
								<li><a href="{{route("color_form")}}">Color</a></li>
								<li><a href="{{route("lens_form")}}">Lens</a></li>
								<li><a href="{{route("size_form")}}">Size</a></li>
								<li><a href="{{route("subcategory_form")}}">Subcategory</a></li>
								<li><a href="{{route("category_form")}}">Category</a></li>
								<li><a href="{{route("site_config_form")}}">Site Confirgurations</a></li>
								<li><a href="{{route("product_form")}}">Product</a></li>
								<li><a href="{{route("orders")}}">Orders</a></li>
							</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
					@endif

				@endauth

				</li>

				<li>
					<a href="{{route("shop")}}">Home</a>
				</li>
				<li>

					<a href="{{route("shop")}}">Shop</a>
					<ul class="sub-menu-m">
						@php
							$categories = App\Models\Category::all();
						@endphp
						@foreach ($categories as $category)
							<li><a href="{{route("shop", ["Category" =>$category->id])}}">{{$category->categoryName}}</a></li>
						@endforeach
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>


				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					X
					{{-- <img src="images/icons/icon-close2.png" alt="CLOSE"> --}}
				</button>

				<form class="wrap-search-header flex-w p-l-15" action="{{route("shop")}}">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="Search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>
