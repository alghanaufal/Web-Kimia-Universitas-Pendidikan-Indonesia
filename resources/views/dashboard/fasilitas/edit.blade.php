@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{route('fasilitas.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <form action="{{route('fasilitas.update', $data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="">Tipe:</label>
            <select name="tipe" id="tipe">
              <option value="">-Pilih-</option>
              <option value="Fasilitas Umum" {{ $data->tipe == "Fasilitas Umum" ? "selected" : "" }}>Fasilitas Umum Fakultas</option>
              <option value="Laboratorium" {{ $data->tipe == "Laboratorium" ? "selected" : "" }}>Laboratorium</option>
            </select>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text"
            class="form-control form-control-sm" name="nama" id="nama" aria-describedby="helpId" placeholder="Nama" value="{{$data->nama}}">
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" rows="5" class="form-control summernote">{{$data->isi}}</textarea>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link Youtube (opsional)</label>
            <input type="text"
              class="form-control form-control-sm" name="link" id="link" aria-describedby="helpId" placeholder="Link Youtube" value="{{$data->link}}">
        </div>
        @if ($data->foto)
            <img style="max-width:100px;max-height:100px" src="{{ asset('foto/fasilitas') . '/' . $data->foto }}">
        @endif
        <div class="mb-3">
            <label for="_foto1" class="form-label">Foto 1 (opsional)</label>
            <input type="file" class="form-control form-control-sm" name="_foto1" id="_foto1">   
        </div>
        @if ($data->foto2)
            <img style="max-width:100px;max-height:100px" src="{{ asset('foto/fasilitas') . '/' . $data->foto2 }}">
        @endif
        <div class="mb-3">
            <label for="_foto2" class="form-label">Foto 2 (opsional)</label>
            <input type="file" class="form-control form-control-sm" name="_foto2" id="_foto2">   
        </div>
        @if ($data->foto3)
            <img style="max-width:100px;max-height:100px" src="{{ asset('foto/fasilitas') . '/' . $data->foto3 }}">
        @endif
        <div class="mb-3">
            <label for="_foto3" class="form-label">Foto 3 (opsional)</label>
            <input type="file" class="form-control form-control-sm" name="_foto3" id="_foto3">   
        </div>
        @if ($data->foto4)
            <img style="max-width:100px;max-height:100px" src="{{ asset('foto/fasilitas') . '/' . $data->foto4 }}">
        @endif
        <div class="mb-3">
            <label for="_foto4" class="form-label">Foto 4 (opsional)</label>
            <input type="file" class="form-control form-control-sm" name="_foto4" id="_foto4">   
        </div>
        @if ($data->foto5)
            <img style="max-width:100px;max-height:100px" src="{{ asset('foto/fasilitas') . '/' . $data->foto5 }}">
        @endif
        <div class="mb-3">
            <label for="_foto5" class="form-label">Foto 5 (opsional)</label>
            <input type="file" class="form-control form-control-sm" name="_foto5" id="_foto5">   
        </div>
          <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
    
@endsection