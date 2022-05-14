<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->paginate(20);
        return view('admin.user.index',[
            'users' => $users,
        ]);
    }

    public function update($id){
        $user = User::where('id',$id)->first();
        $roles = Role::get();
        return view('admin.user.update',[
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function edit(Request $request){
        $user_id = $request->user_id;
        if(!empty($request->role)){
            UserRole::create([
                'role_id'=>$request->role,
                'user_id'=>$request->user_id,
            ]);
        }
        User::where('id',$user_id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        return redirect()->route('userIndex')->with("success","Saved!");
    }

    public function show($id){
        $user = User::where('id',$id)->first();
        return view('admin.user.show',[
            'user' => $user,
        ]);
    }

    public function admin(){
        $userrole = UserRole::get();
        return view('admin.user.admin',[
            'userrole' => $userrole,
        ]);
    }

    public function adminstore(Request $request){

    }

    public function userroledelete($id){
        UserRole::destroy($id);
        return redirect()->route('adminsIndex')->with("success","Destroy successful!");
    }
}
