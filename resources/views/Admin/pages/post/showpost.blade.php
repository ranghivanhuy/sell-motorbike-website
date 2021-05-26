@extends('admin.layouts.master')

@section('title')
Show Post
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Chi Tiết Bài Viết</h6>
  </div>

    
  <br>
    <a href="admin/posts"><button class="btn btn-primary" style="margin-left: 15px;">Back</button></a>
  <div class="card-body"> 

  <div class="table-responsive">
   <table  class="table table-bordered" id="dataTable"  cellspacing="0">
    @foreach($post as $key=> $value)
        <tr>
          <tr>
          <th style="width: 25%;">Ngày Tạo Bài Viết :</th>
          <td>{{$value->date}}</td>
        </tr>
          <th style="width: 25%;">Tên Bài Viết :</th>
          <td>{{$value->title}}</td>
        </tr>

        <tr>
          <th style="width: 25%;">Nội Dung Tóm Tắt :</th>
          <td>{{$value->slug}}</td>
        </tr>

        <tr>
          <th style="width: 25%;">Nội Dung Chính :</th>
          <td>{!!$value->content!!}</td>
        </tr>

         
    @endforeach
    </table>
  </div>
      
@endsection