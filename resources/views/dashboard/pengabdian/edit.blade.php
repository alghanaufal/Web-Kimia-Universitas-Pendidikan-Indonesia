@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{route('pengabdian.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <form action="{{route('pengabdian.update', $data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text"
            class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId" placeholder="Judul" value="{{$data->judul}}">
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" rows="5" class="form-control summernote">{{$data->isi}}</textarea>
        </div>
        @if ($data->foto)
          <img style="max-width:100px;max-height:100px" src="{{ asset('foto/pengabdian') . '/' . $data->foto }}">
        @endif
        <div class="mb-3">
            <label for="_foto" class="form-label">Foto</label>
            <input type="file" class="form-control form-control-sm" name="_foto" id="_foto">   
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link (opsional)</label>
            <input type="text"
              class="form-control form-control-sm" name="link" id="link" aria-describedby="helpId" placeholder="Link" value="{{$data->link}}">
          </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tanggal Mulai (opsional)</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_mulai" placeholder="dd/mm/yyyy"  value="{{$data->tgl_mulai}}"></div>
                <div class="col-auto">Tanggal Akhir (opsional)</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_akhir" placeholder="dd/mm/yyyy"  value="{{$data->tgl_akhir}}"></div>
            </div>
        </div>
          <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
    
@endsection