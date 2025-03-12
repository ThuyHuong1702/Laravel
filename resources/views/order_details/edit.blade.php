@extends('layouts.appCreate')

@section('content')
<div class="container">
    <h2>Chỉnh sửa chi tiết đơn hàng</h2>

    <form action="{{ route('order_details.update', ['order_id' => $orderDetail->order_id, 'product_id' => $orderDetail->product_id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="order_id" class="form-label">Chọn đơn hàng:</label>
            <select name="order_id" id="order_id" class="form-control">
                @foreach($orders as $order)
                    <option value="{{ $order->order_id }}" {{ $orderDetail->order_id == $order->order_id ? 'selected' : '' }}>
                        {{ $order->order_id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Chọn sản phẩm:</label>
            <select name="product_id" id="product_id" class="form-control">
                @foreach($products as $product)
                    <option value="{{ $product->product_id }}" {{ $orderDetail->product_id == $product->product_id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm:</label>
            <input type="text" name="name" id="name" value="{{ $orderDetail->name }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá:</label>
            <input type="number" name="price" id="price" value="{{ $orderDetail->price }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="discount" class="form-label">Giảm giá (%):</label>
            <input type="number" name="discount" id="discount" value="{{ $orderDetail->discount }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('order_details.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
