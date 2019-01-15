<div class="container">
        		<div class="main_title">
        			<h2>Latest Posts From Blog</h2>
        			<p>There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope. It’s exciting to think about setting up your own viewing station.</p>
        		</div>
        		<div class="row latest_blog_inner">
        			
        			<div class="col-lg-3 col-md-6">
                        {{-- @foreach($latests as $latest)
        				<div class="l_blog_item">
        					<img class="img-fluid" src="{{Storage::url('post/'.$latest->image)}}" alt="">
        					<a class="date" href="#">{{$latest->created_at->diffForHumans()}}  |  By {{$latest->user->name}}</a>
        					 <a href="{{route('post.details', $latest->id)}}"><h4>{{str_limit($latest->title,20)}}</h4></a>
                            <p>{!!str_limit($latest->body,100)!!}</p>
        				</div>
                         @endforeach --}}
        			</div>
                   
        		</div>
        	</div>