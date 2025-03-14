@extends('layouts.appCreate')

@section('content')
<div class="container">
    <h2>Chỉnh sửa chi tiết đơn hàng</h2>

    <form action="{{ route('order_details.update', $orderDetail->orderDetail_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="orderDetail_id" class="form-label">Customer ID:</label>
            <input type="text" name="orderDetail_id" id="orderDetail_id" value="{{ $orderDetail->orderDetail_id }}" class="form-control" readonly>
        </div>

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
                    <option value="{{ $product->product_id }}"
                        data-name="{{ $product->name }}"
                        {{ $orderDetail->product_id == $product->product_id ? 'selected' : '' }}>
                        {{ $product->product_id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm:</label>
            <input type="text" name="name" id="name" value="{{ $orderDetail->name }}" class="form-control" readonly>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let productSelect = document.getElementById("product_id");
        let nameInput = document.getElementById("name");

        // Hàm cập nhật tên sản phẩm theo product_id đã chọn
        function updateProductName() {
            let selectedOption = productSelect.options[productSelect.selectedIndex];
            nameInput.value = selectedOption.getAttribute("data-name"); // Lấy tên từ data-name
        }

        // Khi thay đổi sản phẩm, tự động cập nhật tên
        productSelect.addEventListener("change", updateProductName);

        // Cập nhật tên sản phẩm ngay khi tải trang (nếu có sản phẩm được chọn)
        updateProductName();
    });
</script>

@endsection
