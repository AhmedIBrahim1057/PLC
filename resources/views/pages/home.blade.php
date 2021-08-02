@extends('../app')

@section('content')
<div class="slider-container rev_slider_wrapper" style="height: 800px;">
    <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 800, 'responsiveLevels': [4096,1200,992,500], 'navigation' : {'arrows': { 'enable': false }, 'bullets': {'enable': true, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}">
        <ul>
            <li data-transition="fade" class="slide-overlay slide-overlay-level-7">
                <img src="{{ asset('FrontendFiles/img/slides/slide-corporate-4-1.jpg') }}"  
                    alt=""
                    data-bgposition="center center" 
                    data-bgfit="cover" 
                    data-bgrepeat="no-repeat" 
                    class="rev-slidebg">

                <div class="tp-caption"
                    data-x="center" data-hoffset="['-150','-150','-150','-240']"
                    data-y="center" data-voffset="['-110','-110','-110','-135']"
                    data-start="1000"
                    data-transform_in="x:[-300%];opacity:0;s:500;"
                    data-transform_idle="opacity:0.2;s:500;"><img src="{{ asset('FrontendFiles/img/slides/slide-title-border.png') }}" alt=""></div>

                <div class="tp-caption text-color-light font-weight-normal"
                    data-x="center"
                    data-y="center" data-voffset="['-110','-110','-110','-135']"
                    data-start="700"
                    data-fontsize="['22','22','22','40']"
                    data-lineheight="['25','25','25','45']"
                    data-transform_in="y:[-50%];opacity:0;s:500;">Let Me Learn</div>

                <div class="tp-caption"
                    data-x="center" data-hoffset="['150','150','150','240']"
                    data-y="center" data-voffset="['-110','-110','-110','-135']"
                    data-start="1000"
                    data-transform_in="x:[300%];opacity:0;s:500;"
                    data-transform_idle="opacity:0.2;s:500;"><img src="{{ asset('FrontendFiles/img/slides/slide-title-border.png') }}" alt=""></div>

                <h1 class="tp-caption font-weight-extra-bold text-color-light negative-ls-2"
                    data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                    data-x="center"
                    data-y="center" data-voffset="['-60','-60','-60','-85']"
                    data-fontsize="['50','50','50','90']"
                    data-lineheight="['55','55','55','95']">Personal Learning Coach</h1>

                <div class="tp-caption font-weight-light text-center"
                    data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-x="center"
                    data-y="center" data-voffset="['0','0','0','-25']"
                    data-fontsize="['18','18','18','50']"
                    data-lineheight="['29','29','29','40']"
                    style="color: #b5b5b5;">Powered by the Let Me Learn Process®.</div>

                <a class="tp-caption btn btn-light-2 btn-outline btn-rounded font-weight-semibold"
                    data-frames='[{"delay":4500,"speed":2000,"frame":"0","from":"opacity:0;y:50%;","to":"o:1;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                    data-hash
                    data-hash-offset="85"
                    href="#main"
                    data-x="center" data-hoffset="0"
                    data-y="center" data-voffset="['100','100','100','75']"
                    data-whitespace="nowrap"	
                    data-fontsize="['15','15','15','33']"	
                    data-paddingtop="['15','15','15','40']"
                    data-paddingright="['45','45','45','110']"
                    data-paddingbottom="['15','15','15','40']"				 
                    data-paddingleft="['45','45','45','110']">GET STARTED NOW!</a>
                
            </li>
            {{-- <li data-transition="fade" class="slide-overlay slide-overlay-level-7">
                <img src="{{ asset('FrontendFiles/img/slides/slide-corporate-4-2.jpg') }}"  
                    alt=""
                    data-bgposition="center center" 
                    data-bgfit="cover" 
                    data-bgrepeat="no-repeat" 
                    class="rev-slidebg">

                <div class="tp-caption"
                    data-x="center" data-hoffset="['-115','-115','-115','-185']"
                    data-y="center" data-voffset="['-110','-110','-110','-135']"
                    data-start="1000"
                    data-transform_in="x:[-300%];opacity:0;s:500;"
                    data-transform_idle="opacity:0.2;s:500;"><img src="{{ asset('FrontendFiles/img/slides/slide-title-border.png') }}" alt=""></div>

                <div class="tp-caption text-color-light font-weight-normal"
                    data-x="center"
                    data-y="center" data-voffset="['-110','-110','-110','-135']"
                    data-start="700"
                    data-fontsize="['22','22','22','40']"
                    data-lineheight="['25','25','25','45']"
                    data-transform_in="y:[-50%];opacity:0;s:500;">WE ARE DESIGN</div>

                <div class="tp-caption"
                    data-x="center" data-hoffset="['115','115','115','185']"
                    data-y="center" data-voffset="['-110','-110','-110','-135']"
                    data-start="1000"
                    data-transform_in="x:[300%];opacity:0;s:500;"
                    data-transform_idle="opacity:0.2;s:500;"><img src="{{ asset('FrontendFiles/img/slides/slide-title-border.png') }}" alt=""></div>

                <div class="tp-caption font-weight-extra-bold text-color-light negative-ls-2"
                    data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                    data-x="center"
                    data-y="center" data-voffset="['-60','-60','-60','-85']"
                    data-fontsize="['50','50','50','90']"
                    data-lineheight="['55','55','55','95']">SPECIALISTS</div>

                <div class="tp-caption font-weight-light text-center"
                    data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-x="center"
                    data-y="center" data-voffset="['-10','-10','-10','-25']"
                    data-fontsize="['18','18','18','50']"
                    data-lineheight="['29','29','29','40']"
                    style="color: #b5b5b5;">Designers thinking outside the box, learn more about us.</div>

                <a class="tp-caption btn btn-light-2 btn-outline btn-rounded font-weight-semibold"
                    data-frames='[{"delay":2500,"speed":2000,"frame":"0","from":"opacity:0;y:50%;","to":"o:1;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                    data-hash
                    data-hash-offset="85"
                    href="#main"
                    data-x="center" data-hoffset="0"
                    data-y="center" data-voffset="['70','70','70','45']"
                    data-whitespace="nowrap"	
                    data-fontsize="['15','15','15','33']"	
                    data-paddingtop="['15','15','15','40']"
                    data-paddingright="['45','45','45','110']"
                    data-paddingbottom="['15','15','15','40']"				 
                    data-paddingleft="['45','45','45','110']">GET STARTED NOW!</a>
                
            </li> --}}
        </ul>
    </div>
</div>
{{-- <section id="intro" class="section section-no-border section-angled bg-light pt-5 pb-5 m-0">
    <div class="section-angled-layer-bottom section-angled-layer-increase-angle bg-color-light-scale-1" style="padding: 21rem 0;"></div>
    <div class="container pb-5" style="min-height: 1000px;">
        <div class="row mb-5 pb-lg-3 counters">
            <div class="col-lg-10 text-center offset-lg-1">
                <h2 class="font-weight-bold text-9 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-duration="750" data-plugin-options="{'accY': -200}">The Perfect Template for<br>Beginners or Professionals</h2>
                <p class="sub-title text-primary text-4 font-weight-semibold positive-ls-2 mt-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750">YOUR WEBSITE TO <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-2 highlighted-word-animation-1 highlighted-word-animation-1-no-rotate alternative-font-4 font-weight-semibold line-height-2 pb-2">A NEW LEVEL</span></p>
                <p class="text-1rem text-color-default negative-ls-05 pt-3 pb-4 mb-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-appear-animation-duration="750">PLC is simply a better choice for your new website design. The template is several years among the most popular in the world, being constantly improved and following the trends of design and best practices of code. Your search for the best solution is over, get your own copy and join tens of thousands of happy customers.</p>
            </div>
            <div class="col-sm-6 col-lg-4 offset-lg-2 counter mb-5 mb-md-0">
                <div class="appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="750" data-appear-animation-duration="750">
                    <h3 class="font-weight-extra-bold text-14 line-height-1 mb-2" data-to="80" data-append="+">0</h3>
                    <label class="font-weight-semibold negative-ls-1 text-color-dark mb-0">Included Demos</label>
                    <p class="text-color-grey font-weight-semibold pb-1 mb-2">600+ HTML FILES</p>
                    <p class="mb-0"><a href="#demos" data-hash data-hash-offset="120" class="text-color-primary d-flex align-items-center justify-content-center text-4 font-weight-semibold text-decoration-none">VIEW DEMOS <i class="fas fa-long-arrow-alt-right ml-2 text-4 mb-0"></i></a></p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 counter divider-left-border">
                <div class="appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="750" data-appear-animation-duration="750">
                    <h3 class="font-weight-extra-bold text-14 line-height-1 mb-2" data-to="35" data-append="K+">0</h3>
                    <label class="font-weight-semibold negative-ls-1 text-color-dark mb-0">Websites Using PLC HTML</label>
                    <p class="text-color-grey font-weight-semibold pb-1 mb-2">100K+ IN ALL VERSIONS</p>
                    <p class="mb-0"><a href="https://themeforest.net/item/PLC-responsive-html5-template/4106987" class="text-color-primary d-flex align-items-center justify-content-center text-4 font-weight-semibold text-decoration-none" target="_blank">BUILD WEBSITE <i class="fas fa-long-arrow-alt-right ml-2 text-4 mb-0"></i></a></p>
                </div>
            </div>
        </div>
        <div class="intro row align-items-center justify-content-center justify-content-md-start">
            <div class="col-3 pr-0 pl-3 z-index-2">
                <img src="{{ asset('FrontendFiles/img/lazy.png') }}" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/intro2.jpg" class="img-fluid border border-width-10 border-color-light box-shadow-3 rounded d-none d-md-block appear-animation" alt="Screenshot 2" data-appear-animation="fadeInUp" data-appear-animation-delay="600">
                <div class="position-absolute d-none d-md-flex align-items-end appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="900" style="bottom: -60px; right: -90px;">
                    <span class="arrow hlt" style="margin-right: -70px;"></span>
                    <strong class="text-color-dark mb-4 pb-3">modern designs!</strong>
                </div>
            </div>
            <div class="col-11 col-md-9 pl-0 pr-5 pb-5 pb-md-0 mb-5 mb-md-0">
                <div class="intro2 pt-5 pt-md-0 mt-5 mt-lg-0 appear-animation pr-5" data-appear-animation="fadeInUp" data-appear-animation-delay="400"><img src="{{ asset('FrontendFiles/img/lazy.png') }}" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/intro1.jpg" class="img-fluid box-shadow-3 position-relative z-index-1 rounded" alt="Screenshot 1" style="left: -110px;"></div>
                <div class="intro3 z-index-3 position-absolute appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="800" style="top: 20%; right: 4%;">
                    <img src="{{ asset('FrontendFiles/img/lazy.png') }}" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="img/landing/intro3.jpg" class="img-fluid border border-width-10 border-color-light box-shadow-3 rounded" alt="Screenshot 3">
                    <div class="position-absolute d-none d-md-flex align-items-end appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100" style="bottom: -135px; right: -20px;">
                        <strong class="text-color-dark mb-3">a lot of demos!</strong>
                        <span class="arrow hru"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection