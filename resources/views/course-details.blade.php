@extends('layouts.frontend.app')

@section('slider')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
        	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Course Details</h2>
					<div class="page_link">
						<a href="index.html">Home</a>
						<a href="courses.html">Course</a>
						<a href="course-details.html">Course Details</a>
					</div>
				</div>
			</div>
        </div>
    </section>
@endsection



@section('courses')
        <!--================Course Details Area =================-->
        <section class="course_details_area p_120">
        	<div class="container">
        		<div class="row course_details_inner">
        			<div class="col-lg-8">
        				<div class="c_details_img">
        					<img class="img-fluid" src="{{asset('frontend/img/courses/course-details.jpg')}}" alt="">
        				</div>
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Objectives</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Eligibility</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Course Outline</a>
							</li>
<!-- 							<li class="nav-item">
								<a class="nav-link active" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">Comments</a>
							</li> -->
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="objctive_text">
								@foreach($courses as $ps)
								
								{!! $ps->details !!}
								
								@endforeach
								</div>
							</div>
							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<div class="objctive_text">
									<p>HTML,CSS,Basic PHP</p>
									<p>Object Oriented PHP</p>
								</div>
							</div>
							<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
								<div class="objctive_text">
									<ul class="list">
										@foreach($courses as $course)
										@foreach($course->posts as $ps)
											<li><a href="#">{{$ps->title}}</a></li>
											<li><a href="#">{!!$ps->course_link!!}</a></li>

										@endforeach
										@endforeach
									</ul>
								</div>
							</div>
<!-- 							<div class="tab-pane fade show active" id="comments" role="tabpanel" aria-labelledby="comments-tab">
								<div class="comments-area">
									<h4>05 Comments</h4>
									<div class="comment-list">
										<div class="single-comment justify-content-between d-flex">
											<div class="user justify-content-between d-flex">
												<div class="thumb">
													<img src="{{asset('frontend/img/blog/c1.jpg')}}" alt="">
												</div>
												<div class="desc">
													<h5><a href="#">Emilly Blunt</a></h5>
													<p class="date">December 4, 2017 at 3:12 pm </p>
													<p class="comment">
														Never say goodbye till the end comes!
													</p>
												</div>
											</div>
											<div class="reply-btn">
												   <a href="" class="btn-reply text-uppercase">reply</a> 
											</div>
										</div>
									</div>	
									<div class="comment-list left-padding">
										<div class="single-comment justify-content-between d-flex">
											<div class="user justify-content-between d-flex">
												<div class="thumb">
													<img src="{{asset('frontend/img/blog/c2.jpg')}}" alt="">
												</div>
												<div class="desc">
													<h5><a href="#">Elsie Cunningham</a></h5>
													<p class="date">December 4, 2017 at 3:12 pm </p>
													<p class="comment">
														Never say goodbye till the end comes!
													</p>
												</div>
											</div>
											<div class="reply-btn">
												   <a href="" class="btn-reply text-uppercase">reply</a> 
											</div>
										</div>
									</div>	
									<div class="comment-list">
										<div class="single-comment justify-content-between d-flex">
											<div class="user justify-content-between d-flex">
												<div class="thumb">
													<img src="{{asset('frontend/img/blog/c5.jpg')}}" alt="">
												</div>
												<div class="desc">
													<h5><a href="#">Ina Hayes</a></h5>
													<p class="date">December 4, 2017 at 3:12 pm </p>
													<p class="comment">
														Never say goodbye till the end comes!
													</p>
												</div>
											</div>
											<div class="reply-btn">
												   <a href="" class="btn-reply text-uppercase">reply</a> 
											</div>
										</div>
									</div>	                                             				
								</div>
								<div class="comment-form">
									<h4>Leave a Reply</h4>
									<form>
										<div class="form-group form-inline">
										  <div class="form-group col-lg-6 col-md-6 name">
											<input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
										  </div>
										  <div class="form-group col-lg-6 col-md-6 email">
											<input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
										  </div>										
										</div>
										<div class="form-group">
											<input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
										</div>
										<div class="form-group">
											<textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
										</div>
										<a href="#" class="primary-btn submit_btn">Post Comment</a>	
									</form>
								</div>
							</div> -->
						</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="c_details_list">
        					<ul class="list">
        						@foreach($courses as $ps)
        						
        						<li><a href="#">Trainer’s Name <span>{{$ps->teacher->name}}</span></a></li>
        						<li><a href="#">Course Fee <span>$230</span></a></li>
        						<li><a href="#">Available Seats <span>15</span></a></li>
        						<li><a href="#">Schedule <span>2.00 pm to 4.00 pm</span></a></li>
        						
        						@endforeach
        					</ul>
        					<a class="main_btn" href="#">Enroll the Course</a>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
@endsection

