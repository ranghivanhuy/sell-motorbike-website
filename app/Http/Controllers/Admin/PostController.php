<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequest;

use App\Post;
use Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_post = Post::paginate(5);
        return view('Admin.pages.post.list', compact('list_post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = array();
        $data = $request->all();
        $data['date'] = now();
        if(Post::create($data))
        {
            return redirect()->route('posts.index')->with('thongbao', 'Tạo bài viết mới thành công');
        } else
        {
            return redirect()->with('thongbao', 'Có lỗi, vui lòng kiểm tra lại!');
        }
    }

    public function showPost($id)
    {
        $post = Post::where('id',$id)->get();
        return view('Admin.pages.post.showpost', compact('post'));
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
        $post = Post::find($id);
         return response()->json($post, 200);
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
                'title'=>'required|min:10|',
                'slug'=>'required|min:10|',
                'content'=>'required|',
            ],
            [
                'title.required'=> ':attribute không được để trống',
                'title.min'=> ':attribute phải ít nhất 10 ký tự',
                
                'slug.required'=> ':attribute không được để trống',
                'slug.min'=> ':attribute phải ít nhất 10 ký tự',
                

                'content.required'=> ':attribute không được để trống',

            ],[
                'title'=> 'Tên bài viết',
                'slug'=>'Nội dung tóm tắt',
                'content'=>'Nội dung chính',
            ]
        );
        if($validator->fails()){
            return response()->json(['error'=>'true', 'message'=>$validator->errors()], 200);
        }

        $post = Post::find($id);
        $post->update([
            'title'=> $request->title, 
            'slug'=> $request->slug,
            'content'=>$request->content,
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
        $post = Post::find($id);
        if($post->delete())
        {
            return response()->json(['success'=>'Đã Xóa Thành Công Bài Viết!']);
        } else {
            return response()->json(['error'=>'Có Lỗi Vui Lòng Kiểm Tra Lại!']);
        }
    }
}
