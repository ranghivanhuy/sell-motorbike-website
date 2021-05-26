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
        <div class="form-group">
          <select name="" id="productFilter" class="form-control">
            <option value="">---Lọc Sản Phẩm Theo---</option>
            <option value="0">Giá Tăng Dần</option>
            <option value="1">Giá Giảm Dần</option>
            <option value="2">Sản Phẩm Mới Nhất</option>
          </select>
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
            <th>Action</th>
          </tr>
        </thead>
                  
                  <tbody id="getProduct">
                   @foreach($list_product as $key => $value)
                   <tr>
                    <td>{{$key+1}}</td>
                    <td><img src="/upload/product/{{$value->image_path}}" width="100" height="100"></td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->quantity}}</td>
                    <td>{{number_format($value->price).' '.'VNĐ'}}</td>
                    <td><a href="{{ route('show.product', $value->id)}}">Chi Tiết</a></td>
                   <td>
                     <a href="{{route('products.edit', $value->id)}}"><button class="btn btn-primary editproduct" title ="{{"Sửa"." ".$value->name}}"  data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}" ><i class="fas fa-edit"></i></button></a>
                     <button class="btn btn-danger deleteproduct" title ="{{"Xóa"." ".$value->name}}" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}" ><i class="fas fa-trash-alt"></i></button>
                   </td>
                 </tr>
                 @endforeach
               </tbody>
             </table>
             <div class="pull-right">{{ $list_product->links() }}</div>
           </div>
         </div>
       </div>
     
      {{-- delete model --}}
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