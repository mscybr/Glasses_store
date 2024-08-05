@extends("en.store.layout")
@section("content")

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Lens</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                            @endphp
                            @foreach ($orders as $item)
                                @php
                                    $thumb = explode(",", $item->product->images)[0];
                                    $thumbnail_array = explode("/", $thumb);
                                    $thumbnail = $thumbnail_array[ sizeof($thumbnail_array) -1 ];
                                    $price = $item->price;
                                    $total += $price * $item->amount;
                                @endphp
                                <tr>
                                    <td class="cart__product__item">
                                        <img style="height: 70px;"src="{{asset("storage/images/$thumbnail")}}" alt="">
                                        <div class="cart__product__item__title">
                                            <h6>{{$item->product->name}}</h6>
                                            {{-- <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div> --}}
                                        </div>
                                    </td>
                                    <td class="cart__price">$ {{ $price }}</td>
                                    <td class="cart__quantity">{{ $item->size }}</td>
                                    <td class="cart__quantity">{{ $item->color }}</td>
                                    <td class="cart__quantity">{{ isset($item->lens) ? $item->lens : "" }}</td>
                                    <td class="cart__quantity">
                                        {{ $item->amount }}
                                        {{-- <div class="pro-qty"> --}}
                                            {{-- <input type="text" value="{{ $item->amount }}"> --}}
                                        {{-- </div> --}}
                                    </td>
                                    <td class="cart__total">$ {{ $price * $item->amount }}</td>
                                    <td class="cart__close">
                                        <form action="{{route("delete_cart")}}" method="post">
                                            @csrf
                                            <input type="hidden" name="item_id" value="{{$item->id}}">
                                        <span class="icon_close" onclick="this.parentElement.submit()">
                                        </span>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="#">Continue Shopping</a>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="#"><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-lg-6 ">
                    {{-- <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div> --}}
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>$ {{ $total }}</span></li>
                            <li>Shiping <span>$ {{ $shipping_cost }}</span></li>
                            <li>Total <span>$ {{ $total + $shipping_cost }}</span></li>
                        </ul>
                        <form action="{{route("send_to_check_out")}}" method="post">
							@csrf
							<p class="primary-btn" style="cursor:pointer" href="" onclick="this.parentElement.submit()">
								Proceed to Checkout
							</p>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->
@endsection