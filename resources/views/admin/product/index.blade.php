@extends('layouts.admin');

@section('head')
    <title>Products - 2HAND</title>
    <link id="pagestyle" href="{{asset('css/app.css')}}" rel="stylesheet"/>
    <link id="pagestyle" href="{{asset('css/custom.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Products</h4>
        </div>
        <div class="card-body">
            <a class="btn btn-success" href="{{url('admin/add-product')}}">
                Add
            </a>
{{--            <select class="form-select" name="cate_id">--}}
{{--                @foreach($category as $item)--}}
{{--                    <option value="{{$item->id}}">{{$item->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Original price</th>
                    <th>Selling price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->findCategory->name}}</td>
                        <td>{{$item->original_price}}</td>
                        <td>{{$item->selling_price}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>
                            <img class="image-thumbnail" src="{{asset("assets/uploads/product/".$item->image)}}"
                                 alt="Image">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{url('admin/edit-product/'.$item->id)}}">
                                Edit
                            </a>
                            <a class="btn btn-danger" href="{{url('admin/delete-product/'.$item->id)}}">
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
