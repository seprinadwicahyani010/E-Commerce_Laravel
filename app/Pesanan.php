<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    public function User()
	{
	return $this->belongsTo('App\User','id_user', 'id');
	}
    public function DetailPesanan() 
    {
        return $this->hasMany('App\DetailPesanan','id_pesanan', 'id');
    }
    //
}
