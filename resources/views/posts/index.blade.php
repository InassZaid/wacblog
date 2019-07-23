@extends('layout.default')
@section('navitem')
				<ul class="container">
					@if(Auth::user())
					<li><a href="#top">Profile</a></li>
					@endif
					<li><a href="#work">Categories</a></li>
					<li><a href="#portfolio">Posts</a></li>
					@if(Auth::user())
					<li>
              				<a href="{{route('user.logout')}}" class="btn btn-outline-danger btn-sm" style="margin : 10px 0px 4px 75px;" > Logout</a>      
            		</li>
					@endif
					@if(!Auth::user())
					<li>
              				<a href="{{route('user.login')}}" class="btn btn-outline-danger btn-sm" style="margin : 10px 0px 4px 75px;" > Login</a>
							    
            		</li>
					<li>
							<a href="{{route('user.registerview')}}" class="btn btn-outline-danger btn-sm" style="margin : 10px 0px 4px 75px;" > Register</a> 
					</li>
					@endif
					<!-- <li><a href="#contact">Contact</a></li> -->
				</ul>
@endsection
@section('content')

<!-- Home -->
@if(Auth::user())
	<article id="top" class="wrapper style1">
					<div class="container">
						<div class="row">
							<div class="col-4 col-5-large col-12-medium">
								<span class="image fit"><img src="{{asset('storage/'.Auth::user()->avatar)}}" alt="" width=200px height=300px /></span>
							</div>
							<div class="col-8 col-7-large col-12-medium">
								<header>
									<h1>Welcome <strong>{{Auth::user()->name}} {{Auth::user()->lastname}}</strong>.</h1>
									<p> <strong>Bio :</strong> <i>{{Auth::user()->bio}}</i></p>
								</header>
								<p> <strong>Total Posts :</strong> <i>{{$posts->Total()}}</i></p>
								<a href="#work" class="button large scrolly">Latest Posts </a>
							</div>
						</div>
					</div>
				</article>
@endif

		<!-- Work -->	
			<article id="work" class="wrapper style2">
				<div class="container">
					<header>
						<h2>Latest Post</h2>
						<p>Odio turpis amet sed consequat eget posuere consequat.</p>
					</header>
					<div class="row aln-center">
						
					@foreach($postsview as $post)
						<div class="col-4 col-6-medium col-12-small">
							<section class="box style1">
								<a href="#" class="image featured"><img src="{{asset('storage/'. $post->image)}}" alt="" /></a>
								<h3>{{$post->title}}</h3>
								<p>{{$post->created_at}}</p>
							</section>
						</div>
					@endforeach
					</div>
					<footer>
						<p>Lorem ipsum dolor sit sapien vestibulum ipsum primis?</p>
						<a href="#portfolio" class="button large scrolly">See some of my recent work</a>
					</footer>

					
				</div>
			</article>


<article id="portfolio" class="wrapper style3">
				<div class="container">
					<header>
						<h2>Here’s Published Post</h2>
						<p>Proin odio consequat  sapien vestibulum consequat lorem dolore feugiat.</p>
					</header>
					<div class="row">
					@foreach($posts as $post)
						<div class="col-4 col-6-medium col-12-small">
							<article class="box style2">
								<a href="#" class="image featured"><img src="{{asset('storage/'. $post->image)}}" alt="" /></a>
								<h3><a href="{{route('posts.view',['id'=> $post->id])}}">{{$post->title}}</a></h3>
								<p>{{$post->created_at}}</p>
							</article>
						</div>
					@endforeach
					</div>	
					{{$posts->links()}}					
				</div>
</div>
			</article>

<!-- 
<section id="portfolio" class="two">


						<div class="container">

							<header>
								<h2>Home</h2>
								
							</header>

							@foreach($posts as $post)
								<div class="col-10 col-12-mobile">
								
									<article class="item" style="font-family:sans-serif;">
										<a href="#" class="image fit "><img src="{{asset('storage/'. $post->image)}}"  style="height:600px;"/></a>
										<header>
											<h3><a href="{{route('posts.view',['id'=> $post->id])}}">{{$post->title}}</a></h3>
											<div style="margin:0px 0px 0px 10px;">
												<div style="text-align:left;">
												<label style="color:blue;"><b>Created_at : </b></label>
												<time style="color:red;">{{$post->created_at}}</time>
												<label style="color:blue; margin:0px 0px 0px 10px;"><b>Category :  </b></label>
												<span style="color:red;">{{$post->category->name}}</span>
												<br>
												<label style="color:blue;"><b>Views : </b></label>
												<span style="color:red;">{{$post->stat->views}}</span>
											</div>
											
										</div>
										</header>
										
									</article>
								@endforeach
								</div>
							
							</div>

						</div>
					</section> -->

			
@endsection
