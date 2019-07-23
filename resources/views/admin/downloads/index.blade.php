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
                <h3 class="page-heading mb-4">Downloads</h3>

                <form method="post" action="{{route('admin.downloads.store')}}" enctype="multipart/form-data" class="form-inline">
                    @csrf
                    <div class="form-group">
                        <label>Name : </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror mr-1" id="InputName" name="name"  placeholder="Name">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label >File : </label>
                        <input type="file" class="form-control @error('file') is-invalid @enderror mr-1" id="InputFile" name="file"  placeholder="File">
                        @error('file')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="position-relative row form-check">
                        <div class="col-sm-10 offset-sm-2">
                        <button  type="submit" class="btn btn-primary mr-1">Upload</button>
                        </div>
                    </div>

                </form>
                <hr>
                <div class="table-responsive">
                <table class="table center-aligned-table">
                    <thead>
                        <tr class="text-primary">
                            <td>Name</td>
                            <td>Size</td>
                            <td>Downloads</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($downloads as $download)
                        <tr class="">
                            <td>{{$download->name}}</td>
                            <td>{{$download->size}}</td>
                            <td>{{$download->downloads}}</td>
                            <td>
                                <a href="{{route('admin.downloads.download',['id'=> $download->id])}}" class="btn btn-info">
                                   Download
                                </a>

                                <a href="{{route('admin.downloads.preview',['id'=> $download->id])}}" class="btn btn-success">
                                   Preview
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                </div>
                </div>
    </div>
    </div>
   

{{$downloads->links()}}
@endsection