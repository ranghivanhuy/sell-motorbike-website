@extends('admin.layouts.master')

@section('title')

Add Products

@endsection

@section('content')
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Add Products</h6>
            </div>
	   <div class="row" style="margin: 5px" >
                    <div class="col-lg-6" style="margin: auto;">

                        <form role="form" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
							@csrf

                            {{-- @if($errors->any())
                            <p>has error</p> 
                            @endif --}}
                            
                            <fieldset class="form-group">
                                <label>Name : <i style="color: red">*</i> </label>
                                <input class="form-control" name="name" placeholder="Enter the name product.." value="{{old('name')}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Quantity : <i style="color: red">*</i> </label>
                                <input class="form-control" name="quantity" placeholder="Enter the quantity.." value="{{old('quantity')}}">
                                @error('quantity')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Trend : <i style="color: red">*</i> </label>
                                <input class="form-control" name="trend" placeholder="Enter the trend.." value="{{old('trend')}}">
                                @error('trend')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Description : <i style="color: red">*</i> </label>
                                <textarea  class="form-control ckeditor "  name="description" id="editor1" value="{{old('description')}}"></textarea>
                                {{-- <input class="form-control" name="description" placeholder="Enter the description.." value="{{old('description')}}"> --}}
                                @error('description')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Price : <i style="color: red">*</i> </label>
                                <input class="form-control" name="price" placeholder="Enter the price.." value="{{old('price')}}">
                                @error('price')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <div class="form-group">
                                <label>Category : <i style="color: red">*</i></label>
                                <select class="form-control" name="category_id">
                                    <option value="0">Define Categories</option>
                                   @foreach($list_parentID as $category)
                                        <?php $str = "-" ?>
                                        <option value="{{$category->id}}"><?php echo $str; ?>{{$category->name}}</option>
                                   @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Images : <i style="color: red">*</i></label>
                                    <input type="file" name="image_path" class="form-control">
                                 
                             </div>
                           
                            <button type="submit" class="btn btn-success">Thêm</button>
                            <button type="reset" class="btn btn-primary">Làm Lại</button>

                        </form>

                    </div>
        </div>
</div>
@endsection