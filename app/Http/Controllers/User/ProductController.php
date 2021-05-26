<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Cart;
use App\User;
use App\Category;
use App\Product;


class ProductController extends Controller
{
	public function showProductById($id)
	{
		$listcomment=Product::with('comment')->where('id',$id)->first();
        // $listcomment=Product::find($id);
        // $listcomment=$listcomment->comment;
        // dd($listcomment);
		$single_product=Product::find($id);
		$relate_product=Product::where('category_id',$single_product['category_id'])->where('id','<>',$id)->get();
		$list_all_category = Category::with('children')->where('parent_id', 0)->get();


		return view('User.pages.product_detail',compact('list_all_category','single_product','relate_product','listcomment'));
	}
	public function allproduct(Request $request){
		
		$allproduct=Product::paginate(9);
		$sortby="Tất Cả Sản Phẩm";
		$sort = $request->sort;
		$sortPrice=$request->sortprice;
		switch ($sort) {
			case 1:
			$sortby="Sắp Xếp Theo Tên Tăng Dần";
			$allproduct=Product::orderBy('name')->paginate(9);
			break;
			case 2:
			$sortby="Sắp Xếp Theo Tên Giảm Dần";
			$allproduct=Product::orderBy('name', 'desc')->paginate(9);                            
			break;
			case 3:
			$sortby="Sắp Xếp Theo Giá Tăng Dần";
			$allproduct=Product::orderBy('price')->paginate(9);
			break;
			case 4:
			$sortby="Sắp Xếp Theo Giá Giảm Dần";
			$allproduct=Product::orderBy('price', 'desc')->paginate(9);
			break;

			default:
                # code...
			break;
		}

		switch ($sortPrice) {
			case 1:
			$sortby="Sản Phẩm Từ 0 - 1.000.000 VND";
			$allproduct=Product::whereBetween('price', [0, 1000000])->paginate(9);
			break;
			case 2:
			$sortby="Sản Phẩm Từ 1.000.000 VND - 30.000.000 VND";
			$allproduct=Product::whereBetween('price', [1000000, 30000000])->paginate(9);
			break;
			case 3:
			$sortby="Sản Phẩm Từ 30.000.000 VND - 120.000.000 VND";
			$allproduct=Product::whereBetween('price', [30000000, 120000000])->paginate(9);
			break;
			case 4:
			$sortby="Sản Phẩm Từ 120.000.000 VND - 700.000.000 VND";
			$allproduct=Product::whereBetween('price', [120000000, 700000000])->paginate(9);
			break;
			case 5:
			break;
			default:
                # code...
			break;
		}

		$list_all_category = Category::with('children')->where('parent_id', 0)->get();
		return view('User.pages.allproduct',compact('list_all_category','allproduct','sortby'));
	}

	public function searchproduct(Request $request)
	{
		$search_product=$request->search;
		$keysearch=$request->keysearch;
		$result=Product::where('name','like','%'.$search_product.'%');
		$sortby="Tất Cả Sản Phẩm";
		$sort = $request->sort;
		$sortPrice=$request->sortprice;
        // dd($keysearch);
		if($sort||$sortPrice){
			$search_product=$keysearch;
		}
		switch ($sort) {
			case 1:
			$sortby="Sắp Xếp Theo Tên Tăng Dần";
			$result=Product::where('name','like','%'.$keysearch.'%')->orderBy('name');
			break;
			case 2:
			$sortby="Sắp Xếp Theo Tên Giảm Dần";
			$result=Product::where('name','like','%'.$keysearch.'%')->orderBy('name', 'desc');                            
			break;
			case 3:
			$sortby="Sắp Xếp Theo Giá Tăng Dần";
			$result=Product::where('name','like','%'.$keysearch.'%')->orderBy('price');
			break;
			case 4:
			$sortby="Sắp Xếp Theo Giá Giảm Dần";
			$result=Product::where('name','like','%'.$keysearch.'%')->orderBy('price', 'desc');
			break;

			default:
                # code...
			break;
		}

		switch ($sortPrice) {
			case 1:
			$sortby="Sản Phẩm Từ 0 - 1.000.000 VND";
			$result=Product::where('name','like','%'.$keysearch.'%')->whereBetween('price', [0, 1000000]);
			break;
			case 2:
			$sortby="Sản Phẩm Từ 1.000.000 VND - 30.000.000 VND";
			$result=Product::where('name','like','%'.$keysearch.'%')->whereBetween('price', [1000000, 30000000]);
			break;
			case 3:
			$sortby="Sản Phẩm Từ 30.000.000 VND - 120.000.000 VND";
			$result=Product::where('name','like','%'.$keysearch.'%')->whereBetween('price', [30000000, 120000000]);
			break;
			case 4:
			$sortby="Sản Phẩm Từ 120.000.000 VND - 700.000.000 VND";
			$result=Product::where('name','like','%'.$keysearch.'%')->whereBetween('price', [120000000, 700000000]);
			break;
			case 5:
			break;
			default:
                # code...
			break;
		}

		$resultProduct=$result->get();
		$list_all_category = Category::with('children')->where('parent_id', 0)->get();
		return view('User.pages.search',compact('list_all_category','resultProduct','search_product','sortby'));
	}

