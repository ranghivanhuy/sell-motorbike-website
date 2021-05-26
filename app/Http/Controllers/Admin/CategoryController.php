<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;

use App\Category;
use App\Product;
use Validator;
use App\OrderDetail;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $list_parentID = Category::with('children')->where('parent_id', 0)->get();
        $list_category = Category::where('parent_id', 0)->paginate(5);
        return view('Admin.pages.category.list', compact('list_category', 'list_parentID'));
    }

    public function getcateByparentID($id)
    {
        $list_cate_by_parentID = Category::where('parent_id',$id)->paginate(5);
         $list_parentID = Category::with('children')->where('parent_id', 0)->get();
        $name = Category::select('name','id')->where('id', $id)->get();
        return view('Admin.pages.category.showchildrent',compact('list_cate_by_parentID', 'name','list_parentID'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $list_parentID = Category::with('children')->where('parent_id', 0)->get();
        return view('Admin.pages.category.add', compact('list_parentID'));
    }

    public function search(Request $request)
    {
        $list_parentID = Category::with('children')->where('parent_id', 0)->get();
        $keywords = $request->keywords_submit;
        $list_cate_search = Category::where('name', 'LIKE', '%'.$keywords.'%')->get();
        return view('Admin.pages.category.search', compact('list_cate_search','list_parentID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();
       
        if(Category::create($data))
        {
            return redirect()->route('categories.index')->with('thongbao', 'Thêm danh mục thành công!');
        } else
        {
            return redirect()->with('thongbao', 'Có lỗi, vui lòng kiểm tra lại!');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::with('children')->find($id);
        return response()->json($categories, 200);
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
                'name'=> 'required|min:2|max:255'
            ],
            [
                'required'=> 'Tên danh mục không được để trống',
                'min'=> 'Tên danh mục phải đủ từ 2 đến 255 ký tự',
                'max'=>'Tên danh mục phải đủ từ 2 đến 255 ký tự',
            ]
        );
        if($validator->fails()){
            return response()->json(['error'=>'true', 'message'=>$validator->errors()], 200);
        }
        $category = Category::find($id);
        $category->update([
            'name'=> $request->name, 
            'parent_id'=> $request->parent_id,
        ]);

        return response()->json(['success'=>'Sửa Thành Công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

     public function destroy($id)
    {
        $category =Category::find($id);
        $childrenIDs = $category->children->pluck('id');
        if (!$childrenIDs){
            $category->delete();
            return response()->json(['success' => 'Xóa Danh Mục Thành Công.']);
        } else {
           $productIDs=  Product::whereIn('category_id', $childrenIDs)->pluck('id');
           $listProductHasOrder = OrderDetail::whereIn('product_id', $productIDs)->get();
           if ($listProductHasOrder->count()) {
                return response()->json(['error' => 'Khong the xoa danh muc.'], 400);
           } else {
            \DB::beginTransaction();
            try {
                Product::whereIn('category_id', $childrenIDs)->orWhere('category_id', $id)->delete();
               Category::destroy($childrenIDs);
               // throw new Exception('message',400,  null);
               $category->delete();
               \DB::commit();
               return response()->json(['success' => 'Xóa Danh Mục Thành Công.']);

           }catch (Exception $e){
                \DB::rollBack();
                return response()->json(['error' => 'Khong the xoa danh muc.'], 404);
           }
               
           }
           }
    }

}
