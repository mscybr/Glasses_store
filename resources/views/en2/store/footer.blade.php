	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						@php
							$categories = App\Models\Category::all();
						@endphp
						@foreach ($categories as $category)
							<li class="p-b-10">
								<a href="{{route("shop", ["Category" =>$category->id])}}" class="stext-107 cl7 hov-cl1 trans-04">
									{{$category->categoryName}}
								</a>
							</li>
						@endforeach

					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>


						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="" class="stext-107 cl7 hov-cl1 trans-04">
								Contact
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				{{-- <div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div> --}}
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src={{asset("assets/images/icons/icon-pay-01.png")}} alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src={{asset("assets/images/icons/icon-pay-02.png")}} alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src={{asset("assets/images/icons/icon-pay-03.png")}} alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src={{asset("assets/images/icons/icon-pay-04.png")}} alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src={{asset("assets/images/icons/icon-pay-05.png")}} alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src={{asset("assets/vendor/jquery/jquery-3.2.1.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("assets/vendor/animsition/js/animsition.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("assets/vendor/bootstrap/js/popper.js")}}></script>
	<script src={{asset("assets/vendor/bootstrap/js/bootstrap.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("assets/vendor/select2/select2.min.js")}}></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
<script src={{asset("assets/vendor/daterangepicker/moment.min.js")}}></script>
<script src={{asset("assets/vendor/daterangepicker/daterangepicker.js")}}></script>
<!--===============================================================================================-->
<script src={{asset("assets/vendor/slick/slick.min.js")}}></script>
<script src={{asset("assets/js/slick-custom.js")}}></script>
<!--===============================================================================================-->
<script src={{asset("assets/vendor/isotope/isotope.pkgd.min.js")}}></script>
<!--===============================================================================================-->
<script src={{asset("assets/vendor/sweetalert/sweetalert.min.js")}}></script>
<!--===============================================================================================-->
<script src={{asset("assets/vendor/parallax100/parallax100.js")}}></script>
<script>
	$('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src={{asset("assets/vendor/MagnificPopup/jquery.magnific-popup.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js")}}></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src={{asset("assets/js/main.js")}}></script>