	public function viewmorecategoryproduct(Request $request,$id)
	{
		$sortby="Tất Cả Sản Phẩm";
		$sort = $request->sort;
		$sortPrice=$request->sortprice;
		$category = Category::find($id);
		$listProductByCateParent=$category->product_r;
		switch ($sort) {
			case 1:
			$sortby="Sắp Xếp Theo Tên Tăng Dần";
			$listProductByCateParent=$category->product_r->sortBy('name');
			break;
			case 2:
			$sortby="Sắp Xếp Theo Tên Giảm Dần";
			$listProductByCateParent=$category->product_r->sortByDesc('name');                            
			break;
			case 3:
			$sortby="Sắp Xếp Theo Giá Tăng Dần";
			$listProductByCateParent=$category->product_r->sortBy('price');
			break;
			case 4:
			$sortby="Sắp Xếp Theo Giá Giảm Dần";
			$listProductByCateParent=$category->product_r->sortByDesc('price');
			break;

			default:
                # code...
			break;
		}

		switch ($sortPrice) {
			case 1:
			$sortby="Sản Phẩm Từ 0 - 1.000.000 VND";
			$listProductByCateParent=$category->product_r->whereBetween('price', [0, 1000000]);
			break;
			case 2:
			$sortby="Sản Phẩm Từ 1.000.000 VND - 30.000.000 VND";
			$listProductByCateParent=$category->product_r->whereBetween('price', [1000000, 30000000]);
			break;
			case 3:
			$sortby="Sản Phẩm Từ 30.000.000 VND - 120.000.000 VND";
			$listProductByCateParent=$category->product_r->whereBetween('price', [30000000, 120000000]);
			break;
			case 4:
			$sortby="Sản Phẩm Từ 120.000.000 VND - 700.000.000 VND";
			$listProductByCateParent=$category->product_r->whereBetween('price', [120000000, 700000000]);
			break;
			case 5:
			break;
			default:
                # code...
			break;
		}

		$list_all_category = Category::with('children')->where('parent_id', 0)->get();
        // dd($list_all_category[$id]->name);
		return view('User.pages.ProductByCateParent',compact('list_all_category','listProductByCateParent','sortby','id'));

	}

	public function viewmoreproduct(Request $request,$id)
	{
		$sortby="Tất Cả Sản Phẩm";
		$sort = $request->sort;
		$sortPrice=$request->sortprice;
		$category = Category::find($id);
        // dd($category->name);
		$listProductByCate=$category->product;
		switch ($sort) {
			case 1:
			$sortby="Sắp Xếp Theo Tên Tăng Dần";
			$listProductByCate=$category->product->sortBy('name');
			break;
			case 2:
			$sortby="Sắp Xếp Theo Tên Giảm Dần";
			$listProductByCate=$category->product->sortByDesc('name');                            
			break;
			case 3:
			$sortby="Sắp Xếp Theo Giá Tăng Dần";
			$listProductByCate=$category->product->sortBy('price');
			break;
			case 4:
			$sortby="Sắp Xếp Theo Giá Giảm Dần";
			$listProductByCate=$category->product->sortByDesc('price');
			break;

			default:
                # code...
			break;
		}

        // dd($sortPrice);
		switch ($sortPrice) {
			case 1:
			$sortby="Sản Phẩm Từ 0 - 1.000.000 VND";
			$listProductByCate=$category->product->whereBetween('price', [0, 1000000]);
			break;
			case 2:
			$sortby="Sản Phẩm Từ 1.000.000 VND - 30.000.000 VND";
			$listProductByCate=$category->product->whereBetween('price', [1000000, 30000000]);
			break;
			case 3:
			$sortby="Sản Phẩm Từ 30.000.000 VND - 120.000.000 VND";
			$listProductByCate=$category->product->whereBetween('price', [30000000, 120000000]);
			break;
			case 4:
			$sortby="Sản Phẩm Từ 120.000.000 VND - 700.000.000 VND";
			$listProductByCate=$category->product->whereBetween('price', [120000000, 700000000]);
			break;
			case 5:
			break;
			default:
                # code...
			break;
		}
		$list_all_category = Category::with('children')->where('parent_id', 0)->get();
		return view('User.pages.ProductByCate',compact('list_all_category','listProductByCate','id','sortby','category'));
	}
}
