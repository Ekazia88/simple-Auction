<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bidder extends Model
{
    use HasFactory;
    protected $table = 'bidders';
    //primary key table
    protected $primaryKey = 'id_bidder';

    protected $fillable = [
        'id_bidder',
        'Full_name',
        'telp',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
