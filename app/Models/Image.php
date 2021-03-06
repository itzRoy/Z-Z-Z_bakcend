<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $table = 'images';
    protected $fillable = ['image_url', 'item_id'];

    public function item(){
        return $this->belongsTo('App\Models\Item');
    }

    use HasFactory;
}


