@extends('layouts.admin')

@section('head')
    <title>Add Account - 2HAND</title>
    <link id="pagestyle" href="{{asset('css/app.css')}}" rel="stylesheet"/>
    <link id="pagestyle" href="{{asset('css/custom.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Account</h4>
        </div>
        <div class="card-body">
            <form action="{{`admin/add-account`}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" for="name" name="name"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control" for="password" name="password"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Phone</label>
                        <input type="phone" class="form-control" name="phone"/>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">City</label>
                        <input type="text" class="form-control" name="city"/>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Country</label>
                        <input type="text" class="form-control" name="country"/>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Postcode</label>
                        <input type="text" class="form-control" name="postcode"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Address 1</label>
                        <input type="text" class="form-control" name="address1"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Address 2</label>
                        <input type="text" class="form-control" name="address2"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="file" class="form-control" name="avatar">
                    </div>
                    <div class="col-md-12 mt-3 mb-3">
                        <label for="">Admin</label>
                        <input type="checkbox" name="admin"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
