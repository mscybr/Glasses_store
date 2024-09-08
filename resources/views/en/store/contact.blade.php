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
 <div class="tf-page-title style-2">
    <div class="container-full">
        <div class="heading text-center">Contact Us</div>
    </div>
</div>
<!-- /page-title -->
<!-- map -->
<section class="flat-spacing-9">
    <div class="container">
        <div class="tf-accordion-wrap justify-content-between mb-5">
            <div class="content mx-auto">
                <h5 class="mb_24">FAQs</h5>
                <div class="flat-accordion style-default has-btns-arrow mb_60">
                    <div class="flat-toggle active">
                        <div class="toggle-title active">How do I order prescription lenses?</div>
                        <div class="toggle-content">
                            <p>To order medical lenses, you must have a new prescription, and the validit period of the prescription is between 6 to 12 months.. Or you can visit any eye examination laboratory in any optical store.. Then all you have to do is visit our website or one of our authorized distributors to make the prescription.</p>
                        </div>
                    </div>
                    <div class="flat-toggle ">
                        <div class="toggle-title ">How do I order medical contact lenses?</div>
                        <div class="toggle-content">
                            <p>To order medical contact lenses, you must have a new prescription that contains a measurement of myopia, measurement of the fundus and hump of the eye, and the validity period of the prescription is between 6 to 12 months.</p>
                        </div>
                    </div>
                    <div class="flat-toggle ">
                        <div class="toggle-title ">How can I order lenses for my new prescription glasses?</div>
                        <div class="toggle-content">
                            <p>To order medical contact lenses, you must have a new prescription that contains a measurement of myopia, measurement of the fundus and hump of the eye, and the validity period of the prescription is between 6 to 12 months.
                                In the event that you have not tried contact lenses before, you can follow these steps:
                                 You can visit any laboratory (or any optical store) to have your eyes checked. Then all you have to do is visit our website or one of our authorized distributors to make the recipe.</p>
                        </div>
                    </div>
                    <div class="flat-toggle ">
                        <div class="toggle-title ">How can I order lenses for my new prescription glasses?</div>
                        <div class="toggle-content">
                            <p>To order medical contact lenses, you must have a new prescription that contains a measurement of myopia, measurement of the fundus and hump of the eye, and the validity period of the prescription is between 6 to 12 months.
                                But if you encounter any obstacles in any of the previous steps, you can call +971505572053
                                From Sunday to Thursday from 9 am to
                                How can I get the right size for my glasses frame?
                                We provide on our site many different sizes of frames to suit most face shapes, so you can choose the right one for you by checking the size on the frame from the inside on your previous glasses, and if this is your first time to wear any glasses, you can visit any of the branches  Our partners or any optical distributor near you.</p>
                        </div>
                    </div>
                    <div class="flat-toggle ">
                        <div class="toggle-title ">How can I change my order</div>
                        <div class="toggle-content">
                            <p>We are working to deliver your order as quickly as possible, but we will do our best to change your order as well, so you can contact us by phone number +971505572053
                                I get the feeling that my prescription lenses do not fit me or have something wrong with them:
                                It usually takes a few days for the eye to adapt to the new medical lenses, but in the event that you have not adapted completely to the new lenses, you can contact us by phone: +971505572053
                                 And you should have every confidence that the problem is contained and resolved and that it is completely resolved.</p>
                        </div>
                    </div>
                    <div class="flat-toggle ">
                        <div class="toggle-title ">How can I order lenses for my new prescription glasses?</div>
                        <div class="toggle-content">
                            <p>Delivery speed depends on the following:
                                The type of required lenses, meaning if the lenses will be manufactured specifically for you.. and if there is a prescription for glasses frames that were previously ordered and the lenses need to be manufactured in our lab.
                                Baleno Eyewear - The power is in your hands
                                 Tel: +971505572053
                               Email: customer@balenogroup.com<p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tf-grid-layout gap-0 lg-col-2">
            <div class="w-100">
                <iframe src="https://maps.google.com/maps?q=25.2694416046143%2C55.3045883178711&amp;t=m&amp;z=15&amp;output=embed&amp;iwloc=near" width="100%" height="894" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="tf-content-left has-mt">
                <div class="sticky-top">
                    <h5 class="mb_20">Visit Our Store</h5>
                    <div class="mb_20">
                        <p class="mb_15"><strong>Address</strong></p>
                        <p>310 Badry building - banyas squre -Nife - Dearih - Dubai</p>
                    </div>
                    <div class="mb_20">
                        <p class="mb_15"><strong>Phone</strong></p>
                        <p>+97143334238</p>
                    </div>
                    <div class="mb_20">
                        <p class="mb_15"><strong>Email</strong></p>
                        <p>Order@balenogroup.com</p>
                    </div>
                    <div class="mb_36">
                        <p class="mb_15"><strong>Support Availability</strong></p>
                        {{-- <p class="mb_15">Our store has re-opened for shopping, </p> --}}
                        <p>24/7</p>
                    </div>
                    <div>
                        <ul class="tf-social-icon d-flex gap-20 style-default">
                            <li><a href="#" class="box-icon link round social-facebook border-line-black"><i class="icon fs-14 icon-fb"></i></a></li>
                            <li><a href="#" class="box-icon link round social-twiter border-line-black"><i class="icon fs-12 icon-Icon-x"></i></a></li>
                            <li><a href="#" class="box-icon link round social-instagram border-line-black"><i class="icon fs-14 icon-instagram"></i></a></li>
                            <li><a href="#" class="box-icon link round social-tiktok border-line-black"><i class="icon fs-14 icon-tiktok"></i></a></li>
                            <li><a href="#" class="box-icon link round social-pinterest border-line-black"><i class="icon fs-14 icon-pinterest-1"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /map -->
<!-- form -->
<section class="bg_grey-7 flat-spacing-9">
    <div class="container">
        <div class="flat-title">
            <span class="title">Get in Touch</span>
            <p class="sub-title text_black-2">If you’ve got great products your making or looking to work with us then drop us a line.</p>
        </div>
        <div>
            <form class="mw-705 mx-auto text-center form-contact" id="contactform" action="./contact/contact-process.php" method="post">
                <div class="d-flex gap-15 mb_15">
                    <fieldset class="w-100">
                        <input type="text" name="name" id="name" required placeholder="Name *"/>
                    </fieldset>
                    <fieldset class="w-100">
                        <input type="email" name="email" id="email" required placeholder="Email *"/>
                    </fieldset>
                </div>
                <div class="mb_15">
                    <textarea placeholder="Message" name="message" id="message" required cols="30" rows="10"></textarea>
                </div>
                <div class="send-wrap">
                    <button type="submit" class="tf-btn radius-3 btn-fill animate-hover-btn justify-content-center">Send</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- /form -->

@endsection