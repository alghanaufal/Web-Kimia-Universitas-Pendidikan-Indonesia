@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{route('pkm.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <form action="{{route('pkm.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text"
            class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId" placeholder="Judul" value="{{Session::get('judul')}}">
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" rows="5" class="form-control summernote">{{Session::get('isi')}}</textarea>
        </div>
        <div class="mb-3">
            <label for="_foto" class="form-label">Foto</label>
            <input type="file" class="form-control form-control-sm" name="_foto" id="_foto">   
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link (opsional)</label>
            <input type="text"
              class="form-control form-control-sm" name="link" id="link" aria-describedby="helpId" placeholder="Link" value="{{Session::get('link')}}">
          </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tanggal Mulai (opsional)</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_mulai" placeholder="dd/mm/yyyy"  value="{{Session::get('tgl_mulai')}}"></div>
                <div class="col-auto">Tanggal Akhir (opsional)</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_akhir" placeholder="dd/mm/yyyy"  value="{{Session::get('tgl_akhir')}}"></div>
            </div>
        </div>

          <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
    
@endsection