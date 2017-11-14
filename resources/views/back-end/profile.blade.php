@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Dashboard/Profile</h2>      
                </div>

            </div>
        </section>  

        <div class="box"> 
            <div class="content">
                <div class="col-md-12">

                        @if($mess = Session::get('success'))
                            <div class="alert alert-success">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Success!</strong> {{$mess}}
                            </div>
                        @endif

                        @if($mess = Session::get('danger'))
                            <div class="alert alert-danger">
                               {{$mess}}
                            </div>
                        @endif


                        @if ( count( $errors ) > 0 )
                           <div  class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                  <div>{{ $error }}</div>
                                @endforeach
                           </div>
                        @endif

                   
                            <div class="row">

                                    <div class="col-sm-12">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#profile">Profile and Information</a></li>
                                            <li><a data-toggle="tab" href="#security">Security</a></li>
                                        </ul>

                                         <div class="tab-content">
                                            <div id="profile" class="tab-pane fade in active">
                                                <!-- Latest compiled and minified CSS -->
                                                <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
                                                <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
                                                <form method="POST" action="{{route('dashboard.editprofile')}}" enctype="multipart/form-data" id="ImageForm">
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="col-sm-4 col-xs-12">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-news thumbnail">
                                                                <img src="{{url('/'.auth::user()->profile)}}" id="image-defalt" class="img-circle1" alt="User Image" width="160" height="160">
                                                            </div>
                                                            <div>
                                                                <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new ">Select Profile</span>
                                                                <span class="fileinput-exists">Change Profile</span>
                                                                <input type="file" name="images" id="images" accept="image/*"></span>
                                                            </div>
                                                            <div id="image_message" style="text-align:center"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-8 col-xs-12">
                                                        <div class="col-sm-12">
                                                             <label>User Name: <span class="color-red">*</span></label>
                                                            <input type="text" name="name" placeholder="input user name" class="form-control" value="{{auth::user()->name}}">
                                                        </div>
                                                        <div class="col-sm-12">
                                                             <label>Email: <span class="color-red">*</span></label>
                                                            <input type="email" name="email" placeholder="input email" class="form-control" value="{{auth::user()->email}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <hr>
                                                        <input type="submit" value="Updated" class="btn btn-success" id="submit">
                                                    </div>
                                                </form>
                                            </div><!-- profile -->

                                            <div id="security" class="tab-pane fade">
                                                 <form action="{{route('dashboard.passwordchage')}}" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                          <label for="name">Old Password</label>
                                                          <input type="password" name="old_password" class="form-control" id="old_password">
                                                    </div>
                                                    <div class="form-group">
                                                          <label for="name">New password</label>
                                                          <input type="password" name="new_password" class="form-control" id="new_password">
                                                    </div>
                                                    <div class="form-group">
                                                          <label for="name">Confirmation Password</label>
                                                          <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                                                 </form>
                                            </div>                                            
                                        </div>
                                  </div>

                            </div>
                     

                        <script type="text/javascript">
                            $("#images").change(function(e) {
                                    e.preventDefault();
                                    $("#image_message").html(''); // To remove the previous error message
                                    var file = this.files[0];
                                    defaultimg = file.name;
                                    var imagefile = file.type;
                                    var match = ["image/jpeg", "image/png", "image/jpg"];
                                    var sizefile = this.files[0].size;
                                    var form = this;
                                    file_check = this.files && this.files[0];

                                    var fileName = document.getElementById("images").value;
                                    var idxDot = fileName.lastIndexOf(".") + 1;
                                    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
                                   
                                console.log(extFile)
                                
                                //check size
                                if (sizefile < 5000000) {
                                        //check width and height
                                        if( file_check ) {
                                            var img = new Image();
                                            img.src = window.URL.createObjectURL( file );
                                            img.onload = function() {
                                                var width = img.naturalWidth,
                                                    height = img.naturalHeight;
                                                window.URL.revokeObjectURL( img.src );
                                                
                                                if( (width == 160 && height ==160) && ((extFile == 'png') || (extFile == 'jpg') || (extFile == 'jpeg'))) {
                                                    $("#image_message").html("<p style='color:#5cb85c'>success</p>");
                                                    var reader = new FileReader();
                                                    //imageIsLoaded
                                                    reader.onload = function(e) {
                                                        $("#images").css("color", "green");
                                                        document.getElementById("submit").disabled = false;
                                                        $('#image-defalt').attr('src', e.target.result);
                                                    };
                                                    reader.readAsDataURL(file);
                                                   
                                                }
                                                else {
                                                    document.getElementById("submit").disabled = true;
                                                    $('#image-defalt').attr('src', '{{url("/back-end/images/160x160.png")}}');
                                                    $("#image_message").html("<p id='error' style='color:red'>Your image size allow (160x160)pixcel </p>"+"<p id='error' style='color:red'>Allow File Type: jpeg,png,jpg</p>");
                                                    return false;
                                                }
                                            }
                                        }else {
                                             $('#image-defalt').attr('src', '{{url("/back-end/images/160x160.png")}}');
                                             $('.fileinput-exists').attr('src', '{{url("/back-end/images/160x160.png")}}');
                                             document.getElementById("submit").disabled = true;
                                             $("#image_message").html("<p id='error' style='color:red'>Allow File Type: jpeg,png,jpg</p>");
                                             return false;
                                        }

                                } else {
                                    document.getElementById("submit").disabled = true;
                                    $('#image-defalt').attr('src', '{{url("/back-end/images/160x160.png")}}');
                                    $("#image_message").html("<p id='error' style='color:red'>Your image more then 1M</p>");
                                    return false;
                                }
                            });
                        </script>


                  
                </div><!-- col-md-12 -->
            </div><!-- content -->
        </div><!-- box -->
    </div><!-- content-wrapper -->
@endsection
