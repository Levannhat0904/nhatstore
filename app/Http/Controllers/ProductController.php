<?php

namespace App\Http\Controllers;

session_start();

use App\Mail\order_all;
use App\Mail\Send_mail;
use App\Models\CatProduct;
use App\Models\City;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\product;
use App\Models\productCat;
use App\Models\Province;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Nette\Utils\Random;
use PhpParser\Node\Stmt\Return_;

use function PHPUnit\Framework\returnSelf;

class ProductController extends Controller
{
    //
    function show()
    {
        
        $products = product::all()->groupBy(function ($product) {
            return explode('.', $product->slug_cat)[0];
        });
        $product_hots = product::orderBy('qty_sold', 'desc')->limit(10)->get();
        // return $product_hots;
        // return $products;
        $user = "";
        if (!empty(Auth::user()->name)) {

            $user = Auth::user()->name;
        }
        return view('product.show', compact( 'products','product_hots', 'user'));

        // $products = Product::where('cat_id', $cat_id)->get();
        // // $products = Product::where('cat_id', $cat)->get();
        // // return $products;
        // return view('product.show', compact('products'));
    }
    function shoppingcart()
    {
        $user = "";
        if (!empty(Auth::user()->name)) {

            $user = Auth::user()->name;
        }
        return view('product.shoppingcart', compact('user'));
    }
    function checkout()
    {
        $user = "";
        if (!empty(Auth::user()->name)) {

            $user = Auth::user()->name;
        }
        return view('product.checkout', compact('user'));
    }
    function buy_item(Request $request, $id)
    {
        // return $request->all();
        if ($request->input('color')) {
            $color = $request->input('color');
        } else {
            $color = "ngẫu nhiên";
        }
        //  $color = "ngẫu nhiên";
        $qty = $request->input('qty');
        // return $id;
        $product = product::find($id);
        $name = $product->name;
        $sub_total = $qty * ($product->price) + 30000; //phí ship 30k
        $img = $product->img;
        $data = array(
            'id' => $id,
            'color' => $color,
            'qty' => $qty,
            'name' => $name,
            'sub_total' => number_format($sub_total, 0, ',', '.') . 'vnđ',
            'img' => $img
        );
        $data['total_order'] = $sub_total;
        $request->session()->put('data', $data);
        $user = "";
        if (!empty(Auth::user()->name)) {

            $user = Auth::user()->name;
        }
        // $a= $request->session()->get('data');
        // return $a['id'];
        // return $data;
        return view('product.checkout', compact('data','user'));
        // return redirect()->route('checkout', compact('data'));
    }
    function test(){
        $cat="iPhone";
        $model = CatProduct::where('cat_item',"=",$cat)->first();
        // $model = CatProduct::all();
        return $model->id;
    }
    function list($category)//route product.show->xử lí ajax
    {
        $cat = $_GET['cat'];
        // return $cat;
        // $model = CatProduct::where('cat_item',$cat);
        // return $model->id;
        $cat_id = CatProduct::where('cat_item',"=",$cat)->first()->id;
        // // $cat = $cats->id;
        // return $cat_id;
        if (empty($cat)) {
            $products = Product::where('cat_id', "")->get();
            echo json_encode($products);
        } else {
            $products = Product::where('cat_id', $cat_id)->get();
            echo json_encode($products);
        }
    }
    function detail($id)
    {
        $products = product::find($id);
        $cat_id=$products->cat_id;
        $product_same = product::where('cat_id', $cat_id)->limit(4)->get();
        $user = "";
        if (!empty(Auth::user()->name)) {

            $user = Auth::user()->name;
        }
        return view('product.detail', compact('products', 'product_same','user'));
    }
    function buy_all_cart()
    {
        $carts = Cart::content();
        // return $carts;   
        $user = "";
        if (!empty(Auth::user()->name)) {

            $user = Auth::user()->name;
        }
        return view('product.checkout', compact('carts','user'));
    }
    function add_cart($id)
    {
        $id = $id;
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
        }
        if (!empty($_GET['qty'])) {
            $qty = $_GET['qty'];
        }
        if (empty($_GET['color'])) {
            $color = "ngẫu nhiên";
        } else {
            $color = $_GET['color'];
        }
        $product = product::find($id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $qty,
            'price' => $product->price,
            'options' => [
                'img' => $product->img,
                'color' => $color
            ]

        ]);
    }
    function removecart()
    {
        $rowId = $_GET['rowId'];
        Cart::remove($rowId);
    }
    function order_all(Request $request)
    {
        // return Cart::content();

        $username = $request->input('Username');
        $email = $request->input('email');
        $phone_number = $request->input('phone_number');
        $address =  (string)($request->input('address'));
        $user_id = Auth::id();
        $orderCode = 'DH' . preg_replace("/[^A-Za-z0-9 ]/", '', $_SERVER['REMOTE_ADDR']) . time() . mt_rand(100, 999);
        # code...
        $order = Order::create([
            'user_id' => $user_id,
            'address' => $address,
            'phone_number' => $phone_number,
            'email' => $email,
            'username' => $username,
            'total_order' => Cart::total(0, '', '') + 30000,
            'status' => 'Đang chờ gửi hàng',
            'orderCode' => (string)$orderCode,
            'total' => Cart::count() //so luong item mua
        ]);
        //cap nhat db
        foreach (Cart::content() as $v) {
            # code...
            $id = $v->id;
            $product = product::find($id);
            // $total=$product->total;
            $product->total = ($product->total - $v->qty);
            $product->qty_sold = ($product->qty_sold + $v->qty);
            $product->save();
        }
        foreach (Cart::content() as $v) {
            # code...
            OrderDetail::create([
                'product_id' => $v->id,
                'order_id' => $order->id,
                'price' => $v->price,
                'qty_buy' => $v->qty,
                'color' => $v->options->color,
                
            ]);
        }
        $data=[
            'products' =>Cart::content(),
            'orderCode' => (string)$orderCode,//mã đơn hàng
            'address' => $address,
            'phone_number' => $phone_number,
            'email' => $email,
            'username' => $username,
            'date'=>Order::find($order->id)->created_at
        ];
        Mail::to($email)->send(new order_all($data));
        Cart::destroy();//thanh toan  xog thi xoa gio hangf
        return redirect('/home')->with('status', 'Bạn đã đặt thành công');
    }
    function sendmail(){
        // $data=Cart::content();
        $data=[
            'product' =>Cart::content(),
            
        ];  
        // return view('product.mail');
        Mail::to('hiamnhatdz203@gmail.com')->send(new order_all($data));
        // Mail::to('')->send(new order_all($data));
    }
    function order(Request $request)
    {
        
        // return $request->all();  
        // if (!empty($carts)) {
        //     return "fd";
        // } else {
        //     return "hi";
        // }
        $username = $request->input('Username');
        $email = $request->input('email');
        $phone_number = $request->input('phone_number');
        $address =  (string)($request->input('address'));
        $data = $request->session()->get('data');
        // return $data;
        $user_id = Auth::id();
        $orderCode = 'DH' . preg_replace("/[^A-Za-z0-9 ]/", '', $_SERVER['REMOTE_ADDR']) . time() . mt_rand(100, 999);
        //bang đơn hàng
        $order = Order::create([
            'user_id' => $user_id,
            'address' => $address,
            'phone_number' => $phone_number,
            'email' => $email,
            'total'=>$data['qty'],
            'username' => $username,
            'total_order' => $data['total_order'],
            'status' => 'Đang chờ gửi hàng',
            'orderCode' => (string)$orderCode
        ]);
        $id = $data['id'];
        $product = product::find($id);
        // $total=$product->total;
        $product->total = ($product->total - $data['qty']);
        $product->qty_sold = ($product->qty_sold + $data['qty']);
        $product->save();
        // return $order->id;
        //Bảng chi tiết đơn hàng

        OrderDetail::create([
            'product_id' => $data['id'],
            'order_id' => $order->id,
            'price' => product::find($data['id'])->price,
            'qty_buy' => $data['qty'],
            'color' => $data['color'],

        ]);
        $data=[
            'product_name' => product::find($id)->name,
            'product_img'=>product::find($id)->img,
            'product_date'=>product::find($id)->created_at,
            'price' => product::find($data['id'])->price,//gia từng sản phẩm
            'qty_buy' => $data['qty'],// số lượng mua
            'color' => $data['color'],// màu sắc
            'orderCode' => (string)$orderCode,//mã đơn hàng
            'address' => $address,
            'phone_number' => $phone_number,
            'email' => $email,
            'username' => $username,
            'total_order' => $data['total_order'],
        ];
        Mail::to($email)->send(new Send_mail($data));
        return redirect('/home')->with('status', 'Bạn đã đặt thành công');
    }
    function update_cart()
    {
        if (!empty($_GET['rowId']) && !empty($_GET['qty'])) {
            $rowId = $_GET['rowId'];
            $qty = $_GET['qty'];
            Cart::update($rowId, $qty);
            $total = Cart::get($rowId)->total(0, ',', '.') . "vnđ";
            $data = array(
                'total' => $total,
                'cnt' => Cart::count()
            );
            echo json_encode($data);
        }
        if (!empty($_GET['rowId'])) {
            if ($_GET['qty'] == 0) {
                $rowId = $_GET['rowId'];
                Cart::remove($rowId);
                $data = array(
                    'cnt' => Cart::count()
                );
                echo json_encode($data);
            }
        }
    }
    
}
