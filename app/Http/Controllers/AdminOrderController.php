<?php

namespace App\Http\Controllers;

use App\Models\Order;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    //
    function __construct(Request $request, Middleware $next)
    {
        $this->middleware(function ($request,  $next) {
            session(['module_active' => 'order']);
            return $next($request);
        });
    }
    function list(Request $request)
    {
        $status = $request->input('status');
        $orders_shipping = Order::where('status', 'Đang vận chuyển')->OrderBy('id', 'desc')->paginate(10);
        $orders_waiting = Order::where('status', 'Đang chờ gửi hàng')->OrderBy('id', 'desc')->paginate(10);
        $orders_cancel = Order::where('status', 'Đã hủy')->OrderBy('id', 'desc')->paginate(10);
        $orders_success = Order::where('status', 'Thành công')->OrderBy('id', 'desc')->paginate(10);
        $count = [$orders_shipping->count(),$orders_waiting->count(),$orders_cancel->count(),$orders_success->count()];
        // $count=[1,2,3,4];
        if ($status == 'shipping') {
            $orders=$orders_shipping;
        } else if ($status == 'waiting') {
            $orders=$orders_waiting;
        } else if ($status == 'cancel') {
            $orders=$orders_cancel;
        } else if ($status == 'success') {
            $orders=$orders_success;
        } else {
            $key = "";
            if ($request->input('key')) {
                $key = $request->input('key');
            }
            $orders = Order::where('username', 'LIKE', "%{$key}%")->OrderBy('id', 'desc')->paginate(10);
        }
        // $users= User::all();// lấy ra toàn bộ user có trong hệ thống
        // return   $request->input('key');
        // $orders = Order::OrderBy('id', 'desc')->paginate(10);

        return view('admin.order.list', compact('orders', 'count'));
    }
    function detail($id)
    {
        $order = Order::find($id);
        // return $order ;
        return view('admin.order.detail', compact('order'));
    }
    function update_status()
    {
        $id = $_GET['Id'];
        $status = $_GET['status'];
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        // Session::flash('success', 'Bạn thay đổi post thành công');
        // return redirect()->route('posts')
    }
}
