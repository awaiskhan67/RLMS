<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\RolePermissionRequest;

class RolePermissionController extends Controller
{
    //
    public function index(): View
    {
        $permission = Permission::get();
        $role_permissions = Role::with('permissions')->get();
        return view('rolesPermission', compact('permission','role_permissions'));
    }

    public function role_create(RolePermissionRequest $request)
    {

       $role =  Role::create(['name' => $request->role ]);
        //dd($request->role);
       $role->syncPermissions($request->input('permissions'));
       return back()->with("success","New role with permissions created successfully !");
    }

    public function role_edite(Request $request , $id)
    {
        // die($uni_permission);
        $role = Role::find($id);
        $permission = Permission::get();
        $role_permission = Role::find($id)->permissions()->get();

        return view('rolesPermissionEdite', compact('role','permission','role_permission'));
    }

    public function role_update(Request $request)
    {
        $request->validate([
            'updated_role' => 'required|unique:roles,name,' . $request->id,
        ]);    
       $role = Role::find($request->id);
        //dd($request->role);
       $role->name = $request->updated_role;
       $role->syncPermissions($request->input('permissions'));
       $role->save();
       return redirect()->route('rolesP')->with("success","Role & Permission updated successfully!");
    }

   
    public function role_delete(Request $request , $roleId){

        $role = Role::find($roleId);

        if (!$role) {
            // Handle error: Role not found
            return redirect()->back()->with('warning', 'Role not found.');
        }
    
        // Check if any users have this role assigned

        $usersWithRole = $role->users;
    
        if ($usersWithRole->isNotEmpty()) {
            return redirect()->back()->with('warning', 'Cannot delete role. Some users have this role assigned.');
        }
    
        // If no users have this role, proceed with deletion
        $role->delete();
    
        // Redirect with success message
        return back()->with('success', 'Role deleted successfully.');
    }


}
