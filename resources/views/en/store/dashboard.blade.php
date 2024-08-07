@extends("en.store.layout")
@section("content")


	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="POST" action="{{ route("store_billing_address") }}">
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
							Add a billing address
						</h1>

						<div class="p-5" >


							<div class="col-9 m-auto">

								<div class="p-t-15">
									<span class="stext-112 cl8">
										First Name
									</span>
									<div class="bor8 bg0 m-b-12">
										<input value="{{old("first_name")}}" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="first_name" placeholder="First Name" required>
									</div>
									<span class="stext-112 cl8">
										Last Name
									</span>
									<div class="bor8 bg0 m-b-12">
										<input value="{{old("last_name")}}" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="last_name" placeholder="Last Name" required>
									</div>
									<span class="stext-112 cl8">
                                        Country
									</span>
									<div class="bor8 bg0 m-b-12">
										<input value="{{old("country")}}" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="country" placeholder="Country" required>
									</div>
									<span class="stext-112 cl8">
										City
									</span>
									<div class="bor8 bg0 m-b-12">
										<input value="{{old("city")}}" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="city" placeholder="City" required>
									</div>
									<span class="stext-112 cl8">
										Street
									</span>
									<div class="bor8 bg0 m-b-12">
										<input value="{{old("street")}}" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="street" placeholder="Street" required>
									</div>
									<span class="stext-112 cl8">
										Address
									</span>
									<div class="bor8 bg0 m-b-12">
										<input value="{{old("address")}}" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Address" required>
									</div>
									<span class="stext-112 cl8">
										Phone
									</span>
									<div class="bor8 bg0 m-b-12">
										<input value="{{old("phone")}}" class="stext-111 cl8 plh3 size-111 p-lr-15" type="number" name="phone" placeholder="Phone" required>
									</div>
								</div>
								<button class="btn btn-success">
									Add Billing Address
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</form>

		
<div class="bg0 p-t-75 p-b-85">
	<div class="col-9 mx-auto">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th >Name</th>
					<th >Country</th>
					<th >City</th>
					<th >Street</th>
					<th >Address</th>
					<th >Phone</th>
					{{-- <th >Delete</th> --}}
				</tr>
			</thead>
			<tbody>

				@foreach ($addresses as $item)
					<tr>
						<td >{{ $item->first_name.$item->last_name }}</td>
						<td >{{ $item->country }}</td>
						<td >{{ $item->city }}</td>
						<td >{{ $item->street }}</td>
						<td >{{ $item->address }}</td>
						<td >{{ $item->phone }}</td>
						
						{{-- <td>
							<form action="{{route("delete_billing_address")}}" method="post">
								@csrf
								<input type="hidden" name="item_id" value="{{$item->id}}"> 
								<input type="submit" value="delete" class="btn btn-danger">
							</form>
						</td> --}}
					</tr>
				@endforeach
			</tbody>

		</table>
	</div>
</div>
		
@endsection