<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bidding extends Model
{
    //name table
    protected $table = 'biddings';
    //primary key table
    protected $primaryKey = 'id_bid';
    //ini nama field
    protected $fillable = [
    	'id_products','id_catss','date_bid','last_bid','id_bidder','id_officer','status',
    ];

public function history() {
    return $this->hasMany('App\Models\Auction_history');
}
public function cate()
    {
        return $this->belongsTo('App\Models\category');
    }

}
