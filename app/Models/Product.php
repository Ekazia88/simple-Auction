<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //name table
    protected $table = 'products';
    //primary key table
    protected $primaryKey = 'id_product';
    //field name
    protected $fillable = [
    	'name','date','first_bid','picture_product','id_cats','description',
    ];
    public function auction() {
        return $this->hasOne('App\Models\Auction','id_product','id_product');
    }
    public function category(){
        return $this->belongsTo('App\Models\category');
      }
    public function biddings()
    {
        return $this->hasMany('App\Models\bidding');
    }
}