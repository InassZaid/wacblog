@extends('layout.admin')
@section('content')

<div class="content-wrapper">
<div class="row">
    <div class="col-sm-12">
    <div class="card-deck">
                <div class="card col-lg-12 px-0 mb-4">
                <div class="card-body">
                @if(session('message'))
                      <div class="alert alert-success">
                           {{session('message')}}
                      </div>
                @endif
                <h3 class="page-heading mb-4">All Posts</h3>
                <div style= "padding:0px 0px 30px 30px;  float:left; ">
                    <a href="{{route('admin.posts.create')}}"><button type="button" class="btn btn-primary btn-lg">Add Post</button></a>
                </div>
                
                <div style= "padding:0px 0px 30px 30px; float:left;">
                    <a href="{{route('admin.posts.trashed')}}"><button type="button" class="btn btn-danger btn-lg">Trashed Posts</button></a>
                </div> 

                <div style= "padding:0px 0px 30px 30px; float:left;">
                    <form method="get" class="form-inline mb-5" action="{{route('admin.posts.views')}}">
                        <input type="title" name="title" placeholder="Search Title ..." class="form-control">
                        <button type="submit" class="btn btn-outline-info">Search</button>
                    </form>
                </div>
                    <div class="table-responsive">
                    <table class="table center-aligned-table">
                        <thead>
                        <tr class="text-primary">
                            <th>Id</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Created_At</th>
                            <th>Updated_At</th>
                            <th>Status</th>
                            <th>Views</th>
                            <th>Action</th>
                                                    
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $post)
                        <tr class="">
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>
                                <img src="{{asset('storage/'.$post->image)}}" width=50px; height=50px;>
                            </td>
                            <td>
                                @foreach($post->tags as $tag)
                                {{$tag->name}}
                                @if(!$loop->last)
                                 , 
                                 
                                 @endif

                                @endforeach
                            </td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>{{$post->post_status}}</td>
                            <td>{{$post->stat->views}}</td>

                            <!-- <td><label class="badge badge-success">Approved</label></td> -->
                            <td>
                                <a href="{{route('admin.posts.edit',['id'=> $post->id])}}" class="btn btn-outline-info btn-sm" > Edit</a>
                                <div style="float:right;"> 
                                    <form method="post" action="{{route('admin.posts.delete',['id'=>$post->id])}}">
                                        @csrf 
                                        @method('DELETE')
                                        <button  class="btn btn-outline-danger btn-sm" >Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                        
                        </tbody>
                    </table>
                    {{$posts->links()}}
                    </div>
                </div>
                </div>
            </div> 
    </div>
</div>
</div>
@endsection
