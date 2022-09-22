<?php

namespace App\Http\Controllers;
use App\Models\bidding;
use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AuctionController extends Controller
{
    
    public function index(Request $request)
    {

        $auction = DB::table('biddings')
                ->join('products',function($join){
                    $join->on('biddings.id_products','=','products.id_product');
                })
                ->join('categories',function($join){
                    $join->on('biddings.id_catss','=','categories.id_cat');
                })
                ->get();
        

            $now = Carbon::now();
            
            if($request->date_bid_start < $now){
                DB::table('biddings')->where(DB::raw('date_bid_start < now()'), $request->date_bid_start < now())->update([
                    'status' => 'open',
                    ]);
            }if($request->date_bid_end < $now){
                DB::table('biddings')->where(DB::raw('date_bid_end < now()'), $request->date_bid_end < now())->update([
                    'status' => 'closed',
                    ]); 
            }
        $product = DB::table('products')->get();
        $cat = category::get();
        $users = DB::table('users')->get();
    
        return view('Auction/index',compact('auction','product','users', 'cat'));
    }
    public function store(Request $request)
    {
        
        $check = bidding::where('id_products',$request->id_product)->where('status','open')
                ->join('products',function($join){
                    $join->on('biddings.id_products','=','products.id_product');
                })->get();

        $score = count($check);

        if($score == 1){
        return redirect()->back()->withDanger('Data lelang tersebut sudah di lelang');

        }
        else
        {
        bidding::insert([
            'id_products'=>$request->id_product,
            'id_catss' =>$request->id_cat,
            'date_bid_start'=> \Carbon\Carbon::parse($request->date_bid_start),
            'date_bid_end'=> \Carbon\Carbon::parse($request->date_bid_end),
            'id_officers'=>Auth::user()->id,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);
        return redirect()->back()->withSuccess('Data input Success');
    }
    }

    public function edit($id)
    {
    
        $auction = DB::table('biddings')->where('id_bid',$id)
                ->join('products',function($join){
                    $join->on('biddings.id_products','=','products.id_product');
                })->first();

        $product = DB::table('products')->get();

        return view('Auction/edit',compact('product','auction'));
    }

    public function show($id)
    {
        $auction = DB::table('biddings')->where('id_bid',$id)
            ->join('products',function($join){
                $join->on('biddings.id_products','=','products.id_product');
            })->first();

        $users= DB::table('users')->get();

        $data = DB::table('auction_history')->where('id_bids',$id)
                ->join('users',function($join){
                    $join->on('auction_history.id_user','=','users.id');
                })
                ->join('bidder',function($join){
                    $join->on('users.id','=','bidder.id_bidder');
                })->get();

        return view('Auction/show',compact('auction','users','data'));
    }

    public function update(Request $request)
    {
        DB::table('biddings')->where('id_bid',$request->id_bid)->update([
            'id_products'=>$request->id_products,
            'date_bid_start' => \Carbon\Carbon::parse($request->date_bid_start),
            'date_bid_end'=>\Carbon\Carbon::parse($request->date_bid_end),
            'status'=>$request->status,
        ]);

        return redirect('Auction')->withSuccsess('Data Auction Updated');
    }
    public function delete($id)
    {
        $lelang = DB::table('biddings')->where('id_bid',$id)->delete();
    return redirect('Auction')->with('delete', 'Data lelang berhasil di hapus!');
    }

}
