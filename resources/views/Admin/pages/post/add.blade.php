@extends('admin.layouts.master')

@section('title')

Add New Post

@endsection

@section('content')
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Add New Post</h6>
            </div>
	   <div class="row" style="margin: 5px" >
                    <div class="col-lg-6" style="margin: auto;">

                        <form role="form" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
							@csrf

                            {{-- @if($errors->any())
                            <p>has error</p> 
                            @endif --}}
                            
                            <fieldset class="form-group">
                                <label>Title : <i style="color: red">*</i> </label>
                                <input class="form-control" name="title" value="{{old('title')}}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Slug : <i style="color: red">*</i> </label>
                                <input class="form-control" name="slug" value="{{old('slug')}}">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Content : <i style="color: red">*</i> </label>
                                <textarea  class="form-control ckeditor "  name="content" id="editor2" value="{{old('content')}}"></textarea>
                                @error('content')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <button type="submit" class="btn btn-success">Tạo Bài Mới</button>
                            <button type="reset" class="btn btn-primary">Làm Lại</button>

                        </form>

                    </div>
        </div>
</div>
@endsection