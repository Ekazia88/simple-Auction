<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
    $user = DB::table('users')->where('level','admin')->get();
    return view('admin/index',compact('user'));
    }
    public function storeadmin(Request $request)
    {
        $request->validate([

            'name'=> 'required|unique:users',
            'username' => 'required|string',
            'email' => 'required|unique:users',
            'password' => 'required',

        ]);

            DB::table('users')->insert([
                'name'=> $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password'=>bcrypt($request->password),
                'level' => 'admin',
            ]);

        return redirect()->back()->withSuccess('User created successfully!');
    }

    public function editadmin($id){
        $admin = DB::table('users')->where('id',$id)->first();
        return view('admin/edit',compact('admin'));
    }
    public function updateadmin(Request $request)
    {
        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
            'username' => $request->username,
        ]);

        return redirect('Admin Management')->withSuccess('User updated successfully!');
        }
    public function deleteadmin($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('Admin Management')->withDanger('User deleted successfully!');
    }
}