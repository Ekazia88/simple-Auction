<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    //name table
    protected $table = 'auction';
    //primary key table
    protected $primaryKey = 'id_auction';
    //ini nama field
    protected $fillable = [
    	'id_product','date_bid','last_bid','id_bidder','id_officer','status'
    ];
    public function product() {
        return $this->belongsTo('App\Models\Product','id_product','id_product');
    }
    public function bidder() {
    	return $this->belongsTo('App\Models\Bidder','id_','id_user');
    }
}