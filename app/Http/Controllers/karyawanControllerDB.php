<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class karyawanControllerDB extends Controller
{

    public function index()
    {
    	// mengambil data dari table pegawai
    	//$pegawai = DB::table('pegawai')->get();
        $karyawan = DB::table('karyawan')->paginate(10);

    	// mengirim data pegawai ke view index
        return view('indexKaryawan',['karyawan' => $karyawan]);
    	//return view ('index',[' pegawai' => $pegawai]);

    }

    // method untuk menampilkan view form tambah pegawai
    public function tambahKaryawan()
    {

	    // memanggil view tambah
	    return view('tambahKaryawan');

    }

    public function storekaryawan(Request $request)
    {
	    // insert data ke table pegawai
	    DB::table('karyawan')->insert([
		    'namalengkap' => $request->nama,
		    'divisi' => $request->divisi,
		    'departemen' => $request->departemen

	    ]);
	        // alihkan halaman ke halaman pegawai
	        return redirect('karyawan');

    }

        // method untuk edit data pegawai
        public function editKaryawan($id)
    {
	        // mengambil data pegawai berdasarkan id yang dipilih (PENTING))
            //SELECT*FROM pegawai where pegawai_id = x
	        $karyawan = DB::table('karyawan')->where('kodepegawai','=',$id)->get();
	        // passing data pegawai yang didapat ke view edit.blade.php
	        return view('editKaryawan',['karyawan' => $karyawan]);

    }

        // update data pegawai
        public function updatekaryawan(Request $request)
    {
	        // update data pegawai
	        DB::table('karyawan')->where('kodepegawai',$request->kodepegawai)->update([
		    'namalengkap' => $request->namalengkap,
		    'divisi' => $request->divisi,
		    'departemen' => $request->departemen

	    ]);
	    // alihkan halaman ke halaman pegawai
	    return redirect('/karyawan');
    }

        // method untuk hapus data pegawai
        public function hapuskaryawan($id)
    {
	        // menghapus data pegawai berdasarkan id yang dipilih
	        DB::table('karyawan')->where('kodepegawai',$id)->delete();

	        // alihkan halaman ke halaman pegawai
	        return redirect('/karyawan');
    }

    public function caripegawai(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pegawai sesuai pencarian data
		$pegawai = DB::table('karyawan')
		->where('namakaryawan','like',"%".$cari."%")
		->paginate();

    		// mengirim data pegawai ke view index
		return view('indexkaryawan',['karyawan' => $pegawai]);

	}
}
