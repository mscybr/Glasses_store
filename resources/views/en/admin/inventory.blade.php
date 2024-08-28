@extends("en.admin.layout")
@section("content")

<div class="bg0 p-t-75 p-b-85" method="POST" action="{{ route("brand_store") }}">
	<div class="container">

		<h1 class="mtext-109 cl2  p-b-30 text-center">
			Inventory
		</h1>
	<div class="row">
		<div class="col-10 m-lr-auto m-b-50">
			<div class="m-l-25 m-r--38 m-lr-0-xl">
				<form action="{{route("edit_inventory")}}" method="post">
				<div class="wrap-table-shopping-cart">

					<table class="table-shopping-cart">
						<thead>

						<tr class="table_head">
							<th class="column-1">Product</th>
							<th class="column-2">In Stock</th>
						</tr>
					</thead>

						<tbody>

						@csrf

						@foreach ($products as $product)
							<tr class="table_row">
								{{-- <td class="column-1">
									{{ $product->name }}
								</td> --}}
								<td class="column-1">
									<a href="{{route("product", ["product_id" => $product->id])}}" >{{ $product->name }}</a>	
								</td>
								<td class="column-2">
									<div class="bor8 bg0 m-b-12" style="width:fit-content"> 
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="stock[{{$product->id}}]" value="{{$product->stock}}" placeholder="First Name" required="">
									</div>
								</td>
							</tr>
						@endforeach
						
					</tbody>
					
				</table>
				
				
			</div>
			<button class="btn btn-success m-t-20">
				Submit Changes
			</button>
		</form>


			</div>
		</div>
	</div>
</div>
</div>


@endsection