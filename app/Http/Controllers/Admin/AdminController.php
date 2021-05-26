<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Product;
use App\Order;
use App\Contact;
use DB;


class AdminController extends Controller
{

    public function index()
    {
        $product_count = Product::count();
        $user_count = User::where('role','0')->count();
        $order_count = Order::count();
        $contact_count = Contact::count();
        $order = Order::with('user')->with('coupon')->where('status',0)->orderBy('id','desc')->take(5)->get();
        $orderNew = Order::where('status', 0)->count();
        $orderProcessed = Order::where('status', 1)->count();
        $orderSuccess = Order::where('status',2 )->count();
         $orderCancel = Order::where('status', 3)->count();
         $orderSums1 = Order::where('status', 2)->whereBetween('date',['2020-01-01', '2020-01-31'])->sum('order_total');
         $orderSums2 = Order::where('status', 2)->whereBetween('date',['2020-02-01', '2020-02-29'])->sum('order_total');
         $orderSums3 = Order::where('status', 2)->whereBetween('date',['2020-03-01', '2020-03-31'])->sum('order_total');
         $orderSums4 = Order::where('status', 2)->whereBetween('date',['2020-04-01', '2020-04-30'])->sum('order_total');
         $orderSums5 = Order::where('status', 2)->whereBetween('date',['2020-05-01', '2020-05-31'])->sum('order_total');
         $orderSums6 = Order::where('status', 2)->whereBetween('date',['2020-06-01', '2020-06-30'])->sum('order_total');
         $orderSums7 = Order::where('status', 2)->whereBetween('date',['2020-07-01', '2020-07-31'])->sum('order_total');
         $orderSums8 = Order::where('status', 2)->whereBetween('date',['2020-08-01', '2020-08-31'])->sum('order_total');
         $orderSums9 = Order::where('status', 2)->whereBetween('date',['2020-09-01', '2020-09-30'])->sum('order_total');
         $orderSums10 = Order::where('status', 2)->whereBetween('date',['2020-10-01', '2020-10-31'])->sum('order_total');
         $orderSums11 = Order::where('status', 2)->whereBetween('date',['2020-11-01', '2020-11-30'])->sum('order_total');
         $orderSums12 = Order::where('status', 2)->whereBetween('date',['2020-12-01', '2020-12-31'])->sum('order_total');
        $productTrend = Product::where('trend', 1)->take(5)->get();
         $productHight = DB::table('order_details')
                        ->join('products','order_details.product_id', 'products.id')
                        ->select('products.name', 'order_details.price', DB::raw('count(product_id) as tong , product_id'))
                        ->groupBy('order_details.product_id')
                        ->orderBy('tong','desc')
                        ->take(5)
                        ->get();
        return view('Admin.pages.index', compact('product_count', 'user_count', 'order_count','contact_count','order','orderNew','orderProcessed','orderCancel','orderSuccess','orderSums1','orderSums2','orderSums3','orderSums4','orderSums5','orderSums6','orderSums7','orderSums8','orderSums9','orderSums10','orderSums11','orderSums12','productTrend','productHight'));
    }
    public function loginAdmin(Request $request)
    {
        $data = $request->only('email', 'password');
       
        if(Auth::attempt($data, $request->has('remember')))
        { 
            if(Auth::user()->role == 1)
                return redirect('admin')->with('thongbao', 'Đăng nhập thành công');
            else if(Auth::user()->role == 0)
                return redirect()->route('trang-chu')->with('thongbao', 'Đăng nhập thành công');
            else if(Auth::user()->role == 3)
                return redirect()->route('orders.index')->with('thongbao', 'Đăng nhập thành công');
        }
        else
        {
            return redirect()->route('login.admin')->with('thongbao', 'Đăng nhập thất bại, vui lòng kiểm tra lại!');
        }
    }

    public function logout()
    {
        if(Auth::check())
        {
            Auth::logout();
            return back()->with('thongbao','Đăng xuất thành công');
        }
    }
}
