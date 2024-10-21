<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    //
    function index()
    {
        // if(Gate::allows('role.view')){
        //     abort(403);
        // }
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }
    function add()
    {
        $permissions = Permission::all()->groupBy(function ($permission) {
            return explode('.', $permission->slug)[0];
        });
        return view('admin.role.add', compact('permissions'));
    }
    function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|unique:roles,name' ,
                // name phải là duy nhất trong bảng role
                // .$role->id loại trừ kiểm tra tính duy nhất ở trên chính bản ghi đó
                'permission_id' => 'nullable|array', // được phép null và phải ở dạng mảng
                'permission_id.*' => 'exists:permissions,id',
                'description' => 'required'
            ],
            [
                'required' => ":attribute không được để trống",
            ],
            [
                'name' => 'Tên quyền',
                'description' => 'Mô tả quyền'
            ]
        );
        $role = Role::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);
        $role->permission()->attach($request->input('permission_id'));
        return redirect()->route('role.index')->with('status', 'Đã thêm vai trò thành công');
    }
    function edit(Role $role)
    {
        $permissions = Permission::all()->groupBy(function ($permission) {
            return explode('.', $permission->slug)[0];
        });
        // return $role->permission->pluck('id')->toArray();
        return view('admin.role.edit', compact('role', 'permissions'));
        return view('admin.role.add', compact('permissions'));
    }
    function update(Role $role, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            // name phải là duy nhất trong bảng role
            // .$role->id loại trừ kiểm tra tính duy nhất ở trên chính bản ghi đó
            'permission_id' => 'nullable|array', // được phép null và phải ở dạng mảng
            // 'permission_id.*' => 'exists:permissions, id', //các id phải tồn tại ở trên bảng permissions
        ]);
        $role->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')     
        ]);
        $role->permission()->sync($request->input('permission_id',[]));
        return redirect()->route('role.index')->with('status','Cập nhật quyền thành công');
    }
    function delete(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('status','Xóa quyền thành công');
    }
}
