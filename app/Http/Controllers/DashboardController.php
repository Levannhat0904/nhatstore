<?php

namespace App\Http\Controllers;

use App\Models\Order;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __construct(Request $request, Middleware $next)
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'dashboard']);
            return $next($request);
        });
    }
    //
    function show()
    {
        $orders = Order::OrderBy('id', 'desc')->paginate(10);
        // $order_detail =Order::find(4)->order_detail;
        // return $order_detail->find(5)->product->productCat->catagory_item;
        // return $order;                                                                                                                                                                      
        $order_success = Order::where('status', 'Thành công')->get(); // đơn hàng thành công
        $order_processing = Order::where('status', ['Đang chờ gửi hàng', 'Đang vận chuyển'])->get(); //đơn hàng chờ xử lí
        $order_cance = Order::where('status', 'Đã hủy', 'Đang vận chuyển')->get(); //đơn hàng đã hủy
        // return $order->sum('total');
        return view('admin.dashbroad', compact('orders', 'order_success', 'order_processing', 'order_cance'));
    }
    function admin(){
        $orders = Order::OrderBy('id', 'desc')->paginate(10);
        // $order_detail =Order::find(4)->order_detail;
        // return $order_detail->find(5)->product->productCat->catagory_item;
        // return $order;                                                                                                                                                                      
        $order_success = Order::where('status', 'Thành công')->get(); // đơn hàng thành công
        $order_processing = Order::where('status', ['Đang chờ gửi hàng', 'Đang vận chuyển'])->get(); //đơn hàng chờ xử lí
        $order_cance = Order::where('status', 'Đã hủy', 'Đang vận chuyển')->get(); //đơn hàng đã hủy
        // return $order->sum('total');
        return view('admin.dashbroad', compact('orders', 'order_success', 'order_processing', 'order_cance'));
    }
}
