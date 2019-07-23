@extends('layout.admin')
@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-8">
            <div class="card-deck">
                <div class="card col-lg-12 px-0 mb-4">
                <div class="card-body">
                <h3 class="page-heading mb-4">Update Category</h3>
                @if($errors->any())
                    <div class="alert alert-danger">
                     <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                     @endforeach
                     </ul>
                    </div>
                @endif
                <form method="post" action="{{route('categories.update', [ 'id' => $Category->id ])}}" enctype="multipart/form-data">
                    @csrf    
                    @method('PUT')
                    <div class="form-group">
                        <label for="InputTitle">Name Category : </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="InputTitle" name="name"  value="{{old('name', $Category->name )}}">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    
                    
                    <div class="position-relative row form-check">
                        <div class="col-sm-10 offset-sm-2">
                            <button  type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                    
                   
                </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
