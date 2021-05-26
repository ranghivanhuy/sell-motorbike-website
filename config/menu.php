<?php 
	
return [
	[
		'name' => 'Dashboard',
		'icon' => 'fa-home',
		'route'=> 'admin.index'
	],[
		'name' => 'Categories',
		'icon' => 'fa-cog',
		'route'=> 'categories.index',
		'item'=> [
			[
				'name' => 'List Categories',
				'route'=> 'categories.index'
			],[
				'name' => 'Add Categories',
				'route'=> 'categories.create'
			]
		]
	],[
		'name' => 'Products',
		'icon' => 'fa-building',
		'route'=> 'products.index',
		'item'=> [
			[
				'name' => 'List Products',
				'route'=> 'products.index'
			],[
				'name' => 'Add Products',
				'route'=> 'products.create'
			 ],
		]
	],[
		'name' => 'Users',
		'icon' => 'fa-user',
		'route'=> 'users.index',
		'item'=> [
			[
				'name' => 'List Users',
				'route'=> 'users.index'
			],
			
		]
	],[
		'name' => 'Order',
		'icon' => 'fa-cart-arrow-down',
		'route'=> 'orders',
		'item'=> [
			[
				'name' => 'List Order',
				'route'=> 'orders.index'
			 ],//[
			// 	'name' => 'List Status',
			// 	'route'=> 'status.index'
			// ],
		]
	],
	[
		'name' => 'Post',
		'icon' => 'fa-comment',
		'route'=> 'posts',
		'item'=> [
			[
				'name' => 'List Post',
				'route'=> 'posts.index'
			],
			[
				'name' => 'Add Post',
				'route'=> 'posts.create'
			],
		]
	],[
		'name' => 'Coupon',
		'icon' => 'fa-percent',
		'route'=> 'coupons',
		'item'=> [
			[
				'name' => 'List Coupon',
				'route'=> 'coupons.index'
			],
			[
				'name' => 'Add Coupon',
				'route'=> 'coupons.create'
			],
		]
	],[
		'name' => 'Contact',
		'icon' => 'fa-file-signature',
		'route'=> 'coupons',
		'item'=> [
			[
				'name' => 'List Contact',
				'route'=> 'users.contact'
			],
			
		]
	],

];


 ?>
