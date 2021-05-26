<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;
use App\OrderDetail;
use App\Coupon;
use DB;
use Mail;
use App\Mail\CancelMail;
use App\Mail\ProcessedMail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::with('user')->with('coupon')->get();
        // dd($order);
        return view('Admin.pages.order.list', compact('order'));
    }

    public function sendMailCancel(Request $request)
    {
        $orderdetail ;   
        $order = Order::find($request->orderCancel);
        $orderdetail= OrderDetail::where('order_id',$request->orderCancel)->with('product')->get();
        // dd($orderdetail);
        Mail::to($order->user->email)->send(new CancelMail($order,$orderdetail));
        return redirect()->back()->with('thongbao', 'Gửi Mail Thành Công!');

    }
     public function sendMailProcess(Request $request)
    {
       
        $order = Order::find($request->orderProcess);
        $orderdetail = OrderDetail::where('order_id',$request->orderProcess)->with('product')->get();
        Mail::to($order->user->email)->send(new ProcessedMail($order,$orderdetail));
        return redirect()->back()->with('thongbao', 'Gửi Mail Thành Công!');

    }

    public function show_order_byID($id)
    {
      
        $order_byID = Order::with('user')->with('order_detail')->with('coupon')->where('id',$id)->get();
        $orderDetail = OrderDetail::with('product')->where('id',$id)->get();

       //dd($orderDetail);
        
        //lấy mã coupon
        foreach ($order_byID as $key => $value)
        {
            $order_coupon = $value->coupon_id;
            $status = $value->status;
        }


        //su dung coupon
        if($order_coupon !=0)
        {
            $coupon = Coupon::where('id', $order_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_code = $coupon->coupon_code;
            $coupon_number = $coupon->coupon_number;
        }else {
            $coupon_condition = 2;
            $coupon_number = 0;
            $coupon_code = 'Không Có Mã Giảm Giá';
        }

        return view('Admin.pages.order.show_order', compact('order_byID','orderDetail','coupon_condition', 'coupon_number','coupon_code'));
    }

    //lọc order theo trạng thái (view order)
    public function filterOrder($id)
    {
        $orderStatus = Order::with('user')->with('coupon')->where('status', $id)->get()->toArray();
            foreach($orderStatus as $key => $value)
            {
                ?>
                   <tr>
                    <td> <?php echo $key+1 ?> </td>
                    <td> <?php echo $value['user']['name'] ?></td>
                    <td> <?php echo number_format($value['order_total']) ?> VNĐ</td>
                    <td>
                    <?php
                       if($value['status'] == 0) {
                    ?>
                       <span><a href="#" class="btn btn-xs btn-info" style="font-size: 12px;">Đơn Mới</a></span>
                    <?php
                        }else if($value['status'] == 1) {
                    ?>
                        <a href="#" class="btn btn-xs btn-success" style="font-size: 12px;">Đã Xử Lý</a>

                        <?php
                     } else if ($value['status'] == 2) {
                      ?>
                       <a href="#" class="btn btn-xs btn-primary" style="font-size: 12px;">Đã Nhận Hàng</a>
                        <?php
                     } else if($value['status'] == 3){ ?>
                            <a href="#" class="btn btn-xs btn-danger" style="font-size: 12px;">Hủy Đơn</a>
                    <?php } 
                     ?>
                    </td>
                    <td><?php echo $value['date'] ?></td>
                    <td><?php 
                            if($value['coupon_id']!=0)
                            { 
                                echo $value['coupon']['coupon_code'];
                            }
                            else{
                                echo 'Không Có Mã Giảm Giá';
                            }
                    ?></td>
                    <td> <a href="<?php echo  route('show-order-byID', $value['id']) ?>">Chi Tiết</a></td>
                   <td style="text-align: center;">
                     
                     <button class="btn btn-danger deleteorder" title ="<?php echo "Xóa Đơn Hàng" ?>" data-toggle="modal" data-target="#delete" type="button" data-id="<?php echo $value['id'] ?>" ><i class="fas fa-trash-alt"></i></button>
                   </td>
                 </tr>
                    <?php
                 }
            }


    //xử lý trạng thái đơn hàng trong view order
        public function processOrder(Request $request, $id)
        {
            \Log::info(json_encode(Order::find($id)->toArray));
            Order::find($id)->update(['status'=>$request->status]);
            return response()->json(['success'=>"Xử lý đơn hàng thành công!"],200);
        }

        
    /**

     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if($order->delete()){ //neu xoa thanh cong
            return response()->json(['success'=>'Xóa Thành Công']);
        } else{
           return response()->json(['success'=>'Xóa Không Thành Công']);
        }
    }

}
