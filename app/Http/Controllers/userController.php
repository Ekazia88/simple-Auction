<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $user = DB::table('users')->where('level','bidder')
                ->join('bidder',function($join){
                    $join->on('bidder.id_bidder','=','users.id');
                })->get();
        return view('bidder/index',compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'=> 'required|unique:users',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'telp' => 'required',
        ]);

            DB::table('users')->insert([
                'name'=> $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password'=>bcrypt($request->password),
                'level' => 'bidder',
            ]);

            $check = DB::table('users')->where('id', \DB::raw("(select max(`id`) from users)"))->first();

            DB::table('bidder')->insert([
                'id_bidder'=>$check->id,
                'Full_name'=>$check->name,
                'telp'=>$request->telp,
            ]);

        return redirect()->back()->withSuccess('Data created successfully!');
    }

    public function edit($id)
    {
        $bidder = DB::table('users')->where('id',$id)
                    ->join('bidder',function($join){
                        $join->on('bidder.id_bidder','=','users.id');
                    })->first();
        return view('bidder/edit',compact('bidder'));
    }

    public function update(Request $request)
    {

        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email
        ]);

        DB::table('bidder')->where('id_bidder',$request->id)->update([
            'Full_name'=>$request->name,
            'telp'=>$request->telp
        ]);

        return redirect('User Management')->withSuccess('User updated successfully!');
    }

    public function delete($id)
    {
      DB::table('users')->where('id', $id)->delete();
          return redirect('User Management')->withDanger('User deleted successfully!');
    }


}
