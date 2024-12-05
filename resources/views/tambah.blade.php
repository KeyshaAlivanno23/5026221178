@extends('template')

@section('tulisan1', 'Data sandal')

@section('link1')
<a href="/sandal"> Kembali</a>

@endsection

@section('konten')
	<br/>
	<br/>

	<form action="/sandal/store" method="post">
		{{ csrf_field() }}
        <div class="row mb-3">
            <label for="merk" class="col-sm-2 col-form-label">Merk</label>
            <div class="col-sm-10">
              <input type="text" name="merk" class="form-control" id="merk" required="required">
            </div>
          </div>

          <div class="row mb-3">
            <label for="stock" class="col-sm-2 col-form-label">Stock</label>
            <div class="col-sm-10">
              <input type="number" name="stock" class="form-control" id="stock" required="required">
            </div>
          </div>

          <div class="row mb-3">
            <label for="tersedia" class="col-sm-2 col-form-label">Tersedia</label>
            <div class="col-sm-10">
              <!-- Pilihan "Ada" -->
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tersedia" id="ada" value="1" required>
                <label class="form-check-label" for="ada">Ada</label>
              </div>
              <!-- Pilihan "Habis" -->
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tersedia" id="habis" value="0" required>
                <label class="form-check-label" for="habis">Habis</label>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-12">
                <center> <input type="submit" value="Simpan Data" class="btn btn-primary">
            </div>
          </div>
	</form>
    @endsection
