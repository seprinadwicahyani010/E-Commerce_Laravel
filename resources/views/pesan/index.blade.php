@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-1">
            <nav aria-label="breadcrumb" >
                <ol class="breadcrumb" style="background-color:#fff; padding-bottom:1px; ">
                    <li class="breadcrumb-item" style="font-weight:bold;"><a href="{{ url('home') }}"  style="color:#57242E;">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $produk->nama_produk }}</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card" style="background-color:#ffdddf;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ url('uploads') }}/{{ $produk->gambar }}" class="rounded mx-auto d-block" width="500" alt="">
                        </div>
                        <div class="col-md-6 mt-5" >
                            <h1 style="margin-bottom: -15px;">{{ $produk->nama_produk }}</h1>`
                            <h3 style="margin-bottom: 30px;">{{ $produk->merk }}</h3>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>:</td>
                                        <td>{{ $produk->kategori }}</td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($produk->harga) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>{{ number_format($produk->stok) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>{{ $produk->keterangan }}</td>
                                    </tr>                                    
                                    <tr>
                                        <td>Jumlah Pesanan</td>
                                        <td>:</td>
                                        <td>
                                            <form method="post"action="{{ url('pesan') }}/{{ $produk->id }}"  >
                                                @csrf
                                                <input type="text" name="jumlah_pesan" class="form-control"  required="" >
                                                <button  class="btn btn-primary mt-2" style="background-color:#57242E; border:0;" type="submit"><i class="fa fa-shopping-cart"  ></i> Masukkan ke Keranjang</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection