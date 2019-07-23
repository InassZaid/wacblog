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
                <h3 class="page-heading mb-4">All Category</h3>
                <div style= "padding:0px 0px 30px 30px;  float:left; ">
                    <a href="{{route('categories.create')}}"><button type="button" class="btn btn-primary btn-lg">Add Category</button></a>
                </div>
                
                    <div class="table-responsive">
                    <table class="table center-aligned-table">
                        <thead>
                        <tr class="text-primary">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Posts</th>
                            <th>Created_At</th>
                            <th>Updated_At</th>
                            <th>Action</th>
                                                    
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Category as $category)
                        <tr class="">
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                            <a href="{{route('categories.posts',['id'=> $category->id])}}"  > Posts</a>
                            </td>
                            <td>{{$category->created_at}}</td>
                            <td>{{$category->updated_at}}</td>
                            

                            <!-- <td><label class="badge badge-success">Approved</label></td> -->
                            <td>
                                <a href="{{route('categories.edit',['id'=> $category->id])}}" class="btn btn-outline-info btn-sm" > Edit</a>
                                <div style="float:right;"> 
                                    <form method="post" action="{{route('categories.delete',['id'=>$category->id])}}">
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
                    {{$Category->links()}}
                    </div>
                </div>
                </div>
            </div> 
    </div>
</div>
</div>
@endsection
