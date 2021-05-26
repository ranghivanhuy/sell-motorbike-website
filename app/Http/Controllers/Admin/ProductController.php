<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;

use App\Product;
use App\Category;
use DB;
use Validator;
use File;




class ProductController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list_product = Product::with('category')->paginate(5);
        // dd($list_product);
        $list_parentID = Category::with('children')->where('parent_id', 0)->get();
        return view('Admin.pages.product.list', compact('list_product','list_parentID'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function create()
    {
         $list_parentID = Category::with('children')->where('parent_id','<>', 0)->get();
         // dd($list_parentID);
        return view('Admin.pages.product.add', compact('list_parentID'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    public function store(StoreProductRequest $request)
    {
        if($request->hasFile('image_path'))
        {
            $file = $request->image_path;
            //lấy tên file
            $file_name = $file->getClientOriginalName();
            //lấy loại file 
            $file_type = $file->getMimeType();
            //kích thước file : đơn vị byte
            $file_size = $file->getSize();
            if($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif'){
                if($file >= 1048576){
                    $file_name = rand(0,99).$file_name;
                    if($file->move('upload/product',$file_name)){
                        $data = $request->all();
                        $data['image_path'] = $file_name;
                        Product::create($data);
                        return redirect()->route('products.index')->with('thongbao','Bạn đã Thêm sản phẩm thành công!');
                    }
                }else {
                    return back()->with('thongbao', 'Kích thước file quá lớn.');
                }
            }else {
                return back()->with('thongbao', 'File bạn chọn không phải là ảnh');
            }
        }else {
            return back()->with('thongbao', 'Bạn chưa chọn hình ảnh cho sản phẩm');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showproducts($id)
    {   
        $product = Product::with('category')->where('id',$id)->get();
        // dd($product);
        return view('Admin.pages.product.showproduct',compact('product'));
    }

    
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
        $product = Product::find($id);
         $list_parentID = Category::with('children')->where('parent_id','<>', 0)->get();
        return view('Admin.pages.product.edit', compact('product','list_parentID' ));
      
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
        $data = $request->except('_token', '_method');

        $get_image = $request->file('image_path');
        // dd($request->hasFile('image_path'),$get_image);
        if($request->hasFile('image_path'))
        {
            $new_image =uniqid(). $get_image->getClientOriginalName();

            $get_image->move('upload/product', $new_image);

            $data['image_path']= $new_image;

            DB::table('products')->where('id', $id)->update($data);

            return redirect()->route('products.index')->with('thongbao','Bạn đã Sửa sản phẩm thành công!');
        }

       DB::table('products')->where('id', $id)->update($data);
    return redirect()->route('products.index')->with('thongbao','Bạn đã Sửa sản phẩm thành công!');
    }

    

    //tìm kiếm sản phẩm
    public function search(Request $request){
        $list_parentID = Category::with('children')->where('parent_id', 0)->get();
        $keywords = $request->keywords_submit;
        $search_product = Product::where('name', 'LIKE', '%'.$keywords.'%')->get();
        return view('Admin.pages.product.search', compact('search_product', 'list_parentID'));
    }

    //lọc sản phẩm theo :  giá giảm dần
    public function filterProductDESC(Request $request, $id)
    {
        $list_parentID = Category::with('children')->where('parent_id', 0)->get();

        $product_desc = Product::orderBy('price', 'desc')->get()->toArray();

        foreach ($product_desc as $key => $value) {
            ?>
            <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><img src="/upload/product/<?php echo $value['image_path'] ?>" width="100" height="100"></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['quantity'] ?></td>
                    <td><?php echo number_format($value['price']).' '.'VNĐ' ?></td>
                    <td><a href="<?php echo route('show.product', $value['id'])?>">Chi Tiết</a></td>
                   <td>
                     <a href="<?php echo route('products.edit', $value['id'])  ?> "><button class="btn btn-primary editproduct" title ="<?php echo "Sửa"." ".$value['name'] ?>"  data-toggle="modal" data-target="#edit" type="button" data-id="<?php $value['id'] ?>" ><i class="fas fa-edit"></i></button></a>
                     <button class="btn btn-danger deleteproduct" title ="<?php echo "Xóa"." ".$value['name'] ?>" data-toggle="modal" data-target="#delete" type="button" data-id="<?php $value['id'] ?>" ><i class="fas fa-trash-alt"></i></button>
                   </td>
                 </tr>
                <?php
        }
    }
    //lọc sản phẩm theo giá tăng dân
    public function filterProductASC(Request $request, $id)
    {
        $list_parentID = Category::with('children')->where('parent_id', 0)->get();

        $product_asc = Product::orderBy('price', 'asc')->get()->toArray();

        foreach ($product_asc as $key => $value) {
            ?>
            <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><img src="/upload/product/<?php echo $value['image_path'] ?>" width="100" height="100"></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['quantity'] ?></td>
                    <td><?php echo  number_format($value['price']).' '.'VNĐ' ?></td>
                    <td><a href="<?php echo route('show.product', $value['id'])?>">Chi Tiết</a></td>
                   <td>
                     <a href="<?php echo route('show.product', $value['id'])?>"><button class="btn btn-primary editproduct" title ="<?php echo "Sửa"." ".$value['name'] ?>"  data-toggle="modal" data-target="#edit" type="button" data-id="<?php $value['id'] ?>" ><i class="fas fa-edit"></i></button></a>
                     <button class="btn btn-danger deleteproduct" title ="<?php echo "Xóa"." ".$value['name'] ?>" data-toggle="modal" data-target="#delete" type="button" data-id="<?php $value['id'] ?>" ><i class="fas fa-trash-alt"></i></button>
                   </td>
                 </tr>
                <?php
        }
    }

    public function fillterProductNEW(Request $request, $id)
    {
         $list_parentID = Category::with('children')->where('parent_id', 0)->get();

        $product_new = Product::orderBy('id', 'desc')->get()->toArray();

        foreach ($product_new as $key => $value) {
            ?>
            <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><img src="/upload/product/<?php echo $value['image_path'] ?>" width="100" height="100"></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['quantity'] ?></td>
                    <td><?php echo number_format($value['price']).' '.'VNĐ' ?></td>
                    <td><a href="<?php echo route('show.product', $value['id'])?>">Chi Tiết</a></td>
                   <td>
                     <a href="<?php echo route('show.product', $value['id'])?>"><button class="btn btn-primary editproduct" title ="<?php echo "Sửa"." ".$value['name'] ?>"  data-toggle="modal" data-target="#edit" type="button" data-id="<?php $value['id'] ?>" ><i class="fas fa-edit"></i></button></a>
                     <button class="btn btn-danger deleteproduct" title ="<?php echo "Xóa"." ".$value['name'] ?>" data-toggle="modal" data-target="#delete" type="button" data-id="<?php $value['id'] ?>" ><i class="fas fa-trash-alt"></i></button>
                   </td>
                 </tr>
                <?php
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::find($id);
        File::delete('upload/product/'.$product['image_path']);
        if($product->delete()){ //neu xoa thanh cong
            return response()->json(['success'=>'Xóa Thành Công']);
        } else{
           return response()->json(['success'=>'Xóa Không Thành Công']);
        }
    }
}
