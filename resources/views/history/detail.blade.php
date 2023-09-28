@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-1">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="background-color:#fff; padding-bottom:1px; ">
                    <li class="breadcrumb-item" style="font-weight:bold;"><a href="{{ url('home') }}"  style="color:#57242E;">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('history') }}" style="color:#57242E;">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card" style="background-color:#ffdddf;">
                <div class="card-body">
                <h3>Sukses Check Out</h3>
                    <h5>Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer ke 
                        rekening <strong>Bank BRI Nomer Rekening : 32113-821312-123</strong> dengan nominal : 
                        <strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></h5>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body" style="background-color:#ffdddf;">
                    <h2><i class="fa fa-shopping-cart"></i><strong> Detail Pemesanan</strong></h2>
                    @if(!empty($pesanan))
                    <h6 align="right">Tanggal Pemesanan : {{ $pesanan->tanggal }}</h6>
                    <table class="table">
                        <thead class="thead" style="background-color:#57242E; ">
                            <tr style="color:#fff; text-align:center;">
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody style="background-color:#fff; ">
                            <?php $no = 1; ?>
                            @foreach($pesanan_details as $detail_pesanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $detail_pesanan->produk->merk }} - {{ $detail_pesanan->produk->nama_produk }}</td>
                                <td>{{ $detail_pesanan->jumlah_produk }} pcs</td>
                                <td align="left">Rp. {{ number_format($detail_pesanan->produk->harga)  }}</td>
                                <td align="left">Rp. {{ number_format($detail_pesanan->jumlah)  }}</td>
                                
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" align="right"><strong>Total Harga </strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right"><strong>Kode Unik </strong></td>
                                <td><strong> {{ ($pesanan->kode) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right"><strong>Total yang harus dibayar </strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection