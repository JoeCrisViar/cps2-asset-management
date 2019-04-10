<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'id',
        'model', 
        'specification', 
        'price', 
        'stock', 
        'category_id', 
        'user_id',
        'brand_id',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function serials()
    {
        return $this->hasMany('App\Serial');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
     public function orders()
    {
        return $this->belongsToMany('App\Order')->using('App\ItemOrder')->withPivot('quantity', 'price')->withTimestamps();
    }	
}
