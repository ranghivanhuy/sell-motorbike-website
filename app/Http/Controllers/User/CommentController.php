<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Comment;

class CommentController extends Controller
{
    public function CommentProduct(Request $request, $id)
	{
		$data=$request->all();
		$data['product_id']=$id;
		$data['rate']=$request->rate;
		if(Auth::user()){
			$data['user_id']=Auth::user()->id;
		}else{
			$data['user_id']=0;
		}
		// dd($data);
		Comment::create($data);
		return redirect()->back();
	}
}
