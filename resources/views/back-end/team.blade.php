@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Dashboard/Our Team</h2>      
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
                        <form method="POST" action="{{route('team.insert')}}" enctype="multipart/form-data" id="ImageForm" class="form-group" style="text-align: center;">
                            {{ csrf_field() }}
                            <br>
                            <div class="col-sm-12 col-xs-12">

                                    <div class="col-sm-3">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-news thumbnail">
                                                <img src="http://placehold.it/150x150" id="image-defalt" class="img-circle1" alt="User Image" width="100%" height="150">
                                            </div>
                                            <div>
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new ">add profile</span>
                                                    <span class="fileinput-exists">Change profile</span>
                                                    <input type="file" name="images" id="images" accept="image/*">
                                                </span>
                                            </div>
                                            <div id="image_message" style="text-align:center"></div>
                                        </div>
                                    </div>
         

                                    <div class="col-sm-9" style="text-align: left;">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Name</label>
                                                <input type="text" name="name" placeholder="input name" class="form-control form-group">
                                            </div>
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Position</label>
                                                <input type="text" name="position" placeholder="input position" class="form-control form-group">
                                            </div>
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Description</label>
                                                <textarea type="text" name="description" placeholder="input Description" class="form-control form-group"></textarea> 
                                            </div>
                                        </div>
                                    </div>
                                    @permission('team-create')
                                    <div class="col-sm-12"><hr>
                                     <input type="submit" value="Save" class="btn btn-success" id="submit" disabled="true">
                                    </div>
                                    @endpermission
                            </div>
                         
                        </form>


                        <div class="col-sm-12">
                            <div class="row">
                                <h3>List all data</h3>
                            </div>
                        </div>
                          
                         <div class="mywrapper table-responsive">
                             <table class="table" id="datatable">
                                <thead>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Images</th>
                                    <th>Description</th>
                                    <th>Author</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                  @foreach($team as $key =>$value)
                                        <tr>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->position}}</td>
                                            <td><img width="50px;" height="50px" class="img-circle" src="{{url($value->images)}}"></td>
                                            <td>{{ substr($value->description,0,80)  }}...</td>
                                             <td>{{$value->author}}</td>
                                            <td>{{$value->created_at}}</td>
                                            <td>{{$value->updated_at}}</td>
                                            <td>
                                                @permission('team-edit')
                                                	<a href="">Edit</a> 
                                                @endpermission
                                                
                                                @permission('team-delete')| 
                                                	<a href="">Deleted</a>
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
                                                
                                                if( (width == 150 && height == 150) && ((extFile == 'png') || (extFile == 'jpg') || (extFile == 'jpeg'))) {
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
                                                    $('#image-defalt').attr('src', 'http://placehold.it/150x150');
                                                    $("#image_message").html("<p id='error' style='color:red'>Your image size allow (150x150)pixcel </p>"+"<p id='error' style='color:red'>Allow File Type: jpeg,png,jpg</p>");
                                                    return false;
                                                }
                                            }
                                        }else {
                                             $('#image-defalt').attr('src', 'http://placehold.it/150x150');
                                             $('.fileinput-exists').attr('src', 'http://placehold.it/150x150');
                                             document.getElementById("submit").disabled = true;
                                             $("#image_message").html("<p id='error' style='color:red'>Allow File Type: jpeg,png,jpg</p>");
                                             return false;
                                        }

                                } else {
                                    document.getElementById("submit").disabled = true;
                                    $('#image-defalt').attr('src', 'http://placehold.it/150x150');
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
