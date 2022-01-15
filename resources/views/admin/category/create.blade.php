@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content my-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            @if (session('success'))
                                <div class="alert alert-success">  {{session('success')}} </div>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title">Category List Table</h3>
                                <a href="{{route('category.index')}}" class="btn btn-secondary" style="float: right">See All List</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('category.store')}}" method="POST">
                                   @csrf
                                   <div class="mb-3">
                                      <label for="" class="form-label">Category</label>
                                      <input type="text" name="category" class="form-control @error('category') is-invalid @enderror">
                                      @error('category')
                                          <strong class="text-danger"> {{$message}} </strong>
                                      @enderror
                                   </div>
                                   <input type="submit" class="btn btn-secondary" value="Create Category">
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
