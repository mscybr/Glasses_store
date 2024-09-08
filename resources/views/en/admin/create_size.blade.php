@extends("en.admin.layout")
@section("content")

	     <!-- page-title -->
		 <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">Admin</div>
            </div>
        </div>
        <!-- /page-title -->
        <!-- page-cart -->
        <section class="flat-spacing-11">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="my-account-nav">
							<li><a href="{{route("brand_form")}}" class="my-account-nav-item">Brands</a></li>
                            <li><a href="{{route("color_form")}}" class="my-account-nav-item">Colors</a></li>
                            <li><a href="{{route("lens_form")}}" class="my-account-nav-item">Lens</a></li>
                            <li><span class="my-account-nav-item active">Size</span></li>
                            <li><a href="{{route("subcategory_form")}}" class="my-account-nav-item">Subcategory</a></li>
                            <li><a href="{{route("category_form")}}" class="my-account-nav-item">Category</a></li>
                            <li><a href="{{route("site_config_form")}}" class="my-account-nav-item">Site Confirgurations</a></li>
                            <li><a href="{{route("product_form")}}" class="my-account-nav-item">Product</a></li>
                            <li><a href="{{route("inventory")}}" class="my-account-nav-item">Inventory</a></li>
                            <li><a href="{{route("orders")}}" class="my-account-nav-item">Orders</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="my-account-content account-edit">
                            <div class="">
                                @if($errors->any())
                                    @foreach ($errors->all(':message') as $message)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ $message }}</div>
                                    @endforeach
                                @endif
                                <form class="" id="form-password-change"  method="POST" action="{{ route("size_store") }}">
                                    @csrf
                                    <h6 class="mb_20">Add Size </h6>
                                    <div class="tf-field style-1 mb_15">
                                        <input value="{{old("sizeName")}}" name="sizeName" class="tf-field-input tf-input" placeholder=" " type="text" id="property1">
                                        <label class="tf-field-label fw-4 text_black-2" for="property1">Size Name</label>
                                    </div>
                                    <div class="mb_20">
                                        <button type="submit" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <table class="tf-table-page-cart">
                            <thead>
                                <tr>
                                    <th  style="text-align: left">Size Name</th>
                                    <th  style="text-align: left">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr class="tf-cart-item file-delete">
                                        <td style="text-align: left">{{ $item->sizeName }}</td>
                                        <td style="text-align: left">
                                            <form action="{{route("delete_size")}}" method="post">
											@csrf
											<input type="hidden" name="item_id" value="{{$item->id}}"> 
											<input type="submit" value="delete" class="btn btn-danger">
										</form></td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                  
                </div>
            </div>
        </section>
        <!-- page-cart -->
@endsection