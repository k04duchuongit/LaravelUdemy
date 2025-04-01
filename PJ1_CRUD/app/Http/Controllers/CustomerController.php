<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CustomerStoreRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customers = Customer::when($request->has('search'), function ($query) use ($request) {  //$query ở đây là Customer::query()
            // phải dùng use ở đây là bởi callback là 1 hàm closure sẽ không liên quan gì đến phương thức hiện tại nên phải dùng use để sử dụng bién
            // GIẢI THÍCH THÊM : $query ở đây chính là lớp query builder - được định nghĩa trong câu trúc của when - có note trong udemy
            $query->where('first_name', 'like', '%' . $request->search . '%')
                ->orWhere('last_name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%');
        })->orderBy('id', $request->has('order') && $request->order == 'asc' ? 'ASC' : 'DESC')->get();

        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        $customer = new Customer();

        if ($request->hasFile('image')) {
            $image = $request->file('image');  // Lấy file từ request
            $fileName = $image->store('', 'public'); // Lưu file vào thu muc theo câú hình của disk-public
            $filePath = '/uploads/' . $fileName;
            $customer->img = $filePath;
        }
        $customer->first_name          = $request->first_name;
        $customer->last_name           = $request->last_name;
        $customer->email               = $request->email;
        $customer->phone               = $request->phone;
        $customer->bank_account_number = $request->bank_account_number;
        $customer->about               = $request->about;
        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.show', compact('customer'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id); // Tìm kiếm khách hàng theo id nêus không tìm thấy sẽ trả về 404
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerStoreRequest $request, string $id)
    {


        $customer = Customer::findOrfail($id);

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            File::delete(public_path($customer->img));
            // Lưu ảnh mới

            $image = $request->file('image');  // Lấy file từ request
            $fileName = $image->store('', 'public'); // Lưu file vào thu muc theo câú hình của disk-public
            $filePath = '/uploads/' . $fileName;
            $customer->img = $filePath;
        }
        $customer->first_name          = $request->first_name;
        $customer->last_name           = $request->last_name;
        $customer->email               = $request->email;
        $customer->phone               = $request->phone;
        $customer->bank_account_number = $request->bank_account_number;
        $customer->about               = $request->about;
        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);

        // Xóa ảnh cũ nếu có
        // if ($customer->img) {
        //     File::delete(public_path($customer->img));
        // }
        $customer->delete();
        return redirect()->route('customers.index');
    }

    public function trashIndex(Request $request)
    {
        $customers = Customer::when($request->has('search'), function ($query) use ($request) {  //$query ở đây là Customer::query()
            // phải dùng use ở đây là bởi callback là 1 hàm closure sẽ không liên quan gì đến phương thức hiện tại nên phải dùng use để sử dụng bién
            // GIẢI THÍCH THÊM : $query ở đây chính là lớp query builder - được định nghĩa trong câu trúc của when - có note trong udemy
            $query->where('first_name', 'like', '%' . $request->search . '%')
                ->orWhere('last_name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%');
        })->orderBy('id', $request->has('order') && $request->order == 'asc' ? 'ASC' : 'DESC')->onlyTrashed()->get();

        return view('customer.trash', compact('customers'));
    }

    /**
     * restore specified resource from storage.
     */
    public function restore(string $id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->restore();
        return redirect()->back();
    }

    /**
     * force Destroy specified resource from storage.
     */
    function forceDestroy(int $id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        //  Xóa ảnh cũ nếu có
        if ($customer->img) {
            File::delete(public_path($customer->img));
        }
        $customer->forceDelete();
        return redirect()->back();
    }
}
