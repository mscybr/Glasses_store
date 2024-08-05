@extends("en.admin.layout")
@section("content")

	<!-- breadcrumb -->

	<!-- Shoping Cart -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
						<a><i class="fa fa-home"></i> Admin</a>
                        <span>Product</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">

            <form action="#" class="checkout__form" method="POST" action="{{ route("product_store") }}" enctype="multipart/form-data">
				@csrf

                <div class="row">
					 @if($errors->any())
							@foreach ($errors->all(':message') as $message)
								<div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ $message }}</div>
							@endforeach
                        @endif
                    <div class="col-12">
                        <h5>Add a Product</h5>
                        <div class="row">
                            
                            <div class="col-12">
                                <div class="checkout__form__input">
                                    <p>Product images <span>*</span></p>
									<input class="form-control" type="file" name="image[]" required>
									<input class="form-control" type="file" name="image[]" required>
									<input class="form-control" type="file" name="image[]" required>
                                </div>
                                <div class="checkout__form__input">
                                    <p>Product Name <span>*</span></p>
                                    <input type="text" value="{{old("name")}}" name="name">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Product Description <span>*</span></p>
                                    <textarea class="form-control mb-2" name="description">{{old("description")}}</textarea>
                                </div>
								<div class="checkout__form__input">
                                    <p>price <span>*</span></p>
                                    <input type="number" class="form-control  mb-2" step="any" value="{{old("price")}}" name="price">
                                </div>
								<div class="checkout__form__input">
                                    <p>sale <span>*</span></p>
                                    <input type="number" step="any"  class="form-control  mb-2" value="{{old("sale")}}" name="sale">
                                </div>
                                
                                <div class="checkout__form__input">
                                    <p>select a category <span>*</span></p>
									<select class="form-control mb-2" name="category_id" id="category">
										@foreach ($categories as $category)
											<option value="{{$category->id}}">{{$category->categoryName}}</option>
										@endforeach	
									</select>
                                </div>
                                <div class="checkout__form__input">
                                    <p>select a subcategory <span>*</span></p>
									<select class="form-control mb-2" name="subcategory_id" id="subcategories">
										<option disabled selected>Select subcategory</option>
									</select>
                                </div>
								<div class="checkout__form__input">
                                    <p>select a brand <span>*</span></p>
									<select class="form-control mb-3" name="brand_id">
										@foreach ($brands as $brand)
												<option value="{{ $brand->id }}">{{ $brand->brandName }}</option>
										@endforeach
									</select>
                                </div>
								<div class="checkout__form__input mb-2">
                                    <p>select avaliable colors <span>*</span></p>
									@foreach ($colors as $color)
											<div class="mb-2 form-check">
												<input style="height: 20px" type="checkbox" class="form-check-input ml-0" name="color[{{$color->id}}]" value="{{$color->colorName}}" >
												<label class="form-check-label" for="exampleCheck1">{{$color->colorName}}</label>
											</div>
									@endforeach
                                </div>
								<div class="checkout__form__input mb-2">
                                    <p>select avaliable lenses <span>*</span></p>
									@foreach ($lenses as $lens)
											<div class="mb-2 form-check">
												<input style="height: 20px" type="checkbox" class="form-check-input m-0" name="lens[{{$lens->id}}]" value="{{$lens->lensName}}" >
												<label class="form-check-label" for="exampleCheck1">{{$lens->lensName}}</label>
											</div>
										@endforeach
                                </div>
								<div class="checkout__form__input mb-2">
                                    <p>select avaliable sizes <span>*</span></p>
									@foreach ($sizes as $size)
											<div class="mb-2 form-check">
												<input style="height: 20px" type="checkbox" class="form-check-input ml-0" name="size[{{$size->id}}]" value="{{$size->sizeName}}" >
												<label class="form-check-label" for="exampleCheck1">{{$size->sizeName}}</label>
											</div>
										@endforeach
                                </div>
								<button type="submit" class="btn btn-success">Add</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section End -->

	<div class="row">
		<div class="col-9 m-auto">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th >Product</th>
						<th >Category / Subcategory</th>
						<th >Brand</th>
						<th >Lenses</th>
						<th >Colors</th>
						<th >Sizes</th>
						<th >Price</th>
						<th >Delete</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($products as $product)
						<tr>
								<td class="column-1">
									{{ $product->name }}
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