@extends('layout.admin')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-8">
            <div class="card-deck">
                <div class="card col-lg-12 px-0 mb-4">
                <div class="card-body">
                <h3 class="page-heading mb-4">Edit Post</h3>
                <form method="post" action="{{route('admin.posts.update',['id'=> $post->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="InputTitle">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="InputTitle" name="title" placeholder="Enter title" value="{{old('title',$post->title)}}">
                        @error('title')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                            <input class="form-check-input " type="radio" name="status" id="gridRadios1" value="draft"
                            {{ old('status', $post->post_status) ==  'draft'? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="gridRadios1">
                                Draft
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input " type="radio" name="status" id="gridRadios2" value="published"
                            {{ old('status', $post->post_status) ==  'published'? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="gridRadios2">
                                Published
                            </label>
                            </div>
                        </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label for="InputContent">Content</label>
                        <div>
                            <textarea  class="form-control @error('content') is-invalid @enderror" id="InputContent" name="content" placeholder="Enter content" rows="6" >{{old('content',$post->content)}}</textarea>
                        </div> 
                        @error('content')
                            <p class="text-danger">{{$message}}</p>
                        @enderror 
                    </div>

                    <div class="form-group">
                        <label for="InputTitle">Image</label>
                        <img src="{{asset('storage/'. $post->image)}}" height="75"> 
                        <input type="file" class="form-control @error('title') is-invalid @enderror" id="InputTitle" name="image"  value="{{old('image')}}">
                        @error('image')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="InputCategory">Category</label>
                        <div>
                            <select name="category_id" class="form-control">
                                <option>Select A Category</option>
                                @foreach(App\Category::all() as $category)
                                   <option value="{{$category->id}}" {{ old('category_id', $post->category_id) ==  $category->id? 'selected' : '' }} >{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                        <label for="control-label" class="col-form-label col-sm-2 pt-0">Tag</label>
                        <div class="col-sm-10">
                            @foreach(App\Tag::all() as $tag)
                            <div class="form-check ">
                                <input class="form-check-input " type="checkbox" name="tag[]" id="gridRadios1" value="{{$tag->id}}" 
                                {{in_array($tag->id , $tags)? 'checked' : ''}}>
                                <label class="form-check-label" for="gridRadios1">
                                    {{$tag->name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Save</button>
                    <!-- <div class="form-group">
                        <label for="InputTitle">Title</label>
                        <input type="text" class="form-control" id="InputTitle" name="title" placeholder="Enter title" value="{{$post->title}}">
                    </div>

                    <div class="form-group">
                        <label for="InputContent">Content</label>
                        <div>
                            <textarea  class="form-control" id="InputContent" name="content" placeholder="Enter content" rows="6" >{{$post->content}}</textarea>
                        </div>  
                    </div>

                    <div class="form-group">
                        <label for="InputTitle">Image</label>
                        <img src="{{asset('storage/'.$post->image)}}" width=50px; height=50px;>
                        <input type="file" class="form-control @error('title') is-invalid @enderror" id="InputTitle" name="image"  value="{{old('image')}}">
                        @error('image')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="InputTitle">Category</label>
                        <div>
                            <select name="category_id" class="form-control">
                                <option>Select A Category</option>
                                @foreach(App\Category::all() as $category)
                                   <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    
                
                    <button type="submit" class="btn btn-primary">Save</button> -->
                </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection