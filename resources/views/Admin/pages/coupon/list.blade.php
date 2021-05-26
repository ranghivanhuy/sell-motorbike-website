@extends('admin.layouts.master')

@section('title')
List Coupon
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">List Coupon Products</h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Code</th>
            <th>Time</th>
            <th>Number</th>
            <th>Condition</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>

        <tbody>

         @foreach($coupons as $key => $value)
         <tr>
          <td>{{$key+1}}</td>
          <td>{{$value->coupon_name}}</td>
          <td>{{$value->coupon_code}}</td>
          <td>{{$value->coupon_time}}</td>
          <td>{{$value->coupon_number}}</td>
          <td>
            @php
            if($value->coupon_condition == 1) {
              @endphp
              <a href="#">Giảm Theo Phần Trăm</a>
              @php
            }else{
              @endphp
              <a href="#">Giảm Theo tiền mặt</a>
              @php
            }
            @endphp
          </td>
          <td>{{$value->start_date}}</td>
          <td>{{$value->end_date}}</td>
          <td style="text-align: center;">
           <button class="btn btn-primary editcoupon" title ="{{"Sửa Mã Giảm Giá Của"." ".$value->coupon_name}}"  data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}" ><i class="fas fa-edit"></i></button>
           <button class="btn btn-danger deletecoupon" title ="{{"Xóa Mã Giảm Giá Của"." ".$value->coupon_name}}" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}" ><i class="fas fa-trash-alt"></i></button>

            @if($value->expired)
           <p style="color: red;"><b>Hết hạn</b></p>
           @endif
         </td>
       </tr>
       @endforeach
     </tbody>
   </table>

 </div>
</div>
</div>
<!-- Edit Modal-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa mã giảm giá : <span class="title"></span></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" style="margin: 5px">
          <div class="col-lg-12">

            <form role="form" enctype="multipart/form-data">
           
                            <fieldset class="form-group">
                                <label>Coupon Name : <i style="color: red">*</i> </label>
                                <input class="form-control coupon_name" name="coupon_name" value="{{old('coupon_name')}}">
                                <span class="errorName" style="color: red; font-size: 1rem;"></span>
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Coupon Code  : <i style="color: red">*</i> </label>
                                <input class="form-control coupon_code" name="coupon_code"  value="{{old('coupon_code')}}">
                                <span class="errorCode" style="color: red; font-size: 1rem;"></span>
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Coupon Time : <i style="color: red">*</i> </label>
                                <input class="form-control coupon_time" name="coupon_time"  value="{{old('coupon_time')}}">
                                <span class="errorTime" style="color: red; font-size: 1rem;"></span>
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Coupon Condition : <i style="color: red">*</i> </label>
                                <select class="form-control coupon_condition" name="coupon_condition">
                                  <option value="0" class="defaut" >---Coupon Condition---</option>
                                  <option value="1" class="phantram">Coupon Percent</option>
                                  <option value="2" class="tien">Coupon Money</option>
                                </select>
                               <span class="errorCondition" style="color: red; font-size: 1rem;"></span>
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Coupon Number : <i style="color: red">*</i> </label>
                                <input class="form-control coupon_number" name="coupon_number"  value="{{old('coupon_number')}}">
                               <span class="errorNumber" style="color: red; font-size: 1rem;"></span>
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Star Date : <i style="color: red">*</i> </label>
                                <input type="date" class="form-control start_date" name="start_date"  value="{{old('start_date')}}">
                               <span class="errorStatr" style="color: red; font-size: 1rem;"></span>
                            </fieldset>

                            <fieldset class="form-group">
                                <label>End date : <i style="color: red">*</i> </label>
                                <input type="date" class="form-control end_date" name="end_date"  value="{{old('end_date')}}">
                                <span class="errorEnd" style="color: red; font-size: 1rem;"></span>
                            </fieldset>

                          </form>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success updatecoupon" data-id ="">Sửa</button>
                        
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <!-- delete Modal-->
              <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body" style="margin-left: 183px;">
                      <button type="button" class="btn btn-success delete">Có</button>
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                      <div>
                      </div>
                    </div>
                  </div>
                  @endsection