<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;
	protected $dates=['deleted_at'];
    protected $table = "categories";

	public function categories()
	{
		return $this->hasMany('App\Category', 'parent_id', 'id');
	}

	public function children(){
		return $this->hasMany('App\Category','parent_id','id')->with('categories');
	}

	public function product(){
		return $this->hasMany('App\Product','category_id','id');
	}


	public function product_r(){
		return $this->hasManyThrough('App\Product','App\Category','parent_id','category_id','id','id');
	}
	
	protected $fillable=[
		'name','parent_id',
	];
}
