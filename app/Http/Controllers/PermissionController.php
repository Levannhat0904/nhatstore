<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    function __construct(Request $request, Middleware $next)
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'permission']);
            return $next($request);
        });
    }
    function add()
    {
        $permissions = Permission::all()->groupBy(function ($permission) {
            return explode('.', $permission->slug)[0];
        });
        return view('admin.permission.add', compact('permissions'));
    }
    function store(Request $request)
    {
        // return $request->all();
        $validated = $request->validate(
            [
                'name' => 'required|max:255',
                'slug' => 'required'
            ],
            [
                'required' => ":attribute không được để trống",
            ],

        );
        Permission::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description')
        ]);
        return redirect()->route('permission.add')->with('status', 'Đã thêm quyền thành công');
    }
    function edit($id)
    {
        $permissions = Permission::all()->groupBy(function ($permission) {
            return explode('.', $permission->slug)[0];
        });
        $permission = Permission::find($id);
        return view('admin.permission.edit', compact('permission', 'permissions'));
    }
    function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:255',
                'slug' => 'required'
            ],
            [
                'required' => ":attribute không được để trống",
            ],

        );
        Permission::where('id', $id)->update([
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'description'=>$request->input('description')
        ]);
        return redirect()->route('permission.add')->with('status', 'Đã cập nhật quyền thành công');
    }
    function delete($id){
        Permission::where('id', $id)->delete();
        return redirect()->route('permission.add')->with('status', 'Đã xóa quyền thành công');

    }
}
