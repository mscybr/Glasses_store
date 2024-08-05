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

	<div class="container">

		<div class="row checkout__form" >
			<div class="col-12 mt-5">
				
				<h5 >Requests</h5>
				<div class="row">
					<div class="col-12 m-auto">
						<table class="table table-bordered">
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
								<div class="modal fade" id="contact-{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
									<div class="modal-dialog">
									  <div class="modal-content">
										{{-- <div class="modal-header">
										  <h5 class="modal-title fs-5" id="exampleModalLabel">Contact Info</h5>
										</div> --}}
										<div class="modal-body">
											<div class="contact__content">
												<div class="contact__address">
													<h5>Contact info</h5>
													<ul>
														<li>
															<h6><i class="fa fa-map-marker"></i> Address</h6>
															<p>{{$order->user->billing_addresses[0]}}</p>
														</li>
														<li>
															<h6><i class="fa fa-phone"></i> Phone</h6>
															<p><span>{{$order->user->number}}</span></p>
														</li>
														<li>
															<h6><i class="fa fa-headphones"></i> Email</h6>
															<p>{{$order->user->email}}</p>
														</li>
													</ul>
												</div>
												{{-- <div class="contact__form">
													<h5>SEND MESSAGE</h5>
													<form action="#">
														<input type="text" placeholder="Name">
														<input type="text" placeholder="Email">
														<input type="text" placeholder="Website">
														<textarea placeholder="Message"></textarea>
														<button type="submit" class="site-btn">Send Message</button>
													</form>
												</div> --}}
											</div>
										</div>
										<div class="modal-footer">
										  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										</div>
									  </div>
									</div>
								  </div>

									<tr>
											<td class="column-1">
												{{ $order->user->email }}
											</td>
											<td class="column-1">
												<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#contact-{{$order->id}}">Contact</button>
											</td>
											<td class="column-1">
												{{ $order->product->name }}
											</td>
											<td class="column-2">{{ $order->lens }}</td>
											<td class="column-3">{{$order->color}}</td>
											<td class="column-4">{{ $order->size }}</td>
											<td class="column-5">{{ $order->amount }}</td>
											<td class="column-6">{{ $order->price }}</td>
											<td class="column-7">{{ $order->price * $order->amount }}</td>
											<td class="column-8">
												<form action="{{route("delete_product")}}" method="post">
													@csrf
													<input type="hidden" name="item_id" value="{{$order->id}}"> 
													<input type="submit" value="delete" class="btn btn-danger">
												</form>
											</td>
											<td class="column-9">
												<form action="{{route("delete_product")}}" method="post">
													@csrf
													<input type="hidden" name="item_id" value="{{$order->id}}"> 
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
	</div>



	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>	
@endsection