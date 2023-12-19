@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{route('posisi.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <form action="{{route('posisi.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Tipe:</label>
            <select name="tipe" id="tipe">
              <option value="">-Pilih-</option>
              <option value="Pimpinan">Pimpinan</option>
              <option value="Koordinator">Koordinator</option>
              <option value="KBK">KBK</option>
            </select>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text"
            class="form-control form-control-sm" name="nama" id="nama" aria-describedby="helpId" placeholder="Nama" value="{{Session::get('nama')}}">
        </div>
          <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
    
@endsection