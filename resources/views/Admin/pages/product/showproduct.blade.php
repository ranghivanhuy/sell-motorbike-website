@extends('admin.layouts.master')

@section('title')
List Products
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Chi Tiết Sản Phẩm</h6>
  </div>

    
  <br>
    <a href="admin/products"><button class="btn btn-primary" style="margin-left: 15px;">Back</button></a>
  <div class="card-body"> 

  <div class="table-responsive">
   <table  class="table table-bordered" id="dataTable"  cellspacing="0">
    @foreach($product as $key=> $value)
        <tr>
          <th style="width: 25%;">Tên Sản Phẩm :</th>
          <td>{{$value->name}}</td>
        </tr>

        <tr>
          <th style="width: 25%;">Số Lượng :</th>
          <td>{{$value->quantity}}</td>
        </tr>

        <tr>
          <th style="width: 25%;">Giá  :</th>
          <td>{{number_format($value->price)}} VNĐ</td>
        </tr>

        <tr>
          <th style="width: 25%;">Sản Phẩm Nổi Bật :</th>
          <td>{{$value->trend}}</td>
        </tr>

        <tr>
          <th style="width: 25%;">Mô Tả Sản Phẩm :</th>
          <td>{!!$value->description!!}</td>
        </tr>

       

         <tr>
          <th style="width: 25%;">Loại Sản Phẩm :</th>
          <td>{{$value->category ? $value->category->name : ''}}</td>
        </tr>

        <tr>
          <th style="width: 25%;">Hình Ảnh :
             <button class="btn btn-primary editproduct" title ="{{"Cập nhật ảnh của "." ".$value->name}}"  data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}" ><i class="fas fa-edit"></i></button>
          </th>
          <td><img src="/upload/product/{{$value->image_path}}" width="300" height="300"></td>
        </tr>
    @endforeach
    </table>
  </div>
       <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa hình ảnh sản phẩm : <span class="title"></span></h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row" style="margin: 5px">
                <div class="col-lg-12">
                  
                  <form action="{{-- {{ route('uploadimage')}} --}}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                      <legend>Chọn Hình Ảnh</legend>

                      <div class="form-group">
                        <label for="file">Chọn file</label>
                        <input id="file" type="file" name="sortpic" required=""/>
                      </div>
                      <div class="form-group">
                        <button id="upload" class="btn btn-primary">Upload</button>
                      </div>
                  </form>
                  <div class="status alert alert-success"></div>

                </div>
              </div>
               <div class="modal-footer">
                   {{-- <button type="button" class="btn btn-success" id ="updateproduct" data-id ="">Sửa</button>
                                
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> --}}
                </div>
            </div>
            
          </div>
        </div>
      </div>
@endsection