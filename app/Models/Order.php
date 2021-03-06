<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['address', 'phone', 'note', 'user_id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function items(){
        return $this->belongsToMany(Item::class );
    }


    use HasFactory;
}
