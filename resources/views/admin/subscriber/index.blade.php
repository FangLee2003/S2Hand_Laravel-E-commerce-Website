@extends('layouts.admin')

@section('head')
    <title>Subscribers - 2HAND</title>
    <link id="pagestyle" href="{{asset('css/app.css')}}" rel="stylesheet"/>
    <link id="pagestyle" href="{{asset('css/custom.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Subscribers</h4>
        </div>
        <div class="card-body">
            <a class="btn btn-success" href="{{url('admin/add-subscriber')}}">
                Add
            </a>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subscribers as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{url('admin/edit-subscriber/'.$item->id)}}">
                                Edit
                            </a>
                            <a class="btn btn-danger" href="{{url('admin/delete-subscriber/'.$item->id)}}">
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
