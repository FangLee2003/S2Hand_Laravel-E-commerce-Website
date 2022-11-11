@extends('layouts.admin');

@section('head')
    <title>Categories - 2HAND</title>
    <link id="pagestyle" href="{{asset('css/app.css')}}" rel="stylesheet"/>
    <link id="pagestyle" href="{{asset('css/custom.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Categories</h4>
        </div>
        <div class="card-body">
            <a class="btn btn-success" href="{{url('admin/add-category')}}">
                Add
            </a>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($category as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <img class="image-thumbnail" src="{{asset("assets/uploads/category/".$item->image)}}"
                                 alt="Image">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{url('admin/edit-category/'.$item->id)}}">
                                Edit
                            </a>
                            <a class="btn btn-danger" href="{{url('admin/delete-category/'.$item->id)}}">
                                Delete
                            </a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
