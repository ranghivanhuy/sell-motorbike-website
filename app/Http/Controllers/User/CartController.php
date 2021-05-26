<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\User\CartRequest;
use Auth;
use Cart;
use App\User;
use App\Category;
use App\Product;
use App\Coupon;
use Session;
session_start();
class CartController extends Controller
{
	public function savecart(CartRequest $request){
		$product_id=$request->productid_hidden;
		$quantity=$request->quantity;
		$product_info=Product::where('id',$product_id)->first();
		$data['id']=$product_info->id;
		if($request->quantity>0){
			$data['qty']=$request->quantity;
		}else{
			$data['qty']=1;
		}
    // $data['qty']=$request->quantity;
		$data['name']=$product_info->name;
		$data['price']=$product_info->price;
		$data['weight']=$product_info->price;
		$data['options']['image']=$product_info->image_path;
    // Cart::count($data['qty']);
		$content=Cart::content();
		foreach ($content as $key => $v_content) {
			if($v_content->id == $data['id']){
				if($data['qty'] + $v_content->qty > $product_info->quantity){
					$data['qty'] = $product_info->quantity - $v_content->qty;
					if($data['qty'] == 0){
						return redirect()->back()->with('thongbao', 'Đã Thêm Tối Đa Sản Phẩm Trong Kho Vào Giỏ Hàng Rồi');
					}
				}
				if($data['qty']+$v_content->qty>10){
					$data['qty'] = 10-$v_content->qty;
					if($data['qty'] == 0){
						return redirect()->back()->with('thongbao', 'Đã Thêm Tối Đa Sản Phẩm Trong Kho Vào Giỏ Hàng Rồi');
					}
				}
			}
		}
		if($data['qty']>$product_info->quantity){
			$data['qty']=$product_info->quantity;
			Cart::add($data);
			return redirect()->back()->with('thongbao', ' Đã Thêm '.$data['qty'].' sản phẩm vào giỏ hàng');
		}else{
			Cart::add($data);
			return redirect()->back()->with('thongbao', 'Thêm '.$data['qty'].' sản phẩm vào giỏ hàng thành công');
		}
	}


	public function showcart(){
		$list_all_category = Category::with('children')->where('parent_id', 0)->get();
		return view('User.pages.cart',compact('list_all_category'));
	}
	public function deletecart($rowId){
		Cart::update($rowId,0);
		if(Cart::content()->count()==0){
			Session::forget('coupon');
		}
		return redirect()->back()->with('thongbao', 'xóa sản phẩm ra giỏ hàng thành công');

    // return redirect()->route('show.cart');
	}
	public function updatecart(CartRequest $request, $rowId){
		$quantity=$request->quatity_cart;
		$id=$request->product_id_hidden;
		$product_info=Product::where('id',$id)->first();
		if($quantity>$product_info->quantity){
			$quantity=$product_info->quantity;
			Cart::update($rowId,$quantity);
			return redirect()->route('show.cart')->with('thongbao','Vui Lòng không nhập quá số lượng sản phẩm trong kho');
		}
		Cart::update($rowId,$quantity);
		return redirect()->route('show.cart')->with('thongbao','Cập Nhật Sản Phẩm Thành Công');
	}

	public function checkcoupon(Request $request)
	{
		$data=$request->all();
		$coupon=Coupon::where('coupon_code',$data['coupon_code'])->first();


		// dd($coupon);
		if($coupon){
			if($coupon['coupon_time']==0){
				return redirect()->back()->with('thongbao','Coupon đã hết');
			}else if($coupon->expired){
				return redirect()->back()->with('thongbao','Coupon đã hết hạn sử dụng');
			}
			$count_coupon=$coupon->count();
			// dd($count_coupon);
			if($count_coupon>0){
				$coupon_session=Session::get('coupon');
				if($coupon_session==true){
					$is_avaiable=0;
					if($is_avaiable==0){
						$cou[]=array(
							'id'=> $coupon->id,
							'coupon_code'=>$coupon->coupon_code,
							'coupon_condition'=>$coupon->coupon_condition,
							'coupon_number'=>$coupon->coupon_number,
						);
						Session::put('coupon',$cou);
					}
				}else{
					$cou[]=array(
						'id'=> $coupon->id,
						'coupon_code'=>$coupon->coupon_code,
						'coupon_condition'=>$coupon->coupon_condition,
						'coupon_number'=>$coupon->coupon_number,
					);
					Session::put('coupon',$cou);
				}
				Session::save();
				return redirect()->back()->with('thongbao','them ma giam gia thanh cong');
			}
		}else{
			return redirect()->back()->with('thongbao','Ma giam gia khong dung');
		}
	}

}
