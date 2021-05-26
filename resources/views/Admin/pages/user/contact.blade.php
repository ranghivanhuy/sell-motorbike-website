@extends('admin.layouts.master')

@section('title')
List Contact
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">List Contact</h6>
  </div>
  <br>
      
  <div class="card-body">
    
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable"  cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th style="width: 25%;">Contact</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
                  
                  <tbody>
                   
                   @foreach($list_contact as $key => $value)
                   <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->phone}}</td>
                     <td>{{$value->contact}}</td>
                     <td>
                      @php
                      if($value->status == 0){ 
                      @endphp
                      <a href="{{route('active-contact', $value->id)}}"><b style="color: red;">Đang Chờ Liên Hệ</b></a>
                      @php 
                      }else{
                      @endphp
                      <a href="{{route('unactive-contact', $value->id)}}"><b style="color: green;">Đã Liên Hệ</b></a>
                       @php
                        } @endphp
                    </td>
                      {{-- <td><span class="text-ellipsis">
                        @php
                        if($value->role == 1)
                        {
                          @endphp
                          <a href={{route('unactive-user',$value->id)}} title="Unactive admin"><b style="color: red;">Admin</b></a>
                        @php
                        }else{
                           @endphp
                          <a href="{{route('active-user',$value->id)}}" title="Active Admin"><b style="color: green;">User</b></a                        
                            @php
                        } @endphp
                       
                        
                      </span>
                      </td> --}}

                   
                    <td> 
                      <button class="btn btn-danger deleteuser" title ="{{"Xóa"." ".$value->name}}" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}" ><i class="fas fa-trash-alt"></i></button>
                    </td>
                   
                 </tr>
                 @endforeach
               </tbody>
             </table>
             {{-- <div class="pull-right">{{ $list_user->links() }}</div> --}}
           </div>
         </div>
       </div>
       <!-- Edit Modal-->
       <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa Categories : <span class="title"></span></h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row" style="margin: 5px">
                <div class="col-lg-12">
                  
                        <form role="form" >
              
                            <fieldset class="form-group">
                                <label>Name : </label>
                                <input class="form-control name" name="name" >
                
                            </fieldset>

                       

                        </form>
                </div>
              </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-success updatecategory">Sửa</button>
                    <button type="reset" class="btn btn-primary">Làm Lại</button>
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
              <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
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