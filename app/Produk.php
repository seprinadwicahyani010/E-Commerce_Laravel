<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public function Kategori()
	{
	return $this->belongsTo('App\Kategori','id_kategori', 'id');
	}
    public function DetailPesanan() 
    {
        return $this->hasMany('App\DetailPesanan','id_produk', 'id');
    }
}
