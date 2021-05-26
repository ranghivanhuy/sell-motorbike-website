<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/












// user
// 
// product
Route::get('/','User\HomeController@index')->name('trang-chu');
Route::get('product/{id}','User\ProductController@showProductById')->name('product-detail');
Route::get('product','User\ProductController@showAllProduct')->name('all-product');
Route::post('search-product/','User\ProductController@searchproduct')->name('search-product-user');
Route::get('view-all-product','User\ProductController@allproduct')->name('allproduct');
//con
Route::get('view-category/{id}','User\ProductController@viewmoreproduct')->name('more-product');
// cha
Route::get('view-category/{id}/product','User\ProductController@viewmorecategoryproduct')->name('more-category-product');

//cart
Route::post('savecartmain','User\CartController@savecartmain')->name('save.cartmain');
Route::post('savecart','User\CartController@savecart')->name('save.cart');
Route::get('showcart', 'User\CartController@showcart')->name('show.cart');
Route::delete('cart/{rowId}','User\CartController@deletecart')->name('delete.cart');
Route::put('cart/{rowId}','User\CartController@updatecart')->name('updatecart');

//coupon
Route::post('check-coupon','User\CartController@checkcoupon')->name('check-coupon');


//LOGIN
Route::post('login','User\HomeController@loginUser')->name('user.login');
Route::post('create','User\HomeController@storeUser')->name('user.create');
Route::get('login/create','User\HomeController@loginview')->name('login.user');
Route::get('logout','User\HomeController@logoutUser')->name('logout-user');


//checkout
Route::get('login-checkout','User\CheckoutController@logincheckout')->name('checkout-login');
Route::get('checkout','User\CheckoutController@checkout')->name('checkout');
Route::post('order-place','User\CheckoutController@order_place')->name('order');
Route::get('view-order','User\CheckoutController@viewOrder')->name('view-order');


//user--
Route::get('view-user/{id}','User\UserController@index')->name('profile-user');
Route::put('change-profile/{id}','User\UserController@changeprofile')->name('change-profile');
Route::put('change-password/{id}','User\UserController@changepassword')->name('change-password');


//contact

Route::get('contact','User\ContactController@index')->name('contact');
Route::post('contact','User\ContactController@sendContact')->name('send-contact');


//new
//
//
Route::get('news','User\PostController@index')->name('news');
Route::get('news/{id}','User\PostController@showpost')->name('news-post');


//comment
Route::post('product/comment/{id}','User\CommentController@CommentProduct')->name('send-comment-product');
Route::post('post/comment/{id}','User\CommentController@CommentPost')->name('send-comment-post');




//---------ADMIN--------//



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Admin
Route::view('admin/login', 'Admin.pages.login')->name('login.admin');
Route::post('admin/login', 'Admin\AdminController@loginAdmin')->name('admin.login');

Route::group(['prefix' => 'admin', 'middleware'=>'adminMiddleware'], function() {
    
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');

     Route::get('logout', 'Admin\AdminController@logout')->name('admin.logout');
     Route::post('/products/{id}/process', 'Admin\OrderController@processOrder');

    Route::resource('products', 'Admin\ProductController');
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('users', 'Admin\UserController');
    Route::resource('orders', 'Admin\OrderController');
    Route::resource('coupons', 'Admin\CouponController');
    Route::resource('posts','Admin\PostController');


});

//update product
Route::put('admin/updateProduct/{id}', 'Admin\ProductController@update')->name('update.product');

//show chi tiet product
Route::get('eproducts/{id}', 'Admin\ProductController@showproducts')->name('show.product');


//show contact user 
Route::get('users/contact', 'Admin\UserController@contact')->name('users.contact');

//show cate with parentID
Route::get('categories/{id}', 'Admin\CategoryController@getcateByparentID')->name('show-cate-childrent');

//active user <-> admin
Route::get('unactive-user/{id}', 'Admin\UserController@unactiveuser')->name('unactive-user');
Route::get('active-user/{id}', 'Admin\UserController@activeuser')->name('active-user');

//search user 
Route::post('admin/searchUser', 'Admin\UserController@search')->name('search-user');

//historyOrder by User 
Route::get('users/historyOrder/{id}','Admin\UserController@historyOrder')->name('historyOrder');

//active đã liên hệ <-> đang chờ liên hệ
Route::get('unactive-contact/{id}', 'Admin\UserController@unactivecontact')->name('unactive-contact');
Route::get('active-contact/{id}', 'Admin\UserController@activecontact')->name('active-contact');

//show order by orerID
Route::get('orders/{id}', 'Admin\OrderController@show_order_byID')->name('show-order-byID');

//lọc đơn hàng theo trạng thái
Route::get('filterOrder/{id}', 'Admin\OrderController@filterOrder')->name('filterOrder');

//show bài viết
Route::get('admin/show-post/{id}', 'Admin\PostController@showPost')->name('show-post');

//search product, category
Route::post('admin/searchproduct','Admin\ProductController@search')->name('search-product');
Route::post('admin/searchcategory', 'Admin\CategoryController@search')->name('search-category');

//lọc sản phẩm theo giá tăng dần, giảm dần, sp mới nhất
Route::get('fillterProductDESC/{id}', 'Admin\ProductController@filterProductDESC')->name('productDESC');
Route::get('fillterProductASC/{id}', 'Admin\ProductController@filterProductASC')->name('productASC');
Route::get('fillterProductNEW/{id}', 'Admin\ProductController@fillterProductNEW')->name('productNEW');

//xử lý trạng thái đơn hàng trong view order
Route::get('activeDXLy/{id}', 'Admin\OrderController@DaXuLy')->name('activeDXLy');
Route::get('activeHuyDon/{id}', 'Admin\OrderController@HuyDon')->name('activeHuyDon');

//gui mail
Route::post('sendMailCancel', 'Admin\OrderController@sendMailCancel')->name('sendMailCancel');
Route::post('sendMailProcess', 'Admin\OrderController@sendMailProcess')->name('sendMailProcess');

