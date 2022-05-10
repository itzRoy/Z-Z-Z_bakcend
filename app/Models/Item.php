<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $table = 'items';
    protected $fillable = ['name', 'quantity', 'price', 'description', 'categorie_id'];

    public function categorie(){
        return $this->belongsTo('App\Models\Categorie');
    }

    public function order(){
        return $this->belongsToMany('App\Models\Order');
    }

    public function image(){
        return $this->hasMany('App\Models\Image');
    }

    use HasFactory;
}
