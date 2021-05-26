@extends('admin.layouts.master')

@section('title')

Add Coupon

@endsection

@section('content')
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Add Coupon</h6>
            </div>
	   <div class="row" style="margin: 5px" >
                    <div class="col-lg-4" style="margin: auto;">

                        <form role="form" action="{{ route('coupons.store') }}" method="post" enctype="multipart/form-data">
							@csrf

                            {{-- @if($errors->any())
                            <p>has error</p> 
                            @endif --}}
                            
                            <fieldset class="form-group">
                                <label>Coupon Name : <i style="color: red">*</i> </label>
                                <input class="form-control" name="coupon_name" value="{{old('coupon_name')}}">
                                @error('coupon_name')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Coupon Code  : <i style="color: red">*</i> </label>
                                <input class="form-control" name="coupon_code"  value="{{old('coupon_code')}}">
                                @error('coupon_code')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Coupon Time : <i style="color: red">*</i> </label>
                                <input class="form-control" name="coupon_time"  value="{{old('coupon_time')}}">
                                @error('coupon_time')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Coupon Condition : <i style="color: red">*</i> </label>
                                 <select class="form-control" name="coupon_condition">
                                    <option value="0" >---Coupon Condition---</option>
                                    <option value="1" >Coupon Percent</option>
                                    <option value="2" >Coupon Money</option>
                                </select>
                                @error('coupon_condition')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Coupon Number : <i style="color: red">*</i> </label>
                               <input class="form-control" name="coupon_number"  value="{{old('coupon_number')}}">
                                @error('coupon_number')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Star Date : <i style="color: red">*</i> </label>
                               <input type="date" class="form-control" name="start_date"  value="{{old('start_date')}}">
                                @error('start_date')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>End date : <i style="color: red">*</i> </label>
                               <input type="date" class="form-control" name="end_date"  value="{{old('end_date')}}">
                                @error('end_date')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </fieldset>

                            <button type="submit" class="btn btn-success">Thêm</button>
                            <button type="reset" class="btn btn-primary">Làm Lại</button>

                        </form>

                    </div>
        </div>
</div>
@endsection