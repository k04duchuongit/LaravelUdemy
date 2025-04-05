<?php

namespace App\Models;

use App\Models\State;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable = [
        'name',
        'state_id'
    ];
    function states()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    function coutries()
    {
        // return $this->hasManyThrough(Country::Class,State::Class,'');
    }

    
}
