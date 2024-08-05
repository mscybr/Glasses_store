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
                        <span>Category</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            
            <form action="#" class="checkout__form" method="POST" action="{{ route("category_store") }}">
				@csrf

                <div class="row">
					 @if($errors->any())
							@foreach ($errors->all(':message') as $message)
								<div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ $message }}</div>
							@endforeach
                        @endif
                    <div class="col-12">
                        <h5>Add a category</h5>
                        <div class="row">
                            
                            <div class="col-12">
                                <div class="checkout__form__input">
                                    <p>category Name <span>*</span></p>
                                    <input type="text" value="{{old("categoryName")}}" name="categoryName">
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
					<th >category Name</th>
					<th >Delete</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($items as $item)
						<tr>
							<td >
								{{ $item->categoryName }}
							</td>
							<td>
								<form action="{{route("delete_category")}}" method="post">
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