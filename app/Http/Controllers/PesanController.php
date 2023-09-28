<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Pesanan;
use App\User;
use App\DetailPesanan;
use Alert;
use Auth;
use Carbon\Carbon;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $produk = Produk::where('id', $id)->first();
        
        return view('pesan.index', compact('produk'));
    }

    public function pesan(Request $request, $id)
    {
        $produk = Produk::where('id', $id)->first();
        $tanggal = Carbon::now();

        //validasi apakah melebihi stok
        if($request-> jumlah_pesan > $produk->stok)
        {
            return redirect('pesanan/'.$id);
        }
        
        //cek validasi
        $cek_pesanan = Pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
        //simpan ke database pesanan
        if(empty($cek_pesanan))
        {
            $pesanan = new Pesanan;
            $pesanan->id_user = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->total_harga = 0;
            $pesanan->kode = mt_rand(100, 999);
            $pesanan->save();
        }
        
        //simpan ke database detail pesanan 
        $pesanan_baru = Pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();

        //cek detail pesanan 
        $cek_detail_pesanan = DetailPesanan::where('id_produk', $produk->id)->where('id_pesanan', $pesanan_baru->id)->first();
        if(empty($cek_detail_pesanan))
        {
            $detail_pesanan = new DetailPesanan;
            $detail_pesanan->id_produk = $produk->id;
            $detail_pesanan->id_pesanan = $pesanan_baru->id;
            $detail_pesanan->jumlah_produk = $request->jumlah_pesan;
            $detail_pesanan->jumlah = $produk->harga*$request->jumlah_pesan;
            $detail_pesanan->save();
        }else
        {
            $detail_pesanan = DetailPesanan::where('id_produk', $produk->id)->where('id_pesanan', $pesanan_baru->id)->first();

            $detail_pesanan->jumlah_produk = $detail_pesanan->jumlah_produk+$request->jumlah_pesan;

            //harga sekarang
            $harga_detail_pesanan_baru = $produk->harga*$request->jumlah_pesan;
            $detail_pesanan->jumlah = $detail_pesanan->jumlah+$harga_detail_pesanan_baru;
            $detail_pesanan->update();
        }
        //jumlah total
        $pesanan = Pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
        $pesanan->total_harga = $pesanan->total_harga+$produk->harga*$request->jumlah_pesan;
        $pesanan->update();

        alert()->success('Pesanan Sukses Masuk Keranjang', 'Success');
        return redirect('check-out');
    }

    public function check_out()
    {
        $pesanan = Pesanan::where('id_user', Auth::user()->id)->where('status',0)->first();
        $pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = DetailPesanan::where('id_pesanan', $pesanan->id)->get();

        }
        
        return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
    }

    public function delete($id)
    {
        $detail_pesanan = DetailPesanan::where('id', $id)->first();
        $pesanan = Pesanan::where('id', $detail_pesanan->id_pesanan)->first();
        $pesanan->total_harga = $pesanan->total_harga-$detail_pesanan->jumlah;
        $pesanan->update();

        $detail_pesanan->delete();
        alert()->error('Pesanan telah berhasil dihapus', 'Hapus');
        return redirect('check-out');
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->alamat))
        {
            alert()->error('Harap langkapi data diri anda!', 'Error');
            return redirect('profile');
        }

        if(empty($user->nohp))
        {
            alert()->error('Harap langkapi data diri anda!', 'Error');
            return redirect('profile');
        }

        $pesanan = Pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = DetailPesanan::where('id_pesanan', $pesanan_id)->get();
        foreach ($pesanan_details as $detail_pesanan){
            $produk = Produk::where('id', $detail_pesanan->id_produk)->first();
            $produk->stok = $produk->stok-$detail_pesanan->jumlah_produk;
            $produk->update();
        }

        alert()->success('Pesanan telah Berhasil di Check Out, silahkan lanjutkan proses pembayaran', 'Success');
        return redirect('history/' .$pesanan_id);
    }
}
