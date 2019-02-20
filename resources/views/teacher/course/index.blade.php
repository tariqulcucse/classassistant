@extends('layouts.backend.app')

@section('content')
	<div class="row-fluid sortable">	
	
			<a href="{{route('teacher.course.create')}}" class="btn btn-large btn-info">Add Course</a>	

				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon th-large"></i><span class="break"></span> All Course</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Id</th>
								  <th>View Count</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  
						  <tfoot>
							  <tr>
								  <th>Id</td>
								  <th>View Count</th>
								  <th>Actions</th>
							  </tr>
						  </tfoot>  
						  <tbody>

						  	@foreach($courses as $key=>$course)
								<tr>
									<td>{{$key+1}}</td>
									<td>{{$course->name}}</td>
									<td class="center">
										<a class="btn btn-info" href="{{route('teacher.course.edit',$course->id)}}">
											<i class="halflings-icon white edit"></i>  
										</a>

										<a class="btn btn-info" href="{{route('teacher.course.showdetails',$course->id)}}">
											<i class="halflings-icon white view"></i>  
										</a>

										<a class="btn btn-danger" href="#">
											<i class="halflings-icon white trash"></i> 
										</a>
									</td>
								</tr>
							@endforeach
								
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
@endsection
