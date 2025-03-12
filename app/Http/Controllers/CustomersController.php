<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomersController extends Controller
{
    /**
     * Hiển thị danh sách khách hàng.
     */
    public function index()
    {
        $customers = Customer::paginate(2); // Phân trang 2 khách hàng mỗi trang
        return view('customers.index', compact('customers'));
    }

    /**
     * Hiển thị form tạo khách hàng mới.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Lưu khách hàng mới vào cơ sở dữ liệu.
     */
    public function store(StoreCustomerRequest $request)
    {
        $data = $request->validated();

        // Tạo khách hàng mới bằng Eloquent
        Customer::create($data);

        return redirect()->route('customers.create')->with('success', 'Khách hàng đã được thêm thành công!');
    }

    /**
     * Hiển thị form chỉnh sửa khách hàng.
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id); // Tìm khách hàng hoặc báo lỗi 404
        return view('customers.edit', compact('customer'));
    }

    /**
     * Cập nhật thông tin khách hàng.
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);

        // Cập nhật thông tin khách hàng
        $customer->update($request->validated());

        return redirect()->route('customers.index')->with('success', 'Cập nhật thành công!');
    }

    /**
     * Xóa khách hàng khỏi hệ thống.
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Khách hàng đã được xóa thành công!');
    }
}
