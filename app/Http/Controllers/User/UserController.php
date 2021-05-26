<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateProfileUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use Auth;
use DB;

class UserController extends Controller
{
    public function index($id)
    {
    	$user=User::where('id',$id)->first();
    	$list_all_category = Category::with('children')->where('parent_id', 0)->get();
    	return view('User.pages.users.show_profile',compact('user','list_all_category'));
    }
    public function changeprofile(UpdateProfileUserRequest $request, $id){
    	$data=$request->only('name','email','address','phone');
    	User::find($id)->update($data);
    	return redirect()->back()->with('thongbao','Thay đổi thông tin thành công');

    }
    public function changepassword(Request $request, $id){

        $data['email']=Auth::user()->email;
        $data['password']=$request->password_old;
        if(Auth::attempt($data)){
            $data['passwordNew']=$request->password_new;
            $data['rePasswordNew']=$request->repassword_new;
            if($data['passwordNew']===$data['rePasswordNew']){
                $nData['password']=Hash::make($data['passwordNew']);
                User::find($id)->update($nData);
                return redirect()->back()->with('thongbao','Thay đổi mật khẩu thành công');
            }else{
                return redirect()->back()->with('thongbao','Mật Khẩu mới không khớp');
            }
        }else{
            return redirect()->back()->with('error', 'Mật Khẩu không đúng');
        }
    }
}
