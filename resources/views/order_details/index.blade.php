@extends('layouts.appIndex')

@section('content')
<div class="container">
    <h2 class="mb-3">Danh sách chi tiết đơn hàng</h2>
    <a href="{{ route('order_details.create') }}" class="btn btn-primary mb-3">Thêm mới</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Đơn hàng</th>
                <th>Sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Giảm giá (%)</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderDetails as $detail)
            <tr>
                <td>{{ $detail->id }}</td>
                <td>{{ $detail->order->order_id }}</td>
                <td>{{ $detail->product->product_id }}</td>
                <td>{{ $detail->name }}</td>
                <td>{{ number_format($detail->price, 0, ',', '.') }} đ</td>
                <td>{{ $detail->discount ?? 0 }}%</td>
                <td>
                    <a href="{{ route('order_details.edit', ['order_id' => $detail->order_id, 'product_id' => $detail->product_id]) }}">
                        Chỉnh sửa
                    </a>
                    <a href="{{ route('order_details.show', ['order_id' => $detail->order_id, 'product_id' => $detail->product_id]) }}">
                        Xem chi tiết
                    </a>
                    <form action="{{ route('order_details.destroy', ['order_id' => $detail->order_id, 'product_id' => $detail->product_id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $orderDetails->links() }}
</div>
@endsection
