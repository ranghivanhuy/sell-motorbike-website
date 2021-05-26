<option value="{{$child_category->id}}" class=""><?php echo $str; ?>{{$child_category->name}}</option>
@if($child_category->categories)

	@foreach($child_category->categories as $childCategory)
	
@include('admin.pages.category.child_category', ['child_category'=>$childCategory, 'str'=>$str.'-'])
	@endforeach

@endif

