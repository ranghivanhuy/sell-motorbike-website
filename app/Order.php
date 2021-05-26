<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }
    public function order_detail(){
    	return $this->hasMany('App\OrderDetail','order_id','id');
    }
     public function coupon()
    {
        return $this->belongsTo('App\Coupon', 'coupon_id', 'id');
    }
    protected $fillable=[
    	'name','user_id','coupon_id','date','order_total','status','address','phone','user_name',
    ];
}
