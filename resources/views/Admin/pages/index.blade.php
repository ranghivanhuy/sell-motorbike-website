@extends('admin.layouts.master')

@section('title')
Admin - Moto Shop
@endsection

@section('content')
<div class="row">
				 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thống Quản Trị Hệ Thống Website bán Moto</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tạo Báo Cáo</a>
          </div>


           <div class="row">

            <!-- So luong san pham -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Số Lượng Sản Phẩm</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$product_count}} Sản Phẩm</div>
                      <div class="h6 mb-0 text-gray-700"><a href="{{route('products.index')}}"><span style="font-size: 14px;"> (Chi Tiết)</span></a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
            <!-- Số lượng khách hàng -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Số Lượng Khách Hàng</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user_count}} 
                      Khách Hàng</div>
                      <div class="h6 mb-0 text-gray-700"><a href="{{route('users.index')}}"><span style="font-size: 14px;"> (Chi Tiết)</span></a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- số lượng đơn hàng -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số Lượng Đơn Hàng</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$order_count}} Đơn Hàng</div>
                          <div class="h6 mb-0 text-gray-700"><a href="{{route('orders.index')}}"><span style="font-size: 14px;"> (Chi Tiết)</span></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- số lượng liên hệ ( contact ) -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sô Lượng Liên Hệ</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$contact_count}} Liên Hệ </div>
                      <div class="h6 mb-0 text-gray-700"><a href="{{route('users.contact')}}"><span style="font-size: 14px;"> (Chi Tiết)</span></a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-8 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Đơn Hàng Mới Nhất</h6>
                </div>
                <div class="card-body">
                 {{--  <h1>hihi</h1> --}}
                            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Name</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Date Order</th>
                      
                      <th>Show</th>
                      
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
                              
                              <td> <a href="{{route('show-order-byID', $value->id)}}">Chi Tiết</a></td>
                             
                           </tr>
                           @endforeach
                         </tbody>
                </table>
                       
              </div>
                  
                
                </div>
              </div>
          </div>

          <div class="col-xl-4 col-lg-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Trạng thái đơn hàng</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart">
                      <input type="hidden" class="orderNew" value="{{$orderNew}}" name="orderNew">
                       <input type="hidden" class="orderProcessed" value="{{$orderProcessed}}" name="orderProcessed">
                       <input type="hidden" class="orderSuccess" value="{{$orderSuccess}}" name="orderSuccess">
                       <input type="hidden" class="orderCancel" value="{{$orderCancel}}" name="orderCancel">
                    </canvas>

                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Đơn Mới
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Đã Xử Lý
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Đã Nhận Hàng
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Hủy Đơn
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="card mb-4">
                  <div class="card-header">
                      <i class="fas fa-chart-bar mr-1"></i>
                      Thống Kê Doanh Thu
                  </div>
                  <div class="card-body"><canvas id="myBarChart" width="100%" height="50">
                    <input type="hidden" class="orderSums1" value="{{$orderSums1}}" name="orderSums1">
                    <input type="hidden" class="orderSums2" value="{{$orderSums2}}" name="orderSums2">
                    <input type="hidden" class="orderSums3" value="{{$orderSums3}}" name="orderSums3">
                    <input type="hidden" class="orderSums4" value="{{$orderSums4}}" name="orderSums4">
                    <input type="hidden" class="orderSums5" value="{{$orderSums5}}" name="orderSums5">
                    <input type="hidden" class="orderSums6" value="{{$orderSums6}}" name="orderSums6">
                    <input type="hidden" class="orderSums7" value="{{$orderSums7}}" name="orderSums7">
                    <input type="hidden" class="orderSums8" value="{{$orderSums8}}" name="orderSums8">
                    <input type="hidden" class="orderSums9" value="{{$orderSums9}}" name="orderSums9">
                    <input type="hidden" class="orderSums10" value="{{$orderSums10}}" name="orderSums10">
                    <input type="hidden" class="orderSums11" value="{{$orderSums11}}" name="orderSums11">
                    <input type="hidden" class="orderSums12" value="{{$orderSums12}}" name="orderSums12">
                    </canvas></div>
                  
              </div>
          </div>
          <div class="col-lg-6">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sản Phẩm Nổi Bật</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Price</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($productTrend as $key => $item)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price) }}</td>
                          </tr> 
                        @endforeach
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
          <div class="col-lg-6">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Sản Phẩm Bán Chạy</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên sản phẩm</th>
                      <th>Giá </th>
                      <th>Số lượng đã bán</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($productHight as $key => $item)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ number_format($item->price) }}</td>
                      <td>{{ $item->tong }}</td>
                    </tr> 
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
        <!-- Thống kê 5 đơn hàng mới nhất -->

@endsection