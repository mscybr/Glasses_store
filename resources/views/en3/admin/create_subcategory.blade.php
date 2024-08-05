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
                        <span>Subcategory</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            
            <form action="#" class="checkout__form" method="POST" action="{{ route("subcategory_store") }}">
				@csrf

                <div class="row">
					 @if($errors->any())
							@foreach ($errors->all(':message') as $message)
								<div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ $message }}</div>
							@endforeach
                        @endif
                    <div class="col-12">
                        <h5>Add a subcategory</h5>
                        <div class="row">
                            
                            <div class="col-12">
                                <div class="checkout__form__input">
                                    <p>subcategory Name <span>*</span></p>
                                    <input type="text" value="{{old("subcategoryName")}}" name="subcategoryName">
                                </div>
                                <div class="checkout__form__input">
                                    <p>category Name <span>*</span></p>
									<select class="form-control mb-2" name="category_id">
										@foreach ($categories as $category)
											<option value="{{$category->id}}">{{$category->categoryName}}</option>
										@endforeach	
									</select>
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
						<th >Category</th>
						<th >Subcategory</th>
						<th >Delete</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($subcategories as $item)
						<tr>
							<td >
								{{ $item->subcategoryName }}
							</td>
							<td >
								{{ $item->category->categoryName }}
							</td>
							<td>
								<form action="{{route("delete_subcategory")}}" method="post">
									@csrf
									<input type="hidden" name="item_id" value="{{$item->id}}"> 
									<input type="submit" value="delete" class="btn btn-danger">
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>

			</table>
		</div>
	</div>

@endsection