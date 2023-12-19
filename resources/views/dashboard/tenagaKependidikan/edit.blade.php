@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{route('tenagaKependidikan.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <form action="{{route('tenagaKependidikan.update', $data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text"
            class="form-control form-control-sm" name="nama" id="nama" aria-describedby="helpId" placeholder="Nama" value="{{$data->nama}}">
        </div>
        <div class="mb-3">
            <label for="bidang">Bidang:</label>
            <select name="bidang" id="bidang">
                <option value="">-Pilih-</option>
                <option value="Staf Akademik dan Kemahasiswaan" {{ $data->bidang == "Staf Akademik dan Kemahasiswaan" ? "selected" : "" }}>Staf Akademik dan Kemahasiswaan</option>
                <option value="Pranata Laboratorium" {{ $data->bidang == "Pranata Laboratorium" ? "selected" : "" }}>Pranata Laboratorium</option>
            </select>
        </div>
        
        <div class="mb-3 pranata" style="{{ $data->bidang == 'Pranata Laboratorium' ? 'display:block' : 'display:none' }}">
            <label for="id_lab">Laboratorium:</label>
            <select name="id_lab" id="id_lab">
                <option value="">-Pilih-</option>
                @foreach ($datafasilitas as $item)
                    <option value="{{ $item->id }}" {{ $data->id_lab == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <!-- Masukkan tag script di bawah elemen select "bidang" -->
        <script src="{{ asset('admin/js/main.js') }}"></script>        

        @if ($data->foto)
            <img style="max-width:100px;max-height:100px" src="{{ asset('foto/tenagaKependidikan') . '/' . $data->foto }}">
        @endif
          <div class="mb-3">
              <label for="_foto" class="form-label">Foto</label>
              <input type="file" class="form-control form-control-sm" name="_foto" id="_foto">   
          </div>
          <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
    
@endsection