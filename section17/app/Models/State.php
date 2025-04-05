<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name','country_id'
    ];
    function cities(){
        return $this->hasMany(City::class,'state_id','id');
    }
}
