<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model


{
    protected $table = 'admins';
    protected $fillable = ['name', 'email', 'password'];

    public function messages(){
        return $this->hasMany('App\Models\Message');
    }

   

    use HasFactory;
}
