@extends('layouts.appCreate')

@section('title', 'cập nhật khách hàng')

@section('content')

<form action="{{ route('customers.update', $customer) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="customer_id" class="form-label">Customer ID:</label>
        <input type="text" name="customer_id" id="customer_id" value="{{ $customer->customer_id }}" class="form-control" readonly>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Tên:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}" class="form-control">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}" class="form-control">
        @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Số điện thoại:</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}" class="form-control">
        @error('phone')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Cập nhật</button>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@endsection
