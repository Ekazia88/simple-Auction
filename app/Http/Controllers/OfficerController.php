<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OfficerController extends Controller
{
    public function index()
    {

        $user = DB::table('users')->where('level','officer')
        ->join('officer',function($join){
            $join->on('officer.id_officer','=','users.id');
        })->get();
        return view('officer/index',compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'=> 'required|unique:users',
            'username' => 'required|string',
            'email' => 'required|unique:users',
            'password' => 'required',
            'telp' => 'required',
        ]);

            DB::table('users')->insert([
                'name'=> $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password'=>bcrypt($request->password),
                'level' => 'officer',
            ]);

            $check = DB::table('users')->where('id', \DB::raw("(select max(`id`) from users)"))->first();

            DB::table('officer')->insert([
                'id_officer'=>$check->id,
                'Full_nameo'=>$check->name,
                'telp' =>$request->telp,
            ]);

        return redirect()->back()->withSuccess('User created successfully!');
    }

    public function edit($id)
    {
        $officer = DB::table('users')->where('id',$id)->first();
        return view('officer/edit',compact('officer'));
    }

    public function update(Request $request)
    {

        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
        ]);

        DB::table('officer')->where('id_officer',$request->id)->update([
            'Full_nameo'=>$request->name,
            'telp'=>$request->telp,
        ]);

        return redirect('Officer Management')->withsuccess('User updated successfully!');
    }

    public function delete($id)
    {
      DB::table('users')->where('id', $id)->delete();
          return redirect('Officer Management')->with('User deleted successfully!');
    }
}
