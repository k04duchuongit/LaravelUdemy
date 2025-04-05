<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name'
    ];
    function states()
    {
        return $this->hasMany(State::class, 'country_id', 'id');
    }

    public function cities()
    {
        return $this->hasManyThrough(
            City::class,   // 1. Class bảng đích (City)
            State::class,  // 2. Class bảng trung gian (State)
            'country_id',  // 3. Khóa ngoại trên bảng trung gian (State) trỏ đến bảng cha (Country)
            'state_id',    // 4. Khóa ngoại trên bảng đích (City) trỏ đến bảng trung gian (State)
            'id',          // 5. Khóa chính trên bảng cha (Country)
            'id'           // 6. Khóa chính trên bảng trung gian (State)
        );
    }
}
