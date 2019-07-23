@extends('layout.default')
@section('title',$posts->title)
@section('navitem')
				<ul class="container">
					<li><a href="#top"> Post - {{$posts->title}}</a></li>
					<!-- <li><a href="#work"></a></li>
					 -->
				</ul>
@endsection
@section('content')

<article id="portfolio" class="wrapper style3">
				<div class="container">
					
					<div class="row">
					
						<div class="col-12 col-6-medium col-12-small">
							<article class="box style2">
								<a href="#" class="image featured"><img src="{{asset('storage/'.$posts->image)}}" alt=""  height=500px;/></a>
								<h3>{{$posts->title}}</h3>
								<p>{{$posts->content}}</p>
								<section style="text-align:left;">
									<h3>Related Posts</h3>
									<ul>
										@foreach($posts->relatedPosts() as $related)
										<li>
											<a href="{{route('posts.view',[$related->id])}}">
											
											{{$related->title}}</a>
										</li>
										@endforeach
									</ul>
								</section>
							</article>
							<div class="box style2" style="text-align:left;">
								<span>
								  <a class="nav-link"  href="{{route('add.like',['id' =>$posts->id])}}"  >
               						 <img src="{{asset('assets/images/icons/faceicon.png')}}" width=30px; height=30px; alt="">
               						 <span class="menu-title">{{$posts->stat->likes}}</span>
								  </a>
								  
								  <a class="nav-link" href="{{route('admin.posts.index')}}" >
               						 <img src="{{asset('assets/images/icons/chaticon.png')}}" width=30px; height=30px; alt="">
               						 <span class="menu-title">{{$comments->total()}}</span>
								  </a>
								  
								  <a class="nav-link" href="{{route('admin.posts.index')}}" >
               						 <img src="{{asset('assets/images/icons/view.png')}}" width=30px; height=30px; alt="">
               						 <span class="menu-title">{{$posts->stat->views}}</span>
            					  </a>
								</span>
								<!-- Leave a comment -->
						<div style="margin-top:30px;">
							<h4 class="f1-l-4 cl3 p-b-12">
								Leave a Comment
							</h4>


							<form method="post" action="{{route('comment.create')}}" enctype="multipart/form-data">
							{{csrf_field()}}
								<input type="text" name="name">
								<textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" id="comment" name="comment" placeholder="Comment..."></textarea>
								<input type="text" name="post_id" value="{{$posts->id}}" hidden>
								<button class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
									Post Comment
								</button>
							
							</form>
							
							
							<hr>

							<div class="my-3 p-3 bg-white rounded shadow-sm">
								<h6 class="border-bottom border-gray pb-2 mb-0">Comments</h6>
								@foreach($comments as $comment)
								<div class="media text-muted pt-3">
								<img class="bd-placeholder-img mr-2 rounded" width="32" height="32" aria-label="Placeholder: 32x32">
								<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
									
									<strong class="d-block text-gray-dark">
										
											{{$comment->name}}
										
									</strong>
									{{$comment->comment}}
								</p>
								</div>
								@endforeach

							

						</div> 
					</div>

				    </div>
					
					</div>					
				
				</div>
			</article>


@endsection
