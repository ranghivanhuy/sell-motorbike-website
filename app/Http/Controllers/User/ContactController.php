<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\CreateContactRequest;
use App\Category;
use App\Contact;


class ContactController extends Controller
{
	public function index()
	{
		$list_all_category = Category::with('children')->where('parent_id', 0)->get();
		return view('User.pages.contact.show',compact('list_all_category'));
	}
	public function sendContact(CreateContactRequest $request)
	{
		$data=$request->all();
		$data['status']=0;
		Contact::create($request->all());
		return redirect()->back()->with('thongbao','Cảm Ơn Câu Hỏi Của Bạn Chúng Tôi Sẽ Phản Hồi Sớm');
	}
}
