<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function address()
    {
        return $this->hasOne(Address::class,'user_id','id');   // laravel sẽ xem đây là câu lệnh join với bảng address qua trường id_users
    }
    
    public function address_OneToMany()
    {
        //has many
        return $this->hasMany(Address::class,'user_id','id');  
    }

    public function Post_OneToMany()
    {
        //has many
        return $this->hasMany(Post::class);   
    }

    public function image()
    {
        //has many
        return $this->morphOne(Image::class, 'imageable'); // trả về ảnh có id tương ứng 
    }
}

