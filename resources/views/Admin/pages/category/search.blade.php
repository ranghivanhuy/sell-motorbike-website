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
  <div class="search" style="width: 250px; margin-left: 20px;">
    
             <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post" action="{{route('search-category')}}">
                @csrf
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search category..." aria-label="Search" aria-describedby="basic-addon2" name="keywords_submit">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form> 
          
      </div>    
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
                   
                   @foreach($list_cate_search as $key => $value)
                   <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->name}}</td>
                    <td> <a href="{{route('show-cate-childrent', $value->id)}}">show</a></td>
                   <td>
                     <button class="btn btn-primary editcategory" title ="{{"Sửa"." ".$value->name}}"  data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}" ><i class="fas fa-edit"></i></button>
                     <button class="btn btn-danger deletecategory" title ="{{"Xóa"." ".$value->name}}" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}" ><i class="fas fa-trash-alt"></i></button>
                   </td>
                 </tr>
                 @endforeach
               </tbody>
             </table>
           
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
                               <span class="error" style="color: red; font-size: 1rem;"></span>
                            </fieldset>

                            <div class="form-group">
                                <label>Parent_ID : </label>
                                <select class="form-control parent_id" name="parent_id" disabled="">
                                    <option value="0" class="defaut" >Define Categories</option>
                                 
                                   @foreach($list_parentID as $category)
                                        <?php $str = "-" ?>
                                        <option value="{{$category->id}}" class=""><?php echo $str; ?>{{$category->name}}</option>
                                        @foreach($category->children as $value)
                                            @include('admin.pages.category.child_category', ['child_category'=>$value, 'str'=>$str.'-'])
                                        @endforeach
                                   @endforeach
                                </select>
                            </div>
                            

                        </form>
                </div>
              </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-success updatecategory" data-id ="">Sửa</button>
                    
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