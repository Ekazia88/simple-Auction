<?php

namespace App\Http\Controllers;

use App\Models\bidding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\category;
use Carbon\Carbon;
class SetbidController extends Controller
{
    public function show(Request $request, $id)
    {
        $category = category::all();
        $auction = DB::table('biddings')->where('id_bid',$id)
                ->join('products',function($join){
                    $join->on('biddings.id_products','=','products.id_product');
                })->first();

                $users= DB::table('users')->get();
        $bidding = DB::table('auction_history')->where('id_bids',$id)->where('id_user',Auth::user()->id)->first();
        $high =  DB::table('auction_history')->where('id_bids',$id)->max('bid');
        $data = DB::table('auction_history')->where('id_bids',$id) 
                ->join('users',function($join){
                    $join->on('auction_history.id_user','=','users.id');
                })
                ->join('bidder',function($join){
                    $join->on('users.id','=','bidder.id_bidder');
                })->get();
                
                  
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

        return view('Setbid/show',compact('auction','users','bidding','data','category','high',));
    }
    
    public function data()
    {
              
        $data = DB::table('auction_history')->where('id_user',Auth::user()->id)
                ->join('users',function($join){
                    $join->on('auction_history.id_user','=','users.id');
                })
                ->join('bidder',function($join){
                    $join->on('users.id','=','bidder.id_bidder');
                })
                ->join('biddings',function($join){
                    $join->on('auction_history.id_bids','=','biddings.id_bid');
                })
                ->join('products',function($join){
                    $join->on('biddings.id_products','=','products.id_product');
                })->get();

        return view('Setbid/data',compact('data'));
    }

    public function store(Request $request)
    {
        $cekx = DB::table('biddings')->where('id_bid',$request->id_bids)
                ->join('products',function($join){
                $join->on('biddings.id_products','=','products.id_product');
                })->first();
        $res = DB::table('auction_history')->where('id_bids', $request->id_bids)
        ->join('biddings', function($join){
        $join->on('auction_history.id_bids', '=', 'biddings.id_bid');})->max('bid');

        if($res == null){
        if($request->bid <= $cekx->first_bid) {
            return redirect()->back()->withDanger('The price must not be less than the initial price');
        }else{
        DB::table('auction_history')->insert([
            'id_bids'=>$request->id_bids,
            'id_user'=>Auth::user()->id,
            'bid'=>$request->bid,
            'auction_status'=>'delayed',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString() 
        ]);
        DB::table('biddings')->where('id_bid', $request->id_bids)->update([
            'last_bid' => $request->bid,
        ]);
        return redirect()->back()->withSuccess('Successfully Input Data');
         }
        }else{
        if($request->bid <= $res){
            return redirect()->back()->withDanger('The price must high than last bid');
        }else{
            DB::table('auction_history')->insert([
                'id_bids'=>$request->id_bids,
                'id_user'=>Auth::user()->id,
                'bid'=>$request->bid,
                'auction_status'=>'delayed',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
            DB::table('biddings')->where('id_bid', $request->id_bids)->update([
                'last_bid' => $request->bid,
            ]);
            return redirect()->back()->withSuccess('Successfully Input Data');
        }
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


    public function update(Request $request)
    {
        DB::table('biddings')->where('id_bid',$request->id_bid)->update([
            'id_products'=>$request->id_products,
            'tgl_lelang'=>$request->date_bid,
            'status'=>$request->status,
        ]);

        return redirect('Auction')->withSuccess('Data Update Successfully');
    }

}
