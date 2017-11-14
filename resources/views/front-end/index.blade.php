@section('title', 'home')
@extends('layouts.front-end')

@section('content')

<div class="wrapper">
    <div class="content home">

       

        <div class="section container">
            <div class="welcome-message">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Welcome</h2>
                         <?php echo htmlspecialchars_decode(stripslashes($home[0]->welcome)); ?>
                    </div>
                </div>
            </div>
        </div>

       


          <div class="section customer-branner">
            <div class="container">
                <h2>General Information</h2>
                <div class="row">
                   
                       <?php echo htmlspecialchars_decode(stripslashes($home[0]->information)); ?>
                 
                </div>
            </div>
        </div>




        <div class="section container">
            <div class="new-update">
                <h2>We Are A Travel Agency</h2>
                <div class="row">
                 	 <?php echo htmlspecialchars_decode(stripslashes($home[0]->we_are)); ?>
                </div>
            </div>
        </div>




        <div class="section client-speech parallaxs parallax-1">
            <div class="mask-seed-product"></div>
            <div class="container">
                <h2>Our Team</h2>
                <div class="text-slider-client-speech">


                @foreach($ourteam as $key => $value)
                    <div>
                        <div class="client-img">
                            <img src="{{url($value->images)}}">
                        </div>
                        <h3>{{$value->name}}</h3>
                        <h4>{{$value->position}}</h4>
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-10">
                                <blockquote>
                                    <p>
                                        {{$value->description}}
                                    </p>
                                </blockquote>
                            </div>
                        </div>
                    </div>

                @endforeach

                </div>
            </div>
        </div>


    </div>
</div>

@stop