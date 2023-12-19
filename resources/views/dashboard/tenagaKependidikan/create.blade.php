@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{route('tenagaKependidikan.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <form action="{{route('tenagaKependidikan.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text"
            class="form-control form-control-sm" name="nama" id="nama" aria-describedby="helpId" placeholder="Nama" value="{{Session::get('nama')}}">
        </div>
        <div class="mb-3">
            <label for="bidang">Bidang:</label>
            <select name="bidang" id="bidang">
              <option value="">-Pilih-</option>
              <option value="Staf Akademik dan Kemahasiswaan">Staf Akademik dan Kemahasiswaan</option>
              <option value="Pranata Laboratorium">Pranata Laboratorium</option>
            </select>
          </div>
          
          <div class="mb-3 pranata" style="display: none;">
            <label for="id_lab">Laboratorium:</label>
            <select name="id_lab" id="id_lab">
              <option value="">-Pilih-</option>
              @foreach ($datafasilitas as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
            </select>
          </div>
          
          <!-- Masukkan tag script di bawah elemen select "bidang" -->
          <script src="{{ asset('admin/js/main.js') }}"></script>
          
          
        <div class="mb-3">
            <label for="_foto" class="form-label">Foto</label>
            <input type="file" class="form-control form-control-sm" name="_foto" id="_foto">   
        </div>
          <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
    
@endsection