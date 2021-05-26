<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';

    protected $fillable = [
    	'coupon_name', 'coupon_code','coupon_time', 'coupon_number', 'coupon_condition', 'start_date', 'end_date',
    ];
    public function getExpiredAttribute(){

    	//dd(date('Y-m-d'), $this->end_date);

    	return date('Y-m-d') > $this->end_date ? true : false;	

    }

    public function order()
    {
    	return $this->hasMany('App\Order', 'coupon_id','id');
    }
}
