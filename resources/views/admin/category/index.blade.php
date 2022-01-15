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
                                <h3 class="card-title">Order List Table</h3>
                                <a href="{{route('category.create')}}" class="btn btn-secondary" style="float: right">Create</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if(session('success'))
                                    <div class="alert alert-success">{{session('success')}}</div>
                                @endif
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead class="text-center">
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Created At</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    @forelse (\App\Models\Category::all() as $category)
                                        <tr>
                                           <td>{{$category->category}}</td>
                                           <td>{{$category->created_at}}</td>
                                           <td><a href="{{route('category.edit',$category->id)}}" class="btn btn-warning">Edit</a></td>
                                           <td>
                                              <form action="{{route('category.destroy',$category->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                 <button class="btn btn-danger">Del</button>
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
