@extends('layouts.admin');

@section('head')
    <link id="pagestyle" href="{{asset('css/app.css')}}" rel="stylesheet"/>
    <link id="pagestyle" href="{{asset('css/custom.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Category</h4>
        </div>
        <div class="card-body">
            <form action="{{`edit-category/`.$category->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{$category->name}}" name="name"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{$category->slug}}" name="slug"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea type="text" class="form-control" name="description"
                                  rows="3">{{$category->description}} </textarea>
                    </div>
                    <div class="col-md-6 mt-2 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{$category->status == '1'? 'checked':''}} name="status"/>
                    </div>
                    <div class="col-md-6 mt-2 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" {{$category->trending == '1'? 'checked':''}} name="trending"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" value="{{$category->meta_title}}" name="meta_title"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea type="text" class="form-control"
                                  name="meta_keywords" rows="3">{{$category->meta_keywords}} </textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea type="text" class="form-control"
                                  name="meta_descrip" rows="3">{{$category->meta_descrip}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="file" class="form-control" name="image">
                        @if($category->image)
                            <img class="image-thumbnail" src="{{asset('assets/uploads/category/'.$category->image)}}"
                                 alt="Category image">
                        @endif
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
