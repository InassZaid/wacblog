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
                <h3 class="page-heading mb-4">All Admin</h3>
                
                
                    <div class="table-responsive">
                    <table class="table center-aligned-table">
                        <thead>
                        <tr class="text-primary">
                            <th>Id</th>
                            <th>Username</th>
                            <th>Action</th>
                                                    
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Users as $user)
                        <tr class="">
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            
                            <td>
                              
                                    <form method="post" action="{{route('admin.user.delete',['id'=>$user->id])}}">
                                        @csrf 
                                        @method('DELETE')
                                        <button  class="btn btn-outline-danger btn-sm" >Delete</button>
                                    </form>
                                
                            </td>
                        </tr>
                        @endforeach
                        
                        
                        </tbody>
                    </table>
                    {{$Users->links()}}
                    </div>
                </div>
                </div>
            </div> 
    </div>
</div>
</div>
@endsection
