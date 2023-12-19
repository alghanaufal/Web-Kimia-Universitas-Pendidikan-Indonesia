@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{route('fasilitas.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <form action="{{route('fasilitas.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Tipe:</label>
            <select name="tipe" id="tipe">
              <option value="">-Pilih-</option>
              <option value="Fasilitas Umum">Fasilitas Umum Fakultas</option>
              <option value="Laboratorium">Laboratorium</option>
            </select>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text"
            class="form-control form-control-sm" name="nama" id="nama" aria-describedby="helpId" placeholder="Nama" value="{{Session::get('nama')}}">
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" rows="5" class="form-control summernote">{{Session::get('isi')}}</textarea>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link Youtube (opsional)</label>
            <input type="text"
              class="form-control form-control-sm" name="link" id="link" aria-describedby="helpId" placeholder="Link Youtube" value="{{Session::get('link')}}">
        </div>
        <div class="mb-3">
        <label for="_foto1" class="form-label">Foto 1 (opsional)</label>
        <input type="file" class="form-control form-control-sm" name="_foto1" id="_foto1">   
        </div>
        <div class="mb-3">
            <label for="_foto2" class="form-label">Foto 2 (opsional)</label>
            <input type="file" class="form-control form-control-sm" name="_foto2" id="_foto2">   
        </div>
        <div class="mb-3">
            <label for="_foto3" class="form-label">Foto 3 (opsional)</label>
            <input type="file" class="form-control form-control-sm" name="_foto3" id="_foto3">   
        </div>
        <div class="mb-3">
            <label for="_foto4" class="form-label">Foto 4 (opsional)</label>
            <input type="file" class="form-control form-control-sm" name="_foto4" id="_foto4">   
        </div>
        <div class="mb-3">
            <label for="_foto5" class="form-label">Foto 5 (opsional)</label>
            <input type="file" class="form-control form-control-sm" name="_foto5" id="_foto5">   
        </div>
          <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
    
@endsection