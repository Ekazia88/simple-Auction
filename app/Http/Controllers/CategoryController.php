<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    Public function index()
    {
        $categories = \App\Models\category::get();
        return view('category/index', compact('categories'));
    }
    public function store(Request $request)
{
    
    $this->validate($request, [
        'namec' => 'required|string|max:50',
    ]);

    category::insert([
        'namec'=> $request->namec,
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
    ]);
    return redirect()->back()->withSuccess('Category added success');
}
    public function edit($id){
        $cat = \App\Models\category::get()->where('id_cat', $id)->first();
        return view('category/edit', compact('cat'));
    }
    public function update(Request $request)
        {
        categories::where('id_cat',$request->id_cat)->update([
            'namec' => $request->namec,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
        return redirect('Category Management')->withSuccess('Category updated successfully!');
        }
    public function delete($id)
        {
          $cat = \App\Models\category::where('id_cat',$id)->delete();
          return redirect('Category Management')->withDanger('Category has been removed');
        }
}