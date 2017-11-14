@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Dashboard/Heroes Banner</h2>      
                </div>

            </div>
        </section>  

        <div class="box"> 
            <div class="content">
                <div class="col-md-12 banner">

                        @if($mess = Session::get('success'))
                            <div class="alert alert-success">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Success!</strong> {{$mess}}
                            </div>
                        @endif

                        @if($mess = Session::get('danger'))
                            <div class="alert alert-danger">
                              <strong>Danger!</strong> {{$mess}}
                            </div>
                        @endif
                         
                        @if ( count( $errors ) > 0 )
						   <div  class="alert alert-danger">
								@foreach ($errors->all() as $error)
								  <div>{{ $error }}</div>
								@endforeach
						   </div>
						@endif

                         <!-- Latest compiled and minified CSS -->
                        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
                        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
                        <form method="POST" action="{{route('banner.insert')}}" enctype="multipart/form-data" id="ImageForm" style="text-align: center;"> 
                            {{ csrf_field() }}
                            <br>
                            <div class="col-sm-12 col-xs-12">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-news thumbnail">
                                        <img src="http://placehold.it/1920x700" id="image-defalt" class="img-circle1" alt="User Image" width="100%" height="300">
                                    </div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
	                                        <span class="fileinput-new ">add banner</span>
	                                        <span class="fileinput-exists">Change banner</span>
	                                        <input type="file" name="images" id="images" accept="image/*">
                                        </span>
                                        @permission('slide-create')
                                        <input type="submit" value="Save" class="btn btn-success" id="submit" disabled="true">
                                        @endpermission
                                    </div>
                                    
                                    <div id="image_message" style="text-align:center"></div>
                                </div>
                                <hr>
                            </div>
                        </form>


                        <h3>List all data</h3>
                         <div class="mywrapper table-responsive">
                             <table class="table" id="datatable">
                                <thead>
                                    <th>banner</th>
                                    <th>Author</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                  @foreach($banner as $key =>$value)
                                  		<tr>
                                  			<td><img width="50px;" height="50px" class="img-circle" src="{{url($value->banner)}}"></td>
                                  			<td>{{$value->name}}</td>
                                  			<td>{{$value->created_at}}</td>
                                  			<td>{{$value->updated_at}}</td>
                                  			<td>
                                  				@permission('slide-edit')
                                  					<a href="">Edit</a> 
                                  				@endpermission
                                  				@permission('slide-delete') 
                                  					|<a href="">Deleted</a>
                                  				@endpermission
                                  			</td>
                                  		</tr>
                                  @endforeach
                                </tbody>
                            </table>
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
                                                
                                                if( (width == 1920 && height == 700) && ((extFile == 'png') || (extFile == 'jpg') || (extFile == 'jpeg'))) {
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
                                                    $('#image-defalt').attr('src', 'http://placehold.it/1920x700');
                                                    $("#image_message").html("<p id='error' style='color:red'>Your image size allow (1920x700)pixcel </p>"+"<p id='error' style='color:red'>Allow File Type: jpeg,png,jpg</p>");
                                                    return false;
                                                }
                                            }
                                        }else {
                                             $('#image-defalt').attr('src', 'http://placehold.it/1920x700');
                                             $('.fileinput-exists').attr('src', 'http://placehold.it/1920x700');
                                             document.getElementById("submit").disabled = true;
                                             $("#image_message").html("<p id='error' style='color:red'>Allow File Type: jpeg,png,jpg</p>");
                                             return false;
                                        }

                                } else {
                                    document.getElementById("submit").disabled = true;
                                    $('#image-defalt').attr('src', 'http://placehold.it/1920x700');
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
