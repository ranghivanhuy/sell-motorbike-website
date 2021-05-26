@extends('admin.layouts.master')

@section('title')

Edit Products

@endsection

@section('content')
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Edit Products</h6>
            </div>
	   <div class="row" style="margin: 5px" >
                    <div class="col-lg-6" style="margin: auto;">
                        <form  action="{{route('update.product', $product->id)}}" enctype="multipart/form-data" method="POST">
							@csrf
                            @method('PUT')
                            <fieldset class="form-group">
                                <label>Name : <i style="color: red">*</i> </label>
                                <input class="form-control" name="name" value = "{{$product->name}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Quantity : <i style="color: red">*</i> </label>
                                <input class="form-control" name="quantity"  value="{{$product->quantity}}">
                                @error('quantity')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Trend : <i style="color: red">*</i> </label>
                                <input class="form-control" name="trend"  value="{{$product->trend}}">
                                @error('trend')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Description : <i style="color: red">*</i> </label>
                                <textarea  class="form-control ckeditor "  name="description" id="editor1"> {{$product->description}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>



                            <fieldset class="form-group">
                                <label>Price : <i style="color: red">*</i> </label>
                                <input class="form-control" name="price"  value="{{$product->price}}">
                                @error('price')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Image : <i style="color: red">*</i> </label>
                                <input class="form-control" type="file" name="image_path" >
                                <img src="/upload/product/{{$product->image_path}}" width="100" height="100">
                                @error('name')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <div class="form-group">
                                <label>Category : <i style="color: red">*</i></label>
                                <select class="form-control" name="category_id">
                                    <option value="0">Define Categories</option>
                                   @foreach($list_parentID as $category)
                                        @if($category->id == $product->category_id)
                                        
                                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                                        @else 
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                   @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Sửa</button>
                            <button type="reset" class="btn btn-primary">Làm Lại</button>

                        </form>
                

                    </div>
        </div>
</div>
@endsection