@extends('layouts.appCreate')

@section('content')
<div class="container">
    <h2>Thêm mới chi tiết đơn hàng</h2>

    <form action="{{ route('order_details.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="orderDetail_id" class="form-label">OrderDetail ID:</label>
            <input type="text" name="orderDetail_id" id="orderDetail_id"  class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="order_id" class="form-label">Chọn đơn hàng:</label>
            <select name="order_id" id="order_id" class="form-control" required>
                @foreach($orders as $order)
                    <option value="{{ $order->order_id }}">{{ $order->order_id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Chọn sản phẩm:</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->product_id }}"
                        data-name="{{ $product->name }}">
                        {{ $product->product_id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá:</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="discount" class="form-label">Giảm giá (%):</label>
            <input type="number" name="discount" id="discount" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
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
