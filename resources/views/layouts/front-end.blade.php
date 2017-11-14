<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>My Travel | @yield('title')</title>
    <link rel ="stylesheet" href="{{asset('front-end/css/bootstrap.min.css')}}">
    <link rel="shortcut icon" href="{{url('front-end/images/favicon.png')}} ">
    <script src="{{asset('front-end/scripts/jquery.min.js')}}"></script>

</head>

<body class="preload" style="visibility:hidden;">   

<div class="wrapper">
    <div class="content header">

        <div class="top-social-network">
            <div class="container">
                <div class="pull-right list-social">
                    <ul>
                       <!--  <li><a href=""><img src="{{asset('front-end/images/icon-phone.png')}}">093322910</a></li>
                        <li><a href="mailto:"><img src="{{asset('front-end/images/icon-email.png')}}">siemreaptravel@gmail.com</a></li>
                        <li><a href="https://www.facebook.com/" target="_blank"> Follow Us<img src="{{asset('front-end/images/icon-facebook.png')}}"> </a></li> -->
                        
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login </a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a href="{{ route('dashboard.index')}}">Hi, {{auth::user()->name}}</a></li>
                            <li><a href="{{ route('logout') }}">Logout </a></li>
                        @endif
                       
                    </ul>
                </div>
            </div>
        </div>

        <div class="logo-menu">
            <div class="container">
                <div class="logo">
                    <a href="{{asset('/')}}"><img src="{{url('/'.$home[0]->logo)}}" /></a>
                </div>
                <div class="hamburger">
                    <img src="{{url('front-end/images/navicon.svg')}}"/>
                </div>
                <div class="menu">
                    <ul>
                        @foreach($getmenu as $key => $value)
                            <li><a href="{{ url('page/'.$value->slug) }}">{{$value->name}}</a></li>
                         @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

 <div class="section hero-banner">
        <div class="iAmTest">

           @foreach($getbanner as $key => $value)
                <div class="parallax">
                    <img src="{{url($value->banner)}}">
                </div>
            @endforeach
           
        </div>
    </div>

 @yield('content')
        
<div class="wrapper">
    <div class="content footer">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                   
                    <div class="col-sm-6 col-xs-12">
                        <h2>Contact<span> Us</span></h2>
                        <ul>
                            <li><span><img src="{{asset('front-end/images/call-footer.png')}}" /></span>{{$home[0]->phone}}</li>
                            <li><span><img src="{{asset('front-end/images/sms-infor.png')}}" /></span><a  href="mailto:{{$home[0]->email}}" >{{$home[0]->email}}</a></li>

                            <li><span><img src="{{asset('front-end/images/time.png')}}" /></span>working Day {{$home[0]->working}}</li>
                            <li><span><img src="{{asset('front-end/images/add.png')}}" /></span>{{$home[0]->address}} </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="footer-logo">
                            <a href="{{url('/')}}"><img src="{{url('/'.$home[0]->logo)}}" /></a>
                        </div>
                        <p>
                         {{$home[0]->description}}
                        </p>
                    </div>
                   
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="pull-left developed"><span>&copy; <?php echo date('Y');?> mytravel. All Rights Reserved. </span></div>
                <div class="pull-right developed"><span>Developed by: <a style="color:#fff;" href="http://www.itcenter.asia" target="_blank">Information Teachnology Skill Center</a></span></div>
            </div>
        </div>

    </div>
</div>




<link rel="stylesheet" type="text/css" href="{{asset('front-end/scripts/loading/please-wait.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('front-end/css/style.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('front-end/scripts/slider/nerveSlider.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front-end/scripts/slick/jcslider.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('front-end/scripts/slick/slick.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('front-end/scripts/color-box/jquery.colorbox-min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('front-end/scripts/sidrPackage/jquery.sidr.light.css')}}"/>


<script type="text/javascript" src="{{asset('front-end/scripts/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front-end/scripts/loading/please-wait.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front-end/scripts/slider/resources/jquery-ui-1.10.2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front-end/scripts/slider/jquery.nerveSlider.js')}}"></script>
<script type="text/javascript" src="{{asset('fornt-end/scripts/bootstrap.min.js')}}"></script>

