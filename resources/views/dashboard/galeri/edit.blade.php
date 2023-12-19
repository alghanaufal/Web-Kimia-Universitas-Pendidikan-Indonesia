@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{route('galeri.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <form action="{{route('galeri.update', $data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text"
            class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId" placeholder="Judul" value="{{$data->judul}}">
        </div>
        @if ($data->foto)
            <img style="max-width:100px;max-height:100px" src="{{ asset('foto/galeri') . '/' . $data->foto }}">
        @endif
        <div class="mb-3">
            <label for="_foto" class="form-label">Foto</label>
            <input type="file" class="form-control form-control-sm" name="_foto" id="_foto">   
        </div>
          <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
    
@endsection