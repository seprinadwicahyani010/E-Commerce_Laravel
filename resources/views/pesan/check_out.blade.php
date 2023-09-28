@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color:#fff; padding-bottom:1px; ">
                    <li class="breadcrumb-item" style="font-weight:bold;"><a href="{{ url('home') }}"  style="color:#57242E;">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card" style="background-color:#ffdddf;">
                <div class="card-body">
                    <h2 style="color:#57242E;"><i class="fa fa-shopping-cart"></i><strong> Check Out</strong></h2>
                    @if(!empty($pesanan))
                    <h6 align="right" style="color:#57242E;">Tanggal Pemesanan : {{ $pesanan->tanggal }}</h6>
                    <table class="table">
                        <thead class="thead" style="background-color:#57242E; ">
                            <tr style="color:#fff; text-align:center;">
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table" >
                            <?php $no = 1; ?>
                            @foreach($pesanan_details as $detail_pesanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                <img src="{{ url('uploads') }}/{{ $detail_pesanan->produk->gambar }}" width="100" alt="...">
                                </td>
                                <td>{{ $detail_pesanan->produk->merk }} - {{ $detail_pesanan->produk->nama_produk }}</td>
                                <td>{{ $detail_pesanan->jumlah_produk }} pcs</td>
                                <td align="left">Rp. {{ number_format($detail_pesanan->produk->harga)  }}</td>
                                <td align="left">Rp. {{ number_format($detail_pesanan->jumlah)  }}</td>
                                <td>
                                    <form action="{{ url('check-out') }}/{{ $detail_pesanan->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger" onclick="
                                            return confirm('Anda yakin ingin menghapus pesanan?');">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" align="right"><strong>Total Harga </strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                                <td>
                                    <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success" onclick="
                                        return confirm('Anda yakin akan melakukan check out?');"> 
                                            <i class="fa fa-shopping-cart"></i> Check Out</a></td>
                                <td></td>
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