<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id_cat';
    protected $fillable = ['name'];

    public function products(){
        return $this->hasMany('App\Models\category');
      }
      public function biddings()
    {
        return $this->hasMany('App\Models\bidding');
    }
}
