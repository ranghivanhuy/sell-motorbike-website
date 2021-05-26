<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
class PostController extends Controller
{
    public function showpost($id)
    {
    	$post=Post::find($id);
    	$listRelatePost=Post::orderBy('id','DESC')->take(5)->get();
    	$list_all_category = Category::with('children')->where('parent_id', 0)->get();
		return view('User.pages.showpost',compact('list_all_category','post','listRelatePost'));
    }
    public function index()
    {
    	$listPost=Post::paginate(8);
    	$list_all_category = Category::with('children')->where('parent_id', 0)->get();
		return view('User.pages.post',compact('list_all_category','listPost'));
    }
}