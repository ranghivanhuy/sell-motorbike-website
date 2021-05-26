<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\User\CreateLoginUserRequest;
use App\Http\Requests\User\CreateRegisterUserRequest;
use Auth;
use Cart;
use App\Post;
use App\User;
use App\Category;
use App\Product;
use Session;

class HomeController extends Controller
{
	public function index(){
		$list_all_category = Category::with('children')->where('parent_id', 0)->get();
        // dd($list_all_category);
		$list_all_product=Product::take(3)->get();;
        // $list_all_product=Category::with('product_r')->where('id',1)->first();
        // dd($list_all_product);
		$list_highlight_product=Product::where('trend','1')->take(3)->get();

		$listpost = Post::take(5)->get();

        //
        // News
        //
		return view('User.pages.index',compact('list_all_category','list_all_product','list_highlight_product','listpost'));
		
		
	}
	public function show(){
		$list_all_category = Category::with('children')->where('parent_id', 0)->get();
		return view('User.pages.product_detail',compact('list_all_category'));
	}

	public function loginUser(CreateLoginUserRequest $request)
	{
		$data = $request->only('email', 'password');

		if(Auth::attempt($data, $request->has('remember')))
		{ 
			if(Auth::user()->role == 0){
				return redirect()->route('trang-chu')->with('thongbao', 'Đăng nhập thành công');
			}
			else if(Auth::user()->role == 1){
                return redirect('/admin')->with('thongbao', 'Đăng nhập thành công');
			}
		}
		else
		{
			return redirect()->route('login.user')->with('error', 'Đăng nhập thất bại, vui lòng kiểm tra lại!');
		}
	}

	public function logoutUser()
	{
		if(Auth::check())
		{
			Auth::logout();
			return redirect()->route('trang-chu')->with('thongbao','Đăng xuất thành công');
		}
	}
	public function loginview()
	{
		
		$list_all_category = Category::with('children')->where('parent_id', 0)->get();
		return view('User.pages.login',compact('list_all_category'));
	}
	public function storeUser(CreateRegisterUserRequest $request)
	{
		
		$data=$request->only('name','address','phone');
		$data['email']=$request->re_email;
		$data['password']= Hash::make($request->re_password);
		$data['role']='0';
        // dd($data);
		User::create($data);
		return redirect()->route('trang-chu')->with('thongbao','Đăng kí thành công');
	}

}
