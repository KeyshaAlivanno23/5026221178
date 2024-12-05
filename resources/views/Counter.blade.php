@extends('template1')

@section('tulisan1', 'Counter')

@section('konten')

    @foreach ($pagecounter as $c)
        Anda pengunjung ke - {{$c->Jumlah}}
    @endforeach
@endsection
