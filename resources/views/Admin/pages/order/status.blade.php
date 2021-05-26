@extends('admin.layouts.master')

@section('title')
List Status Order
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">List Status</h6>
  </div> 
  <div class="card-body">
    
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Status</th>
            <th></th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>
                  
                  <tbody id="getOrder">
                   <td>1</td>
                   <td>2</td>
                   <td>3</td>
                   <td style="text-align: center;">
                     {{-- <button class="btn btn-primary editcategory" title ="{{"Sửa Đơn Hàng Của"." ".$value->user->name}}"  data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}" ><i class="fas fa-edit"></i></button> --}}
                     <button class="btn btn-danger deleteorder" title ="{{"Xóa Đơn Hàng Của"}}" data-toggle="modal" data-target="#delete" type="button" data-id="" ><i class="fas fa-trash-alt"></i></button>
                   </td>
                 </tr>
                
               </tbody>
      </table>
             
    </div>
         </div>
       </div>
      
<script>
  function refresh()
  {
      location.reload();
  }
</script>
    
@endsection