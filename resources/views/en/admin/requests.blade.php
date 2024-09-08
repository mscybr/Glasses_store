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
                            <li><a href="{{route("site_config_form")}}" class="my-account-nav-item">Site Confirgurations</a></li>
                            <li><a href="{{route("product_form")}}" class="my-account-nav-item">Product</a></li>
                            <li><a href="{{route("inventory")}}" class="my-account-nav-item">Inventory</a></li>
                            <li><span class="my-account-nav-item active">Orders</span></li>
                        </ul>
                    </div>
                        <div class="col-lg-9">
                            <table class="tf-table-page-cart">
                                <thead>
                                    <tr>
                                        <th >User</th>
                                        <th >Contact info</th>
                                        <th >Product</th>
                                        <th >Lens</th>
                                        <th >Color</th>
                                        <th >Size</th>
                                        <th >Amount</th>
                                        <th >Price</th>
                                        <th >Total Price</th>
                                        <th >Accept</th>
                                        <th >Reject</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
									<div class="modal fade modalDemo" id="contact-info-{{$order->id}}">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="header">
													<span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
												</div>
												<div class="wrap">
													<div class="tf-product-info-item">
														<div class="content">
															<a>Contact Info</a>
														</div>
													</div>
													<div class="tf-product-info-variant-picker mb_15">
														<div class="variant-picker-label">
															Address: <span class="fw-6 variant-picker-label-value">{{$order->user->billing_addresses[0]}}</span>
														</div>
														<div class="variant-picker-label">
															Number: <span class="fw-6 variant-picker-label-value">{{$order->user->number}}</span>
														</div>
														<div class="variant-picker-label">
															Email: <span class="fw-6 variant-picker-label-value">{{$order->user->email}}</span>
														</div>
													</div>
								
												</div>
											</div>
										</div>
									</div>
                                        <tr class="tf-cart-item file-delete">
                                            <td style="text-align: left">{{ $order->user->email }}</td>
                                            <td style="text-align: left"><a  href="#contact-info-{{$order->id}}" data-bs-toggle="modal">Contact Info</a></td>
                                            <td style="text-align: left">{{ $order->product->name }}</td>
                                            <td style="text-align: left">{{ $order->lens }}</td>
											<td style="text-align: left">{{$order->color}}</td>
											<td style="text-align: left">{{ $order->size }}</td>
											<td style="text-align: left">{{ $order->amount }}</td>
											<td style="text-align: left">{{ $order->price }}</td>
											<td style="text-align: left">{{ $order->price * $order->amount }}</td>
                                            <td >
												<form action="{{route("accept_order")}}" method="post">
													@csrf
													<input type="hidden" name="order_id" value="{{$order->id}}"> 
                                                    <div class="mb_20">
                                                        <button type="submit" value="accept" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Accept</button>
                                                    </div>
												</form>
											</td>
											<td >
												<form action="{{route("reject_order")}}" method="post">
													@csrf
													<input type="hidden" name="order_id" value="{{$order->id}}"> 
                                                    <div class="mb_20">
                                                        <button type="submit" value="reject" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Reject</button>
                                                    </div>
                                                    <div class="tf-field style-1 mb_15">
                                                        <input value="{{old("subcategoryName")}}" name="rejection_message" class="tf-field-input tf-input" placeholder=" " type="text" id="property1" required>
                                                        <label class="tf-field-label fw-4 text_black-2" for="property1">Rejection Message</label>
                                                    </div>
												</form>
											</td>
                                            
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