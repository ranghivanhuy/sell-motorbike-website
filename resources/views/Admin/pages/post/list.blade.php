@extends('admin.layouts.master')

@section('title')
List Post
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">List Post</h6>
  </div>
  <br>
  {{-- <div class="search" style="width: 250px; margin-left: 20px;">
    
            <div class="form-group">
                <input type="text " name="name" id="name" class="form-control input-lg bg-light " placeholder="Search Posts . . . " />
                <div id="Listproducts">
                </div>
            </div>
          
  </div> --}}    
  <div class="card-body">
    
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Title</th>
            <th style="width: 25%;">Slug</th>
            <th>Date</th>
            <th>Show</th>
            <th>Action</th>
          </tr>
        </thead>
                  
                  <tbody>
                   
                   @foreach($list_post as $key => $value)
                   <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->title}}</td>
                    <td>{{$value->slug}}</td>
                    <td>{{$value->date}}</td>
                    <td> <a href="{{route('show-post', $value->id)}}">Chi Tiết</a></td>
                   <td>
                     <button class="btn btn-primary editpost" title ="{{"Sửa"." ".$value->title}}"  data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}" ><i class="fas fa-edit"></i></button>
                     <button class="btn btn-danger deletepost" title ="{{"Xóa"." ".$value->title}}" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}" ><i class="fas fa-trash-alt"></i></button>
                   </td>
                 </tr>
                 @endforeach
               </tbody>
             </table>
             <div class="pull-right">{{ $list_post->links() }}</div>
           </div>
         </div>
       </div>
      
      </div>
      <!-- Edit Modal-->
       <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa Bài Viết : </h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row" style="margin: 5px">
                <div class="col-lg-12">
                  <form role="form" method="post" enctype="multipart/form-data">
                        <fieldset class="form-group">
                            <label>Title : <i style="color: red">*</i> </label>
                            <input class="form-control title" name="title" value="{{old('title')}}">
                            <span class="errorTitle" style="color: red; font-size: 1rem;"></span>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>Slug : <i style="color: red">*</i> </label>
                            <input class="form-control slug" name="slug" value="{{old('slug')}}">
                           
                            <span class="errorSlug" style="color: red; font-size: 1rem;"></span>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>Content : <i style="color: red">*</i> </label>
                            <textarea  class="form-control ckeditor content "  name="content" id="editor2" value="{{old('content')}}"></textarea>
                           <span class="errorContent" style="color: red; font-size: 1rem;"></span>
                        </fieldset>
                    </form>
                </div>
              </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-success updatepost" data-id ="">Sửa Bài Viết</button>
                    
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
            
          </div>
        </div>
      </div>
      <!-- delete Modal-->
      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Bạn chắc chắn muốn xóa ?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body" style="margin-left: 183px;">
              <button type="button" class="btn btn-success delete">Có</button>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
              <div>
              </div>
            </div>
          </div>
@endsection