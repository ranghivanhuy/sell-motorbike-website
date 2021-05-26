@extends('admin.layouts.master')
@section('title')
Add Categories
@endsection

@section('content')
{{-- <a href="\articles"><button type="button" class="btn btn-primary" style="margin-bottom: 10px;">Back</button></a>
 --}}<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Add Categories</h6>
            </div>

	   <div class="row" style="margin: 5px">
                    <div class="col-lg-4" style="margin: auto;">

                        <form role="form" action="{{ route('categories.store')}}" method="post">
							@csrf
                            <fieldset class="form-group">
                                <label>Name : <i style="color: red">*</i></label>
                                <input class="form-control" name="name" placeholder="Enter the categories name .. " >
                                @error('name')
                                <div class="alert alert-danger" style="font-size: 13px">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <div class="form-group">
                                <label>Parent_ID : <i style="color: red">*</i> </label>
                                <select class="form-control" name="parent_id">
                                    <option value="0" >Define Categories</option>
                                   @foreach($list_parentID as $category)
                                        <?php $str = "-" ?>
                                        <option value="{{$category->id}}"><?php echo $str; ?>{{$category->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Thêm</button>
                            <button type="reset" class="btn btn-primary">Làm Lại</button>

                        </form>

                    </div>
        </div>
</div>
@endsection