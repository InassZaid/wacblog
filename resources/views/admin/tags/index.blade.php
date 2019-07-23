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
                <h3 class="page-heading mb-4">All Tags</h3>
                <div style= "padding:0px 0px 30px 30px;  float:left; ">
                    <a href="{{route('tags.create')}}"><button type="button" class="btn btn-primary btn-lg">Add Tag</button></a>
                </div>
                
                    <div class="table-responsive">
                    <table class="table center-aligned-table">
                        <thead>
                        <tr class="text-primary">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                                                    
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Tags as $tags)
                        <tr class="">
                            <td>{{$tags->id}}</td>
                            <td>{{$tags->name}}</td>
                            
                            <!-- <td><label class="badge badge-success">Approved</label></td> -->
                            <td>
                                <a href="{{route('tags.edit',['id'=> $tags->id])}}" class="btn btn-outline-info btn-sm" > Edit</a>
                                <div style="float:right;"> 
                                    <form method="post" action="{{route('tags.delete',['id'=>$tags->id])}}">
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
                    {{$Tags->links()}}
                    </div>
                </div>
                </div>
            </div> 
    </div>
</div>
</div>

{{ $Tags->links()}}
@endsection