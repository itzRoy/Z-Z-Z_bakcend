<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{

    protected $table = 'order_items';
    protected $fillable = ['item_id', 'order_id'];

    public function item(){
        return $this->belongsTo('App\Models\Item');
    }

    public function order(){
        return $this->belongsTo('App\Models\Order');
    }
    use HasFactory;
}
