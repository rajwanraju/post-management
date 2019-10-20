<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
         $roles=Role::all();
        return view('backEnd.role.index',compact('roles'));
    }

    public function create()
    {
         $permissions=Permission::all();
       return view('backEnd.role.create',compact('permissions'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
         $role=Role::create($request->except(['permission','_token']));

        foreach ($request->permission as $key=>$value){
            // $role->attachPermission($value);
            $role->permissions()->attach($value);
        }

        return redirect()->route('role.index')->withMessage('role created');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
          $role=Role::find($id);
        $permissions=Permission::all();
        $role_permissions = $role->perms()->pluck('id','id')->toArray();

         return view('backEnd.role.edit',compact(['role','role_permissions','permissions']));
    }

    public function update(Request $request, $id)
    {
        $role=Role::find($id);
        $role->name=$request->name;
        $role->display_name=$request->display_name;
        $role->description=$request->description;
        $role->save();

        DB::table('permission_role')->where('role_id',$id)->delete();

        foreach ($request->permission as $key=>$value){
            $role->attachPermission($value);
        }

        return redirect()->route('role.index')->withMessage('role Updated');
    }


    public function destroy($id)
    {
          DB::table("roles")->where('id',$id)->delete();
        return back()->withMessage('Role Deleted');
    }
}
