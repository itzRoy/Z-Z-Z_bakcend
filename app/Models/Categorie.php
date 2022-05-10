<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{

    protected $table = 'categories';
    protected $fillable = ['name', 'gender_id'];

    public function gender(){
        return $this->belongsTo('App\Models\Gender');
    }

    public function items(){
        return $this->hasMany('App\Models\Item');
    }

        
    use HasFactory;
}
