@extends('admin.layouts.master')

@section('title')
List Orders
@endsection

@section('content')

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">List Orders</h6>
  </div>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <select name="" id="statusID" class="form-control">
            <option value="">-Lọc Trạng Thái Đơn Hàng-</option>
            <option value="0">Chưa xử lý ( Đơn Mới )</option>
            <option value="1">Chưa nhận hàng ( Đã xử lý)</option>
            <option value="2">Đã nhận hàng ( Đã Nhận Hàng)</option>
            <option value="3">Đơn hàng bị hủy ( Hủy Đơn )</option>
          </select>
        </div>
      </div>
      <div class="col-md-1">
        <button class="btn btn-primary" type="button" onclick="refresh()"><i class="fas fa-sync-alt"></i></button>
      </div>

    </div>
  </div>
    
  <div class="card-body">
    
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Total</th>
            <th>Status</th>
            <th>Date Order</th>
            <th>Coupon</th>
            <th>Show</th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>
                  
                  <tbody id="getOrder">
                   
                   @foreach($order as $key => $value)
                   <tr>
                    <td>{{$key+1}}</td>
                    <td>
                      {{$value->user_name}}
                    </td>
                    <td>{{number_format($value->order_total)}} VNĐ</td>
                    <td>
                    @php
                       if($value->status == 0) {
                    @endphp
                       <span><a href="#" class="btn btn-xs btn-info" style="font-size: 12px;" id="getDonmoi">Đơn Mới</a></span>
                    @php
                        }else if($value->status == 1) {
                    @endphp
                        <a href="#" class="btn btn-xs btn-success" style="font-size: 12px;" id="getDXL">Đã Xử Lý</a>

                        @php
                     } else if ($value->status == 2) {
                      @endphp
                       <a href="#" class="btn btn-xs btn-primary" style="font-size: 12px;" id="getHD">Đã Nhận Hàng</a>
                        @php
                     } else if($value->status == 3) {
                     @endphp
                     <a href="#" class="btn btn-xs btn-danger" style="font-size: 12px;" id="getHD">Hủy Đơn</a>
                     @php } @endphp
                    </td>
                    <td>{{$value->date}}</td>
                    <td>
                      @if($value->coupon_id != 0)
                      {{$value->coupon->coupon_code}}
                      @else
                      Không Có Mã Giảm Giá
                      @endif
                    </td>
                    <td> <a href="{{route('show-order-byID', $value->id)}}">Chi Tiết</a></td>
                   <td style="text-align: center;">
                     {{-- <button class="btn btn-primary editcategory" title ="{{"Sửa Đơn Hàng Của"." ".$value->user->name}}"  data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}" ><i class="fas fa-edit"></i></button> --}}
                     <button class="btn btn-danger deleteorder" title ="{{"Xóa Đơn Hàng Của"}}" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}" ><i class="fas fa-trash-alt"></i></button>
                   </td>
                 </tr>
                 @endforeach
               </tbody>
      </table>
             
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
<script>
  function refresh()
  {
      location.reload();
  }
</script>
    
@endsection