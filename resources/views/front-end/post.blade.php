@section('title', $name)
@extends('layouts.front-end')

@section('content')
<div class="wrapper">
    <div class="content home">
      

        <div class="sub-business">
      
            @foreach($getdata as $key => $value)
                <div class="sub-list who-we-are">
                    <div class="container">
                        <div class="row">
                            <div class="detail col-sm-5 col-xs-12 fadeInDown">
                                <div class="article">
                                    <img  src="{{url($value->images)}}">
                                </div>
                            </div>
                            <div class="desc col-sm-7 col-xs-12 fadeInDown">
                                <div class="article post-date">
                                    <h3>{{$value->title}}</h3>
                                    <ul>
                                        <li><span>Post By:</span> {{$value->name}}</li>
                                        <li><span>Date:</span> {{$value->created_at}}</li>
                                    </ul>                                    
                                    <p>{{$value->description}}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach   
          
        </div>


    </div>
</div>
@stop