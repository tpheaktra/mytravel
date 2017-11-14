@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
        <section class="content-header">
           <div class="col-sm-12 row">
                <div class="col-sm-8">
                    <h2>Dashboard/menu</h2>      
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
                       
                        <form method="POST" action="{{route('menu.insert')}}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Menu Name: <span class="color-red">*</span></label>
                                    <input type="text" name="menu" placeholder="input menu name" class="form-control">
                                </div>
								@permission('menu-create')
									<div class="col-sm-12"><hr>
										<input type="submit" class="btn btn-primary" value="Save">
									</div>
                                @endpermission
                            </div>
                        </form>
                         <h3>List all data</h3>
                         <div class="mywrapper table-responsive">
                             <table class="table" id="datatable">
                                <thead>
                                    <th>Menu Name</th>
                                    <th>Author</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($menu as $key =>$value)
                                    <tr>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->author}}</td>
                                        <td>{{$value->created_at}}</td>
                                        <td>{{$value->updated_at}}</td>
                                        <td>
                                        	@permission('menu-edit')
												<a href="#" data-toggle="modal" data-target="#myModal_{{$value->id}}">Edit</a> 
											@endpermission
											@permission('menu-delete')
												|<a onclick="return confirm('are you sure do you want to delete!')" href="{{route('menu.delete',$value->id)}}">Deleted</a>
                                       		@endpermission
                                        </td>
                                    </tr>
                                        
                                        <!-- Modal -->
                                        <div id="myModal_{{$value->id}}" class="modal fade" role="dialog">
                                            <form method="POST" action="{{route('menu.edit',$value->id)}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Menu Edit</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                           
                                                                {{ csrf_field() }}
                                                                <label>Menu Name: <span class="color-red">*</span></label>
                                                                <input type="text" name="menu" placeholder="input menu name" class="form-control" value="{{$value->name}}">
                                                           
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Updated</button>
                                                        </div>
                                                    </div>
                                                </div>
                                             </form>
                                        </div>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                  
                </div><!-- col-md-12 -->
            </div><!-- content -->
        </div><!-- box -->
    </div><!-- content-wrapper -->
@endsection
