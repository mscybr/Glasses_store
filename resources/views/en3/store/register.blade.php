@extends("en.store.layout")
@section("content")

	<!-- breadcrumb -->

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="POST" action="{{ route("authenticate") }}">
		@csrf
		<div class="container">
			<div class="row mt-5">

				<div class="col-12">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">

                        @if($errors->any())
							@foreach ($errors->all(':message') as $message)
								<div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ $message }}</div>
							@endforeach
                        @endif
						<h1 class="mtext-109 cl2  p-b-30 text-center">
							register
						</h1>

						<div class="p-5" >


							<div class="col-9 m-auto">

								<div class="p-t-15">
									<span class="stext-112 cl8">
										Enter Your Name
									</span>
									<div class="bor8 bg0 m-b-12">
										<input value="{{old("name")}}" class="form-control mb-3" type="text" name="name" placeholder="Name" required>
									</div>
									<span class="stext-112 cl8">
										Enter Your Email
									</span>
									<div class="bor8 bg0 m-b-12">
										<input value="{{old("email")}}" class="form-control mb-3" type="email" name="email" placeholder="Email" required>
									</div>
									<span class="stext-112 cl8">
										Enter Your Number
									</span>
									<div class="bor8 bg0 m-b-12 d-flex">
										<input value="{{old("countryCode")}}" class="form-control mb-3 col-2" type="Number" name="countryCode" placeholder="+966" required>
										<input value="{{old("number")}}" class="form-control mb-3 col-10" type="Number" name="number" placeholder="5..." required>
									</div>
									<span class="stext-112 cl8">
										Enter Your Password
									</span>
									<div class="bor8 bg0 m-b-12">
										<input value="{{old("password")}}" class="form-control mb-3" type="password" name="password" placeholder="Password" required>
									</div>
									<span class="stext-112 cl8">
										Confirm Your Password
									</span>
									<div class="bor8 bg0 m-b-12">
										<input class="form-control mb-3" type="password" name="password_confirmation" placeholder="Password Confirm" required>
									</div>
								</div>
								<button class="btn btn-success">
									register
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</form>
@endsection