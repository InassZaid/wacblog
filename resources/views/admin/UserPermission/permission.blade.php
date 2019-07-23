@extends('layout.admin')
@section('content')

<div class="content-wrapper">
<div class="row">
    <div class="col-sm-12">
    <div class="card-deck">
                <div class="card col-lg-12 px-0 mb-4">
                <div class="card-body">
                @if(session('success'))
                      <div class="alert alert-success">
                           {{session('success')}}
                      </div>
                @endif
                <h3 class="page-heading mb-4">Permission</h3>

                <form method="post" action="#" enctype="multipart/form-data" class="form-inline">
                    @csrf
                    <div class="form-group">
                        <label>Name : </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror mr-1" id="InputName" name="name"  placeholder="Name">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    
                    <div class="position-relative row form-check">
                        <div class="col-sm-10 offset-sm-2">
                        <button  type="submit" class="btn btn-primary mr-1">Save</button>
                        </div>
                    </div>

                </form>
                <hr>
                <div class="table-responsive">
                <table class="table center-aligned-table">
                    <thead>
                        <tr class="text-primary">
                            <td>ID</td>
                            <td>Name</td>
                            <td>Action</td>
                            
                        </tr>
                    </thead>

                     <tbody>
                    @foreach($permissions as $permission)
                        <tr class="">
                            <td>{{$permission->id}}</td>
                            <td>{{$permission->name}}</td>
                            <td>
                                <a href="{{route('admin.permission.edit',['id'=> $permission->id])}}" class="btn btn-info">
                                  Edit
                                </a>
                                <div style="float:right;"> 
                                <form method="post" action="{{route('admin.permission.delete',['id'=> $permission->id])}}">
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
                {{$permissions->links()}}

                </div>
                </div>
    </div>
    </div>
   

@endsection