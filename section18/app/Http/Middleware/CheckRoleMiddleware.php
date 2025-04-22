<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response  // tham số thứ 1 là dữ liệu trả về, tham số thứ 2 là hàm cho phép request đi tiếp nếu pass
    {               // tham số thứ 3 là các role điều kiện ví dụ 'admin' hoặc 'user' hoặc cả 2
       
       dd($role);
        $user = User::findOrFail($request->id);
        if ($user->role === $role) {
            return $next($request);
        }
        return abort(404);
    }
}
