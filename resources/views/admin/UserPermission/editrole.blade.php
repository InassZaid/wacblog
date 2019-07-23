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
                <h3 class="page-heading mb-4">Update Roles</h3>
                
                @if($errors->any())
                    <div class="alert alert-danger">
                     <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                     @endforeach
                     </ul>
                    </div>
                @endif
                
                <form method="post" action="{{route('admin.role.update', [ $role->id ])}}" enctype="multipart/form-data" class="form-inline">
                    @csrf    
                    @method('PUT')        
                    <div class="form-group">
                        
                        <label>Name : </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror mr-1" id="InputName" name="name"  placeholder="Name" value="{{old('name', $role->name )}}">
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
              
                </div>
    </div>
    </div>
   

@endsection