@extends('layouts.appIndex')

@section('content')
    <div class="container">
        <h2>Thống kê đơn hàng theo tháng</h2>

        <form id="statisticsForm">
            <label>Chọn tháng:</label>
            <input type="number" id="month" name="month" min="1" max="12" required>

            <label>Chọn năm:</label>
            <input type="number" id="year" name="year" min="2000" max="2100" required>

            <button type="submit">Thống kê</button>
        </form>

        <h3>Kết quả:</h3>
        <p>Tổng đơn hàng: <span id="total_orders">0</span></p>
        <p>Doanh thu: <span id="total_revenue">0</span> VND</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#statisticsForm').submit(function(e) {
                e.preventDefault(); // Ngăn chặn load lại trang

                let month = $('#month').val();
                let year = $('#year').val();

                $.ajax({
                    url: "{{ url('/order-statistics') }}",
                    type: "GET",
                    data: { month: month, year: year },
                    success: function(response) {
                        $('#total_orders').text(response.total_orders);
                        $('#total_revenue').text(response.total_revenue);
                    },
                    error: function(xhr) {
                        alert("Lỗi khi lấy dữ liệu!");
                    }
                });
            });
        });
    </script>
@endsection
