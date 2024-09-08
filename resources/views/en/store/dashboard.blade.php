@extends("en.store.layout")
@section("content")
@php
    $currencies = null;
    if( count(DB::select('SELECT value FROM site_configs WHERE key = "currencies"')) > 0 ){
        $currencies = DB::select('SELECT value FROM site_configs WHERE key = "currencies"')[0]->value;
        $currencies = json_decode($currencies);
    }
    $currency = Cookie::get('currency');
    $selected_currency = [
        "cost" => 1,
        "currencySymbol" => "$"
    ];
    // dd($currency);
    if( $currency !== null && $currencies !== null ){
        $selected_currency = (array)$currencies->{$currency};
    }

    function isRtl($value) {
        $rtlChar = '/[\x{0590}-\x{083F}]|[\x{08A0}-\x{08FF}]|[\x{FB1D}-\x{FDFF}]|[\x{FE70}-\x{FEFF}]/u';
        return preg_match($rtlChar, $value) != 0;
    }
    // ddd(1);
@endphp


        <!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">Addresses</div>
            </div>
        </div>
        <!-- /page-title -->
        
        <!-- page-cart -->
        <section class="flat-spacing-11">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="my-account-nav">
                            {{-- <li><a href="my-account.html" class="my-account-nav-item ">Dashboard</a></li> --}}
                            <li><a href="my-account-orders.html" class="my-account-nav-item">Orders</a></li>
                            <li><span class="my-account-nav-item active">Addresses</span></li>
                            {{-- <li><a href="my-account-edit.html" class="my-account-nav-item">Account Details</a></li> --}}
                            {{-- <li><a href="my-account-wishlist.html" class="my-account-nav-item">Wishlist</a></li> --}}
                            <li><a href="{{route("logout")}}" class="my-account-nav-item">Logout</a></li>
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
                                <form class="" id="form-password-change"  method="POST" action="{{ route("store_billing_address") }}">
                                    @csrf
                                    <h6 class="mb_20">Add new address</h6>
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property1" name="first_name" value="{{old("first_name")}}">
                                        <label class="tf-field-label fw-4 text_black-2" for="property1">First name</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property1" name="last_name" value="{{old("last_name")}}">
                                        <label class="tf-field-label fw-4 text_black-2" for="property1">Last name</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property1" name="country" value="{{old("country")}}">
                                        <label class="tf-field-label fw-4 text_black-2" for="property1">Country</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property1" name="city" value="{{old("city")}}">
                                        <label class="tf-field-label fw-4 text_black-2" for="property1">City</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property1" name="street" value="{{old("street")}}">
                                        <label class="tf-field-label fw-4 text_black-2" for="property1">Street</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property1" name="address" value="{{old("address")}}">
                                        <label class="tf-field-label fw-4 text_black-2" for="property1">Address</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property1" name="phone" value="{{old("phone")}}">
                                        <label class="tf-field-label fw-4 text_black-2" for="property1">Phone</label>
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
                                    <th  style="text-align: left">Name</th>
                                    <th  style="text-align: left">Country</th>
                                    <th  style="text-align: left">City</th>
                                    <th  style="text-align: left">Street</th>
                                    <th  style="text-align: left">Address</th>
                                    <th  style="text-align: left">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($addresses as $item)
                                    <tr class="tf-cart-item file-delete">
                                        <td style="text-align: left">{{ $item->first_name.$item->last_name }}</td>
                                        <td style="text-align: left">{{ $item->country }}</td>
                                        <td style="text-align: left">{{ $item->city }}</td>
                                        <td style="text-align: left">{{ $item->street }}</td>
                                        <td style="text-align: left">{{ $item->address }}</td>
                                        <td style="text-align: left">{{ $item->phone }}</td>
                                        
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