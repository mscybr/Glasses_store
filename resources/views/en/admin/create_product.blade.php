@extends("en.admin.layout")
@section("content")

	<!-- breadcrumb -->

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="POST" action="{{ route("product_store") }}" enctype="multipart/form-data">
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
							Add product
						</h1>

						<div class="flex-w flex-t p-b-13" style="border-bottom:1px solid #e6e6e6">

						</div>

						<div class="flex-w flex-t p-t-15 p-b-30 mb-3" style="border-bottom:1px solid #e6e6e6">

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm m-lr-auto">

								<div class="p-t-15">
									<div>
										<span class="stext-112 cl8">
											Enter product image
										</span>
										<div class="bor8 bg0 m-b-12">
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="file" name="image[]" required>
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="file" name="image[]" required>
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="file" name="image[]" required>
										</div>
									</div>
									<div>
										<span class="stext-112 cl8">
											Enter product name
										</span>
										<div class="bor8 bg0 m-b-12">
											<input value="{{old("name")}}" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Name" required>
										</div>
									</div>
									<div>
										<span class="stext-112 cl8">
											Enter product description
										</span>
										<div class="bor8 bg0 m-b-12">
											<textarea  class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="description" placeholder="Description" required>{{old("description")}}</textarea>
										</div>
									</div>
									<div>
										<span class="stext-112 cl8">
											Enter price
										</span>
										<div class="bor8 bg0 m-b-12">
											<input value="{{old("price")}}" class="stext-111 cl8 plh3 size-111 p-lr-15" type="number" step="any" name="price" placeholder="price" required>
										</div>
									</div>
									<div>
										<span class="stext-112 cl8">
											Enter sale
										</span>
										<div class="bor8 bg0 m-b-12">
											<input value="{{old("sale")}}" class="stext-111 cl8 plh3 size-111 p-lr-15" type="number" step="any" name="sale" placeholder="sale" required>
										</div>
									</div>
									<div>
										<span class="stext-112 cl8">
											Select a category
										</span>
										<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
											<select class="js-select2" name="category_id" id="category">
												@foreach ($categories as $category)
													<option value="{{ $category->id }}">{{ $category->categoryName }}</option>
												@endforeach
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
									<div>
										<span class="stext-112 cl8">
											Select a subcategory
										</span>
										<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
											<select class="js-select2" name="subcategory_id" id="subcategories">
												<option disabled selected>Select subcategory</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
									<div>
										<span class="stext-112 cl8">
											Select a brand
										</span>
										<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
											<select class="js-select2" name="brand_id">
												@foreach ($brands as $brand)
													<option value="{{ $brand->id }}">{{ $brand->brandName }}</option>
												@endforeach
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
									<div>
										<span class="stext-112 cl8">
											Select avaliable colors
										</span>
										@foreach ($colors as $color)
											<div class="mb-3 form-check">
												<input type="checkbox" class="form-check-input ml-0" name="color[{{$color->id}}]" value="{{$color->colorName}}" >
												<label class="form-check-label" for="exampleCheck1">{{$color->colorName}}</label>
											</div>
										@endforeach
									</div>
									<div>
										<span class="stext-112 cl8">
											Select lenses
										</span>
										@foreach ($lenses as $lens)
											<div class="mb-3 form-check">
												<input type="checkbox" class="form-check-input ml-0" name="lens[{{$lens->id}}]" value="{{$lens->lensName}}" >
												<label class="form-check-label" for="exampleCheck1">{{$lens->lensName}}</label>
											</div>
										@endforeach
									</div>
									<div>
										<span class="stext-112 cl8">
											Select avaliable sizes
										</span>
										@foreach ($sizes as $size)
											<div class="mb-3 form-check">
												<input type="checkbox" class="form-check-input ml-0" name="size[{{$size->id}}]" value="{{$size->sizeName}}" >
												<label class="form-check-label" for="exampleCheck1">{{$size->sizeName}}</label>
											</div>
										@endforeach
									</div>

								</div>
							</div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-112 m-lr-auto bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Add product
						</button>
					</div>
				</div>
			</div>
		</div>
		
	</form>


	<div class="row">
		<div class="col-10 m-lr-auto m-b-50">
			<div class="m-l-25 m-r--38 m-lr-0-xl">
				<div class="wrap-table-shopping-cart">
					<table class="table-shopping-cart">
						<thead>

						<tr class="table_head">
							<th class="column-1">Product</th>
							<th class="column-2">Category / Subcategory</th>
							<th class="column-3">Brand</th>
							<th class="column-4">Lenses</th>
							<th class="column-5">Colors</th>
							<th class="column-6">Sizes</th>
							<th class="column-7">Price</th>
							<th class="column-8">Delete</th>
						</tr>
					</thead>

						<tbody>

						@foreach ($products as $product)
							<tr class="table_row">
								{{-- <td class="column-1">
									{{ $product->name }}
								</td> --}}
								<td class="column-1">
									<a href="{{route("product", ["product_id" => $product->id])}}" >{{ $product->name }}</a>	
								</td>
								<td class="column-2">{{ $product->category->categoryName.( isset( $product->subcategory_id ) ? " / ".$product->subcategory->subcategoryName : "" ) }}</td>
								<td class="column-3">{{$product->brand->brandName}}</td>
								<td class="column-4">{{ $product->lenses }}</td>
								<td class="column-5">{{ $product->colors }}</td>
								<td class="column-6">{{ $product->sizes }}</td>
								<td class="column-7">{{ $product->price }}</td>
								<td class="column-8">
									<form action="{{route("delete_product")}}" method="post">
										@csrf
										<input type="hidden" name="item_id" value="{{$product->id}}"> 
										<input type="submit" value="delete" class="btn btn-danger">
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>

					</table>
				</div>


			</div>
		</div>
	</div>


	<script>
		let subcategories = {};
		let _subcate = <?= json_encode($subcategories) ?>;
		let sub_element = document.querySelector("#subcategories");
		let cate_element = document.querySelector("#category");
		cate_element.onchange=()=>{
			if( subcategories[cate_element.value] != undefined ){
				subcategory_html(subcategories[cate_element.value])
			}else{
				sub_element.innerHTML =""
			}
		};
		_subcate.forEach(x=>{
			if( subcategories[x.category_id] ){
				subcategories[x.category_id].push({
					"name":x.subcategoryName,
					"id":x.id
				})
			}else{
				subcategories[x.category_id] = [{
					"name":x.subcategoryName,
					"id":x.id
				}]
			}
		});

		function subcategory_html(array){
			let html = "<option disabled selected>Select subcategory</option>";
			array.forEach(array => {
				html += single_html(array.name, array.id);
			});

			sub_element.innerHTML = html;

			function single_html(name,id){
				return `<option value="${id}">${name}</option>`
			}
		}

	</script>
@endsection