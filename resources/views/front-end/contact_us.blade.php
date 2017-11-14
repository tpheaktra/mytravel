@section('title', 'contact_us')
@extends('layouts.front-end')

@section('content')

<div class="wrapper">
    <div class="content contact-us">


       


        <div class="section contact-information">
            <div class="container">
                <h2>Contact <span>Us</span></h2>
                <div class="row">
                    <div class="col-sm-12 social-info">
                        <ul>
                           
                            <li>
                                <div class="thumbnail-info col-xs-12">
                                    <div class="wrapper-infor">
                             
                                        <a href=""><img src="{{asset('front-end/images/faecbook.png')}}"></a>
                                    </div>
                                <p>www.facebook.com</p>
                                </div>
                            </li>

                             <li>
                                <div class="thumbnail-info col-xs-12">
                                    <div class="wrapper-infor">
                                     
                                        <a href=""><img src="{{asset('front-end/images/sms.png')}}"></a>
                                    </div>
                                <p>SMS</p>
                                </div>
                            </li>

                             <li>
                                <div class="thumbnail-info col-xs-12">
                                    <div class="wrapper-infor">
                                     
                                        <a href=""><img src="{{asset('front-end/images/call.png')}}"></a>
                                    </div>
                                <p>085 214 290</p>
                                </div>
                            </li>
                            
                        </ul>
                       
                    </div>
                    
                </div>
            </div>
        </div>


         <div class="section ">
            <div>
                 <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBpMK2C9Z_Ato3BJWbAxIFNpR2sTxfPNNg"></script>
                 <div style='overflow:hidden;height:500px;width:100%;'><div id='gmap_canvas' style='height:500px;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">embed google maps</a></small></div><div><small><a href="http://add-link-exchange.com/">high PR web directory</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(11.5448729,104.89216680000004),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(11.5448729,104.89216680000004)});infowindow = new google.maps.InfoWindow({content:'<strong>Siemreap Travel</strong><br>Phnom Penh Cambodia<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>
        </div>


    </div>
</div>        

@endsection




