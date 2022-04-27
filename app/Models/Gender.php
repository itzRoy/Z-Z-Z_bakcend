<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'genders';
    protected $fillable = ['type'];

    public function categories(){
        return $this->hasMany('App\Models\Categorie');
    }

    use HasFactory;
}
