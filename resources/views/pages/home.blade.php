@extends('../app')

@section('content')
{{-- Slider  --}}
<div id="slider-section" class="slider-container rev_slider_wrapper" style="height: 800px;">
    <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 800, 'responsiveLevels': [4096,1200,992,500], 'navigation' : {'arrows': { 'enable': false }, 'bullets': {'enable': true, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}">
        <ul>
            <li data-transition="fade" class="slide-overlay slide-overlay-level-7">
                <img src="{{ asset('FrontendFiles/img/custom/banner.jpg') }}"  
                    alt=""
                    data-bgposition="center center" 
                    data-bgfit="cover" 
                    data-bgrepeat="no-repeat" 
                    class="rev-slidebg">

                <div class="tp-caption"
                    data-x="center" data-hoffset="['-120','-150','-150','-220']"
                    data-y="center" data-voffset="['-110','-110','-110','-155']"
                    data-start="1000"
                    data-transform_in="x:[-500%];opacity:0;s:500;"
                    data-transform_idle="opacity:0.2;s:500;"><img src="{{ asset('FrontendFiles/img/slides/slide-title-border.png') }}" alt=""></div>

                <div class="tp-caption text-color-light font-weight-normal"
                    data-x="center"
                    data-y="center" data-voffset="['-110','-110','-110','-155']"
                    data-start="700"
                    data-fontsize="['22','22','22','50']"
                    data-lineheight="['25','25','25','45']"
                    data-transform_in="y:[-50%];opacity:0;s:500;">Let Me Learn</div>

                <div class="tp-caption"
                    data-x="center" data-hoffset="['120','150','150','220']"
                    data-y="center" data-voffset="['-110','-110','-110','-155']"
                    data-start="1000"
                    data-transform_in="x:[300%];opacity:0;s:500;"
                    data-transform_idle="opacity:0.2;s:500;"><img src="{{ asset('FrontendFiles/img/slides/slide-title-border.png') }}" alt=""></div>
                

                <h1 class="tp-caption font-weight-extra-bold text-color-light negative-ls-2"
                    data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                    data-x="center"
                    data-y="center" data-voffset="['-60','-60','-60','-85']"
                    data-fontsize="['50','50','50','60']"
                    data-lineheight="['55','55','55','95']">Personal Learning Coach</h1>

                <div class="tp-caption font-weight-light text-center"
                    data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-x="center"
                    data-y="center" data-voffset="['0','0','0','-15']"
                    data-fontsize="['18','18','18','30']"
                    data-lineheight="['29','29','29','40']"
                    style="color: #b5b5b5;">Powered by the Let Me Learn Process®.</div>

                <a class="tp-caption btn btn-light-2 btn-outline btn-rounded font-weight-semibold"
                    data-frames='[{"delay":2500,"speed":2000,"frame":"0","from":"opacity:0;y:50%;","to":"o:1;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                    data-hash
                    data-hash-offset="85"
                    href="#main"
                    data-x="center" data-hoffset="0"
                    data-y="center" data-voffset="['100','100','100','95']"
                    data-whitespace="nowrap"	
                    data-fontsize="['15','15','15','25']"	
                    data-paddingtop="['15','15','15','40']"
                    data-paddingright="['45','45','45','80']"
                    data-paddingbottom="['15','15','15','40']"				 
                    data-paddingleft="['45','45','45','80']">GET STARTED NOW!</a>
                
            </li>
           
        </ul>
    </div>
</div>

{{-- About Us  --}}
<div class="container py-5" id="about">

    <div class="row pt-5">
        <div class="col">

            {{-- <div class="row text-center pb-5">
                <div class="col-md-9 mx-md-auto">
                    <div class="overflow-hidden mb-3">
                        <h1 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
                            <span>What does the Personal Learning Coach do for me?</span>
                        </h1>
                    </div>
                    <div class="overflow-hidden mb-3">
                        <ul>
                            <li>Gives me a clear picture of myself as a learner</li>
                            <li>Provides me with a Personal Learning Profile that I can share with teachers, peers, and would-be employers.</li>
                            <li>Shows me how I can work more effectively with others.</li>
                            <li>Breaks tasks and assignments down into understandable pieces.</li>
                            <li>Provides me with personalized strategies that guide me to successfully complete the task!</li>
                        </ul>
                    </div>
                </div>
            </div> --}}

            <div class="row mt-3 mb-5">
                <div class="col-md-6 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="800">
                    <h3 class="font-weight-bold text-4 mb-2">What does the Personal Learning Coach do for me?</h3>
                    <ul>
                        <li>Gives me a clear picture of myself as a learner</li>
                        <li>Provides me with a Personal Learning Profile that I can share with teachers, peers, and would-be employers.</li>
                        <li>Shows me how I can work more effectively with others.</li>
                        <li>Breaks tasks and assignments down into understandable pieces.</li>
                        <li>Provides me with personalized strategies that guide me to successfully complete the task!</li>
                    </ul>
                </div>
                <div class="col-md-6 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="800">
                    <h3 class="font-weight-bold text-4 mb-2">How does the Personal Learning Coach work?</h3>
                    <ul>
                        <li>Establish your account.</li>
                        <li>Complete the Learning Connections Inventory (LCI) as prompted.</li>
                        <li>Create a Personal Learning Profile selecting statements that describe you.</li>
                        <li>Share your Personal Learning Profile with others.</li>
                        <li>Input a task or assignment you've been asked to complete</li>
                        <ul>
                            <li>Name the task.</li>
                            <li>Select a category (Reading, Writing, Math, Test-taking)</li
                                ><li>Cut and paste the assignment into the app as directed.</li>
                                <li>Look at the task details and how it is decoded.</li>
                                <li>Select suggested task strategies that work for you.</li>
                                <li>Personalize your strategies and save.</li></ul><li>Get your friends or classmates to establish an account and then build teams by having them share their LCI scores with you!</li>
                            </ul>
                </div>
                
            </div>

        </div>
    </div>

</div>

{{-- Pricing Tablr --}}
<div class="home-intro bg-primary" id="home-intro">
    <div class="container">

        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="font-weight-normal text-6 my-4 text-light"><strong class="font-weight-extra-bold">SELECT &nbsp;YOUR &nbsp;SUBSCRIPTION</strong></h2>
                <p class="small font-weight-light opacity-8">
                    To access the Let Me Learn platform you must either belong to an institution and provide your institution's code OR you can purchase your own subscription with a credit card.
                </p>
                <p class="font-weight-light text-color-light opacity-8 mt-2 small">Individual subscriptions come with a FREE 14-day trial period! You won't be charged until your trial period has ended.</p>
            </div>
        </div>

    </div>
</div>
<section id="pricing" class="parallax section section-text-light section-parallax mt-0 mb-0 pb-5" data-plugin-parallax data-plugin-options="{'speed': -0.5}" data-image-src="{{asset('FrontendFiles/img/custom/parallax.jpg')}}">
    <div class="container py-5 my-5">
        <div class="pricing-table pricing-table-no-gap">
            <div class="col-md-4">
                <div class="plan">
                    <div class="plan-header bg-light py-4">
                        <h3 class="text-color-dark">Individual</h3>
                    </div>
                    <div class="plan-price">
                        <span class="price"><span class="price-unit">$</span>39.99</span>
                        <label class="price-label">PER YEAR</label>
                    </div>
                    <div class="plan-features">
                        <ul>
                            <li>Lorem ipsum dolor sit amet</li>
                            <li>consectetur adipiscing elit</li>
                            <li>Nullam a maximus mauris</li>
                            <li>Etiam porta dolor vitae nibh</li>
                        </ul>
                    </div>
                    <div class="plan-footer">
                        <a href="#" class="btn btn-dark btn-modern btn-outline py-2 px-4">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="plan plan-featured">
                    <div class="plan-header bg-primary py-4">
                        <h3>Student</h3>
                    </div>
                    <div class="plan-price">
                        <span class="price"><span class="price-unit">$</span>14.99</span>
                        <label class="price-label">PER YEAR</label>
                    </div>
                    <div class="plan-features">
                        <ul>
                            <ul>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>consectetur adipiscing elit</li>
                                <li>Nullam a maximus mauris</li>
                                <li>Etiam porta dolor vitae nibh</li>
                            </ul>
                        </ul>
                    </div>
                    <div class="plan-footer">
                        <a href="#" class="btn btn-primary btn-modern py-2 px-4">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="plan">
                    <div class="plan-header bg-light py-4">
                        <h3 class="text-color-dark">institution</h3>
                    </div>
                    <div class="plan-price">
                        <span class="price"><span class="price-unit">Verification Code</span>
                        {{-- <label class="price-label">PER MONTH</label> --}}
                    </div>
                    <div class="plan-features">
                        <ul>
                            <li>Lorem ipsum dolor sit amet</li>
                            <li>consectetur adipiscing elit</li>
                            <li>Nullam a maximus mauris</li>
                            <li>Etiam porta dolor vitae nibh</li>
                        </ul>
                    </div>
                    <div class="plan-footer">
                        <a href="#" class="btn btn-dark btn-modern btn-outline py-2 px-4">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Contact Us  --}}
