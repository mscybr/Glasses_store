@extends("en.admin.layout")
@section("content")

	<!-- breadcrumb -->

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="POST" action="{{ route("edit_shipping_cost") }}">
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
							Edit Shipping cost
						</h1>

						<div class="flex-w flex-t p-b-13" style="border-bottom:1px solid #e6e6e6">

						</div>

						<div class="flex-w flex-t p-t-15 p-b-30 mb-3" style="border-bottom:1px solid #e6e6e6">

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm m-lr-auto">

								<div class="p-t-15">
									<div>
										<span class="stext-112 cl8">
											Enter Shipping cost
										</span>
										<div class="bor8 bg0 m-b-12">
											<input value="{{ $shiping_cost }}" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="cost" placeholder="Name" required>
										</div>
									</div>
								</div>
							</div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-112 m-lr-auto bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Edit Cost
						</button>
					</div>
				</div>
			</div>
		</div>
		
	</form>



@endsection