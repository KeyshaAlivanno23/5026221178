@extends('template')

@section('tulisan1', 'Edit Karyawan')

@section('link1')
<a href="/karyawan"> Kembali</a>

@endsection

    @section('konten')
	@foreach($karyawan as $p)
	<form action="/karyawan/update" method="post">
		{{ csrf_field() }}
		<div class="row mb-3">
            <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
              <input type="text" name="nama" class="form-control" id="nama" required="required">
            </div>
          </div>

          <div class="row mb-3">
            <label for="divisi" class="col-sm-2 col-form-label">Divisi</label>
            <div class="col-sm-10">
              <input type="text" name="divisi" class="form-control" id="divisi" required="required">
            </div>
          </div>

          <div class="row mb-3">
            <label for="departemen" class="col-sm-2 col-form-label">Departemen</label>
            <div class="col-sm-10">
              <input type="text" name="departemen" class="departemen" id="departemen" required="required">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-12">
                <center> <input type="submit" value="Simpan Data" class="btn btn-primary">
            </div>
          </div>
	</form>
    @endsection
	@endforeach



</body>
</html>
