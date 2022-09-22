<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
   {
    $officerc=DB::table('officer')->count();
    $productc=DB::table('products')->count();
    $auctionc=DB::table('biddings')->count();
    $bidderc=DB::table('auction_history')->count();

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

    return view('dashboard',compact('officerc','productc','auctionc','bidderc'));
    }

    public function index2()
    {   
        $category = category::all();
        $auction = DB::table('biddings')->where('status','open')
        ->join('products',function($join){
            $join->on('biddings.id_products','=','products.id_product');
        })->get();
        
        return view('dashboardbidder', compact('category','auction'));
    }
    public function Procat(Request $request){
        $category = category::all();
        $cats = $request->namec;
        $cax= DB::table('biddings')->Join('categories',function($join){
            $join->on('biddings.id_catss','=','categories.id_cat');
        })->where('categories.namec', '=', $request->namec)->paginate(1);
        $auction = DB::table('biddings')->where('status','open')
        ->join('products',function($join){
            $join->on('biddings.id_products','=','products.id_product');
        })
        ->join('categories',function($join){
            $join->on('biddings.id_catss','=','categories.id_cat');
        })->where('categories.namec', '=', $request->namec)->get();
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
        //$get = DB::table('auction_history')->where('id_bids', $request->id_bids)->get();
        
    
        return view('Product', compact('auction','category','cax',));
    }
    public function index3()
    {
        $officerc=DB::table('officer')->count();
        $productc=DB::table('products')->count();
        $auctionc=DB::table('biddings')->count();
        $bidderc=DB::table('auction_history')->count();

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

        return view('dashboardofficer',compact('officerc','productc','auctionc','bidderc'));
    }
}

