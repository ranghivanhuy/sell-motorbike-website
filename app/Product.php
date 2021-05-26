<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $table= 'products';

    protected $fillable =[
        'name','quantity','trend','description','price','category_id','image_path',
    ];
    
    public function category(){
    	return $this->belongsTo('App\Category','category_id','id');
    }
    public function comment(){
    	return $this->hasMany('App\Comment','product_id','id');
    }
    public function order_detail(){
    	return $this->hasMany('App\Order_detail','product_id','id');
    }
}
