@extends("en.store.layout")
@section("content")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
	a{
		
		text-decoration: unset;

	}
</style>
	{{-- <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('assets/images/bg-03.jpg')}}');">
		<h2 class="ltext-105 cl0 txt-center">
			Contact
		</h2>
	</section>	 --}}


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
                <div style="width:100%" class="bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<h4 class="mtext-105 cl2 txt-center p-b-30">FREQUENTLY ASKED QUESTIONS</h4>
					<div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								How do I order prescription lenses?
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                To order medical lenses, you must have a new prescription, and the validit period of the prescription is between 6 to 12 months.. Or you can visit any eye examination laboratory in any optical store.. Then all you have to do is visit our website or one of our authorized distributors to make the prescription.
                              {{-- <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow. --}}
                            </div>
                          </div></div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="heading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapseOne">
								How do I order medical contact lenses?
                            </button>
                          </h2>
                          <div id="collapse2" class="accordion-collapse collapse " aria-labelledby="heading2" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
								To order medical contact lenses, you must have a new prescription that contains a measurement of myopia, measurement of the fundus and hump of the eye, and the validity period of the prescription is between 6 to 12 months.
								In the event that you have not tried contact lenses before, you can follow these steps:
								You can visit any laboratory (or any optical store) to have your eyes checked. Then all you have to do is visit our website or one of our authorized distributors to make the recipe.
								{{-- <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow. --}}
                            </div>
                          </div></div>
                        <div class="accordion-item">
							<h2 class="accordion-header" id="headingOne2">
							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapseOne">
								  
								  How can I order lenses for my new prescription glasses?							
							  </button>
							</h2>
							<div id="collapse3" class="accordion-collapse collapse " aria-labelledby="headingOne2" data-bs-parent="#accordionExample">
							  <div class="accordion-body">
								  To order medical contact lenses, you must have a new prescription that contains a measurement of myopia, measurement of the fundus and hump of the eye, and the validity period of the prescription is between 6 to 12 months.
								  But if you encounter any obstacles in any of the previous steps, you can call +971505572053
								  From Sunday to Thursday from 9 am to
								  How can I get the right size for my glasses frame?
								  We provide on our site many different sizes of frames to suit most face shapes, so you can choose the right one for you by checking the size on the frame from the inside on your previous glasses, and if this is your first time to wear any glasses, you can visit any of the branches  Our partners or any optical distributor near you.
								  {{-- <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow. --}}
							  </div>
							</div>
						  </div>
                        
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapseOne">
								
								How i can change my order							
                            </button>
                          </h2>
                          <div id="collapse4" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
								We are working to deliver your order as quickly as possible, but we will do our best to change your order as well, so you can contact us by phone number +971505572053
								I get the feeling that my prescription lenses do not fit me or have something wrong with them:
								It usually takes a few days for the eye to adapt to the new medical lenses, but in the event that you have not adapted completely to the new lenses, you can contact us by phone: +971505572053
								 And you should have every confidence that the problem is contained and resolved and that it is completely resolved.                              {{-- <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow. --}}
                            </div>
                          </div></div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapseOne">
								When can I receive my order?
                            </button>
                          </h2>
                          <div id="collapse5" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
								Delivery speed depends on the following:
								The type of required lenses, meaning if the lenses will be manufactured specifically for you.. and if there is a prescription for glasses frames that were previously ordered and the lenses need to be manufactured in our lab.
								Baleno Eyewear - The power is in your hands
								Tel: +971505572053
								Email: customer@balenogroup.com
								{{-- <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow. --}}
                            </div>
                          </div></div>

                      </div>
				</div>

            </div>
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Send Us A Message
						</h4>

                        <div class="d-flex flex-wrap">

                            <div class="col-md-6 col-12" style="padding: 1px;">
								<div class="bor8 m-b-20 how-pos4-parent">
									<input class="stext-111 cl2 plh3 size-116 p-l-33 p-r-30" type="text" name="name" placeholder="Your Name" required>
								</div>
							</div>
                           
                            <div class="col-md-6 col-12" style="padding: 1px;">
								<div class="bor8 m-b-20 how-pos4-parent">
									<input class="stext-111 cl2 plh3 size-116 p-l-33 p-r-30" type="email" name="email" placeholder="Your Email" required>
								</div>
							</div>
                           
                        </div>
                 
                        <div class="d-flex flex-wrap">

                            <div class="col-md-6 col-12" style="padding: 1px;">
								<div class="bor8 m-b-20 how-pos4-parent">
									<input class="stext-111 cl2 plh3 size-116 p-l-33 p-r-30" type="text" name="number" placeholder="Your Phone Number" required>
								</div>
							</div>
                           
                            <div class="col-md-6 col-12" style="padding: 1px;">
								<div class="bor8 m-b-20 how-pos4-parent" >
									<input class="stext-111 cl2 plh3 size-116 p-l-33 p-r-30" type="text" name="company" placeholder="Your Company" required>
								</div>
							</div>
                           
                        </div>
                 

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?"></textarea>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Submit
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
                                Address: 310 Badry building - banyas squre -Nife - Dearih - Dubai
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								+971 433 34238
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sale Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								Order@balenogroup.com
							</p>

                            
						</div>
                        <p class="m-t-20">Free standard shipping
                            on all orders.
                            
                            </p>
					</div>
				</div>
			</div>
		</div>
	</section>	

    	<!-- Map -->
	<div class="map">

		{{-- <div class="size-303" id="google_map" data-map-x="25.2694416046143" data-map-y="55.3045883178711" data-pin="{{asset("assets/images/icons/pin.png")}}" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div> --}}
		<div class="size-303" style="
    padding: 38px;
">
            <iframe loading="lazy" src="https://maps.google.com/maps?q=25.2694416046143%2C55.3045883178711&amp;t=m&amp;z=15&amp;output=embed&amp;iwloc=near" title="25.2694416046143,55.3045883178711" aria-label="25.2694416046143,55.3045883178711" style="
    width: 100%;
    height: 100%;
"></iframe>
        </div>
	</div>


	
	
		
@endsection