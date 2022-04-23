<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['address', 'phone', 'note'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function orderItem(){
        return $this->belongsToMany('App\Models\Order_item');
    }


    use HasFactory;
}
