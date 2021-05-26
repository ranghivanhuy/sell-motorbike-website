<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;
use App\Contact;
use Mail;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_user = User::paginate(5);
        return view('Admin.pages.user.list', compact('list_user'));
    }

    public function unactiveuser($id)
    {
        User::where('id', $id)->update(['role'=>0]);
        return redirect()->route('users.index')->with('thongbao', 'Kích Hoạt User thành công');
    }

    public function activeuser($id)
    {
         User::where('id', $id)->update(['role'=>1]);
        return redirect()->route('users.index')->with('thongbao', 'Kích Hoạt Admin thành công');
    }

    public function contact()
    {
        $list_contact = Contact::all();
        return view('Admin.pages.user.contact',compact('list_contact'));
    }

    public function unactivecontact($id)
    {
        Contact::where('id', $id)->update(['status'=>0]);
        return redirect()->route('users.contact')->with('thongbao', 'Kích Hoạt Đã Liên Hệ Thành Công');
    }

    public function activecontact($id)
    {
         Contact::where('id', $id)->update(['status'=>1]);
        return redirect()->route('users.contact')->with('thongbao', 'Kích Hoạt Đang Chờ Liên Hệ Thành Công');
    }

    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $list_user_search = User::where('name', 'LIKE', '%'.$keywords.'%')->get();
        return view('Admin.pages.user.search', compact('list_user_search'));
    }

     public function historyOrder($id)
    {
        $user = User::where('id', $id)->get();
         $historyOrder = Order::where('user_id', $id)->with('order_detail')->with('user')->with('coupon')->get();
         return view('Admin.pages.user.historyOrder', compact('historyOrder','user'));
        // dd($historyOrder);
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
        //
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
        $user = User::find($id);
        if($user->delete())
        {
            return response()->json(['success'=>'Xóa Thành Công']);
        }else{
            return response()->json(['success'=>'Xóa Không Thành Công']);
        }
    }
}
