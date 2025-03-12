@extends('layouts.appIndex')

@section('content')
<div class="container">
    <h2>Chi tiết đơn hàng</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $orderDetail->id }}</td>
        </tr>
        <tr>
            <th>Đơn hàng</th>
            <td>{{ $orderDetail->order->order_id }}</td>
        </tr>
        <tr>
            <th>Sản phẩm</th>
            <td>{{ $orderDetail->product->name }}</td>
        </tr>
        <tr>
            <th>Tên sản phẩm</th>
            <td>{{ $orderDetail->name }}</td>
        </tr>
        <tr>
            <th>Giá</th>
            <td>{{ number_format($orderDetail->price, 0, ',', '.') }} đ</td>
        </tr>
        <tr>
            <th>Giảm giá (%)</th>
            <td>{{ $orderDetail->discount ?? 0 }}%</td>
        </tr>
    </table>

    <a href="{{ route('order_details.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection
