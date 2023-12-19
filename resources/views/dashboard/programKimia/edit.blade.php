@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{route('programKimia.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <form action="{{route('programKimia.update', $data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
          {{-- <label for="judul" class="form-label">Judul</label> --}}
          <input type="hidden"
            class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId" placeholder="Judul" value="{{$data->judul}}">
        </div>
        <h3>{{$data->judul}}</h3>
        <div class="mb-3">
            <label for="info1" class="form-label">Deskripsi</label>
            <textarea name="info1" rows="5" class="form-control summernote">{{$data->info1}}</textarea>
        </div>
        @if ($data->info2)
            <img style="max-width:100px;max-height:100px" src="{{ asset('foto/programKimia') . '/' . $data->info2 }}">
        @endif
        <div class="mb-3">
            <label for="info2" class="form-label">Roadmap</label>
            <input type="file" class="form-control form-control-sm" name="info2" id="info2">   
        </div>
        <div class="mb-3">
            <label for="info3" class="form-label">Tema Riset</label>
            <textarea name="info3" rows="5" class="form-control summernote">{{$data->info3}}</textarea>
            {{-- <input type="text"
              class="form-control form-control-sm" name="info3" id="info3" aria-describedby="helpId" placeholder="Tema Riset" value="{{$data->info3}}"> --}}
        </div>
        <div class="mb-3">
            <label for="info4" class="form-label">Dana Riset</label>
            <textarea name="info4" rows="5" class="form-control summernote">{{$data->info4}}</textarea>

            {{-- <input type="text"
              class="form-control form-control-sm" name="info4" id="info4" aria-describedby="helpId" placeholder="Dana Riset" value="{{$data->info5}}"> --}}
        </div>
        <div class="mb-3">
            <label for="info5" class="form-label">Dosen Pengembang</label>
            <textarea name="info5" rows="5" class="form-control summernote">{{$data->info5}}</textarea>

            {{-- <input type="text"
              class="form-control form-control-sm" name="info5" id="info5" aria-describedby="helpId" placeholder="Dosen Pengembang" value="{{$data->info5}}"> --}}
        </div>
        {{-- @if ($data->foto)
            <img style="max-width:100px;max-height:100px" src="{{ asset('foto/programKimia') . '/' . $data->foto }}">
        @endif
        <div class="mb-3">
            <label for="_foto" class="form-label">Foto</label>
            <input type="file" class="form-control form-control-sm" name="_foto" id="_foto">   
        </div> --}}
          <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
    
@endsection