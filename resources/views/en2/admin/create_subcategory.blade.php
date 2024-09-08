@extends("en.admin.layout")
@section("content")

	<!-- breadcrumb -->

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="POST" action="{{ route("subcategory_store") }}">
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
							Add subcategory 
						</h1>

						<div class="flex-w flex-t p-b-13" style="border-bottom:1px solid #e6e6e6">

						</div>

						<div class="flex-w flex-t p-t-15 p-b-30 mb-3" style="border-bottom:1px solid #e6e6e6">

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm m-lr-auto">

								<div class="p-t-15">
									<div>
										<span class="stext-112 cl8">
											select a category
										</span>
											<div class= respon6-next">
												<div class="rs1-select2 bor8 bg0">
													<select class="js-select2" name="category_id">
														@foreach ($categories as $category)
															<option value="{{$category->id}}">{{$category->categoryName}}</option>
														@endforeach	
													</select>
													<div class="dropDownSelect2"></div>
												</div>
											</div>

										<span class="stext-112 cl8">
											Enter subcategory name
										</span>
										<div class="bor8 bg0 m-b-12">
											<input value="{{old("subcategoryName")}}" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="subcategoryName" placeholder="Name" required>
										</div>
									</div>
								</div>
							</div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-112 m-lr-auto bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Add subcategory
						</button>
					</div>
				</div>
			</div>
		</div>
		
	</form>


	<div class="row">
		<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
			<div class="m-l-25 m-r--38 m-lr-0-xl">
				<div class="wrap-table-shopping-cart">
					<table class="table-shopping-cart">
						<tr class="table_head">
							<th class="column-1">Category</th>
							<th class="column-2"></th>
							<th class="column-3">Subcategory</th>
							<th class="column-4"></th>
							<th class="column-5">Delete</th>
						</tr>
						@foreach ($subcategories as $subcategory)
							<tr class="table_row">
								<td class="column-1">
									{{ $subcategory->category->categoryName }}
									{{-- <div class="how-itemcart1">
										<img src="images/item-cart-04.jpg" alt="IMG">
									</div> --}}
								</td>
								<td class="column-2"></td>
								<td class="column-3">{{$subcategory->subcategoryName}}</td>
								<td class="column-4">
								</td>
								<td class="column-5">
									<form action="{{route("delete_subcategory")}}" method="post">
										@csrf
										<input type="hidden" name="item_id" value="{{$subcategory->id}}"> 
										<input type="submit" value="delete" class="btn btn-danger">
									</form>
								</td>
							</tr>
						@endforeach

					</table>
				</div>

			
			</div>
		</div>
	</div>

@endsection