<div class="container py-5" id="contact">
    <div class="row py-4">
        <div class="col-lg-6">

            <div class="overflow-hidden mb-1">
                <h2 class="font-weight-normal text-7 mt-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200"><strong class="font-weight-extra-bold">Contact</strong> Us</h2>
            </div>
            <div class="overflow-hidden mb-4 pb-3">
                <p class="mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400">Feel free to ask for details, don't save any questions!</p>
            </div>

            <form class="contact-form" action="php/contact-form.php" method="POST">
                <div class="contact-form-success alert alert-success d-none mt-4">
                    <strong>Success!</strong> Your message has been sent to us.
                </div>
            
                <div class="contact-form-error alert alert-danger d-none mt-4">
                    <strong>Error!</strong> There was an error sending your message.
                    <span class="mail-error-message text-1 d-block"></span>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label class="required font-weight-bold text-dark text-2">Full Name</label>
                        <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="required font-weight-bold text-dark text-2">Email Address</label>
                        <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="font-weight-bold text-dark text-2">Subject</label>
                        <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="required font-weight-bold text-dark text-2">Message</label>
                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="8" class="form-control" name="message" required></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <div class="g-recaptcha" data-sitekey="YOUR_RECAPTCHA_SITE_KEY"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <input type="submit" value="Send Message" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                    </div>
                </div>
            </form>

        </div>
        <div class="col-lg-6">

            <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">
                <h4 class="mt-2 mb-1">Our <strong>Office</strong></h4>
                <ul class="list list-icons list-icons-style-2 mt-2">
                    <li><i class="fas fa-map-marker-alt top-6"></i> <strong class="text-dark">Address:</strong> 1234 Street Name, City Name, United States</li>
                    <li><i class="fas fa-phone top-6"></i> <strong class="text-dark">Phone:</strong> (123) 456-789</li>
                    <li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>
                </ul>
            </div>

            <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="950">
                <h4 class="pt-5">Business <strong>Hours</strong></h4>
                <ul class="list list-icons list-dark mt-2">
                    <li><i class="far fa-clock top-6"></i> Monday - Friday - 9am to 5pm</li>
                    <li><i class="far fa-clock top-6"></i> Saturday - 9am to 2pm</li>
                    <li><i class="far fa-clock top-6"></i> Sunday - Closed</li>
                </ul>
            </div>

            {{-- <h4 class="pt-5">Get in <strong>Touch</strong></h4>
            <p class="lead mb-0 text-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}

        </div>

    </div>

</div>
@endsection

@section('js')
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>  
@endsection