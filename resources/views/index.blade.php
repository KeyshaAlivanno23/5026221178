@extends('template')

@section('tulisan1', 'data sandal')

@section('link1')
    <a href="/sandal/tambah" class="btn btn-primary"> + Tambah Sandal Baru</a>
@endsection

@section('konten')

    <br/>
    <form action="/sandal/cari" method="GET">
        <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Cari Nama sandal</label>
            <div class="col-sm-6">
              <input type="text" name="cari" class="form-control" id="cari" placeholder="Cari sandal ..." value="{{ old('cari') }}">
            </div>
            <div class="col-sm-4">
                <input type="submit" value="CARI" class="btn btn-success ">
              </div>
          </div>

    </form>
    <br/>

    <table class="table table-striped table-hover">
        <tr>
            <th>Merk</th>
            <th>Stock</th>
            <th>Tersedia</th>
            <th>Edit/Hapus</th>
        </tr>
        @foreach($sandal as $p)
        <tr>
            <td>{{ $p->merksandal }}</td>
            <td>{{ $p->stocksandal }}</td>
            <td>{{ $p->tersedia }}</td>
            <td>
                <a href="/sandal/edit/{{ $p->kodesandal }}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                |
                <a href="/sandal/hapus/{{ $p->kodesandal }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </table>

    <br/>
    Halaman : {{ $sandal->currentPage() }} <br/>
    Jumlah Data : {{ $sandal->total() }} <br/>
    Data Per Halaman : {{ $sandal->perPage() }} <br/>


    {{ $sandal->links() }}


@endsection
