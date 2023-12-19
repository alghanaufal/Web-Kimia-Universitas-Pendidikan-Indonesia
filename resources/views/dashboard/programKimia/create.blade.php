@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{route('programKimia.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <form action="{{route('programKimia.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text"
            class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId" placeholder="Judul" value="{{Session::get('judul')}}">
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Deskripsi</label>
            <textarea name="info1" rows="5" class="form-control summernote">{{Session::get('info1')}}</textarea>
        </div>
        <div class="mb-3">
            <label for="info2" class="form-label">Roadmap</label>
            <input type="file" class="form-control form-control-sm" name="info2" id="info2">   
        </div>
        <div class="mb-3">
            <label for="info3" class="form-label">Tema Riset</label>
            <input type="text"
              class="form-control form-control-sm" name="info3" id="info3" aria-describedby="helpId" placeholder="Tema Riset" value="{{Session::get('info3')}}">
        </div>
        <div class="mb-3">
            <label for="info4" class="form-label">Dana Riset</label>
            <input type="text"
              class="form-control form-control-sm" name="info4" id="info4" aria-describedby="helpId" placeholder="Dana Riset" value="{{Session::get('info4')}}">
        </div>
        <div class="mb-3">
            <label for="info5" class="form-label">Dosen Pengembang</label>
            <input type="text"
              class="form-control form-control-sm" name="info5" id="info5" aria-describedby="helpId" placeholder="Dosen Pengembang" value="{{Session::get('info5')}}">
        </div>
        <div class="mb-3">
            <label for="_foto" class="form-label">Foto</label>
            <input type="file" class="form-control form-control-sm" name="_foto" id="_foto">   
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
    
@endsection