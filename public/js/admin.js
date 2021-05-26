$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function($) {
	

    //delete category

    $('.deletecategory').click(function(event) {
		/* Act on the event */
		var id = $(this).data('id');

		$('.delete').click(function(event) {
			/* Act on the event */
			$.ajax({
				url: 'admin/categories/'+id,
				type: 'delete',
				dataType: 'json',
				success : function(result)
				{
					toastr.success(result.success, 'Thông Báo', {timeOut: 6000});
					location.reload();
				},
				error: function(data) {
					console.log(data);
					toastr.error('Khong the xoa danh muc.', 'Thông Báo Lỗi', {timeOut: 7000});
					location.reload(); //hàm reload lại trang khi xóa  khong thành công
				}
			});
			
		});
	});
	
    //end delete category

    //insertdata editcategory
    $('.editcategory').click(function(event) {
    	$('.error').hide();
		var id = $(this).data('id');
		var idParent = $('.idParent').val();
    	$.ajax({
    		url: 'admin/categories/' +id+ '/edit',
    		type: 'get',
    		dataType: 'json',
    		success:function(result){
				console.log(result);
				console.log(idParent,result.parent_id);
				$('.name').val(result.name);
				$('.title').text(result.name);
				// $('.idParent').val($result.);
				if(result.parent_id == 0){ //thằn cha
					console.log('hihi');
					$('.defaut').attr('selected', 'selected');
					$('.disabled').attr('disabled','disabled');
				} else 
				{
					$('.parent_id > option').filter(function() { 
					    return ($(this).val() == result.parent_id); //To select Blue
					}).prop('selected', true);

					// $('.con').addClass('parent');
					// $('.parent').attr('selected', 'selected');
				}
				$('.updatecategory').attr('data-id',id);
			}
			
    	});
    });
    // end editcategory
    //update category
    $('.updatecategory').click(function(event) {
    	var ten = $('.name').val();
		var parent = $('.parent_id').val();
		var id = $(this).data('id');
		$.ajax({
			url: 'admin/categories/'+id,
			type: 'put',
			dataType: 'json',
			data: {
					name: ten,
					parent_id : parent
			},
			success:function($result){
				console.log($result);
				if($result.error == 'true'){
					$('.error').show();
					$('.error').html($result.message.name[0]);
				} else
				{
					toastr.success($result.success, 'Thông Báo', {timeOut: 5000});
					$('#edit').modal('hide'); // ẩn cái modal edit sau khi sửa thành công
					location.reload(); //hàm reload lại trang khi sửa thành công
				}
			}
		});	
    });
    // endupdatecategory

    // deleteproduct
    $('.deleteproduct').click(function(even) {
    	var id = $(this).data('id');
    	// var name = $(this).data('name');
    	// $('.title').val(data.name);
    	
    	
    	$('.delete').click(function(event) {
    		$.ajax({
    			url: 'admin/products/'+id,
    			type: 'delete',
    			dataType: 'json',
    			success : function(result)
				{
					toastr.success(result.success, 'Thông Báo', {timeOut: 6000});
					location.reload(); //hàm reload lại trang khi xóa thành công
				}
    		})
    		
    	});
    });
    // end deleteproduct

    
	//insert data vao form edit product
	   $('.editproduct').click(function(event) {
	   		var id = $(this).data('id');
	   		
	   		// $('.errorName').hide();
	   		$('.errorQuantity').hide();
	   		$('.errorTrend').hide();
	   		$('.errorDescription').hide();
	   		$('.errorPrice').hide();
	   		$('.errorImage').hide();
	   		$.ajax({
	   			url: 'admin/products/'+id+'/edit',
	     		type: 'get',
	    		dataType: 'json',
	    		
	   			success:function(data){
	   				console.log(data);
	   				$('.name').val(data.name);
					$('.title').text(data.name);
				 	$('.quantity').val(data.quantity);
				 	$('.trend').val(data.trend);
				 	CKEDITOR.instances['editor1'].setData(data.description);
				 	$('.price').val(data.price);
				 	$('.category_id').val(data.category_id);
				    $('.imageThum').attr('src','upload/product/'+data.image_path);
				    $('#updateproduct').attr('data-id',id);
	   			}
	   		});
	   		});
	  
    // end editproduct

    // updateproduct

		  $('#updateproduct').click(function(event) {
		  	/* Act on the event */
		  	//chan form submit
		  	event.preventDefault();
		  	var id = $(this).data('id');
		  	var ten = $('.name').val()
		  	var qty = $('.quantity').val();
		  	var trend = $('.trend').val();
		  	var description = CKEDITOR.instances['editor1'].getData()
		  	var gia = $('.price').val();
		  	var cate = $('.category_id').val();
		  	// var img = $('.image_path').val();

		  	$.ajax({
		  		url: 'admin/products/'+id ,
		  		type: 'put',
		  		data_type: 'json',
		  		data: {
					name: ten,
					quantity : qty,
					trend : trend,
					description : description,
					price : gia,
					category_id : cate,
					// image_path : img,
				},
		  		success : function (data) {
		  			console.log(data);
		  			if(data.error =='true'){
		  				if(data.message.image){
		  					$('.errorImage').show();
		  					$('.errorImage').text(data.message.image[0]);
		  					// $('.image').val('');
		  				}
		  				if(data.message.name){
		  					$('.errorName').show();
		  					$('.errorName').text(data.message.name[0]);
		  					// $('.name').val('');
		  				}
		  				if(data.message.quantity){
		  					$('.errorQuantity').show();
		  					$('.errorQuantity').text(data.message.quantity[0]);
		  					// $('.quantity').val('');
		  				}
		  				if(data.message.trend){
		  					$('.errorTrend').show();
		  					$('.errorTrend').text(data.message.trend[0]);
		  					// $('.trend').val('');
		  				}
		  				if(data.message.description){
		  					$('.errorDescription').show();
		  					$('.errorDescription').text(data.message.description[0]);
		  					// $('.description').val('');
		  				}
		  				if(data.message.price){
		  					$('.errorPrice').show();
		  					$('.errorPrice').text(data.message.price[0]);
		  					// $('.price').val('');
		  				}
		  			}else{
		  				toastr.success(data.success, 'Thông Báo', {timeOut: 5000});
						$('#edit').modal('hide'); // ẩn cái modal edit sau khi sửa thành công
						location.reload(); //hàm reload lại trang khi sửa thành công
		  			}
		  		}
		  	});
		  
		});
    // end updateproduct

    
    // delete user
    $('.deleteuser').click(function(event) {
    	var id = $(this).data('id');
    
    	$('.delete').click(function(event) {
    		$.ajax({
    			url: 'admin/users/'+id,
    			type: 'delete',
    			dataType: 'json',
    			success : function(result)
				{
					toastr.success(result.success, 'Thông Báo', {timeOut: 6000});
					location.reload(); //hàm reload lại trang khi xóa thành công
				}
    			
    		})
    		
    		
    	});
    });
    // end deleteuser


    //delete order
    	$('.deleteorder').click(function(event) {
    		var id = $(this).data('id');
    		// alert(id);
    		$('.delete').click(function(event) {
    			$.ajax({
    				url: 'admin/orders/'+id,
    				type: 'delete',
    				dataType: 'json',
    				success : function (result) 
    				{
    					toastr.success(result.success, 'Thông Báo', {timeOut: 6000});
						location.reload(); //hàm reload lại trang khi xóa thành công.
    				}
    			})
    			
    			
    		});
    	});
    // end delete order
    //lọc đơn hàng theo trạng thái (view order)
     $('#statusID').on('change',  function(event) {
       event.preventDefault();
       /* Act on the event */
       console.log(event);
       var status_id = event.target.value;
       $.get('filterOrder/'+status_id, function (data) {
       	
       		$('#getOrder').html(data);
       })
     });
     //end lọc đơn hàng theo trạng thái
	//xu ly don hang
     $('#xlydonhang').on('click', function(event) {
     	console.log('aaa');
     	event.preventDefault();
     	var status = $(this).val();
     	console.log(status);
     	var orderId= $(this).attr('data-id');
     	console.log(orderId);
     	if(status !== null) {
	     	$.ajax({
	     		'url' : '/admin/products/'+orderId+'/process',
	     		'type' : 'POST',
	     		'data' : {
	     			'status' : status
	     		},
	     		success : function(data){
	     			toastr.success(data.success, 'Thông Báo', {timeOut: 6000});
	     			location.reload();
	     		},
	     		error : function() {
	     			alert('error');
	     		}
     	})
     		
     	}
     	/* Act on the event */
     });
     //xóa coupon
     $('.deletecoupon').click(function(event) {
     	var id = $(this).data('id');
     		$('.delete').click(function(event) {
     			$.ajax({
     				url: 'admin/coupons/'+id,
     				type: 'delete',
     				dataType: 'json',
     				success : function (result) {
     					console.log(result);
     					toastr.success(result.success, 'Thông Báo', {timeOut: 6000});
						location.reload(); //hàm reload lại trang khi xóa thành công.
     				},
     				error : function(result) {
     					toastr.error(result.error, 'Thông Báo Lỗi', {timeOut: 6000});
						location.reload(); //hàm reload lại trang khi xóa thành công
     				}
     			});
     			
     			
     		});
     });

     //edit coupon
     $('.editcoupon').click(function(event) {
     	var id = $(this).data('id');
     		$.ajax({
     			url: 'admin/coupons/'+id+ '/edit',
     			type: 'get',
     			dataType: 'json',
     			success : function (result) {
     				console.log(result);
     					$('.title').text(result.coupon_name);
     				$('.coupon_name').val(result.coupon_name);
     				$('.coupon_code').val(result.coupon_code);
     				$('.coupon_time').val(result.coupon_time);
     				$('.coupon_number').val(result.coupon_number);
     				$('.start_date').val(result.start_date);
     				$('.end_date').val(result.end_date);
     				$('.updatecoupon').attr('data-id',id);
     				if(result.coupon_condition == 0){
     					$('.defaut').attr('selected', 'selected');
     				} else if(result.coupon_condition == 1){
     					$('.phantram').attr('selected', 'selected');
     				} else if(result.coupon_condition == 2){
     					$('.tien').attr('selected', 'selected');
     				}
     			}
     		});	
     });
     //updatecoupon   
        $('.updatecoupon').click(function(event) {
    	var ten = $('.coupon_name').val();
		var ma = $('.coupon_code').val();
		var sl = $('.coupon_time').val();
		var loai = $('.coupon_condition').val();
		var number = $('.coupon_number').val();
		var star = $('.start_date').val();
		var end = $('.end_date').val();
		var id = $(this).data('id');
		$.ajax({
			url: 'admin/coupons/'+id,
			type: 'put',
			dataType: 'json',
			data: {
					coupon_name: ten,
					coupon_code : ma,
					coupon_time : sl,
					coupon_condition: loai,
					coupon_number: number,
					start_date : star,
					end_date: end,
					
			},
			success:function($result){
				console.log($result);
				if($result.error == 'true'){
					// $('.error').show();
					$('.errorCode').html($result.message.coupon_code[0]);
					$('.errorName').html($result.message.coupon_name[0]);
					$('.errorNumber').html($result.message.coupon_number[0]);
					$('.errorCondition').html($result.message.coupon_condition[0]);
					$('.errorTime').html($result.message.coupon_time[0]);
					$('.errorStatr').html($result.message.start_date[0]);
					$('.errorEnd').html($result.message.end_date[0]);
				} else
				{
					toastr.success($result.success, 'Thông Báo', {timeOut: 5000});
					$('#edit').modal('hide'); // ẩn cái modal edit sau khi sửa thành công
					location.reload(); //hàm reload lại trang khi sửa thành công
				}
			}
		});	
    });
        //xóa bài viết 
        $('.deletepost').click(function(event) {
        	var id = $(this).data('id');
        	$('.delete').click(function(event) {
        		$.ajax({
        			url: 'admin/posts/'+id,
        			type: 'delete',
        			dataType: 'json',
        			success : function (result) {
     					console.log(result);
     					toastr.success(result.success, 'Thông Báo', {timeOut: 6000});
						location.reload(); //hàm reload lại trang khi xóa thành công.
     				},
     				error : function(result) {
     					toastr.error(result.error, 'Thông Báo Lỗi', {timeOut: 6000});
						location.reload(); //hàm reload lại trang khi xóa thành công
     				}
        		})
        		
        		
        	});
        });

        //lọc sản phẩm theo: giá tăng dần, giá giảm dần, sản phẩm mới nhất
	    $('#productFilter').on('change',  function(event) {
	       event.preventDefault();
	       /* Act on the event */
	       console.log(event);
	       var option = event.target.value;
	       if(option == 1){
	       	 $.get('fillterProductDESC/'+option, function (data) {
	       	
	       		$('#getProduct').html(data);
	       })
	       	} else if(option == 0) {
	       		$.get('fillterProductASC/'+option, function (data) {
	       	
	       		$('#getProduct').html(data);
	       })
	       	 } else if(option == 2){
	       	 	$.get('fillterProductNEW/'+option, function (data) {
	       	
	       	 	$('#getProduct').html(data);
	       	 	 })
	       	}
	     });
	    //edit bài viết 
	    $('.editpost').click(function(event) {
	    	/* Act on the event */
	    	var id = $(this).data('id');
	    	$('.errorTitle').hide();
	    	$('.errorSlug').hide();
	    	$('.errorContent').hide();
	    	$.ajax({
	    		url: 'admin/posts/'+id+'/edit',
	    		type: 'get',
	    		dataType: 'json',
	    		success : function (result) {
	    			console.log(result)
	    			$('.title').val(result.title);
	    			$('.slug').val(result.slug);
	    			CKEDITOR.instances['editor2'].setData(result.content);
	    			 $('.updatepost').attr('data-id',id);
	    		}
	    	})	
	    });

	    //update bài viết 
	    $('.updatepost').click(function(event) {
	    	/* Act on the event */
	    	var id = $(this).data('id');
	    	var title = $('.title').val();
	    	var slug = $('.slug').val();
	    	var content = CKEDITOR.instances['editor2'].getData()

	    	$.ajax({
	    		url: 'admin/posts/'+id,
	    		type: 'put',
	    		dataType: 'json',
	    		data: {
	    			title: title,
	    			slug : slug,
	    			content :content,
	    		},
	    		success : function (result) {
	    			console.log(result);
					if(result.error == 'true'){
						$('.errorTitle').show();
				    	$('.errorSlug').show();
				    	$('.errorContent').show();
						$('.errorTitle').html(result.message.title[0]);
						$('.errorSlug').html(result.message.slug[0]);
						$('.errorContent').html(result.message.content[0]);
					} else
					{
						toastr.success(result.success, 'Thông Báo', {timeOut: 5000});
						$('#edit').modal('hide'); // ẩn cái modal edit sau khi sửa thành công
						location.reload(); //hàm reload lại trang khi sửa thành công
					}
	    		}
	    	})
	    	
	    	
	    });

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
	    // Pie Chart Example
var ctx = document.getElementById("myPieChart");
var orderNew = $('.orderNew').val()
var orderProcessed = $('.orderProcessed').val()
var orderSuccess = $('.orderSuccess').val();
var orderCancel = $('.orderCancel').val()
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Đơn Mới", "Đã Xử Lý", "Đã Nhận Hàng","Hủy Đơn"],
    datasets: [{
      data: [orderNew, orderProcessed, orderSuccess, orderCancel],
      backgroundColor: ['#8FDEF3', '#82E23E', '#0040FF','#E82121'],
      hoverBackgroundColor: ['#6C6CF1', '#15811C', '#0000FF','#E82121'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});




// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var orderSums1 = $('.orderSums1').val();
var orderSums2 = $('.orderSums2').val();
var orderSums3 = $('.orderSums3').val();
var orderSums4 = $('.orderSums4').val();
var orderSums5 = $('.orderSums5').val();
var orderSums6 = $('.orderSums6').val();
var orderSums7 = $('.orderSums7').val();
var orderSums8 = $('.orderSums8').val();
var orderSums9 = $('.orderSums9').val();
var orderSums10 = $('.orderSums10').val();
var orderSums11 = $('.orderSums11').val();
var orderSums12 = $('.orderSums12').val();

var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9","Tháng 10", "Tháng 11", "Tháng 12"],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [orderSums1, orderSums2, orderSums3, orderSums4,orderSums5, orderSums6, orderSums7, orderSums8,orderSums9, orderSums10,orderSums11, orderSums12],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 800000000,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});


	    
});