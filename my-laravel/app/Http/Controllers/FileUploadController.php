<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File as HandleFile;

class FileUploadController extends Controller
{
    function index()
    {
        // $files = File::find(4);
        // HandleFile::delete(public_path($files->file_path));   // xóa file ảnh có trong thư mục public
        // $files->delete();  // xóa ở db


        $files = File::all();
        return view('file-upload',['files' => $files]);
     
    }

    function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf|max:2048', // Giới hạn 2MB , chỉ cho phép file jpg, png, pdf
        ]);


        // $file = Storage::disk('local')->put('/', $request->file('file'));
        // $file = $request->file('file')->store('/','local');
        // $file = $request->file('file')->store('/','dir_public_edit');  //file() lấy file từ form, nếu không có trả về null - store lưu vào thư mục

        $file = $request->file('file');

        $customNameFile = 'laravel_'.Str::uuid().'.'.$file->getClientOriginalExtension();  //tạo tên file mới
        $path = $file->storeAs('/',$customNameFile,'dir_public_edit');  //storeAs lưu file với tên mới

        $fileStore = new File();
        $fileStore->file_path = '/uploads/'.$path;
        $fileStore->save();
        dd('Success');
        return redirect()->route('file.upload');
    }

    function download()
    {
        // $file = File::find(); // ở đây phải truyền id của file cần dowload sau đó lấy đường dẫn, nhung đây là deme nên fix cứng
        return Storage::disk('public')->download('0SBHNAGMBYgjnPaXkNo5ZaiowNQELnK777yHjGHA.png');
    }
}
