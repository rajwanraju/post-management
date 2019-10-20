<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use DB;

class PermissionController extends Controller
{
    public function index(){

        $permissions=Permission::all();
        return view('backEnd.permission.index',['permissions'=>$permissions]);
        
        
            }
             
            public function create(){
        
        return view('backEnd.permission.create');
        
        
            }
         
        
        public function store(Request $request){
        
            // dd($request->all());
            $this->validate($request,['name'=>'required','slug'=>'required',
                ]);
        
        DB::table('permissions')->insert([
        
        'slug'=>$request->slug,
        'name'=>$request->name,
        
            ]);
        
        //return redirect()->back();
        return redirect('/permission')->with('message','Permission Info save successfully');
        
        
            }
        
             public function show($id)
            {
                //
            }
        
        
            public function edit($id){
                $permission = Permission::where('id',$id)->first();
        
        return view('backEnd.permission.edit',['permission'=>$permission]);
        
            }
        
        
             public function update(Request $request){
        
                // dd($request->all());
            $permission = Permission::find($request->permissionId);
            // dd($permission);
            $permission->name=$request->name;
            $permission->slug=$request->slug;
            $permission->save();
            return redirect('/permission')->with('message','Permission Info Update successfully');
            }
        
        public function destroy ($id){
         $permission = Permission::find($id);
         $permission->delete();
         return redirect('/permission')->with('message','Permission Info delete successfully');
            
        }
}
