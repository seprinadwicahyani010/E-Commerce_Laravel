<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Kategori;
use App\Produk;
use Illuminate\Http\Request;

class BodycareController extends Controller
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
    public function index()
    {
        
        $produks = DB::select("SELECT * FROM produks WHERE id_kategori = 3");
        return view('bodycare', compact('produks'));
    }
}


