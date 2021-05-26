<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCouponRequest;
use App\Coupon;
use Validator;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('Admin.pages.coupon.list', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.coupon.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponRequest $request)
    {
        $data = $request->all();
         if(Coupon::create($data))
        {
            return redirect()->route('coupons.index')->with('thongbao', 'Thêm mã giảm giá thành công!');
        } else
        {
            return redirect()->with('error', 'Có lỗi, vui lòng kiểm tra lại!');
        }

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
        $coupons = Coupon::find($id);
        return response()->json($coupons, 200);
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
        $validator = Validator::make($request->all(), 
            [
                 'coupon_name'=>'required|min:6|max:255|unique:coupons,coupon_name',
                'coupon_code'=>'required|min:7|max:255|',
                'coupon_time'=>'required',
                'coupon_number'=>'required',
            ],
            [
                'required'=> 'Tên danh mục không được để trống',
                'min'=> 'Tên danh mục phải đủ từ 2 đến 255 ký tự',
                'max'=>'Tên danh mục phải đủ từ 2 đến 255 ký tự',
                'coupon_code.unique'=>'Mã giảm giá đã tồn tại trong hệ thống',
                'coupon_name.unique'=>'Tên giảm giá đã tồn tại trong hệ thống',
            ]
        );
        if($validator->fails()){
            return response()->json(['error'=>'true', 'message'=>$validator->errors()], 200);
        }
        $coupons = Coupon::find($id);
        $coupons->update([
            'coupon_name'=> $request->coupon_name, 
            'coupon_code'=> $request->coupon_code,
            'coupon_time'=> $request->coupon_time,
            'coupon_condition'=> $request->coupon_condition,
            'coupon_number'=> $request->coupon_number,
            'start_date'=> $request->start_date,
            'end_date'=> $request->end_date,
        ]);
        return response()->json(['success'=>'Sửa Mã Giảm Giá Thành Công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        if($coupon->delete())
        {
            return response()->json(['success'=>'Xóa Thành Công']);
        }
        else{
            return response()->json(['error'=>'Xóa Không Thành Công']);
        }
    }
}
