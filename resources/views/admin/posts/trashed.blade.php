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
                <h3 class="page-heading mb-4">Trashed Posts</h3>

                    <div class="table-responsive">
                    <table class="table center-aligned-table">
                        <thead>
                        <tr class="text-primary">
                            <th>Id</th>
                            <th>Title</th>
                            <th>Deleted_At</th>
                            <th>Action</th>
                                                    
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $post)
                        <tr class="">
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->deleted_at}}</td>
                            <td>
                                
                                <div style="float:right;"> 
                                    <form method="post" action="{{route('admin.posts.forceDelete',['id'=>$post->id])}}">
                                        @csrf 
                                        @method('DELETE')
                                        <button  class="btn btn-outline-danger btn-sm" >Delete</button>
                                    </form>
                                </div>

                                <div style="float:right;"> 
                                    <form method="post" action="{{route('admin.posts.restore',['id'=>$post->id])}}">
                                        @csrf 
                                        @method('PUT')
                                        <button  class="btn btn-outline-success btn-sm" >Restore</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                        
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div> 
    </div>
</div>
</div>
@endsection
