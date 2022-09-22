<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction_history extends Model
{
    use HasFactory;
    protected $table = 'auction_history';
    protected $primaryKey = 'id_history';
    protected $fillable = ['id_bids','id_user','bid','auction_status'];

    public function bid(){
        return $this->belongsTo('App\Models\bidding');
    }
}
