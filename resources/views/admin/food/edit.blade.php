@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Starter Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Food Form</h3>
                                <a href="{{route('food.index')}}" class="btn btn-secondary" style="float: right">Back</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('food.update',$food->id)}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{old('name',$food->name)}}">
                                        @error('name')
                                        <p class="text-danger"><strong >{{$message}}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Category</label>
                                        <select name="category_id" id="" class="form-select">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$category->id == $food->category_id ? "selected" : ""}}>{{$category->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Photo</label>
                                        <img src="{{asset('images/'.$food->photo)}}" alt="" height="50" class="mb-2">
                                        <input type="file" class="form-control" name="photo">
                                        @error('photo')
                                        <p class= "text-danger"><strong >{{$message}}</strong></p>
                                        @enderror
                                    </div>
                                    <input type="submit" class="btn btn-secondary" value="Update">
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
@endsection
