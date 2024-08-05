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
							login
						</h1>

					
						<div class="p-5" >


							<div class="col-9 m-auto">

								<div class="p-t-15">
									<span class="stext-112 cl8">
										Enter Your Email
									</span>
									<div class="mb-3">
										<input value="{{old("email")}}" class="form-control" type="email" name="email" placeholder="Email" required>
									</div>
									<span class="stext-112 cl8">
										Enter Your Password
									</span>
									<div class="mb-3">
										<input value="{{old("password")}}" class="form-control" type="password" name="password" placeholder="Password" required>
									</div>
								</div>
								<button class="btn btn-success">
									login
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</form>
@endsection