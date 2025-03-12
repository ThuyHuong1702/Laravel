@extends('layouts.appCreate')

@section('title', 'Thêm mới khách hàng')

@section('content')
    <h2>Thêm khách hàng</h2>

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer ID:</label>
            <input type="number" name="customer_id" id="customer_id" class="form-control" required>
            @error('customer_id')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
            @error('name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
            @error('email')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
            @error('phone')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Thêm khách hàng</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection
