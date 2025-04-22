<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'path',
        'imageable_id',
        'imageable_type'
    ]; // imageable_id là id của bảng mà nó liên kết tới, imageable_type là tên bảng mà nó liên kết tới

    function imageable()
    {  // hàm này dùng để định nghĩa mối quan hệ polymorphic
        return $this->morphTo();
    }
}
