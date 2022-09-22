<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_officer extends Model
{
    protected $table = 'officer';
    protected $primaryKey = 'id_officer';
    //ini nama field
    protected $fillable = [
    	'nama_petugas','username','password','id_level'
    ];

    //ini buat relasi ke tabel level / model level
    //hasOne namanya relasi one to one dari 1 field cuman bisa ada 1 field lagi
    public function level() {
    	return $this->hasOne('App\Level','id_level','id_level');
    }
}