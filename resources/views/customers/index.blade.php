@extends('layouts.appIndex')

@section('title', 'Danh sách khách hàng')

@section('content')
<a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Thêm mới khách hàng</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Phone</th>
            <th colspan="2">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer) <!-- Đổi $customer từ compact('customer') thành compact('customers') -->
        <tr>
            <td>{{ $customer->customer_id }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>
                <a href="{{ route('customers.edit', $customer->customer_id) }}" class="btn btn-warning">Sửa</a>
            </td>
            <td>
                <form action="{{ route('customers.destroy', $customer->customer_id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa không?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Hiển thị nút chuyển trang -->
{{ $customers->links('pagination::bootstrap-5') }}

@endsection
