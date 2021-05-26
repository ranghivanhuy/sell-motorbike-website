@extends('admin.layouts.master')

@section('title')
List Categories
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">List Categories</h6>
  </div>
  <br>
  <div class="search" style=" margin-left: 20px;">
      <div class="contaier">
        <div class="row">
          <!-- <div class="col-md-4">
            <div class="form-group">
                <input type="text " name="name" id="name" class="form-control input-lg bg-light " placeholder="Search Category . . . " />
                <div id="Listproducts">
                </div>
            </div>
          </div> -->
          <div class="col-md-4">
            @foreach($name as $na)
             <div class="duongdan" style="text-align: center;">List Categories / <b>{{$na->name}}</b></div>
             <input type="hidden" value="{{$na->id}}" class="idParent">
             @endforeach
          </div>
        </div>
      </div>
            
          
      </div>   
      {{-- end search --}}
     
     
       <a href="/admin/categories"><button class="btn btn-primary" style="margin-left: 15px;">Back</button></a>
    
  <div class="card-body">
    
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Show</th>
            <th>Action</th>
          </tr>
        </thead>
                  
                  <tbody>
                   @foreach($list_cate_by_parentID as $key => $value)
                   <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->name}}</td>
                   {{--  @php
                    if(($value->parent_id)){ 
                    @endphp --}}
                        <td> </td>
                   {{-- @php } else {@endphp

                          <td></td>
                   @php }@endphp --}}
                  
                   <td>
                     <button class="btn btn-primary editcategory" title ="{{"Sửa"." ".$value->name}}"  data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}" ><i class="fas fa-edit"></i></button>
                     <button class="btn btn-danger deletecategory" title ="{{"Xóa"." ".$value->name}}" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}" ><i class="fas fa-trash-alt"></i></button>
                   </td>
                 </tr>
                 @endforeach
               </tbody>
             </table>
             <div class="pull-right">{{ $list_cate_by_parentID->links() }}</div>
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
                                <input class="form-control name" name="name" value="{{old('name')}}">
                               <span class="error" style="color: red; font-size: 1rem;"></span>
                            </fieldset>

                            <div class="form-group">
                                <label>Parent_ID : </label>
                                <select class="form-control parent_id" name="parent_id">
                                    <option value="0" class="defaut">Define Categories</option>
                                   @foreach($list_parentID as $category)
                                        <?php $str = "-" ?>
                                        <option class="con" value="{{$category->id}}" ><?php echo $str; ?>{{$category->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            

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
              <h5 class="modal-title" id="exampleModalLabel">Bạn chắc chắn đã muôn xóa ?</h5>
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