@extends('template')

@section('tulisan1', 'Data Karyawan')

@section('link1')
	<a href="/karyawan/tambahKaryawan" class="btn btn-primary"> + Tambah Karyawan Baru</a>
@endsection
@section('konten')

	<br/>
	<form action="/karyawan/cari" method="GET">
        <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Cari Nama Karyawan :</label>
            <div class="col-sm-6">
              <input type="text" name="cari" class="form-control" id="cari" placeholder="Cari Karyawan .." value="{{ old('cari') }}">
        	</div>
            <div class="col-sm-4">
                <input type="submit" value="CARI" class="btn btn-success">
              </div>
		</div>
	</form>
	<br/>

	<table class="table table-striped table-hover">
		<tr>
            <th>Kode Pegawai</th>
			<th>Nama Lengkap</th>
			<th>Departemen</th>
			<th>Divisi</th>
            <th>Edit/Hapus</th>
		</tr>
		@foreach($karyawan as $p)
		<tr>
			<td>{{ $p->kodepegawai }}</td>
			<td>{{ $p->namalengkap }}</td>
			<td>{{ $p->divisi }}</td>
			<td>{{ $p->departemen }}</td>
			<td>
				<a href="/karyawan/edit/{{ $p->kodepegawai }}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
				|
				<a href="/karyawan/hapus/{{ $p->kodepegawai}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
			</td>
		</tr>
		@endforeach
	</table>

    <br/>
	Halaman : {{ $karyawan->currentPage() }} <br/>
	Jumlah Data : {{ $karyawan->total() }} <br/>
	Data Per Halaman : {{ $karyawan->perPage() }} <br/>


	{{ $karyawan->links() }}


@endsection
