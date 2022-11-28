@extends('layouts.admin')

@section('head')
    <title>Accounts - 2HAND</title>
    <link id="pagestyle" href="{{asset('css/app.css')}}" rel="stylesheet"/>
    <link id="pagestyle" href="{{asset('css/custom.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    {{--@yield('content')--}}
    <div class="card">
        <div class="card-header">
            <h4>Accounts</h4>
        </div>
        <div class="card-body my-3">
            <a class="btn btn-success" href="{{url('admin/add-account')}}">
                Add
            </a>
            <table class="table">
                <thead>
                <tr class="border-0">
                    <th class="border-0">ID</th>
                    <th class="border-0">Role</th>
                    <th class="border-0">Name</th>
                    <th class="border-0">Email</th>
                    <th class="border-0">Phone</th>
                    <th class="border-0">Avatar</th>
                    <th class="border-0">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($accounts as $account)
                    <tr class="border-0">
                        <td class="border-0">{{$account->id}}</td>
                        <td class="border-0">{{$account->role_as == 0 ? 'account' : 'Admin'}}</td>
                        <td class="border-0">{{$account->name}}</td>
                        <td class="border-0">{{$account->email}}</td>
                        <td class="border-0">{{$account->phone}}</td>
                        <td>
                            <img class="image-thumbnail" src="{{asset("assets/uploads/avatar/".$account->avatar)}}"
                                 alt="Image">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{url('admin/edit-account/'.$account->id)}}">
                                Edit
                            </a>
                            <a class="btn btn-danger" href="{{url('admin/delete-account/'.$account->id)}}">
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

@section('scripts')
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/material-admin.js') }}"></script>
@endsection
