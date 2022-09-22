<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        
         $product=Product::join('categories','products.id_cats','categories.id_cat')
                        ->get();
        return view('Product/Index',compact('product'));
    }

    public function store(Request $request){
        $picturecheck = Validator::make($request->all(),[
            'picture_product' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($picturecheck->fails()){
            return redirect()->back()->withDanger('Upload Fail, The File Must jpg/png/jpeg ');
        }
        $picture_product = $request->file('picture_product');
        $size = $picture_product ->getSize();
        $Namepicture = time() . "_" . $picture_product->getClientOriginalName();
        $extension = $picture_product->getClientOriginalExtension();
        $request->picture_product->move(public_path('Pict'), $Namepicture, $size, $extension);
        
        DB::table('products')->insert([
            'namep' => $request->namep,
            'first_bid' => $request->first_bid,
            'picture_product' => $Namepicture,
            'id_cats' => $request->id_cats,
            'description'=>$request->description
        ]);
          
        return redirect()->back()->withSuccess('Product added success');
        }
        public function edit($id){
            $product = Product::get()->where('id_product', $id)->first();
            return view('product/edit', compact('product'));
        }

        public function show($id)
        {
            $product = Product::get()->where('id_product', $id)->first();
            return view('product/show', compact('product'));
        }  
    public function update(Request $request)
    {
        if($request->picture_product == null){
            DB::table('products')->where('id_product',$request->id_product)->update([
                'namep'=>$request->namep,
                'first_bid'=>$request->first_bid,
                'id_cats' => $request->id_cats,
                'description'=>$request->description
            ]);
        }
        else
        {
            $picturecheck = validator::make($request->all(), [
                'picture_product' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($picturecheck->fails()) {
                return redirect()->back()->withDanger('Upload Fail, The File Must jpg/png/jpeg ');
            }
        $picture_product = $request->file('picture_product');
        $size = $picture_product ->getSize();
        $Namepicture = time() . "_" . $picture_product->getClientOriginalName();
        $extension = $picture_product->getClientOriginalExtension();
        $request->picture_product->move(public_path('Pict'), $Namepicture, $size, $extension);

        DB::table('products')->where('id_product',$request->id_product)->update([
            'namep'=>$request->namep,
            'first_bid'=>$request->first_bid,
            'picture_product'=>$Namepicture,
            'id_cats' => $request->id_cats,
            'description'=>$request->description
        ]);
    }

        return redirect('Product')->withSuccess('Product has been successfully updated');
    }

    public function delete($id)
    {
      $product = \App\Models\Product::where('id_product',$id)->delete();
      return redirect('Product')->withDanger('Product has been removed');
    }

}
