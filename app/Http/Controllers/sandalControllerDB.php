<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class sandalControllerDB extends Controller
{
    public function index()
    {
    	// mengambil data dari table sandal
    	//$sandal = DB::table('sandal')->get();
        $sandal = DB::table('sandal')->paginate(10);

    	// mengirim data sandal ke view index
        return view('index',['sandal' => $sandal]);
    	//return view ('index',[' sandal' => $sandal]);

    }

    // method untuk menampilkan view form tambah sandal
    public function tambah()
    {

	    // memanggil view tambah
	    return view('tambah');

    }

    public function store(Request $request)
    {
	    // insert data ke table sandal
	    DB::table('sandal')->insert([
		    'kodesandal' => $request->kode,
		    'merksandal' => $request->merk,
		    'stocksandal' => $request->stock,
		    'tersedia' => $request->tersedia
	    ]);
	        // alihkan halaman ke halaman sandal
	        return redirect('/sandal');

    }

        // method untuk edit data sandal
        public function edit($id)
    {
	        // mengambil data sandal berdasarkan id yang dipilih (PENTING))
            //SELECT*FROM sandal where sandal_id = x
	        $sandal = DB::table('sandal')->where('kodesandal','=',$id)->get();
	        // passing data sandal yang didapat ke view edit.blade.php
	        return view('edit',['sandal' => $sandal]);

    }

        // update data sandal
        public function update(Request $request)
    {
	        // update data sandal
	        DB::table('sandal')->where('kodesandal',$request->kode)->update([
		    'kodesandal' => $request->kode,
		    'merksandal' => $request->merk,
		    'stocksandal' => $request->stock,
		    'tersedia' => $request->tersedia
	    ]);
	    // alihkan halaman ke halaman sandal
	    return redirect('/sandal');
    }

        // method untuk hapus data sandal
        public function hapus($id)
    {
	        // menghapus data sandal berdasarkan id yang dipilih
	        DB::table('sandal')->where('kodesandal',$id)->delete();

	        // alihkan halaman ke halaman sandal
	        return redirect('/sandal');
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table sandal sesuai pencarian data
		$sandal = DB::table('sandal')
		->where('sandal_nama','like',"%".$cari."%")
		->paginate();

    		// mengirim data sandal ke view index
		return view('index',['sandal' => $sandal]);

	}
}
