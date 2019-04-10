<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serial extends Model
{
	use SoftDeletes;

	protected $fillable = ['serial_code', 'status','item_id', 'is_sold'];
    
    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
