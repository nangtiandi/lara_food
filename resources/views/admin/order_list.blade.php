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
                                        <th>Table Name</th>
                                        <th>Status</th>
                                        <th>Ordered At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td>{{$order->food->name}}</td>
                                            <td>{{$order->table->table_name}}</td>
                                            <td><span class="badge bg-info">{{$status[$order->status]}}</span></td>
                                            <td>
                                                <span>{{$order->created_at->format('Y m d')}} || {{$order->created_at->format('h i a')}}</span>
                                            </td>
                                            <td>
                                                <a href="/order/{{$order->id}}/done" class="btn btn-light">Submit</a>
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
