<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class getOrderStatistics extends Controller
{
    public function index()
    {
        return view('orders.ordersIndex');
    }

    public function getOrderStatistics(Request $request) {
        $month = $request->month;
        $year = $request->year;

        $statistics = Order::join('order_detail', 'orders.order_id', '=', 'order_detail.order_id')
            ->selectRaw('COUNT(orders.order_id) as total_orders, SUM(order_detail.price * (1 - order_detail.discount / 100)) as total_revenue')
            ->whereMonth('orders.order_days', $month)
            ->whereYear('orders.order_days', $year)
            ->first();

        return response()->json([
            'total_orders' => $statistics->total_orders,
            'total_revenue' => $statistics->total_revenue
        ]);
    }
}
