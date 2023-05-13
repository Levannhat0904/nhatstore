<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\cat;
use App\Models\CatProduct;
use App\Models\colorProduct;
use App\Models\product;
use App\Models\productCat;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{
    function __construct(Request $request, Middleware $next)
    {
        $this->middleware(function ($request,  $next) {
            session(['module_active' => 'product']);
            return $next($request);
        });
    }
    //
    function list(Request $request)
    { 
        $list_act =[
            'delete'=>'xóa tạm thời'
        ];
        $status = $request->input('status');
        if ($status == 'trash') {
            $list_act=[
                'restore'=>'Khôi phục',
                'forceDelete'=>'Xóa vĩnh viễn'
            ];
            $products = product::onlyTrashed()->paginate(10);
        } else {
            $keyword = "";
            if ($request->input('keyword')) {
                $keyword = $request->input('keyword');
            }
            // $users= User::all();// lấy ra toàn bộ user có trong hệ thống
            $products = product::where('name', 'LIKE', "%{$keyword}%")->paginate(10); // lấy ra toàn bộ user có trong hệ thống theo thanh phân trang
        }
        $count_product_active = product::count();
        $count_product_trash = product::onlyTrashed()->count();
        $count = [$count_product_active, $count_product_trash];
        return view('admin.product.list', compact('products', 'count', 'list_act'));
        // $products =productCat::find(1)->products;
        // return $products;
        // $k = json_decode( $products[1]['color']);
        // $k = json_decode( $products[2]['thumbnail']);
        // return $k;
        
        // return view('admin.product.list',compact('products') );
    }

    function action(Request $request)
    {
        $list_check = $request->input('list_check');
        // if ($list_check) {
        //     foreach ($list_check as $k => $id) {
        //         if (Auth::id() == $id) { //kiểm tra xem ô bị tích có phải là mình k
        //             unset($list_check[$k]); //xóa id của mình khỏi nhưng user bị xóa

        //         }
        //     }
            if (!empty($list_check)) {
                $act = $request->input('act');
                // return $act; 
                if ($act == 'delete') {
                    // return "hii";
                    product::destroy($list_check);
                    return redirect('admin/product/list')->with('status', 'Bạn đã xóa thành công');
                }
                if ($act == 'restore') {
                    // return "haha";
                    product::withTrashed()
                        ->whereIn('id', $list_check)
                        ->restore();
                    return redirect('admin/product/list')->with('status', 'Bạn đã khôi phục thành công');
                }
                if($act=='forceDelete'){
                    product::withTrashed()
                    ->whereIn('id',$list_check)
                    ->forceDelete();
                    return redirect('admin/product/list')->with('status', 'Bạn đã xóa vĩnh viễn user ra khỏi hệ thống thành công');
                }
            }
            // return redirect('admin/product/list')->with('status', 'Bạn thao tác trên tài khoản của mình');
        // } else {
        //     return redirect('admin/user/list')->with('status', 'Bạn cần chọn thao tác để thực hiện');
        // }
    }


    function color_add(Request $request)
    {
        // echo $request->input('color');
        // echo $request->input('color_name');
        // return "thêm màu thành công";
        colorProduct::create([
            'color' => $request->input('color'),
            'color_name' => $request->input('color_name')
        ]);
        return redirect('admin/product/color')->with('status', 'Thêm màu sắc thành công');
    }
    function color()
    {
        $colorProducts = colorProduct::all();

        //  foreach ($coloProduct  as $v) {
        //     # code...
        //     echo "<pre>";
        //     echo $v;
        //     echo "</pre>";
        //  }
        return view('admin.product.color', compact('colorProducts'));
    }
    function add(Request $request)
    {
        
        $colorProducts = colorProduct::all();
        $cat_post = CatProduct::with('cat')
            ->get()
            ->groupBy('cat_id');
        $cat_product = CatProduct::with('cat')
            ->get()
            ->groupBy(function ($post) {
                return Str::slug($post->cat->cat);
            });
        return view('admin.product.add', compact('cat_product','colorProducts'));
       
    }
    //

    function cat()
    {
        $cat_product = cat::all()->where(function ($cat) {
            return explode('.', $cat->slug)[0] === 'product';
        })->groupBy(function ($cat) {
            return explode('.', $cat->slug)[0];
        });
        $cat_product_item = CatProduct::orderBy('cat_id', 'asc')->get();
        return view('admin.product.cat', compact('cat_product', 'cat_product_item'));
        // return view('admin.product.cat', compact('cats','cat_items'));
    }
    function cat_add(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'cat_item' => ['required', 'unique:cat_posts', 'max:255'],
            'cat_parent' => 'required',
        ]);
        // return $request->all();

        CatProduct::create([
            'cat_item' => $request->input('cat_item'),
            'cat_id' => $request->input('cat_parent')
        ]);
        return redirect()->route('admin.product.cat')->with('status', 'Đã thêm danh mục thành công');
    }
    function cat_parent(Request $request)
    {
        // return $request->all();
        $cat = $request->input('cat');
        $slug = "product." . $cat;
        // return $slug;
        $validatedData = $request->validate([
            'cat' => ['required', 'unique:cats', 'max:255'],

        ]);
        cat::create([
            'cat' => $cat,
            'slug' => $slug
        ]);
        return redirect()->route('admin.product.cat')->with('status', 'Đã thêm danh mục thành công');
    }
    
    function edit_cat($id)
    {

        $cat_edit = cat::find($id);
        $cat_post = cat::all()->where(function ($cat) {
            return explode('.', $cat->slug)[0] === 'product';
        })->groupBy(function ($cat) {
            return explode('.', $cat->slug)[0];
        });
        return view('admin.pr.edit_cat', compact('cat_post', 'cat_edit'));
    }
    function update_cat(Request $request, $id)
    {
        $cat = $request->input('cat');
        $slug = "product." . $cat;
        // return $slug;
        $validatedData = $request->validate([
            'cat' => ['required', 'unique:cats', 'max:255'],

        ]);
        cat::where('id', $id)->update([
            'cat' => $cat,
            'slug' => $slug
        ]);
        return redirect()->route('admin.product.cat')->with('status', 'Đã thêm danh mục thành công');
    }
    function delete_cat($id)
    {
        $cat_item_delete = cat::find($id);
        $cat_item_delete->delete();
        return redirect()->route('admin.product.cat')->with('status', 'Đã xóa danh mục thành công');
    }
    function delete($id){
        $product= product::find($id);
        $product->delete();
        return redirect('admin/product/list')->with('status', 'Đã xóa sản phẩm thành công');
    }

    //
    function edit_cat_item($id)
    {
        $cat_post_item = CatProduct::all();
        $cat_edit = CatProduct::find($id);
        $cat_product = cat::all()->where(function ($cat) {
            return explode('.', $cat->slug)[0] === 'product';
        })->groupBy(function ($cat) {
            return explode('.', $cat->slug)[0];
        });
        return view('admin.product.edit_cat_item', compact('cat_product', 'cat_edit', 'cat_post_item'));
    }
    function update_cat_item(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cat_item' => ['required', 'unique:cat_posts', 'max:255'],
            'cat_parent' => 'required',
        ]);

        CatProduct::where('id', $id)->update([
            'cat_item' => $request->input('cat_item'),
            'cat_id' => $request->input('cat_parent')

        ]);
        return redirect()->route('admin.product.cat')->with('status', 'đã cập nhật danh mục thành công');
    }

    function delete_cat_item($id)
    {
        $cat_item_delete = CatProduct::find($id);
        $cat_item_delete->delete();
        return redirect()->route('admin.product.cat')->with('status', 'Đã xóa danh mục thành công');
    }

    function store(Request $request)
    {
        // return $request->input('category');//l
        // return CatProduct::find($request->input('category'))->cat_item;//lấy dc tên hãng dth
        // return CatProduct::find($request->input('category'))->cat->cat;//lấy danh mục
        
        
        // return $request->all();
        // $input['color'] =json_encode($request->input('color'));
        // return json_decode( $input['color']);
        // return $request->input('color');
        // return $request->input('category');  
        $request->validate(
            [
                'name'=>'required',
                'thumbnail' => 'required',
                'thumbnail.*' => 'mimes:jpeg,jpg,png,gif|max:2048',
                'price'=>'required',
                'img'=>'required',
                'content'=>'required',
                'color'=>'required',
                'category'=>'required',
                'total_product'=>'required',
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'thumbnail'=>'Hình ảnh',
                'img'=>'Ảnh đại diện',
                'name'=>'Tên sản phẩm',
                'price'=>'Giá sản phẩm',
                'color'=>'Màu sắc',
                'content'=>'Chi tiết sản phẩm',
                'color'=>'Màu sắc',
                'category'=>'Danh mục',
                'total_product'=>'Số Lượng',
            ]

        );
        $input = $request->all();
        // return $input;
        $img=$request->file('img')->getClientOriginalName();
        $path = $request->file('img')->move('img_product', $img); 
        $img_product="img_product/".$img;
        $input['img'] = $img_product;
        // return $input['img'];
        if ($request->hasFile('thumbnail')) {
            // return "haha";
            // https://mtviet.com/blog/multiple-image-upload-in-laravel-8-example/
            // echo "hahah";
            foreach ($request->file('thumbnail') as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->move('thumbnail_product', $name);
                $thumbnail[] = 'thumbnail_product/'. $name;
            }
            // print_r($thumbnail);
            // return $thumbnail;
            // return $input;
            $input['thumbnail'] =json_encode($thumbnail);
            $input['color'] =json_encode($request->input('color'));
            // return $input['color'];
            // return $thumbnail ;
            // return $input['thumbnail'] ;
            // return $input['thumbnail'];
            // return $input['color_id'];
            // return $input;
            // echo $input['thumbnail'];
            // <img src="$input['thumbnail']" alt="">
            echo "<pre>";
            print_r($input['thumbnail']);
            // print_r($thumbnail);
            echo "</pre>";
            // print_r($imgData);
            $slug_cat=CatProduct::find($request->input('category'))->cat->cat.".".CatProduct::find($request->input('category'))->cat_item;
            product ::create([
                'name' => $request->input('name'),
                'img' =>$input['img'],
                'color' => $input['color'] ,
                'thumbnail'=>$input['thumbnail'],
                'content'=>$request->input('content'),
                'price'=>$request->input('price'),
                'user_id'=>Auth::id(),
                'cat_id'=>$request->input('category'),
                'total'=>$request->input('total_product'),
                'slug_cat'=>$slug_cat
            ]);
            return redirect('admin/product/list')->with('status', 'Đã thêm sản phẩm thành công');
        }   
        // echo $request->input('catagory');
        // echo $request->input('exampleRadios');
        // echo "<pre>";
        // print_r($input);
        // echo "</pre>";
        // print_r($input);
        // print_r($request->input('product_color'));
    }
    function edit_product($id){
        $product=product::find($id);
        $list_cat_product=productCat::orderBy('catagory')-> get();
        $colorProducts = colorProduct::all();
        // return $product;
        return view('admin.product.edit', compact('product', 'colorProducts','list_cat_product'));
    }
    function update_product(Request $request, $id)
    {
        // return $id;
        // $input['color'] =json_encode($request->input('color'));
        // return json_decode( $input['color']);
        // return $request->input('color');
        // return $request->input('total_product');  
        $request->validate(
            [
                'name'=>'required',
                'thumbnail' => 'required',
                'img' => 'required',
                'thumbnail.*' => 'mimes:jpeg,jpg,png,gif|max:2048',
                'price'=>'required',
                'content'=>'required',
                'color'=>'required',
                'category'=>'required',
                'total_product'=>'required',
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'thumbnail'=>'Hình ảnh',
                'img'=>'Hình ảnh',
                'name'=>'Tên sản phẩm',
                'price'=>'Giá sản phẩm',
                'color'=>'Màu sắc',
                'content'=>'Chi tiết sản phẩm',
                'color'=>'Màu sắc',
                'category'=>'Danh mục',
                // 'total_product'=>'Số lượng',
                'total_product'=>'Số lượng',
            ]

        );
        $slug_cat=CatProduct::find($request->input('category'))->cat->cat.".".CatProduct::find($request->input('category'))->cat_item;
        $input = $request->all();
        $img=$request->file('img')->getClientOriginalName();
        $path = $request->file('img')->move('img_product', $img); 
        $img_product="img_product/".$img;
        
        $input['img'] = $img_product;
        
        // return $input;
        if ($request->hasFile('thumbnail')) {
            // return "haha";
            // https://mtviet.com/blog/multiple-image-upload-in-laravel-8-example/
            // echo "hahah";
            foreach ($request->file('thumbnail') as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->move('thumbnail_product', $name);
                $thumbnail[] = 'thumbnail_product/' . $name;
            }
            // print_r($thumbnail);
            // return $thumbnail;
            // return $input;
            $input['thumbnail'] =json_encode($thumbnail);
            $input['color'] =json_encode($request->input('color'));
            // return $input['color'];
            // return $thumbnail ;
            // return $input['thumbnail'] ;
            // return $input['thumbnail'];
            // return $input['color_id'];
            // return $input;
            // echo $input['thumbnail'];
            // <img src="$input['thumbnail']" alt="">
            echo "<pre>";
            print_r($input['thumbnail']);
            // print_r($thumbnail);
            echo "</pre>";
            // print_r($imgData);
            product ::where('id', $id)->update([
                'name' => $request->input('name'),
                'color' => $input['color'] ,
                'thumbnail'=>$input['thumbnail'],
                'img'=>$input['img'],
                'content'=>$request->input('content'),
                'price'=>$request->input('price'),
                'user_id'=>Auth::id(),
                'cat_id'=>$request->input('category'),
                'total'=>$request->input('total_product'),
                'slug_cat'=>$slug_cat
            ]);
            return redirect('admin/product/list')->with('status', 'Đã cập nhật sản phẩm thành công');
        }   
        // echo $request->input('catagory');
        // echo $request->input('exampleRadios');
        // echo "<pre>";
        // print_r($input);
        // echo "</pre>";
        // print_r($input);
        // print_r($request->input('product_color'));
    }
}
