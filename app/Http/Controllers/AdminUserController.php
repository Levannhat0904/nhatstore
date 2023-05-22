<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminUserController extends Controller
{
    //
    function __construct(Request $request, Middleware $next)
    {
        $this->middleware(function($request,  $next){
            session(['module_active'=>'user']);
            return $next($request);
        });
    }
    function list(Request $request)
    {
        // return Gate::allows('post.add');
    
        $roles=Role::all();
        $list_act =[
            'delete'=>'xóa tạm thời'
        ];
        $status = $request->input('status');
        if ($status == 'trash') {   
            $list_act=[
                'restore'=>'Khôi phục',
                'forceDelete'=>'Xóa vĩnh viễn'
            ];
            $users = User::onlyTrashed()->paginate(10);
           
        }else if($status == 'active'){
            // $keyword = "";
            $users = User::paginate(10);
        }else {
            $keyword = "";
            if ($request->input('keyword')) {
                $keyword = $request->input('keyword');
            }
            // $users= User::all();// lấy ra toàn bộ user có trong hệ thống
            $users = User::where('name', 'LIKE', "%{$keyword}%")->paginate(10); // lấy ra toàn bộ user có trong hệ thống theo thanh phân trang
        }
        // dd($users);
        $count_user_active = User::count();
        $count_user_trash = User::onlyTrashed()->count();
        $count = [$count_user_active, $count_user_trash];
        // return $users;
        return view('admin.user.list', compact('users', 'count', 'list_act','roles'));
    }
    function add(Request $request)
    {
        $roles=Role::all();
        return view('admin.user.add',compact('roles'));
    }
    function action(Request $request)
    {
        $list_check = $request->input('list_check');
        if ($list_check) {
            foreach ($list_check as $k => $id) {
                if (Auth::id() == $id) { //kiểm tra xem ô bị tích có phải là mình k
                    unset($list_check[$k]); //xóa id của mình khỏi nhưng user bị xóa

                }
            }
            if (!empty($list_check)) {
                $act = $request->input('act');
                // return $act; 
                if ($act == 'delete') {
                    // return "hii";
                    User::destroy($list_check);
                    return redirect('admin/user/list')->with('status', 'Bạn đã xóa thành công');
                }
                if ($act == 'restore') {
                    // return "haha";
                    User::withTrashed()
                        ->whereIn('id', $list_check)
                        ->restore();
                    return redirect('admin/user/list')->with('status', 'Bạn đã khôi phục thành công');
                }
                if($act=='forceDelete'){
                    User::withTrashed()
                    ->whereIn('id',$list_check)
                    ->forceDelete();
                    return redirect('admin/user/list')->with('status', 'Bạn đã xóa vĩnh viễn user ra khỏi hệ thống thành công');
                }
            }
            return redirect('admin/user/list')->with('status', 'Bạn thao tác trên tài khoản của mình');
        } else {
            return redirect('admin/user/list')->with('status', 'Bạn cần chọn thao tác để thực hiện');
        }
    }
    function edit($id){
        $user= User::find($id);
        $role=Role::all();
        // return $user->roles;
        return view('admin.user.edit',compact('user', 'role'));
    }
    function update(Request $request, User $user){
        if ($request->input('btn_update')) {
            // return $request->input();//goi ra tât cả bản gi và dc hiện trên url
            $request->validate(
                [
                    'name' => ['required', 'string', 'max:255'],
                ],
                [
                    'required' => ":attribute không được để trống",
                    'min' => ":attribute có độ dài ít nhất :min kí tự",
                    'max' => ":attribute có độ dài tối đa :max kí tự",
                    'confirmed' => ":attribute xác nhận mật khẩu không thành công",
                ],
                [
                    'name'=>'Tên người dùng',
                    'password'=>'Mật khẩu'
                ]
            );
            // return $request->all();
            $user->update([
                'name'=>$request->input('name'),
            ]);
            
            $user->roles()->sync($request->input('roles'));
            return redirect('admin/user/list')->with('status', 'đã cập nhật học viên thành công');
        }
    }
    function delete($id)
    {
        if (Auth::id() != $id) {
            $user = User::find($id);
            $user->delete();
            return redirect('admin/user/list')->with('status', 'bạn đã xóa thành công');
        } else {
            return redirect('admin/user/list')->with('status', 'bạn không thể tự xóa mình ra khỏi hệ thống');
        }
    }
    function store(Request $request)
    {
        if ($request->input('btn_add')) {
            // return $request->input();//goi ra tât cả bản gi và dc hiện trên url
            // return $request->all();
            $request->validate(
                [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ],
                [
                    'required' => ":attribute không được để trống",
                    'min' => ":attribute có độ dài ít nhất :min kí tự",
                    'max' => ":attribute có độ dài tối đa :max kí tự",
                    'confirmed' => ":attribute xác nhận mật khẩu không thành công",
                ],
                [
                    'name' => 'tên người dùng',
                    'email' => 'Email',
                    'password' => 'Mật khẩu'
                ]
            );
            User::create([
                'name' =>  $request->input('name'),
                'email' =>  $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
            foreach($request->input('roles') as $role){
            //    echo Auth::user()->id;
                UserRole::create([
                    'user_id'=>Auth::user()->id,
                    'role_id' => $role,
                ]);
            }
            // return redirect('admin/user/list')->with('status', 'Đã cập nhật học viên thành công');
            return redirect('admin/user/list')->with('status', 'đã thêm học viên thành công');
        }
    }
}