<script type="text/javascript" src="{{asset('front-end/scripts/slick/jcslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front-end/scripts/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front-end/scripts/sidrPackage/jquery.sidr.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front-end/scripts/color-box/jquery.colorbox-min.js')}}"></script>

 
<script language="javascript">
    $(document).ready(function($){
        // Remove class in body from prevent animation effect
        $("body").removeAttr("class style");

        //parallax
        $(window).scroll(function(){
            var currentSP = $(window).scrollTop();
            var calculatedSP = currentSP;
            if (calculatedSP < 0) {
                calculatedSP = 0;
            }
            $(".parallax").css({
                "-webkit-transform":"translateY("+(calculatedSP/2)+"px) translateZ(0)",
                "-moz-transform":"translateY("+(calculatedSP/2)+"px) translateZ(0)",
                "-ms-transform":"translateY("+(calculatedSP/2)+"px) translateZ(0)",
                "-o-transform":"translateY("+(calculatedSP/2)+"px) translateZ(0)",
                "transform":"translateY("+(calculatedSP/2)+"px) translateZ(0)",
            });
        });

        // hamburger menu
        $('.hamburger').sidr({
            name: 'sidr-main',
            source: '.menu',
            side: 'right',
        });

        //slider
        $(".iAmTest").nerveSlider({
            slideTransitionSpeed: 1000,
            slideTransitionEasing: "swing",
            sliderResizable: true,
            slideTransitionDirection: 'left',
        });

       

        //Fix double click on browser safari on i devide
        $('.logo-menu .menu ul li a').on('click touchend', function(e) {
            var el = $(this);
            var link = el.attr('href');
            window.location = link;
        });
    });

    // menu header
    $(function(){
        var lastScrollTop = 0;
        var width = $(window).width();
        $(window).scroll(function(event){
            var st = $(this).scrollTop();
            if (width >= 767){
                if (st > lastScrollTop){
                    if(st>80){
                        $(".header").addClass("smaller");
                        $(".header").addClass("small-logo");
                        $(".header").addClass("signin-form");
                    }
                }else{
                    $(".header").removeClass("smaller");
                    $(".header").removeClass("small-logo");
                    $(".header").removeClass("signin-form");
                }
            }else{
                if (st > lastScrollTop){
                    if(st>20){
                        $(".header").addClass("mobile-smaller");
                    }
                }else{
                    $(".header").removeClass("mobile-smaller");
                }
            }
            lastScrollTop = st;
        });

        //current focue when your click on menu for focus current page
        var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
        $(".logo-menu .menu ul li a").each(function(){
            if($(this).attr("href") == pgurl || $(this).attr("href") == '' ) $(this).addClass("active");
        });


        //current focue when your click on menu for focus current page
        var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
        $(".sidr-inner ul li a").each(function(){
            if($(this).attr("href") == pgurl || $(this).attr("href") == '' ) $(this).addClass("active");
        });
    });

    // client-speech
    $('.text-slider-client-speech').slick({
        dots: true,
        infinite: true,
        speed: 500,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    // collaps term condition
   var width = $(window).width();
    var height = $(window).height();
    
    if (width <= 767) {
        $(".term-condition").colorbox({inline:true,transition:"fade",width:"100%", height:"90%", fixed:true});
        $(".youtube").colorbox({iframe:true, fixed:'true', rel:"youtube", innerWidth:"550px", innerHeight:"309px"});
    } else if (width <= 768) {
        $(".term-condition").colorbox({inline:true,transition:"fade",width:"80%", height:"60%", fixed:true});
        $(".youtube").colorbox({iframe:true, fixed:'true', rel:"youtube", innerWidth:"700px", innerHeight:"394px"});
    } else {
        $(".term-condition").colorbox({inline:true,transition:"fade",width:"55%", height:"70%", fixed:true});
        $(".youtube").colorbox({iframe:true, fixed:'true', rel:"youtube", innerWidth:"800px", innerHeight:"450px"});
    }

// read more
        $(".message").each(function() {         
            var $message  = $(this);
            var $readmore = $(".read-mores", this);
            var $complete = $(".complete", this);
            var $inner    = $(".inner-message", this);
            var mHeight   = $message.height();
            var cInner    = $inner.height();
            var cHeight   = $complete.height();
            $readmore.click(function(){
                setTimeout(function(){
                    if(($readmore).hasClass('collapsed1')){
                        $inner.animate({height: cHeight   },300); 
                        $readmore.removeClass('collapsed1');
                        setTimeout(function(){
                            $readmore.text('មើលបន្ត'); // Read Less
                        },400)
                    }else{
                        $inner.animate({height: cInner + 'px' },300);
                        $readmore.addClass('collapsed1');
                        setTimeout(function(){
                            $readmore.text('មើលតិច'); // Read Less
                        },400)
                    }
                },10);
            });
        });
            
    
    //popup our team
    $(".inline").colorbox({inline:true, fixed:'true', maxWidth:"70%",maxHeight:"60%"});
    $(".picture").colorbox({rel:'group1',fixed:'true', maxWidth:"90%", maxHeight:'90%'});
</script>
</body>
</html>




