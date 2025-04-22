<?php

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\State;
use App\Models\Address;
use App\Models\Country;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    $users = User::all();

    return view('test', compact('users',));
});


Route::get('/relation_oneToMany', function () {
    $users = User::all();
    $address = Address::all();
    return view('oneToMany', compact('users', 'address'));
});

Route::get('/post', function () {
    // Post::insert([
    //     [
    //         'user_id' => 1,
    //         'name' => 'Laravel'
    //     ],
    //     [
    //         'user_id' => 1,
    //         'name' => 'Javascripts'
    //     ],
    //     [
    //         'user_id' => 1,
    //         'name' => 'C++'
    //     ],
    //     [
    //         'user_id' => 2,
    //         'name' => 'C#'
    //     ],
    // ]);

    // $post = Post::first();
    // $tag = Tag::first();
    // $post->tags()->attach([1, 2, 3]);  // attach thêm dữ liệu vào bảng trung gian , ở đây là thêm 3 bản ghi có id_tag là 1,2,3 và id_post là cái cừa truy vấn rara
    //  $post->tags()->detach(3); // Xóa tag có ID = 3 khỏi bài viết
    // $post->tags()->sync([1, 2, 3]); // Chỉ giữ lại các tag có ID 1, 2, 3 (xóa các tag khác)

    $posts = Post::all();
    return view('post', compact('posts'));
});


Route::get('/hasManyThrough', function () {
    // $country = new Country(['name' => 'Thai lan']);
    // $country->save();

    // $country = Country::find(1); 
    // $state = new State(['name' => 'Thanh Hoa']);

    // $country->states()->save($state);  // khi dùng save qua mối quan hệ, nó sẽ lưu vài bảng con và tự luu id của cha nó luôn 

    // $state->cities()->createMany([  // giống như trên nhưng mà là nhiều bản ghi
    //     ['name'=> 'Quang xuong'],
    //     ['name'=> 'Sam Son'],
    // ]);
    $country = Country::first();

    return view('through', compact('country'));
});


// polymorphic relationships
Route::get('/image', function () {
    $post = Post::find(1);
    // $post->image()->create([     //tự động lưu id đến bảng quan hệ
    //     'path' => '/upload/post_image.jpg',
    // ]);

    return $post->image;
});
