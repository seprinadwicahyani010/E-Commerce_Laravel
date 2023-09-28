@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center" >
        <div class="col-md-12 mb-5">
            <img src="{{ url('images/banner.png') }}" class="rounded mx-auto d-block" width="1000" alt="">
        </div>
        @foreach($produks as $produk)
        <div class="col-md-3">
            <div class="card mt-3" style="border:0px;">
                <div class="card" style="min-height:510px; background-color:#ffdddf; border:0px; border-radius:20px;">
                    <img src="{{ url('uploads') }}/{{ $produk->gambar }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: 'Montserrat', sans-serif; font-size: 18px;"><strong>{{ $produk->merk }}</strong> <br>{{ $produk->nama_produk }}</h5>
                        <p class="card-text" style="font-family: 'Montserrat', sans-serif; font-size: 18px;">
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