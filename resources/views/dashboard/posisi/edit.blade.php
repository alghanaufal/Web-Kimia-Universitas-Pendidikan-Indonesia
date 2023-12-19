@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{route('posisi.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <form action="{{route('posisi.update', $data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="">Tipe:</label>
            <select name="tipe" id="tipe">
              <option value="">-Pilih-</option>
              <option value="Pimpinan" {{ $data->tipe == "Pimpinan" ? "selected" : "" }}>Pimpinan</option>
              <option value="Koordinator" {{ $data->tipe == "Koordinator" ? "selected" : "" }}>Koordinator</option>
              <option value="KBK" {{ $data->tipe == "KBK" ? "selected" : "" }}>KBK</option>
            </select>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text"
            class="form-control form-control-sm" name="nama" id="nama" aria-describedby="helpId" placeholder="Nama" value="{{$data->nama}}">
        </div>
          <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
    
@endsection