<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate::define('update-post', function (User $user, Post $post) { // định nghĩa phân quyền sửa post
        //     return $user->id === $post->user_id;            //kiểm tra nếu người dùng hiện tại có id bằng với id của post thì cho phép sửa
        // });
    }
}
