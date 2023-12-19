@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{route('jurnal.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <form action="{{route('jurnal.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text"
            class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId" placeholder="Judul" value="{{Session::get('judul')}}">
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text"
              class="form-control form-control-sm" name="link" id="link" aria-describedby="helpId" placeholder="Link" value="{{Session::get('link')}}">
          </div>
          <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
    
@endsection