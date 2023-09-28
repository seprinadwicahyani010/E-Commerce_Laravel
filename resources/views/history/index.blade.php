@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-1">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="background-color:#fff; padding-bottom:1px; ">
                    <li class="breadcrumb-item" style="font-weight:bold;"><a href="{{ url('home') }}"  style="color:#57242E;">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card" style="background-color:#ffdddf;">
                <div class="card-body">
                    <h2><i class="fa fa-history"></i><strong> Riwayat Pemesanan</strong></h2>
                    <table class="table">
                        <thead class="thead" style="background-color:#57242E; ">
                            <tr style="color:#fff; text-align:center;">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Jumlah Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="background-color:#fff; ">
                            <?php $no = 1; ?>
                            @foreach($pesanans as $pesanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pesanan->tanggal }}</td>
                                <td>
                                    @if($pesanan->status == 1)
                                    Sudah Pesan & Belum dibayar
                                    @else
                                    Sudah dibayar 
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($pesanan->total_harga) }}</td>
                                <td>
                                    <a href="{{ url('history') }}/{{ $pesanan->id }}" class="btn btn-primary" style="background-color:#57242E; border:0;"><i class="fa fa-info"></i> Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection