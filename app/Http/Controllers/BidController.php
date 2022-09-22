<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bidding;
use Encore\Admin\Grid\Filter\Where;

class BidController extends Controller
{
    public function index(Request $request)
    {
              
        $data = DB::table('auction_history')
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
                $now = \Carbon\Carbon::now();
            if($request->date_bid_start < $now){
                DB::table('biddings')->where(DB::raw('date_bid_start < now()'), $request->date_bid_start < now())->update([
                    'status' => 'open',
                    ]);
            }if($request->date_bid_end < $now){
                DB::table('biddings')->where(DB::raw('date_bid_end < now()'), $request->date_bid_end < now())->update([
                    'status' => 'closed',
                    ]); 
            }
        
       return view('bid/index',compact('data',));
    }

    public function status($id)
    {
              
        DB::table('auction_history')->where('id_history',$id)->update([
            'auction_status' =>'selected'
        ]);

        $check = DB::table('auction_history')->where('id_history',$id)->first();
        
        $id_bid = $check->id_bids;

        DB::table('auction_history')->where('id_bids',$id_bid)->where('auction_status','delayed')->update([
            'auction_status' =>'not_selected'
        ]);
        $check2=DB::table('auction_history')->where('id_history',$id)->first();

        DB::table('biddings')->where('id_bid',$id_bid)->update([
            'last_bid'=>$check2->bid,
            'id_bidders'=>$check2->id_user,
            'status'=>'closed'
        ]);
        return redirect()->back()->withSuccess('Data has Been Update');
       
    }

}