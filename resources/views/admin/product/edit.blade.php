@extends('layouts.admin')

@section('head')
    <title>Edit Product - 2HAND</title>
    <link id="pagestyle" href="{{asset('css/app.css')}}" rel="stylesheet"/>
    <link id="pagestyle" href="{{asset('css/custom.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Product</h4>
        </div>
        <div class="card-body">
            <form action="{{`admin/edit-product/`.$product->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{$product->name}}" name="name"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{$product->slug}}" name="slug"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea type="text" class="form-control" name="description"
                                  rows="3">{{$product->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <select class="form-select" name="cate_id">
                            @foreach($category as $item)
                                <option
                                    value="{{$item->id}}"{{$item->id == $product->cate_id ? 'selected="selected"':''}}>{{$item->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mt-2 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{$product->status == '1'? 'checked':''}} name="status"/>
                    </div>
                    <div class="col-md-3 mt-2 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" {{$product->trending == '1'? 'checked':''}} name="trending"/>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" value="{{$product->original_price}}"
                               name="original_price"/>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" value="{{$product->selling_price}}"
                               name="selling_price"/>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" value="{{$product->quantity}}" name="quantity"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" value="{{$product->meta_title}}" name="meta_title"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea type="text" class="form-control" name="meta_keywords"
                                  rows="3">{{$product->meta_keywords}}  </textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea type="text" class="form-control" name="meta_descrip"
                                  rows="3"> {{$product->meta_descrip}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="file" class="form-control" name="image">
                        @if($product->image)
                            <img class="image-thumbnail" src="{{asset('assets/uploads/product/'.$product->image)}}"
                                 alt="Product image">
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
