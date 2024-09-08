@extends("en.store.layout")
@section("content")
       <!-- page-title -->
       <div class="tf-page-title style-2">
        <div class="container-full">
            <div class="heading text-center">Register</div>
        </div>
    </div>
    <!-- /page-title -->

    <section class="flat-spacing-10">
        <div class="container">
            <div class="form-register-wrap">
                <div class="flat-title align-items-start gap-0 mb_30 px-0">
                    @if($errors->any())
						@foreach ($errors->all(':message') as $message)
							<div class="alert alert-danger alert-dismissible fade show w-100" role="alert"> {{ $message }}</div>
						@endforeach
					@endif
                    <h5 class="mb_18">Register</h5>
                    <p class="text_black-2">Sign up for early Sale access plus tailored new arrivals, trends and promotions.</p>
                </div>
                <div>
                    <form class="" id="register-form" action="{{route("register")}}" method="post" accept-charset="utf-8" data-mailchimp="true">
                        @csrf
                        <div class="tf-field style-1 mb_15">
                            <input class="tf-field-input tf-input" placeholder=" " type="text" id="property1" name="name" value="{{old("name")}}" required>
                            <label class="tf-field-label fw-4 text_black-2" for="property1">Name *</label>
                        </div>
                        
                        <div class="tf-field style-1 mb_15">
                            <input class="tf-field-input tf-input" placeholder=" " type="email" id="property3" name="email" value="{{old("email")}}" required>
                            <label class="tf-field-label fw-4 text_black-2" for="property3">Email *</label>
                        </div>
                        <div style="display:flex;width:100%">

                            <div class="tf-field style-1 mb_15" style="width:30%">
                                <input class="tf-field-input tf-input" placeholder="971" type="number" id="property4" name="countryCode" value="{{old("countryCode")}}" required>
                                <label class="tf-field-label fw-4 text_black-2" for="property4">Country Code *</label>
                            </div>
                            <div class="tf-field style-1 mb_15" style="width:70%">
                                <input class="tf-field-input tf-input" placeholder="5...." type="number" id="property3" name="number" value="{{old("number")}}" required>
                                <label class="tf-field-label fw-4 text_black-2" for="property3">Number *</label>
                            </div>
                        </div>
                        <div class="tf-field style-1 mb_30">
                            <input class="tf-field-input tf-input" placeholder=" " type="password" id="property4" name="password" value="{{old("password")}}" required>
                            <label class="tf-field-label fw-4 text_black-2" for="property4">Password *</label>
                        </div>
                        <div class="tf-field style-1 mb_30">
                            <input class="tf-field-input tf-input" placeholder=" " type="password" id="property4" name="password_confirmation" required>
                            <label class="tf-field-label fw-4 text_black-2" for="property4">Confirm Password *</label>
                        </div>
                        <div class="mb_20">
                            <button type="submit" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Register</button>
                        </div>
                        <div class="text-center">
                            <a href="{{route("login")}}" class="tf-btn btn-line">Already have an account? Log in here<i class="icon icon-arrow1-top-left"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection