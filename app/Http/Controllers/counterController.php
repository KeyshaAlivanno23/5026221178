<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class counterController extends Controller

{
    public function index2()
    {
        $pagecounter = DB::table('pagecounter')->get();
        DB::table('pagecounter')->increment('Jumlah');
        return view('index2',['pagecounter' => $pagecounter]);
    }
}
