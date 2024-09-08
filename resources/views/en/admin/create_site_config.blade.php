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
                            <li><a href="{{route("size_form")}}" class="my-account-nav-item">Size</a></li>
                            <li><a href="{{route("subcategory_form")}}" class="my-account-nav-item">Subcategory</a></li>
                            <li><a href="{{route("category_form")}}" class="my-account-nav-item">Category</a></li>
                            <li><span class="my-account-nav-item active">Site Confirgurations</span></li>
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
                                <form class="" id="form-password-change"  method="POST" action="{{ route("edit_shipping_cost") }}">
                                    @csrf
                                    <h6 class="mb_20">Edit Shipping cost</h6>
                                    <div class="tf-field style-1 mb_15">
                                        <input value="{{ $shiping_cost }}"  name="cost" class="tf-field-input tf-input" placeholder=" " type="text" id="property1">
                                        <label class="tf-field-label fw-4 text_black-2" for="property1">Shipping cost</label>
                                    </div>
                                    <div class="mb_20">
                                        <button type="submit" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="my-account-content account-edit">
                            <div class="">
                                @if($errors->any())
                                    @foreach ($errors->all(':message') as $message)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ $message }}</div>
                                    @endforeach
                                @endif
                                <form class="" id="form-password-change"  method="POST" action="{{ route("add_currency") }}">
                                    @csrf
                                    <h6 class="mb_20">Add Currency</h6>
                                    <div class="tf-field style-1 mb_15">
                                        <input name="currencyName" placeholder="USD" class="tf-field-input tf-input" placeholder=" " type="text" id="property1" required >
                                        <label class="tf-field-label fw-4 text_black-2" for="property1">Currency Name</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input name="currencySymbol" class="tf-field-input tf-input" placeholder="$" type="text" id="property1" required>
                                        <label class="tf-field-label fw-4 text_black-2" for="property1">Currency Symbol</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input value="{{old("subcategoryName")}}" step="any" name="cost" placeholder="3.75" required class="tf-field-input tf-input" type="number" id="property1">
                                        <label class="tf-field-label fw-4 text_black-2" for="property1">Currency Cost( Cost in default currency )</label>
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
                                    <th  style="text-align: left">Currency</th>
                                    <th  style="text-align: left">Price</th>
                                    <th  style="text-align: left">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($currencies as $currency => $currencydata)
                                    <tr class="tf-cart-item file-delete">
                                        <td style="text-align: left">{{ $currency }}</td>
                                        <td style="text-align: left">{{  $currencydata->cost }}</td>
                                        <td style="text-align: left">
                                            <form action="{{route("delete_currency")}}" method="post">
											@csrf
											<input type="hidden" name="item_id" value="{{$currency}}"> 
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