<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PegawaiControllerDB extends Controller
{

    public function index()
    {
    	// mengambil data dari table pegawai
    	//$pegawai = DB::table('pegawai')->get();
        $pegawai = DB::table('pegawai')->paginate(10);

    	// mengirim data pegawai ke view index
        return view('index',['pegawai' => $pegawai]);
    	//return view ('index',[' pegawai' => $pegawai]);

    }

    // method untuk menampilkan view form tambah pegawai
    public function tambahpegawai()
    {

	    // memanggil view tambah
	    return view('tambahpegawai');

    }

    public function storepegawai(Request $request)
    {
	    // insert data ke table pegawai
	    DB::table('pegawai')->insert([
		    'pegawai_nama' => $request->nama,
		    'pegawai_jabatan' => $request->jabatan,
		    'pegawai_umur' => $request->umur,
		    'pegawai_alamat' => $request->alamat
	    ]);
	        // alihkan halaman ke halaman pegawai
	        return redirect('/pegawai');

    }

        // method untuk edit data pegawai
        public function editpegawai($id)
    {
	        // mengambil data pegawai berdasarkan id yang dipilih (PENTING))
            //SELECT*FROM pegawai where pegawai_id = x
	        $pegawai = DB::table('pegawai')->where('pegawai_id','=',$id)->get();
	        // passing data pegawai yang didapat ke view edit.blade.php
	        return view('editpegawai',['pegawai' => $pegawai]);

    }

        // update data pegawai
        public function updatepegawai(Request $request)
    {
	        // update data pegawai
	        DB::table('pegawai')->where('pegawai_id',$request->id)->update([
		        'pegawai_nama' => $request->nama,
		        'pegawai_jabatan' => $request->jabatan,
		        'pegawai_umur' => $request->umur,
		        'pegawai_alamat' => $request->alamat
	    ]);
	    // alihkan halaman ke halaman pegawai
	    return redirect('/pegawai');
    }

        // method untuk hapus data pegawai
        public function hapuspegawai($id)
    {
	        // menghapus data pegawai berdasarkan id yang dipilih
	        DB::table('pegawai')->where('pegawai_id',$id)->delete();

	        // alihkan halaman ke halaman pegawai
	        return redirect('/pegawai');
    }

    public function caripegawai(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pegawai sesuai pencarian data
		$pegawai = DB::table('pegawai')
		->where('pegawai_nama','like',"%".$cari."%")
		->paginate();

    		// mengirim data pegawai ke view index
		return view('indexpegawai',['pegawai' => $pegawai]);

	}
}
