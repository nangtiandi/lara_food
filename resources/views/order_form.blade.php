@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/')}}">Food Order</a>
            </li>
        </ul>
        <form action="{{route('order.submit')}}" method="post" class="my-3">
            @csrf
            <div class="row my-3">
                @foreach($foods as $food)
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset('images/'.$food->photo)}}" alt="" class="w-100">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{$food->name}}</h4>
                            <input type="number" name="{{$food->id}}" class="form-control" min="0">

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mb-3 row">
                <div class="col-2">
                    <select name="table_name" id="" class="form-select">
                        <option selected>Choice Your Location</option>
                        @foreach($tables as $table)
                            <option value="{{$table->id}}">{{$table->table_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <input type="submit" class="btn btn-secondary" value="Add Order">
                </div>
            </div>

        </form>

    </div>
@endsection
