<!DOCTYPE html>
@langrtl
<html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
    @endlangrtl
    <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="preload" href="https://fonts.gstatic.com/s/quicksand/v9/6xKtdSZaM9iE8KbpRA_hJVQNcOM.woff2" as="font" type="font/woff" crossorigin="anonymous" >
        <link rel="preload" href="https://fonts.gstatic.com/s/quicksand/v9/6xKtdSZaM9iE8KbpRA_hK1QN.woff2" as="font" type="font/woff" crossorigin="anonymous" >
        <link rel="preload" href="https://fonts.gstatic.com/s/quicksand/v9/6xKodSZaM9iE8KbpRA_pkHEYQML_B48.woff2" as="font" type="font/woff" crossorigin="anonymous" >
        <link rel="preload" href="https://fonts.gstatic.com/s/quicksand/v9/6xKodSZaM9iE8KbpRA_pkHEYQcL_B48.woff2" as="font" type="font/woff" crossorigin="anonymous" >
        <link rel="preload" href="https://fonts.gstatic.com/s/quicksand/v9/6xKodSZaM9iE8KbpRA_pkHEYT8L_.woff2" as="font" type="font/woff" crossorigin="anonymous" >
        <link rel="preload" href="/fonts/Jellee-Roman.otf" as="font" type="font/woff" crossorigin="anonymous" >
        <link rel="preconnect" href="http://support.enz.com.ph" crossorigin="anonymous">
        <link rel="preconnect" href="https://l.sharethis.com" crossorigin="anonymous">
        <link rel="preconnect" href="https://app.getresponse.com" crossorigin="anonymous">
        <link rel="preconnect" href="https://www.gstatic.com" crossorigin="anonymous">

        @include('frontend.includes.meta-tags')

        @stack('meta')
    
        @php
            $favicon = asset(setting('site-fav-icon'));
        @endphp

        <link rel="apple-touch-icon" href="{{ $favicon }}">
        <link rel="icon" type="image/png" href="{{ $favicon }}"/>
        <link rel="apple-touch-icon" href="/misc/favicon.ico">
        <link rel="icon" type="image/png" href="/misc/favicon.ico"/>
        <style>
            @font-face{font-display:swap;font-family:Quicksand;font-style:normal;font-weight:400;src:local('Quicksand Regular'),local('Quicksand-Regular'),url(https://fonts.gstatic.com/s/quicksand/v9/6xKtdSZaM9iE8KbpRA_hJFQNcOM.woff2) format('woff2');unicode-range:U+0102-0103,U+0110-0111,U+1EA0-1EF9,U+20AB}@font-face{font-display:swap;font-family:Quicksand;font-style:normal;font-weight:400;src:local('Quicksand Regular'),local('Quicksand-Regular'),url(https://fonts.gstatic.com/s/quicksand/v9/6xKtdSZaM9iE8KbpRA_hJVQNcOM.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-display:swap;font-family:Quicksand;font-style:normal;font-weight:400;src:local('Quicksand Regular'),local('Quicksand-Regular'),url(https://fonts.gstatic.com/s/quicksand/v9/6xKtdSZaM9iE8KbpRA_hK1QN.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-display:swap;font-family:Quicksand;font-style:normal;font-weight:700;src:local('Quicksand Bold'),local('Quicksand-Bold'),url(https://fonts.gstatic.com/s/quicksand/v9/6xKodSZaM9iE8KbpRA_pkHEYQML_B48.woff2) format('woff2');unicode-range:U+0102-0103,U+0110-0111,U+1EA0-1EF9,U+20AB}@font-face{font-display:swap;font-family:Quicksand;font-style:normal;font-weight:700;src:local('Quicksand Bold'),local('Quicksand-Bold'),url(https://fonts.gstatic.com/s/quicksand/v9/6xKodSZaM9iE8KbpRA_pkHEYQcL_B48.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-display:swap;font-family:Quicksand;font-style:normal;font-weight:700;src:local('Quicksand Bold'),local('Quicksand-Bold'),url(https://fonts.gstatic.com/s/quicksand/v9/6xKodSZaM9iE8KbpRA_pkHEYT8L_.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-display:swap;font-family:Jelle;src:url(/fonts/Jellee-Roman.otf)}.page-loader{position:fixed;top:0;left:0;height:100%;width:100%;display:flex;align-items:center;flex-flow:column;justify-content:center;text-align:center;z-index:999;background-color:#fff}.page-loaded .page-loader{opacity:0;visibility:hidden;transition:all ease-in-out .8s}@keyframes  loaderAnim{to{transform:rotate(360deg)}}
        </style>
        <style>
        .ns-message{position:fixed;top:0;left:0;height:100%;width:100%;z-index:9999;display:flex;align-items:center;justify-content:center;padding:15px;color:#3fb1e5;background-color:#fff;text-align:center}.ns-message svg{margin-right:20px}.ns-message path{fill:#3fb1e5;}
        /* .fb_dialog_content iframe {
            right: 110px !important;
        } */
        </style>


        {{-- @can(config('access.users.default_permissions.back_end_view_permission'))
        
        @endcan --}}

        {{-- @include('frontend.includes.widgets.global-critical') --}}

    @stack('before-styles')
        <link rel="preload" href="{{ mix('/css/frontend-core.css') }}" as="style" onload="this.rel='stylesheet'">
        <link rel="preload" href="{{ mix('/css/frontend.css') }}" as="style" onload="this.rel='stylesheet'">
        @if($logged_in_user)
        <link rel="preload" href="{{ mix('/css/frontend-logged.css') }}" as="style" onload="this.rel='stylesheet'">
        @endif
        <noscript>
            <link rel="preload" href="{{ mix('/css/frontend-core.css') }}" as="style" onload="this.rel='stylesheet'">
            <link rel="preload" href="{{ mix('/css/frontend.css') }}" as="style" onload="this.rel='stylesheet'">
        </noscript>
        @stack('after-styles')

    </head>

    <body class="processing-page-load @yield('page_class')">
        <noscript class="ns-message">
            <svg width="100" height="100" enable-background="new 0 0 42.163 42.163" version="1.1" viewBox="0 0 42.163 42.163" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                <path d="m37.364 15.082c-0.993 0-1.229-0.569-0.526-1.271l1.271-1.273c1.173-1.171 1.173-3.068 0-4.241l-4.241-4.242c-1.172-1.172-3.07-1.173-4.243 1e-3 0 0-0.568 0.569-1.271 1.271-0.701 0.702-1.271 0.466-1.271-0.527v-1.8c1e-3 -1.657-1.34-2.997-2.998-3l-6.001 1e-3c-1.659 0-3.002 1.343-3.002 3v1.797c0 0.991-0.569 1.226-1.271 0.525l-1.27-1.27c-1.172-1.171-3.067-1.171-4.242-1e-3l-4.242 4.243c-1.171 1.173-1.173 3.069 1e-3 4.245 0 0 0.569 0.569 1.271 1.272 0.702 0.702 0.466 1.271-0.529 1.271h-1.8c-1.657 0-3 1.343-3 3v6c0 1.657 1.343 3 3 3h1.799c0.993 0 1.229 0.569 0.527 1.271l-1.271 1.271c-1.172 1.172-1.172 3.07 0 4.243l4.242 4.243c1.173 1.171 3.071 1.172 4.244 0 0 0 0.569-0.568 1.27-1.271 0.701-0.701 1.271-0.466 1.271 0.526v1.796c0 1.451 1.029 2.66 2.397 2.939 0.195 0.039 0.399 0.062 0.607 0.062h5.998c1.658-1e-3 3-1.344 3.002-3.001v-1.798s0.569-1.229 1.271-0.527l1.271 1.271c1.173 1.174 3.071 1.174 4.245 2e-3l4.241-4.242c1.172-1.172 1.172-3.072 0-4.245 0 0-0.568-0.567-1.271-1.271-0.701-0.701-0.467-1.271 0.524-1.271h1.795c1.657 0 3-1.343 3-3v-6c0-1.657-1.343-3-3-3 0 1e-3 -0.805 1e-3 -1.798 1e-3zm-16.284 15.834c-5.432 0-9.835-4.402-9.835-9.834s4.403-9.835 9.835-9.835 9.835 4.403 9.835 9.835-4.403 9.834-9.835 9.834z" fill="#4AA498"/>
            </svg>
            {{-- {{app_name()}} works best with Javascript enabled. Please turn on your javascript and reload the page. --}}
        </noscript>
    @include('includes.partials.loader')
    <div id="app" class="main-wrapper ">
        {{-- @include('frontend.includes.admin') --}}
        {{-- @include('includes.partials.logged-in-as') --}}
        @include('frontend.includes.nav')
        <div class="banner-wrapper to-load">
            @yield('banner')
        </div>
        <main id="main" class="to-load o-hidden">
            @include('includes.partials.messages')
            @yield('content')
            @include('frontend.includes.main-footer')
        </main>
        {{-- <button id="scrollTopBtn" class="scrollbutton scroll-bottom d-flex flex-column justify-content-center tc-white fs10" style="cursor: pointer;">
            <i class="fa fa-chevron-up fs20" style="position: absolute;top: 5px;left: 0;right: 0;"></i>
            <i class="fa fa-chevron-up fs13" style="position: absolute;top: 20px;left: 0;right: 0;"></i>
            Back to top
        </button> --}}



        <!-- The Modal -->
{{--           <div class="modal fade" id="downloadModal">
            <div class="modal-dialog">

              <div class="modal-content" style="    border-radius: 1.3rem;">
          
                <div class="modal-header linear-gradient-teal" style="border-top-left-radius: 1.3rem; border-top-right-radius: 1.3rem;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          
                <div class="modal-body linear-gradient-grey" style="border-bottom-left-radius: 1.3rem; border-bottom-right-radius: 1.3rem;">

                    <div class="grwf2-wrapper wf2-embedded" id="grwf2_28404401_2bx84">
                        <iframe data-src="https://app.getresponse.com/site2/download_prospectus?u=BPRi5&amp;webforms_id=BDCRL&amp;v=0" width="460" height="460" sandbox="allow-same-origin allow-forms allow-scripts allow-popups allow-top-navigation" scrolling="no" allowtransparency="true" name="webform_BDCRL" style="border: none; height: 460px; width: 460px;"></iframe>
                    </div>


                </div>
          
              </div>

            </div>

          </div> --}}
        
        <div class="mag-download fixed-bottom text-center">
            <img class="img-fluid mr10" data-src="{{asset('svg/book.svg')}}" alt=""> <p class="fs16 text-white book-title">ENZ Student Guide</p> 

            <button id="downloadbtn" data-toggle="modal" data-target="#downloadModal" class="btn btnview-more text-uppercase">Download now!</button>
            {{-- <a href="#" class="btn btnview-more text-uppercase">Download now!</a> --}}
        </div>


        {{-- <span style="color: #0000FF; text-decoration: underline; cursor: pointer; position: fixed; bottom: 0px; right: 0px; z-index: 1000000;" id="phplive_btn_1480051776" onclick="phplive_launch_chat_0(0)"></span> --}}
    </div>

    <button id="top" class="scrollTop btn" aria-label="Scroll to top">
        <svg xmlns="http://www.w3.org/2000/svg" width="25.073" height="17.63" viewBox="0 0 25.073 17.63">
            <path id="up-arrow" d="M16.884,4.939A.889.889,0,1,0,15.62,6.19L22.028,12.6H.885A.88.88,0,0,0,0,13.483a.89.89,0,0,0,.885.9H22.028l-6.407,6.4a.907.907,0,0,0,0,1.264.885.885,0,0,0,1.264,0l7.924-7.924a.87.87,0,0,0,0-1.251Z" transform="translate(0 -4.674)" fill="#fff"/>
        </svg>
    </button>
    <!-- PRELOADING CSS -->
	<script>
        !function(t){"use strict";t.loadCSS||(t.loadCSS=function(){});var e=loadCSS.relpreload={};if(e.support=function(){var e;try{e=t.document.createElement("link").relList.supports("preload")}catch(t){e=!1}return function(){return e}}(),e.bindMediaToggle=function(t){var e=t.media||"all";function a(){t.addEventListener?t.removeEventListener("load",a):t.attachEvent&&t.detachEvent("onload",a),t.setAttribute("onload",null),t.media=e}t.addEventListener?t.addEventListener("load",a):t.attachEvent&&t.attachEvent("onload",a),setTimeout(function(){t.rel="stylesheet",t.media="only x"}),setTimeout(a,3e3)},e.poly=function(){if(!e.support())for(var a=t.document.getElementsByTagName("link"),n=0;n<a.length;n++){var o=a[n];"preload"!==o.rel||"style"!==o.getAttribute("as")||o.getAttribute("data-loadcss")||(o.setAttribute("data-loadcss",!0),e.bindMediaToggle(o))}},!e.support()){e.poly();var a=t.setInterval(e.poly,500);t.addEventListener?t.addEventListener("load",function(){e.poly(),t.clearInterval(a)}):t.attachEvent&&t.attachEvent("onload",function(){e.poly(),t.clearInterval(a)})}"undefined"!=typeof exports?exports.loadCSS=loadCSS:t.loadCSS=loadCSS}("undefined"!=typeof global?global:this);
    </script>
        <!-- -->

        <script>
            /**
             * Facebook Chat Plugin
             */
            window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v8.0'
            });
            };

            (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

        </script>
    @stack('before-scripts')
 
    {!! script(mix('js/frontend-core.js')) !!}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.1/imagesloaded.pkgd.min.js"></script> --}}
    {{-- <script type="text/javascript" src="/libraries/grid/grid.js"></script> --}}
    {{-- <script type="text/javascript" src="/libraries/tweenmax/ScrollMagic.min.js"></script>
	<script type="text/javascript" src="/libraries/tweenmax/plugins/animation.gsap.min.js"></script>
	<script type="text/javascript" src="/libraries/tweenmax/plugins/animation.velocity.min.js"></script>
	<script type="text/javascript" src="/libraries/tweenmax/plugins/debug.addIndicators.min.js"></script> --}}
    {!! script(mix('js/frontend.js')) !!}

    
    @stack('after-scripts')
    <script async defer src="{{ asset('js/jquery.form.min.js') }}" type="text/javascript"></script>
    <script async defer type="text/javascript">
    (function() {
        // setTimeout(function() {
        //     var phplive_e_1480051776 = document.createElement("script") ;
        //     phplive_e_1480051776.type = "text/javascript" ;
        //     phplive_e_1480051776.async = true ;
        //     phplive_e_1480051776.rel = "preconnect"
        //     phplive_e_1480051776.src = "//support.enz.com.ph/js/phplive_v2.js.php?v=0|1480051776|0|" ;
        //     document.getElementById("phplive_btn_1480051776").appendChild( phplive_e_1480051776 ) ;
        //     $('#phplive_btn_1480051776').css({
        //         'display' : 'block',
        //         'opacity' : 1,
        //         'transition' : 'all ease 300ms'
        //         })
        // },5000)
        setTimeout(function() {
            $(".banner-video").each(function(){
                $(this).attr("src", $(this).data("src"));
            });
        },1000)
    })();
    $(".subscribe-btn").click(function(){
        $("iframe").each(function(){
            $(this).attr("src", $(this).data("src"));
        });
    });
    $("#downloadbtn").click(function(){
        $("iframe").each(function(){
            $(this).attr("src", $(this).data("src"));
        });
    });
    $(document).bind("contextmenu",function(e){
        return false;
    })
    </script>
    {{-- @include('includes.partials.ga') --}}

          <div class="modal fade" id="downloadModal">
            <div class="modal-dialog">

              <div class="modal-content" style="    border-radius: 1.3rem;">
          
                <div class="modal-header linear-gradient-teal" style="border-top-left-radius: 1.3rem; border-top-right-radius: 1.3rem;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          
                <div class="modal-body linear-gradient-grey" style="border-bottom-left-radius: 1.3rem; border-bottom-right-radius: 1.3rem;">
                    
                    <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=BPRi5&amp;webforms_id=BDCRL" data-webform-id="BDCRL" data-wf2url="https://app.getresponse.com/site2/download_prospectus?u=BPRi5&amp;webforms_id=BDCRL&amp;v=0"></script>

                </div>
          
              </div>

            </div>

          </div>





    <!-- The Modal -->
    <div class="modal fade" id="subsModal">
      <div class="modal-dialog">

        <div class="modal-content" style="    border-radius: 1.3rem;">

          <!-- Modal Header -->
          <div class="modal-header linear-gradient-teal" style="border-top-left-radius: 1.3rem; border-top-right-radius: 1.3rem;">
            <button type="reset" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body linear-gradient-grey" style="border-bottom-left-radius: 1.3rem; border-bottom-right-radius: 1.3rem;">

              <div class="grwf2-wrapper wf2-embedded" id="grwf2_21458301_1dh4h">


                <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=BPRi5&amp;webforms_id=BZSR5" data-webform-id="BZSR5" data-wf2url="https://app.getresponse.com/site2/enzpromo_2018?u=BPRi5&amp;webforms_id=BZSR5&amp;v=0"></script>


              </div>

          </div>

        </div>

      </div>

    </div>

        @if(config('services.facebook_chat_plugin.page_id'))
            <div id="fb-root"></div>
            <div class="fb-customerchat" attribution="setup_tool" page_id="{{ config('services.facebook_chat_plugin.page_id') }}"></div>
        @endif

    {{-- <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=BPRi5&webforms_id=BZSR5" data-webform-id="BZSR5"></script> --}}

    </body>
    </html>
