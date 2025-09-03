<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class item extends Model
{
    //

    use HasFactory;

    protected $table = 'items'; // اسم الجدول مختلف عن products
    protected $fillable = ['name', 'price', 'description'];

    public function scopeExpensive($query){
        return $query->where('price', '>', 200);

    }
}


