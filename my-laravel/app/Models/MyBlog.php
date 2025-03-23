<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyBlog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    //

    public function scopeActive($query){
        return $query->where('id',1);
    }
}
