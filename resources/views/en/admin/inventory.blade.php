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
		<form action="{{route("edit_inventory")}}" method="post">
		@csrf
        <section class="flat-spacing-11">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="my-account-nav">
							<li><a href="{{route("brand_form")}}" class="my-account-nav-item">Brands</a></li>
                            <li><a href="{{route("color_form")}}" class="my-account-nav-item">Colors</a></li>
                            <li><a href="{{route("lens_form")}}" class="my-account-nav-item">Lens</a></li>
                            <li><a href="{{route("size_form")}}" class="my-account-nav-item">Size</a></li>
                            <li><a href="{{route("subcategory_form")}}" class="my-account-nav-item">Subcategory</a></li>
                            <li><a href="{{route("category_form")}}" class="my-account-nav-item">Category</a></li>
                            <li><a href="{{route("site_config_form")}}" class="my-account-nav-item">Site Confirgurations</a></li>
                            <li><a href="{{route("product_form")}}" class="my-account-nav-item">Product</a></li>
                            <li><span class="my-account-nav-item active">Inventory</span></li>
                            <li><a href="{{route("orders")}}" class="my-account-nav-item">Orders</a></li>
                        </ul>
                    </div>
                        <div class="col-lg-9">
                            <table class="tf-table-page-cart">
                                <thead>
                                    <tr>
                                        <th  style="text-align: left">Product</th>
                                        <th  style="text-align: left">In Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr class="tf-cart-item file-delete">
                                            <td style="text-align: left"><a href="{{route("product", ["product_id" => $product->id])}}" target="_blank" rel="noopener noreferrer">{{ $product->name }}</a></td>
                                            <td style="text-align: left">
                                                <div class="tf-field style-1 mb_15">
                                                    <input name="stock[{{$product->id}}]" value="{{$product->stock}}" class="tf-field-input tf-input" type="number" id="property1">
                                                    <label class="tf-field-label fw-4 text_black-2" for="property1">Stock</label>
                                                </div>
                                                
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mb_20">
                                <button type="submit" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Submit Changes</button>
                            </div>
                        </div>
                </div>
            </div>
        </section>
		</form>
        <!-- page-cart -->
@endsection