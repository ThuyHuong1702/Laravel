<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    /**
     * Hiển thị danh sách chi tiết đơn hàng.
     */
    public function index()
    {
        $orderDetails = OrderDetail::with(['order', 'product'])->paginate(10); // Lấy danh sách có phân trang
        return view('order_details.index', compact('orderDetails'));
    }


    /**
     * Hiển thị form thêm mới chi tiết đơn hàng.
     */
    public function create()
    {
        $orders = Order::all();
        $products = Product::all();
        return view('order_details.create', compact('orders', 'products'));
    }

    /**
     * Lưu chi tiết đơn hàng mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        $request->validate([
            'orderDetail_id' => 'required|unique:order_detail,orderDetail_id',
            'order_id'       => 'required|exists:orders,order_id',
            'product_id'     => 'required|exists:products,product_id',
            'name'           => 'required|string|max:255',
            'price'          => 'required|numeric|min:0',
            'discount'       => 'nullable|numeric|min:0|max:100',
        ]);

        OrderDetail::create($request->all());

        return redirect()->route('order_details.index')->with('success', 'Chi tiết đơn hàng đã được thêm thành công!');
    }


    /**
     * Hiển thị chi tiết đơn hàng cụ thể.
     */

    public function show($orderDetail_id)
    {
        $orderDetail = OrderDetail::findOrFail($orderDetail_id);
        return view('order_details.show', compact('orderDetail'));
    }

    /**
     * Hiển thị form chỉnh sửa chi tiết đơn hàng.
     */
    public function edit($orderDetail_id)
    {
        $orderDetail = OrderDetail::findOrFail($orderDetail_id);
        $orders = Order::all();
        $products = Product::all();
        return view('order_details.edit', compact('orderDetail', 'orders', 'products'));
    }



    /**
     * Cập nhật chi tiết đơn hàng.
     */

    public function update(Request $request, $orderDetail_id)
    {
        $orderDetail = OrderDetail::findOrFail($orderDetail_id);
        $orderDetail->update($request->all());
        return redirect()->route('order_details.index')->with('success', 'Chi tiết đơn hàng đã cập nhật!');
    }

    /**
     * Xóa chi tiết đơn hàng.
     */
    public function destroy($orderDetail_id)
    {
        OrderDetail::findOrFail($orderDetail_id)->delete();
        return redirect()->route('order_details.index')->with('success', 'Chi tiết đơn hàng đã bị xóa!');
    }

}
