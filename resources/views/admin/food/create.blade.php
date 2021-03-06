@extends('layouts.master')
@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <div class="content my-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Food List Table</h3>
                                <a href="{{route('food.index')}}" class="btn btn-secondary" style="float: right">Back</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('food.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                        @error('name')
                                        <p class="text-danger"><strong >{{$message}}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Category</label>
                                        <select name="category_id" id="" class="form-select">
                                            <option value="">Select Your Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Photo</label>
                                        <input type="file" class="form-control" name="photo">
                                        @error('photo')
                                        <p class= "text-danger"><strong >{{$message}}</strong></p>
                                        @enderror
                                    </div>
                                    <input type="submit" class="btn btn-secondary" value="Create">
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
