@extends('admin.layouts.master')

@section('title')
List Products
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">List Products</h6>
  </div>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
       <div class="search" style="width: 250px; margin-left: 20px;">

        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post" action="{{route('search-product')}}">
          @csrf
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search product..." aria-label="Search" aria-describedby="basic-addon2" name="keywords_submit">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>

      </div>  
      </div>
      <div class="col-md-3">
        <button class="btn btn-primary" type="button" onclick="refresh()"><i class="fas fa-sync-alt"></i></button>
      </div>
    </div>
  </div>
   
      
  <div class="card-body">
    
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Images</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Show</th>
           {{--  <th>Trend</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th> --}}
  
            <th>Action</th>
          </tr>
        </thead>
                  
                  <tbody>
                   @foreach($search_product as $key => $value)
                   <tr>
                    <td>{{$key+1}}</td>
                    <td><img src="/upload/product/{{$value->image_path}}" width="100" height="100"></td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->quantity}}</td>
                    <td>{{number_format($value->price).' '.'VNĐ'}}</td>
                    <td><a href="{{ route('show.product', $value->id)}}">Chi Tiết</a></td>
                   {{--  <td>{{$value->trend}}</td>
                    <td>{{$value->description}}</td>
                    <td>{{number_format($value->price)}}</td>
                    <td>{{$value->category ? $value->category->name : ''}}</td> --}}
                    
                   <td>
                     <button class="btn btn-primary editproduct" title ="{{"Sửa"." ".$value->name}}"  data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}" ><i class="fas fa-edit"></i></button>
                     <button class="btn btn-danger deleteproduct" title ="{{"Xóa"." ".$value->name}}" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}" ><i class="fas fa-trash-alt"></i></button>
                   </td>
                 </tr>
                 @endforeach
               </tbody>
             </table>
            {{--  <div class="pull-right">{{ $search_product->links() }}</div> --}}
           </div>
         </div>
       </div>
       <!-- Edit Modal-->
       <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit product : <span class="title"></span></h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row" style="margin: 5px">
                <div class="col-lg-12">

                   <form  id ="updateproducts"  method="post" enctype="multipart/form-data">
           

                            @if($errors->any())
                            <p>has error</p> 
                            @endif
                            
                            <fieldset class="form-group" >
                                <label>Name : </label>
                                <input class="form-control name" name="name" placeholder="Enter the name product.." value="{{old('name')}}">
                                <div class="alert alert-danger errorName"></div>
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Quantity : </label>
                                <input class="form-control quantity" name="quantity" placeholder="Enter the quantity.." value="{{old('quantity')}}">
                               
                                <div class="alert alert-danger errorQuantity" ></div>
                                
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Trend : </label>
                                <input class="form-control trend" name="trend" placeholder="Enter the trend.." value="{{old('trend')}}">
                               <div class="alert alert-danger errorTrend"></div>
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Description : </label>
                                <textarea  class="form-control description "  name="description" id="editor1" value="{{old('description')}}"></textarea>
                                <div class="alert alert-danger errorDescription"></div>
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Price : </label>
                                <input class="form-control price" name="price" placeholder="Enter the price.." value="{{old('price')}}">
                               <div class="alert alert-danger errorPrice"></div>
                            </fieldset>

                            <div class="form-group">
                                <label>Category : </label>
                                <select class="form-control category_id" name="category_id">
                                    <option value="0">Define Categories</option>
                                   @foreach($list_parentID as $category)
                                        <?php $str = "-" ?>
                                        <option value="{{$category->id}}"><?php echo $str; ?>{{$category->name}}</option>
                                        @foreach($category->children as $value)
                                            @include('admin.pages.category.child_category', ['child_category'=>$value, 'str'=>$str.'-'])
                                        @endforeach
                                   @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Images : </label>
                                    <input type="file" name="image_path" class="form-control image_path">
                                    <div class="image">
                                      <img src="" alt="" class="img img-thumbnail imageThum" width="100px" height="100px" lign ="center">
                                    </div>
                                    <div class="alert alert-danger errorImage"></div>
                             </div>


                                <input type="submit" class="btn btn-success updateproducts" data-id ="" value="Sửa">
                                <button type="reset" class="btn btn-primary">Làm Lại</button>
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                              
                        </form>

                </div>
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
              <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ? <span class="title"></span>  </h5>
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


          <script>
            function refresh()
            {
              location.reload();
            }
          </script>

@endsection