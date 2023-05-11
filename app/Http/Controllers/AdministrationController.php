<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\ThemeSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdministrationController extends Controller
{
    public function userIndex()
    {   
        $users = User::where('role', 'user')->get();
        return view('admin.list.userIndex', compact('users'));
    }

    public function adminIndex()
    {   
        $users = User::where('role', ['admin', 'agent', 'moderator'])->get();
        return view('admin.list.adminIndex', compact('users'));
    }
    
    public function createAdmin()
    {
        $roles = Role::all();
        return view('admin.list.createAdmin', compact('roles'));
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required_with:password|same:password',
            'role' => 'required'
        ]);

        $role = Role::find($request->role)->name;

        $request['password'] = Hash::make($request->password);

        $users = user::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => Carbon::now(),
            'password' => $request['password'],
            'role' => $role,
        ]);

        ThemeSetting::create([
            'user_id' => $users->id,
            'theme' => 'light-layout',
            'nav' => 'expended',
            'created_at' => Carbon::now(),
        ]);


        if($users){
            return redirect()->route('user.index')->withSuccess('Admin Created Successfully !');
        }else{
            return back()->withError('Something Happen Wrong !');
        }

        return redirect()->route('login');

    }

    public function roleIndex()
    {   
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    public function createRole()
    {   
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    public function storeRole(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'permissions' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'permissions' => json_encode($request->permissions),
        ]);

        if($role){
            return redirect()->route('admin.roleIndex')->withSuccess('Role Created Successfully !');
        }else{
            return back()->withError('Something Happen Wrong !');
        }
    }

    public function permissionIndex()
    {   
        $permissions = Permission::all();
        return view('admin.permission.index', compact('permissions'));
    }
    
    public function createPermission()
    {   
        return view('admin.permission.create');
    }

    public function storePermission(Request $request)
    {  
        $request->validate([
            'name' => 'required',
        ]);

        $permission = Permission::create([
            'name' => $request->name,
        ]);

        if($permission){
            return redirect()->route('admin.permissionIndex')->withSuccess('Permission Created Successfully !');
        }else{
            return back()->withError('Something Happen Wrong !');
        }
    }

}
