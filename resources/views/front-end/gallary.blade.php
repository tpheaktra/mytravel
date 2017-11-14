@section('title', 'gallary')
@extends('layouts.front-end')

@section('content')

<div class="wrapper">
    <div class="content home">

        <div class="section galleries">
            <div class="container">        
                <div class="image-wrapper">
                    <div class="content">
                        <h2>Gal<span>lery</span></h2>      
                    </div>                
                    <div class="row">
                        <div class="message">
                            <div class="inner-message">
                                <div class="complete">
                                   
                                   @foreach($getdata as $key => $value)
                                        <div class="col-xs-12 col-sm-6 col-md-4">       
                                            <div class="image">
                                                <a href="{{url($value->images)}}" class="picture">
                                                    <img src="{{url($value->images)}}"/>
                                                    <div class="mask">
                                                        <h3>{{$value->title}}</h3>
                                                        <p>{{ substr($value->description,0,80)}}...</p>
                                                    </div>
                                                </a>                                        
                                            </div>
                                        </div><!-- col-xs-12 col-sm-6 col-md-4 -->
                                    @endforeach


                                </div>
                            </div>
                            <p>please read more gallery</p>
                            <div class="see-more read-mores collapsed1">Real More</div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>


    </div>
</div>
@stop