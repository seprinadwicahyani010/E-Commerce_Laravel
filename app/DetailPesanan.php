<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    public function Produk()
	{
	return $this->belongsTo('App\Produk','id_produk', 'id');
	}
    public function Pesanan()
	{
	return $this->belongsTo('App\Pesanan','id_pesanan', 'id');
	}
    //
}
