<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
        'id',
        'transaction_code', 
        'user_id', 
        'status_id', 
        'payment_mode_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function items()
    {
        return $this->belongsToMany('App\Item')->using('App\ItemOrder')->withPivot('quantity', 'price')->withTimestamps();
    }

    public function serials()
    {
        return $this->hasMany('App\Serial');
    }
}
