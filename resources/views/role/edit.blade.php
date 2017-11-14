@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Dashboard/Role Edit</h2>      
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
                        
						  <form method="POST" action="{{route('role.update',$role)}}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>role Name: <span class="color-red">*</span></label>
                                    <input type="text" name="name" value="{{$role->name}}" placeholder="input role name" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label>role display: <span class="color-red">*</span></label>
                                    <input type="text" value="{{$role->display_name}}" name="display_name" placeholder="input role display" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label>Permission: <span class="color-red">*</span></label>
                                    @foreach($permissions as $permission)
                                    	<div class="form-group">
                                    		<input type="checkbox" {{in_array($permission->id,$role_permissions)?"checked":""}} name="permission[]"  value="{{$permission->id}}"> &nbsp; {{$permission->display_name}} <br>
                                    	</div>
                                    @endforeach
                                </div>

                                <div class="col-sm-12"><hr>
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </div>
                            </div>
                        </form>
            
                  
                </div><!-- col-md-12 -->
            </div><!-- content -->
        </div><!-- box -->
    </div><!-- content-wrapper -->
@endsection
