@extends('admin.layouts.master')

@section('title')
List Orders Detail
@endsection

@section('content')
<a href="admin/orders" ><button type="button" class="btn btn-primary" style="margin-bottom: 10px;">Back</button></a>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Customer Infomation</h6>
  </div> 
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
          </tr>
        </thead>
              <tbody>
               
                @foreach($order_byID as $key => $value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->user_name, $value->id}}</td>
                  <td>{{$value->phone , $value->id}}</td>
                  <td>{{$value->address, $value->id}}</td>
                </tr> 

                @endforeach
             
               
              </tbody>
             </table>
           </div>
         </div>

       </div>
       <br>
      
       <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">List Orders Detail</h6>
  </div>
  <br>
  
  <div class="card-body">
    
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Name Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
          </tr>
        </thead> 
              <tbody>
                @php
                $total = 0;
                @endphp
                @foreach($orderDetail as $value)
                    @php
                      $subtotal = $value->product->price*$value->quantity;
                      $total+=$subtotal;
                    @endphp
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->product->name}}</td>
                    <td>{{$value->quantity}}</td>   
                    <td>{{number_format($value->product->price)}} VN??</td>
                    <td>{{number_format($subtotal)}} VN??</td>
                  </tr>
                @endforeach
                <tr>
                 
                  <td colspan="6">
                   
                    <b>M?? Gi???m Gi?? :</b> 

                      @if($coupon_condition !=  0  )
                         {{ $coupon_code}}
                         @else 
                          Kh??ng C?? M?? Gi???m Gi??
                        @endif

                     
                    <br>
                    <b>Ti???n Shipp :</b> 0 VN??<br>
                    
                      @php 
                        $total_coupon = 0;
                      @endphp
                      @if($coupon_condition == 1)
                          @php
                          $total_after_coupon = ($total*$coupon_number)/100;
                          echo '<b> S??? Ti???n ???????c Gi???m :</b>'.' '.number_format($total_after_coupon).' '.'VN??'.'<br>';
                          $total_coupon = $total- $total_after_coupon;
                          @endphp
                     @else
                        @php 
                        $total_coupon = $total - $coupon_number;
                        echo '<b>S??? Ti???n ???????c Gi???m :</b>'.' '.number_format($coupon_number).' '.'VN??'.'<br>';
                        @endphp
                      @endif
                    <b>T???ng Ti???n Thanh To??n :</b> {{number_format($total_coupon)}} VN?? <br>

                    <b>Tr???ng Th??i :
                      
                         @foreach ($order_byID as $key => $value)
                             
                        @php
                           if($value->status == 0) {
                        @endphp
                           <span><a href="#" id="changestatus" class="btn btn-xs btn-info" style="font-size: 12px;">????n M???i</a></span>
                        @php
                            }else if($value->status == 1) {
                        @endphp
                            <a href="#" id="changestatus" class="btn btn-xs btn-success" style="font-size: 12px;">???? X??? L??</a>
                            <form action="{{ route('sendMailProcess') }}" method="POST">
                              @csrf
                              <input type="hidden" name="orderProcess" value="{{ $value->id }}">
                              <button type="submit">G???i Mail</button>
                            </form>
                            

                            @php
                         } else if ($value->status == 2) {
                          @endphp
                           <a href="#" id="changestatus" class="btn btn-xs btn-primary" style="font-size: 12px;">???? Nh???n H??ng</a>
                           
                            @php
                         } else if($value->status == 3) {
                         @endphp
                           <a href="#" id="changestatus" class="btn btn-xs btn-danger" style="font-size: 12px;">H???y ????n</a>
                            <form action="{{ route('sendMailCancel') }}" method="POST">
                              @csrf
                              <input type="hidden" name="orderCancel" value="{{ $value->id }}">
                              <button type="submit">G???i Mail</button>
                            </form>
                              @php } @endphp
                         
                         @endforeach
                      
                    </b>
                  </td>
                </tr>
                <tr>
                  <td colspan="6">
                    <select name="" class="form-control" style="width: 20%;" id="xlydonhang" data-id="{{$order_byID->first()->id}}">
                      <option value="" selected disabled>--X??? L?? ????n H??ng--</option>
                      <option value="0">????n M???i</option>
                      <option value="1">???? X??? L??</option>
                      <option value="2">???? Nh???n H??ng</option>
                      <option value="3">H???y ????n</option>
                    </select>
                  </td>
                  
                </tr>
              </tbody>
      </table>
           
           </div>
         </div>
         
       </div>
      
      
@endsection