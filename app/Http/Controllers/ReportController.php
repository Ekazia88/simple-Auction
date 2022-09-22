<?php

namespace App\Http\Controllers;
use App\Exports\AuctionExport;
use App\Exports\HistoryExport;
use App\Models\history;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function report_auction(Request $request)
    {
        $auction = DB::table("biddings")->whereBetween('date_bid_end',[$request->first,$request->last])
            ->join('products', function ($join) {
                $join->on('biddings.id_products', '=', 'products.id_product');
            })
            ->join('bidder', function ($join) {
                $join->on('biddings.id_bidders', '=', 'bidder.id_bidder');
            })
            ->join('officer', function ($join) {
                $join->on('biddings.id_officers', '=', 'officer.id_officer');
            })->get();

            $count =count($auction);
            $req1  =$request->first;
            $req2  =$request->last;
        
        $users =DB::table('users')->get();

        return view('Report.auction', compact('auction','req1','req2','count','users'));
    }

    public function report_history(Request $request)
    {
        
        $historyx = DB::table("auction_history")->where('auction_status',$request->auction_status)
                        ->join('biddings', function ($join) {
                            $join->on('auction_history.id_bids', '=', 'biddings.id_bid');
                        })
                        ->join('products', function ($join) {
                            $join->on('biddings.id_products', '=', 'products.id_product');
                        })
                        ->join('users', function ($join) {
                            $join->on('auction_history.id_user', '=', 'users.id');
                        })
                        ->join('bidder', function ($join) {
                            $join->on('auction_history.id_user', '=', 'bidder.id_bidder');
                        })->get();

        $count =count($historyx);
        $req1x = $request->auction_status;

        return view('Report.auction_history', compact('historyx','count','req1x'));
    }



    
    public function export_auction(Request $request)
    {
        $data = DB::table("biddings")->whereBetween('date_bid_end',[$request->first,$request->last])
            ->join('products', function ($join) {
                $join->on('biddings.id_products', '=', 'products.id_product');
            }) 
            ->join('bidder', function ($join) {
                $join->on('biddings.id_bidders', '=', 'bidder.id_bidder');
            })
            ->join('officer', function ($join) {
                $join->on('biddings.id_officers', '=', 'officer.id_officer');
            })->get();
          

        return Excel::download(new AuctionExport($data), 'Report_auction.xlsx');
    }

    public function export_history(Request $request)
    {
        
        $data = DB::table("auction_history")->where('auction_status',$request->auction_status)
                ->join('biddings', function ($join) {
                    $join->on('auction_history.id_bids', '=', 'biddings.id_bid');
                })
                ->join('products', function ($join) {
                    $join->on('biddings.id_products', '=', 'products.id_product');
                })
                ->join('users', function ($join) {
                    $join->on('auction_history.id_user', '=', 'users.id');
                })
                ->join('bidder', function ($join) {
                    $join->on('auction_history.id_user', '=', 'bidder.id_bidder');
                })->get();
        return Excel::download(new HistoryExport($data), 'Report_history.xlsx');
    }

    
    }
