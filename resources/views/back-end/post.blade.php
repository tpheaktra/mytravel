@extends('layouts.admin')

@section('content')
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
 <?php /* select chosen */ ?>
<link rel="stylesheet" href="{{ asset('back-end/js/chosen/chosen.min.css') }}">
<script src="{{ asset('back-end/js/chosen/chosen.jquery.min.js') }}"></script>

<div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Dashboard/Post</h2>      
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

                      
                         <form method="POST" action="{{route('post.insert')}}" enctype="multipart/form-data" id="ImageForm">
                            {{ csrf_field() }}
                            <div class="row banner">

                                <div class="col-sm-12">
                                    <div class="row">

                                         <div class="col-sm-3  col-xs-12">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-news thumbnail">
                                                    <img src="http://placehold.it/580x480" id="image-defalt" class="img-circle1" alt="User Image" width="100%" height="200">
                                                </div>
                                                <div>
                                                    <span class="btn btn-primary btn-file">
                                                        <span class="fileinput-new ">add thumbnail</span>
                                                        <span class="fileinput-exists">Change thumbnail</span>
                                                        <input type="file" name="images" id="images" accept="image/*">
                                                    </span>
                                                </div>
                                                
                                                <div id="image_message" style="text-align:center"></div>
                                            </div>
                                        </div>

                                        <div class="col-sm-9">
                                            <div class="col-sm-12 col-xs-12">
                                                <label>Select category</label>
                                                <select class="chosen-select form-validation form-group form-control" name="menu">
                                                    @foreach($menu as $key => $value)
                                                        <option value="{{$value->id}}">{{$value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-sm-12">
                                                <label>title</label>
                                                <input type="text" name="title" class="form-control form-group" placeholder="input title">
                                            </div>
                                            <div class="col-sm-12">
                                            
                                              <textarea name="description" placeholder="input description here" id="description"></textarea>
                      											  <script>
                      													var editor_config = {
                      														path_absolute : "/",
                      														selector: "#description",
                      														height: 350,
                      														plugins: [
                      														  "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                      														  "searchreplace wordcount visualblocks visualchars code fullscreen",
                      														  "insertdatetime media nonbreaking save table contextmenu directionality",
                      														  "emoticons template paste textcolor colorpicker textpattern"
                      														],
                      														toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                      														relative_urls: false,
                      														file_browser_callback : function(field_name, url, type, win) {
                      														  var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                      														  var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                      														  var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                      														  if (type == 'image') {
                      															cmsURL = cmsURL + "&type=Images";
                      														  } else {
                      															cmsURL = cmsURL + "&type=Files";
                      														  }

                      														  tinyMCE.activeEditor.windowManager.open({
                      															file : cmsURL,
                      															title : 'Filemanager',
                      															width : x * 0.8,
                      															height : y * 0.8,
                      															resizable : "yes",
                      															close_previous : "no"
                      														  });
                      														}
                      													  };

                      													  tinymce.init(editor_config);
                      											</script>

                                             
                                            </div>
                                        </div>
                                        @permission('post-create')
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <hr>
                                                <input type="submit" value="Save" class="btn btn-success pull-right" id="submit" disabled="true">
                                            </div>
                                        </div>
										@endpermission
                                    </div>
                                </div>
                            </div>
                        </form><br>

                        <h3>List all data</h3>
                        <div class="mywrapper table-responsive">
                             <table class="table" id="datatable">
                                <thead>
                                    <th>Menu</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Images</th>
                                    <th>Description</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                  @foreach($post as $key =>$value)
                                        <tr>
                                            <td>{{$value->menu}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->title}}</td>
                                            <td><img width="50px;" height="50px" class="img-circle" src="{{url($value->images)}}"></td>
                                            <td>{{ substr($value->description,0,80)  }}...</td>
                                            <td>{{$value->created_at}}</td>
                                            <td>{{$value->updated_at}}</td>
                                            <td>
                                                @permission('post-edit')
                                                	<a onclick="getDataEdit({{$value->id}})" >Edit</a>
                                                @endpermission
                                                
                                                @permission('post-delete')| 
                                                	<a href="">Deleted</a>
                                                @endpermission
                                            </td>
                                        </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>


                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <form method="POST" action="{{route('post.update')}}"> {{ csrf_field() }}
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Post Edit</h4>
                                        </div>
                                        <div class="modal-body" id="showdetail">
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-success" value="Updated"> 
                                        </div>
                                    </div>
                                </div>
                             </form>
                        </div>
                       

                        <script type="text/javascript">
                            $(function() {
                                $('.chosen-select').chosen();
                                $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
                            });

                           function  getDataEdit(id){
                                  //  alert(id);
                                    $("#showdetail").empty();
                                    $.ajax({
                                        url :"{{route('post.getupdate')}}",
                                        type : 'GET',
                                        data : {'id':id},
                                        dataType: 'json',
                                        success : function(data) {  
                                          // var objs = JSON.parse(data);
                                      //      alert(data);
                                            var html;
                                            var opt;

                                             <?php foreach($menu as $key1 => $value){ ?>                                                        
                                                if(data.menu_id == <?php echo $value->id ?>)  {
                                                        opt +='<option selected value="{{$value->id}}">{{$value->name }}</option>';
                                                }else {
                                                        opt +='<option value="{{$value->id}}">{{$value->name }}</option>';
                                                   }
                                              <?php } ?> 

                                            //$.each(data, function (index, element) {
                                                html =  '<div class="fileinput fileinput-new" data-provides="fileinput">'+
                                                          '<div class="fileinput-new thumbnail" style="width: 242px; height: 200px;">'+
                                                           '<img src="{{url("")}}/'+data.images+'" accept="image/*">'+
                                                          '</div>'+
                                                          '<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>'+
                                                          '<div>'+
                                                            '<span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input id="images" type="file" name="images" accept="image/*"></span>'+
                                                           ' <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>'+
                                                          '</div><div id="message" style="text-align:center"></div>'+
                                                       ' </div><input type="hidden" name="id" value="'+data.id+'">'+

                                                        '<label class="pull-left">Select category</label>'+
                                                        '<select class="chosen-select form-validation form-group form-control" name="menu">'+opt+'</select>'+
                                                        '<label>title: <span class="color-red">*</span></label>'+
                                                        '<input type="text" name="title" placeholder="input title" class="form-control" value="'+data.title+'">'+
                                                        '<label>Description: <span class="color-red">*</span></label>'+
                                                        '<textarea name="description" placeholder="input description" class="form-control">'+data.description+'</textarea>';
                                           // });
                                          // var mychosen = "<script>$(function() {   $('.chosen-select').chosen(); $('.chosen-select-deselect').chosen({ allow_single_deselect: true }); });";
                                          //var kk ="<script>$('.fileinput').fileinput();";

                                         $("#showdetail").append(html);
                                              $('input[type=file]').change(function(e) { 
                                                   $('#message').html(''); 
                                                   $('.img-defalt').html('');
                                                       var file_check = this.files && this.files[0];
                                                       var imagefile = this.files[0].type;
                                                       var imagesize = this.files[0].size;
                                                       var file  = this.files[0];

                                                        var image = new Image();
                                                        image.src = window.URL.createObjectURL(file);
                                                        //alert(image);
                                                        image.onload = function (e) { 

                                                            var width1 = image.naturalWidth;
                                                            var height1 = image.naturalHeight;
                                                            window.URL.revokeObjectURL( image.src );
                                                             if(imagesize < 5000000){
                                                                 if(!(width1 == 580 && height1 == 480)){ 
                                                                     // var reader = new FileReader();
                                                                    // //imageIsLoaded
                                                                    // reader.onload = function(e) {
                                                                    //     //document.getElementById("submit").disabled = false;
                                                                       //  $('.img-defalt').attr('src', e.target.result);
                                                                    // }
                                                                     //reader.readAsDataURL(file);
                                                                     $('input[type="submit"]').attr('disabled','disabled');
                                                                      $('#message').html("<p id='error' style='color:red'>Your image size allow (580x480)pixcel </p>"+"<p id='error' style='color:red'>Allow File Type: jpeg,png,jpg</p>");
                                                                        return false;
                                                                 }else{
                                                                     $('input[type="submit"]').removeAttr('disabled');
                                                                 }
                                                                 // else{
                                                                 //    //$('input[type=submit]').disabled = true;
                                                                 //   // $('img').html("<img src='http://placehold.it/580x480'>");
                                                                 //    $('#message').html("<p id='error' style='color:red'>Your image size allow (580x480)pixcel </p>"+"<p id='error' style='color:red'>Allow File Type: jpeg,png,jpg</p>");
                                                                 //    return false;
                                                                 // }
                                                             }else{
                                                                //$('input[type=submit]').disabled = true;
                                                               // $('img').attr('src', 'http://placehold.it/580x480');
                                                                $('#message').html("<p id='error' style='color:red'>Your image more then 1M</p>");
                                                                return false;
                                                             }

                                                    }
                                             });
                                    },
                                    cache : false,
                                  });

                                $('#myModal').modal('show');
                                
                            }
                            
                                   // e.preventDefault();
                                    // $("#image_message").html(''); // To remove the previous error message
                                    //  var imagefile = $('input[type=file]').type;
                                    //  alert(imagefile);
                                    //file_check = this.files && this.files[0];
                                    // defaultimg = file.name;
                                    // var imagefile = file.type;
                                    // var match = ["image/jpeg", "image/png", "image/jpg"];
                                    // var sizefile = this.files[0].size;
                                    // var form = this;
                                    // file_check = this.files && this.files[0];

                                //     var fileName = document.getElementById("images").value;
                                //     var idxDot = fileName.lastIndexOf(".") + 1;
                                //     var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
                                 
                                // console.log(extFile)
                         
                        </script>

                        <script type="text/javascript">
                          //  function test(){
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
                                   // alert(imagefile);
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
                                                
                                                if( (width == 580 && height == 480) && ((extFile == 'png') || (extFile == 'jpg') || (extFile == 'jpeg'))) {
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
                                                    $('#image-defalt').attr('src', 'http://placehold.it/580x480');
                                                    $("#image_message").html("<p id='error' style='color:red'>Your image size allow (580x480)pixcel </p>"+"<p id='error' style='color:red'>Allow File Type: jpeg,png,jpg</p>");
                                                    return false;
                                                }
                                            }
                                        }else {
                                             $('#image-defalt').attr('src', 'http://placehold.it/580x480');
                                             $('.fileinput-exists').attr('src', 'http://placehold.it/580x480');
                                             document.getElementById("submit").disabled = true;
                                             $("#image_message").html("<p id='error' style='color:red'>Allow File Type: jpeg,png,jpg</p>");
                                             return false;
                                        }

                                } else {
                                    document.getElementById("submit").disabled = true;
                                    $('#image-defalt').attr('src', 'http://placehold.it/580x480');
                                    $("#image_message").html("<p id='error' style='color:red'>Your image more then 1M</p>");
                                    return false;
                                }
                            });
                       // }
                        </script>

                </div><!-- col-md-12 -->
            </div><!-- content -->
        </div><!-- box -->
    </div><!-- content-wrapper -->
@endsection
