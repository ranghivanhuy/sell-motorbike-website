<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';
    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }
    public function product(){
    	return $this->belongsTo('App\Product','product_id','id');
    }
    public function post(){
    	return $this->belongTo('App\Post','post_id','id');
    }
    protected $fillable=[
    	'user_id','name','product_id','post_id','content','rate',
    ];
}
