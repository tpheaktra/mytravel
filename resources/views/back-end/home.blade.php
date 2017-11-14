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
                    <h2>Dashboard/Home</h2>      
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
                        


						<div class="col-xs-3 col-sm-3">
							<ul class="nav nav-tabs tabs-left">
								<li class="active"><a href="#home" data-toggle="tab">Header & Footer</a></li>
								<li><a href="#welcome" data-toggle="tab">Welcome Messages</a></li>
								<li><a href="#general" data-toggle="tab">General Information</a></li>
								<li><a href="#weare" data-toggle="tab">We Are A Travel Agency</a></li>
							</ul>
						</div>

						<div class="col-xs-9 col-sm-9">
							<div class="tab-content">
								<div class="tab-pane active mywrapper" id="home">
									<form method="post" action="{{route('homebackend.logo',$home[0]->id)}}" enctype="multipart/form-data">
									{{ csrf_field() }}
										<div class="col-sm-12 col-xs-12">
												<div class="col-sm-3">
													<div class="fileinput fileinput-new" data-provides="fileinput">
														<div class="fileinput-news thumbnail">
															<img src="{{url('/'.$home[0]->logo)}}" id="image-defalt" class="img-circle1" alt="User Image" width="100%" height="52">
														</div>
														<div>
															<span class="btn btn-primary btn-file">
																<span class="fileinput-new ">add logo</span>
																<span class="fileinput-exists">Change logo</span>
																<input type="file" name="images" id="images" accept="image/*">
															</span>
														</div>
														<div id="image_message" style="text-align:center"></div>
													</div>
												</div>


												<div class="col-sm-9" style="text-align: left;">
													<div class="row">
														<div class="col-sm-12">
															<label>Description</label>
															<textarea type="text" name="description" placeholder="input short description" class="form-control form-group">{{$home[0]->description}}</textarea> 
														</div>
													</div>
													<div class="row">
														<div class="col-sm-12">
															<label>Phone</label>
															<input type="text" name="phone" placeholder="input phone" class="form-control form-group" value="{{$home[0]->phone}}">
														</div>
													</div>

													<div class="row">
														<div class="col-sm-12">
															<label>Email</label>
															<input type="email" name="email" placeholder="input email" class="form-control form-group" value="{{$home[0]->email}}">
														</div>
													</div>

													<div class="row">
														<div class="col-sm-12">
															<label>Working Day</label>
															<input type="text" name="workingday" placeholder="input working day" class="form-control form-group" value="{{$home[0]->working}}">
														</div>
													</div>

													<div class="row">
														<div class="col-sm-12">
															<label>Address</label>
															<textarea type="text" name="address" placeholder="input address" class="form-control form-group">{{$home[0]->address}}</textarea>
														</div>
													</div>

												</div>
												@permission('role-delete')
												<div class="col-sm-12"><hr>
													<input type="submit" value="Updated" class="btn btn-success pull-right" id="submit" disabled="true">
												</div>
												@endpermission
												
										</div>
									</form>
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

															if( (width == 150 && height == 52) && ((extFile == 'png') || (extFile == 'jpg') || (extFile == 'jpeg'))) {
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
																$('#image-defalt').attr('src', 'http://placehold.it/150x52');
																$("#image_message").html("<p id='error' style='color:red'>Your image size allow (150x52)pixcel </p>"+"<p id='error' style='color:red'>Allow File Type: jpeg,png,jpg</p>");
																return false;
															}
														}
													}else {
														 $('#image-defalt').attr('src', 'http://placehold.it/150x52');
														 $('.fileinput-exists').attr('src', 'http://placehold.it/150x52');
														 document.getElementById("submit").disabled = true;
														 $("#image_message").html("<p id='error' style='color:red'>Allow File Type: jpeg,png,jpg</p>");
														 return false;
													}

											} else {
												document.getElementById("submit").disabled = true;
												$('#image-defalt').attr('src', 'http://placehold.it/150x52');
												$("#image_message").html("<p id='error' style='color:red'>Your image more then 1M</p>");
												return false;
											}
										});
									</script>
								</div>
								
								<div class="tab-pane" id="welcome">
										<form method="post" action="{{route('homebackend.welcome',$home[0]->id)}}" enctype="multipart/form-data">
										{{ csrf_field() }}
											<textarea name="welcomes" placeholder="input description here" id="welcomes"> {{$home[0]->welcome}}</textarea>
											<br>
											@permission('role-delete')
											<div class="col-sm-12">
												<div class="row">
													<input type="submit" value="Updated" class="btn btn-primary pull-right">
												</div>
											</div>
											@endpermission
										</form>
										<script>
											var editor_config = {
												path_absolute : "/",
												selector: "#welcomes",
												height: 350,
												plugins: [
												  "advlist autolink lists link image charmap print preview hr anchor pagebreak",
												  "searchreplace wordcount visualblocks visualchars code fullscreen",
												  "insertdatetime media nonbreaking save table contextmenu directionality",
												  "emoticons template paste textcolor colorpicker textpattern"
												],
												toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
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
								
								<div class="tab-pane" id="general">
									<form method="post" action="{{route('homebackend.general',$home[0]->id)}}" enctype="multipart/form-data">
										{{ csrf_field() }}
										<textarea name="generals" placeholder="input description here" id="generals">{{$home[0]->information}}</textarea>
										<br>
										@permission('role-delete')
										<div class="col-sm-12">
											<div class="row">
												<input type="submit" value="Updated" class="btn btn-primary pull-right">
											</div>
										</div>
										@endpermission
									</form>
									 <script>
										var editor_config1 = {
											path_absolute : "/",
											selector: "#generals",
											height: 350,
											plugins: [
											  "advlist autolink lists link image charmap print preview hr anchor pagebreak",
											  "searchreplace wordcount visualblocks visualchars code fullscreen",
											  "insertdatetime media nonbreaking save table contextmenu directionality",
											  "emoticons template paste textcolor colorpicker textpattern"
											],
											toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
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

										  tinymce.init(editor_config1);
									</script>
								</div>
								
								<div class="tab-pane" id="weare">
									<form method="post" action="{{route('homebackend.weare',$home[0]->id)}}" enctype="multipart/form-data">
										{{ csrf_field() }}
										<textarea name="wearetravel" placeholder="input description here" id="wearetravel">
											 {{$home[0]->we_are}}
										</textarea>
										<br>
										@permission('role-delete')
											<div class="col-sm-12">
												<div class="row">
													<input type="submit" value="Updated" class="btn btn-primary pull-right">
												</div>
											</div>
										@endpermission
									</form>
									
									
									<script>
										var editor_config2 = {
											path_absolute : "/",
											selector: "#wearetravel",
											height: 350,
											plugins: [
											  "advlist autolink lists link image charmap print preview hr anchor pagebreak",
											  "searchreplace wordcount visualblocks visualchars code fullscreen",
											  "insertdatetime media nonbreaking save table contextmenu directionality",
											  "emoticons template paste textcolor colorpicker textpattern"
											],
											toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
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

										  tinymce.init(editor_config2);
								</script>
								</div>
							</div>
						</div>


                </div><!-- col-md-12 -->
            </div><!-- content -->
        </div><!-- box -->
    </div><!-- content-wrapper -->
    
	<style type="text/css">
		.nav-tabs > li{ float: none !important; padding: 5px !important;}

		.nav-tabs > li.active > a, 
		.nav-tabs > li.active > a:focus, 
		.nav-tabs > li.active > a:hover{
			border: none !important;
			background-color: #eee !important;
			border-radius: 0px !important;
		}
		.nav-tabs > li > a:hover{ border-color: #fff !important;}
		.nav-tabs{ border: 1px solid #dadada !important}
		.mce-content-body img{
			padding: 0 20px !important;
		}
	</style>
@endsection
