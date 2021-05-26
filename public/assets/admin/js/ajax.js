$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
	
	$('.editcategory').click(function(event) {
		/* Act on the event */
		$('.error').hide();
		let id = $(this).data('id');

		//viet ajax cho edit
		$.ajax({
			url: 'admin/categories/'+ id + '/edit', //id ni la vua lay duoc ben tren
			type: 'get',
			dataType: 'json',
			success:function($result){
				console.log($result);
				$('.name').val($result.name);
				$('.title').text($result.name);
				if($result.status == 1)
				{
					$('.ht').attr('selected', 'selected');
				} else
				{
					$('.kht').attr('selected', 'selected');
				}
			}

		});

	$('.updatecategory').click(function(event) {
			/* Act on the event */
			let ten = $('.name').val();
			let status = $('.status').val();
			$.ajax({
				url: 'admin/categories/'+id,
				dataType: 'json',
				type: 'put',
				data: {
					name: ten,
					status : status
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

	});

	$('.deletecategory').click(function(event) {
		/* Act on the event */
		let id = $(this).data('id');
		$('.del').click(function(event) {
			/* Act on the event */
			$.ajax({
				url: 'admin/categories/'+id,
				type: 'delete',
				dataType: 'json',
				success : function($result)
				{
					toastr.success($result.success, 'Thông Báo', {timeOut: 5000});
					location.reload(); //hàm reload lại trang khi xóa thành công
				}
			});
			
		});
	});

	$('.editproducttype').click(function(event) {
		/* Act on the event */
		let id = $(this).data('id');
		$.ajax({
			url: 'admin/producttypes/'+$id+'/edit',
			type: 'get',
			dataType: 'json',
			success:function($result){
				$('.name').val($result.producttype.name);
				var html =" ";
				// $.each($result.category,function($key, $value) {
				// 	if($value == 1)
				// });
			}
		})
		
		
	});
});