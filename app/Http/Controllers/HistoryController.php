<?php

namespace App\Http\Controllers;
use App\Produk;
use App\Pesanan;
use App\User;
use App\DetailPesanan;
use Alert;
use Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pesanans = Pesanan::where('id_user', Auth::user()->id)->where('status', '!=',0)->get();

        return view('history.index', compact('pesanans'));
    }
    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_details = DetailPesanan::where('id_pesanan', $pesanan->id)->get();

        return view('history.detail', compact('pesanan', 'pesanan_details'));
    }

}
