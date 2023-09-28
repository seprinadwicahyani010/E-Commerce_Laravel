<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Kategori;
use App\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $produks = Produk::orderByRaw('RAND()')->paginate(12);
        return view('home', compact('produks'));
    }
}
