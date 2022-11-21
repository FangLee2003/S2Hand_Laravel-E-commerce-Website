@extends('layouts.admin');

@section('head')
    <title>Edit Category - 2HAND</title>
    <link id="pagestyle" href="{{asset('css/app.css')}}" rel="stylesheet"/>
    <link id="pagestyle" href="{{asset('css/custom.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Account</h4>
        </div>
        <div class="card-body">
            <form action="{{`admin/edit-category/`.$user->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{$user->name}}" name="name"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" value="{{$user->email}}" name="email"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Phone</label>
                        <input type="phone" class="form-control" value="{{$user->phone}}" name="phone"/>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">City</label>
                        <input type="text" class="form-control" value="{{$user->city}}" name="city"/>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Country</label>
                        <input type="text" class="form-control" value="{{$user->country}}" name="country"/>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Postcode</label>
                        <input type="text" class="form-control" value="{{$user->postcode}}" name="postcode"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Address 1</label>
                        <input type="text" class="form-control" value="{{$user->address1}}" name="address1"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Address 2</label>
                        <input type="text" class="form-control" value="{{$user->address2}}" name="address2"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="file" class="form-control" name="avatar">
                        @if($user->avatar)
                            <img class="image-thumbnail" src="{{asset('assets/uploads/avatar/'.$user->avatar)}}"
                                 alt="Category image">
                        @endif
                    </div>
                    <div class="col-md-12 mt-2 mb-3">
                        <label for="">Admin</label>
                        <input type="checkbox" {{$user->role_as == '1'? 'checked':''}} name="admin"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
