<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\CreateOrderUserRequest;
use Auth;
use DB;
use Cart;
use App\User;
use App\Category;
use App\Product;
use App\Order;
use App\OrderDetail;
use App\Coupon;
use Session;
use Mail;
use App\Mail\OrderBillMail;

class CheckoutController extends Controller
{
	public function logincheckout(){
		return redirect()->route('login.user')->with('thongbao','Vui Lòng Đăng Nhập Để Thanh Toán');
	}
	public function checkout(){
		$list_all_category = Category::with('children')->where('parent_id', 0)->get();
		return view('User.pages.checkout',compact('list_all_category'));
	} 
	public function order_place(CreateOrderUserRequest $request){
		$data_order = $request->all();
		$content= Cart::content();

        //order
		$order['name']=Auth::user()->name;
		$order['user_id']=Auth::user()->id;
		$order['order_total']=$data_order['order_total'];
		$order['status']="0";
		$order['date']=now();
		$order['address']=$request->address;
		$order['phone']=$request->phone;
		$order['user_name']=$request->name;
		$order['coupon_id']=$data_order['coupon_id'];

		$mOrder=Order::create($order);
		if($order['coupon_id']){
			$coupon_time=Coupon::find($order['coupon_id']);

			$coupon['coupon_time']=$coupon_time['coupon_time']-1;
			Coupon::find($order['coupon_id'])->update($coupon);
		}
		
		// $order_id=DB::table('orders')->insertGetId($order);
		$order_id=$mOrder->id;

        //order detail
		$order_details=[];
		foreach ($content as $key => $v_content) {
			$order_detail['order_id']=$order_id;
			$order_detail['product_id']=$v_content->id;
			////Xử lý số lượng
			$product=Product::find($v_content->id);

			$data['quantity']=$product['quantity']-$v_content->qty;
			// dd($product);
			if($data['quantity']<0){
				return redirect()->back()->with('thongbao','Sản Phẩm trong kho còn không còn đúng số lượng bạn đã đặt');
			}
			Product::find($v_content->id)->update($data);
			///
			$order_detail['quantity']=$v_content->qty;
			$order_detail['price']=$v_content->price;
			$order_details[$key]=OrderDetail::create($order_detail);		
		}
        // return redirect()->route('view-order');
		mail::to(Auth::user()->email)->send(new OrderBillMail($mOrder,$order_details));
		Cart::destroy();
		Session::forget('coupon');
		return redirect()->route('trang-chu')->with('thongbao','Đặt Hàng Thành Công');
	}
}
