@extends('layouts.app')

@section('content')
<div class="container" >
<h3 style="text-align:center;"><strong>Skin Care</strong></h3>
<hr>
    <div class="row justify-content-center" >
        @foreach($produks as $produk)
        <div class="col-md-3">
            <div class="card mt-3" style="border:0px;">
                <div class="card" style="min-height:510px; background-color:#ffdddf; border:0px; border-radius:20px;">
                    <img src="{{ url('uploads') }}/{{ $produk->gambar }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: 'Alegreya Sans SC', sans-serif;"><strong>{{ $produk->merk }}</strong> <br> {{ $produk->nama_produk }}</h5>
                        <p class="card-text">
                            <hr>
                            <strong>Harga :</strong> Rp. {{ number_format($produk->harga)}} <br>
                            <strong>Stok :</strong> {{ $produk->stok }} <br>
                            <strong>Ukuran :</strong> {{ $produk->keterangan }}  <br>
                        </p>
                        <a href="{{ url('pesan') }}/{{ $produk->id }}" class="btn btn-primary" style="background-color:#57242E; position: absolute; bottom: 20px; right: 20px;" ><i class="fa fa-shopping-cart"></i> Pesan</a>
                    </div>
                </div>
            </div> 
        </div>
        @endforeach
    </div>
</div>
@endsection