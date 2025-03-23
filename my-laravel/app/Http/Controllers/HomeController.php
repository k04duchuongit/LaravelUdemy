<?php

namespace App\Http\Controllers;

use App\Models\MyBlog;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index()
    {
      
        return view('welcome');
    }


    function showAboutPage()
    {
        return view('about');
    }

    
    function test_queryBuilder()
    {
        //THÊM DỮ LIỆU
        // DB::table('users')->insert([
        //     'name' => 'John Doe 22',
        //     'email' => 'duchu324324ong@gmail.com',
        //     'password' => '1234'
        // ]);


        //LẤY DỮ LIỆU TỪ DB
        // $users= DB::table('users')->where('id','!=',1)->first();   //lấy ra 1 bản ghi co id != 1
        // return $users;
        // return view('welcome');

        //UPDATE DƯỮ LIỆU
        // DB::table('users')->where('id', 1)->update(
        //     [
        //         'name' => 'name update',
        //         'email' => 'email update',
        //         'password' => 'password update'
        //     ]
        // );

        // //XÓA DỮ LIỆU
        // DB::table('users')->where('id', 1)->delete();


        // $blogs = DB::table('blogs')->pluck('title')->toArray();   //lấy ra 1 cột trong bảng và chuyển thành mảng

        // echo '<pre>';
        // print_r($blogs);
        // echo '</pre>';

    }
    function eloquentORM(){
          //CREATE data to db
        // $product = new Product();

        // $product->name = 'Car';
        // $product->description = 'this is a test description';
        // $product->price = 100;
        // $product->save();
        //or
        // User::create([
        //     'name' => 'duchuong',
        //     'email' => 'duchuongkk',
        //     'password' => 'cc',
        //     'role' => 'admin'    //khong the insert cot role vi khong co trong fillable o trong model
        // ]);

        //READ data from db
        // $users = User::find(1);
        // dd($users);

        //UPDATE data to db
        // $user = new User();
        // User::where('id',2)->update([
        //     'name' => 'duchuongg update',
        //     'email' => 'duchuong123',
        //     'password' => 'cc'

        // ]);

        //DELETE data from db
        // User::where('id',1)->delete();
        //or
        // $user = User::findOrFail(1);  // Dùng findOrFail() khi bạn muốn đảm bảo dữ liệu tồn tại và xử lý lỗi nếu không tìm thấy.
        // $user->delete();
        // dd($user);

        //SCOPE ELOQUENT
        // $blogs = MyBlog::Active()->get(); 
        // dd($blogs);


        //SOFT DELETE 
        // $product = Product::find(3);
        // $product->delete(); //xóa mềm

        // //Khôi phục SOFT DELETE
        // $product = Product::withTrashed()->find(1);   //tìm sản phẩm có id = 1 cho dù đã xóa mêm
        // $product->restore();    //khôi phục sản phẩm đã xóa mềm

        // //XÓA VĨNH VIỄN
        // $product = Product::withTrashed()->find(1);
        // $product->forceDelete();

        // Product::onlyTrashed()->forceDelete(); //xóa vĩnh viễn tất cả sản phẩm đã xóa mềm

    }
}
