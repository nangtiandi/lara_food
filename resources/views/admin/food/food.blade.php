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
              <h3 class="card-title">Food List Table</h3>
              <a href="{{route('food.create')}}" class="btn btn-secondary" style="float: right">Create</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
              <table id="example2" class="table table-bordered table-hover">
                <thead class="text-center">
                <tr>
                  <th>Food Name</th>
                  <th>Category Name</th>
                  <th>Created At</th>
                  <th colspan="2">Actions </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($foods as $food)
                <tr>
                  <td>{{$food->name}}</td>
                  <td>{{$food->category->category}}</td>
                  <td>{{$food->created_at->format('h i a')}}</td>
                  <td><a href="{{route('food.edit',$food->id)}}" class="btn btn-warning">Edit</a></td>
                  <td>
                      <form action="{{route('food.destroy',$food->id)}}" method="post">
                          @csrf
                          @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Del</button>
                      </form>
                  </td>
                </tr>
                @empty
                    <tr>
                      <td colspan="4">The food plate is empty</td>
                    </tr>
                @endforelse
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
