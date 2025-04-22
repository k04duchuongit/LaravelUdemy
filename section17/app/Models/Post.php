<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','name'];

    function user(){
        return $this->belongsTo(User::class); 
    }

    function tags(){
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function image()
    {
        //has many
        return $this->morphOne(Image::class, 'imageable');  
    }
}
