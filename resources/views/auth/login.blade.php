@section('title','Login')
@extends('layouts.login')

@section('content')
<div class="wrapper">
    <div class="login-box">
        <div class="message-erorr">
            @if(Session::has('error'))
                <div class="alert-box success">
                    <p>{{ Session::get('error') }}</p>
                </div>
            @endif
            @if(Session::get('message_bad_user'))
			 	<div class="alert-box success">
                    <p>Your Product is expired date please contact administrator if you are continue!</p>
                </div>
			@endif

   		@if(Session::get('UserDeactive'))
			 	<div class="alert-box success">
            <p>User Inactive!, Please Contact Administrator.</p>
        </div>
			@endif
      		
   		@if(Session::get('worringemail'))
			 	<div class="alert-box success">
            <p>User Not Assign Branches!, Please Contact Administrator.</p>
        </div>
			@endif

      @if(Session::get('SystemNotAssignbranches'))
        <div class="alert-box success">
            <p>User Not Assign Branches!, Please Contact Administrator.</p>
        </div>
      @endif
  
   		@if(Session::get('SystemNotRole'))
			 	<div class="alert-box success">
            <p>System Not Assign Role!</p>
        </div>
			@endif

            @if(Session::get('errorBlog'))
                <div class="alert-box success">
                    <p>Tool many login attempts. Please try again <span  id="timer"></span> secounds!</p>
                </div>

                <script type="text/javascript">                   
                        var count=60;
                        var counter=setInterval(timer, 1000); //1000 will  run it every 1 second
						
                        function timer()
                        {
							
                          count=count-1;
                          if (count <= 0) 
                          {
                             clearInterval(counter);
                             //counter ended, do something here
                            
                             if(count == 0){
                                     
                                        $.ajax({ 
                                             type: "GET",   
                                             url: "getIp",
                                             data: {ip: "<?php echo $_SERVER['REMOTE_ADDR']; ?>" }, 
                                       
                                             dataType:"html",
                                             success: function(data){
                                                 console.log(data);
                                             }
                                         });
                             }
                             return;
                          }
                            document.getElementById("timer").innerHTML=count-1; 
                          //Do code for showing the number of seconds here
                        }
                </script>
            @endif
        </div>


   
          

        <form  role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <label>Your Email</label>
                <input placeholder="Email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                <label>Password</label>
                <input placeholder="Password" id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <input id="remember" type="checkbox" name="remember">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Remember Me </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                </div>
            </div>
            <a href="{{ url('/password/reset') }}?<?= csrf_token() ?>&&<?= csrf_token() ?>?<?= csrf_token() ?>">Forget Your Password?</a><br>
        </form>
    </div>
</div>
@endsection