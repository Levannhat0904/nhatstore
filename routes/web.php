<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// Route::controller(AdminUserController::class)->middleware('auth','CheckRole:subcriber')->group(function () {
//     Route::get('/admin/user/list','list');
//     Route::get('/admin/user/add','add');
//     Route::post('/admin/user/store','store');
// Route::get('/admin/dashboard', 'dashboard');
// });
Route::get('/dashbroad', [DashboardController::class, 'show'])->middleware('auth');
Route::middleware(['auth', 'can:post.manager'])->group(function () {
    //
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/user/list', [AdminUserController::class, 'list']);
    Route::get('/admin/user/delete/{id}', [AdminUserController::class, 'delete'])->name('delete_user');
    Route::get('/admin/user/add', [AdminUserController::class, 'add']);
    Route::post('/admin/user/store', [AdminUserController::class, 'store']);
    Route::get('/admin/user/action', [AdminUserController::class, 'action']);
    Route::get('/admin/user/edit/{id}', [AdminUserController::class, 'edit'])->name('user.edit');
    Route::post('/admin/user/update/{user}', [AdminUserController::class, 'update'])->name('user.update');
});


Route::middleware('can:post.manager')->group(function () {
    Route::get('/admin/post/action', [AdminPostController::class, 'action']);
    Route::post('/admin/post/cat_parent/add', [AdminPostController::class, 'cat_parent']);
    Route::get('/admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('delete_post');
    Route::post('/admin/post/update/{id}', [AdminPostController::class, 'update'])->name('update_post');
    Route::get('/admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('edit_post');
    Route::get('/admin/post/cat/edit_cat_item/{id}', [AdminPostController::class, 'edit_cat_item'])->name('admin.edit_cat_item_post');
    Route::post('/admin/post/cat/update_cat_item/{id}', [AdminPostController::class, 'update_cat_item'])->name('admin.update_cat_item');
    Route::get('/admin/post/cat/delete_cat_item/{id}', [AdminPostController::class, 'delete_cat_item'])->name('admin.delete_cat_item');
    Route::get('/admin/post/cat/edit_cat/{id}', [AdminPostController::class, 'edit_cat'])->name('admin.edit_cat');
    Route::post('/admin/post/cat/update_cat/{id}', [AdminPostController::class, 'update_cat'])->name('admin.update_cat');
    Route::get('/admin/post/cat/delete_cat/{id}', [AdminPostController::class, 'delete_cat'])->name('admin.delete_cat');
    Route::get('/admin/post/add', [AdminPostController::class, 'add']);
    Route::get('/admin/post/cat', [AdminPostController::class, 'cat']);
    Route::post('/admin/post/store', [AdminPostController::class, 'store']);
    Route::get('/admin/post/list', [AdminPostController::class, 'list']);
    Route::post('/admin/post/cat/add', [AdminPostController::class, 'cat_add']);
});


Route::middleware('can:page.manager')->group(function () {
    Route::get('admin/page/action', [AdminPageController::class, 'action']);
    Route::get('admin/page/add', [AdminPageController::class, 'add']);
    Route::post('admin/page/store', [AdminPageController::class, 'store']);
    Route::get('admin/page/list', [AdminPageController::class, 'list']);
    Route::get('/admin/page/edit/{id}', [AdminPageController::class, 'edit'])->name('admin.edit_page');
    Route::get('/admin/page/delete/{id}', [AdminPageController::class, 'delete'])->name('admin.delete_page');
    Route::post('/admin/page/update/{id}', [AdminPageController::class, 'update'])->name('admin.update_page');
});
Route::middleware('can:product.manager')->group(function () {
    Route::post('/admin/product/cat_parent/add', [AdminProductController::class, 'cat_parent'])->name('admin.product_add_cat_parent');
    Route::post('/admin/product/cat/cat_add', [AdminProductController::class, 'cat_add'])->name('admin.product_cat_add');
    Route::get('admin/product/list', [AdminProductController::class, 'list']);
    Route::get('admin/product/add', [AdminProductController::class, 'add']);
    Route::get('admin/product/cat/list', [AdminProductController::class, 'cat'])->name('admin.product.cat');
    Route::get('admin/product/color', [AdminProductController::class, 'color']);
    Route::post('admin/product/color/add', [AdminProductController::class, 'color_add']);
    Route::get('admin/product/color/edit/{id}', [AdminProductController::class, 'color_edit'])->name('admin.edit_color');
    Route::post('admin/product/color/dalete/{id}', [AdminProductController::class, 'color_delete'])->name('admin.delete_color');
    Route::post('admin/product/store', [AdminProductController::class, 'store']);
    Route::post('admin/product/cat/add', [AdminProductController::class, 'cat_add']);
    // Route::get('/admin/product/edit/{id}', [AdminProductController::class, 'edit_cat'])->name('admin.edit_cat_product');
    Route::get('/admin/product/cat_delete/{id}', [AdminProductController::class, 'delete_cat'])->name('admin.delete_cat_product');
    Route::post('/admin/product/cat/update/{id}', [AdminProductController::class, 'update_cat'])->name('admin.update_cat_product');
    Route::get('/admin/product/cat/edit_cat/{id}', [AdminProductController::class, 'edit_cat'])->name('admin.edit_cat_product');
    Route::get('/admin/product/cat/edit_cat_item/{id}', [AdminProductController::class, 'edit_cat_item'])->name('admin.edit_cat_item_product');
    Route::post('/admin/product/cat/update_cat_item/{id}', [AdminProductController::class, 'update_cat_item'])->name('admin.update_cat_item_product');
    Route::get('/admin/product/cat/delete_cat_item/{id}', [AdminProductController::class, 'delete_cat_item'])->name('admin.delete_cat_item_product');
    Route::get('/admin/product/action', [AdminProductController::class, 'action']);
    Route::get('/admin/product/delete/{id}', [AdminProductController::class, 'delete'])->name('admin.delete_product');
    Route::get('/admin/product/edit/{id}', [AdminProductController::class, 'edit_product'])->name('admin.edit_product');
    Route::post('/admin/product/update/{id}', [AdminProductController::class, 'update_product'])->name('admin.update_product');
});

Route::middleware('can:order.manager')->group(function () {
    Route::get('/admin/order/list', [AdminOrderController::class, 'list']);
    Route::get('/admin/order/update_status', [AdminOrderController::class, 'update_status'])->name('update_status');
    Route::get('/admin/order/detail/{id}', [AdminOrderController::class, 'detail'])->name('order_detail');
});


// ngươi dùng
// Route::get('/product/show', [ProductController::class, 'show']);



// Route::get('/product/{category?}', [ProductController::class, 'showa'])->defaults('category'," ");





Route::get('/', [ProductController::class, 'show'])->name('home');
Route::get('/product/test', [ProductController::class, 'test']);

Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
Route::get('/product/add_cart/{id}', [ProductController::class, 'add_cart'])->name('add_cart');
Route::get('/product/device/{cat}', [ProductController::class, 'device'])->name('product.device');

Route::middleware('auth')->group(function () {
Route::get('/product/checkout', [ProductController::class, 'checkout'])->name('checkout');
Route::get('/product/sendmail', [ProductController::class, 'sendmail'])->name('sendmail');
Route::get('/product/buy/{id}', [ProductController::class, 'buy_item'])->name('buy_item');
Route::get('/product/shoppingcart', [ProductController::class, 'shoppingcart'])->name("product.shoppingcart");
Route::get('/product/buy_all_cart', [ProductController::class, 'buy_all_cart'])->name("product.buy_all_cart");
Route::get('/product/order', [ProductController::class, 'order'])->name("product.order");
Route::get('/product/order_all', [ProductController::class, 'order_all'])->name("product.order_all");
Route::get('/product/removecart', [ProductController::class, 'removecart'])->name("removecart");
Route::get('/product/updateCart', [ProductController::class, 'update_cart'])->name("update_cart");
});

Route::get('/product/{category?}', [ProductController::class, 'list'])->defaults('category', " ")->name("product.show");


// // permission
// Route::get('/admin/permission/add', [PermissionController::class, 'add'])->name("permission.add");
// Route::post('/admin/permission/store', [PermissionController::class, 'store'])->name("permission.store");
// Route::get('/admin/permission/edit/{id}', [PermissionController::class, 'edit'])->name("permission.edit");
// Route::post('/admin/permission/update/{id}', [PermissionController::class, 'update'])->name("permission.update");
// Route::get('/admin/permission/delete/{id}', [PermissionController::class, 'delete'])->name("permission.delete");

//role
// Route::controller(RoleController::class)->group(function () {
//     // Route::get('/orders/{id}', 'show');
//     // Route::post('/orders', 'store');
//     Route::get('/admin/role','index')->name("role.index");
//     Route::get('/admin/role/add','add')->name("role.add");
//     Route::post('/admin/role/store','store')->name("role.store");
//     Route::get('/admin/role/edit/{role}','edit')->name("role.edit");
//     Route::post('/admin/role/update/{role}','update')->name("role.update");
//     Route::get('/admin/role/delete/{role}','delete')->name("role.delete");
// })->middleware('can:role.manager');

Route::middleware('can:role.manager')->group(function () {
    Route::get('/admin/role', [RoleController::class, 'index'])->name("role.index");
    Route::get('/admin/role/add', [RoleController::class, 'add'])->name("role.add");
    Route::post('/admin/role/store', [RoleController::class, 'store'])->name("role.store");
    Route::get('/admin/role/edit/{role}', [RoleController::class, 'edit'])->name("role.edit");
    Route::post('/admin/role/update/{role}', [RoleController::class, 'update'])->name("role.update");
    Route::get('/admin/role/delete/{role}', [RoleController::class, 'delete'])->name("role.delete");
    // permission
    Route::get('/admin/permission/add', [PermissionController::class, 'add'])->name("permission.add");
    Route::post('/admin/permission/store', [PermissionController::class, 'store'])->name("permission.store");
    Route::get('/admin/permission/edit/{id}', [PermissionController::class, 'edit'])->name("permission.edit");
    Route::post('/admin/permission/update/{id}', [PermissionController::class, 'update'])->name("permission.update");
    Route::get('/admin/permission/delete/{id}', [PermissionController::class, 'delete'])->name("permission.delete");
});
// Route::get('/admin/role', [RoleController::class, 'index'])->name("role.index");
// Route::get('/admin/role/add', [RoleController::class, 'add'])->name("role.add");
// Route::post('/admin/role/store', [RoleController::class, 'store'])->name("role.store");
// Route::get('/admin/role/edit/{role}', [RoleController::class, 'edit'])->name("role.edit");
// Route::post('/admin/role/update/{role}', [RoleController::class, 'update'])->name("role.update");
// Route::get('/admin/role/delete/{role}', [RoleController::class, 'delete'])->name("role.delete");


Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });


// img_product/iphone-14-pro-max-den-thumb-600x600.webp