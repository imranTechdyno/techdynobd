<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pageTitle'] = "Role List";
        $data['administration_active'] = "active";
        $data['role_list_active'] = "active";
        $data['roles'] = Role::get();
        return view('backend.administration.role.list')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = "Role Create";
        $data['administration_active'] = "active";
        $data['role_add_active'] = "active";
        $data['permissions'] = Permission::all();

        return view('backend.administration.role.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'unique:roles|required',
            'group-a' => ['required','array', 'min:1']
        ],[
            'group-a.required' => 'The permissions is required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $permissions = [];
        if (array_key_exists('group-a', $request->all())) {
            foreach ($request['group-a'] as $group) {
                if (array_key_exists('permissions', $group)) {
                    foreach ($group['permissions'] as $permission) {
                        array_push($permissions, $permission);
                    }
                }
                if (array_key_exists('mother-permissions', $group)) {
                    array_push($permissions, $group['mother-permissions']);
                }
            }
        }

        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = 'admin';
        $role->save();

        foreach ($permissions as $item) {
            $role->givePermissionTo($item);
        }
        return redirect()->route('admin.roles.index')->with('success', 'Role created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pageTitle'] = "Role Show";
        $data['administration_active'] = "active";
        $data['role_list_active'] = "active";

        $data['role'] = Role::find($id);
        $data['permissions'] = Permission::all();

        $data['parentSelectedPermissions'] = DB::table('role_has_permissions')
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', '=', $id)
            ->where('permissions.submodule_id', '=', 0)->get();

        $data['childSelectedPermissions'] = DB::table('role_has_permissions')
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', '=', $id)
            ->where('permissions.submodule_id', '!=', 0)
            ->get();

        return view('backend.administration.role.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pageTitle'] = "Role Edit";
        $data['administration_active'] = "active";
        $data['role_add_active'] = "active";

        $data['role'] = Role::find($id);      
        if ($data['role']->name == "Admin"){           
            return redirect()->back()->with('error', 'Admin Role can not be edited');
        }
        

        $data['permissions'] = Permission::all();

        $data['parentSelectedPermissions'] = DB::table('role_has_permissions')
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', '=', $id)
            ->where('permissions.submodule_id', '=', 0)->get();

        $data['childSelectedPermissions'] = DB::table('role_has_permissions')
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', '=', $id)
            ->where('permissions.submodule_id', '!=', 0)
            ->get();

        return view('backend.administration.role.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,' . $id,
            'group-a' => ['required','array', 'min:1']
        ],[
            'group-a.required' => 'The permissions is required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $permissions = [];
        if (array_key_exists('group-a', $request->all())) {
            foreach ($request['group-a'] as $group) {
                if (array_key_exists('permissions', $group)) {
                    foreach ($group['permissions'] as $permission) {
                        array_push($permissions, $permission);
                    }
                }
                if (array_key_exists('mother-permissions', $group)) {
                    array_push($permissions, $group['mother-permissions']);
                }
            }
        }

        $role = Role::find($id);
        $role->name = $request->get('name');
        $role->guard_name = 'admin';
        $role->save();
        $role->syncPermissions();

        foreach ($permissions as $item) {
            $role->givePermissionTo($item);
        }

        return redirect()->route('admin.roles.index')->with('success', 'Role updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if ($role->name == 'Admin'){
            return redirect()->back()->with('error', 'Admin Role can not be deleted');
        }

        $role->delete();
        return redirect()->back()->with('success', 'Role delete successfully');
    }

    public function getsubmodule($id)
    {
        
        $permissions = Permission::where("submodule_id", $id)->get();
        $permission = Permission::where('id', $id)->first();

        return response()->json(['permission' => $permission, 'permissions' => $permissions]);

    }
}
