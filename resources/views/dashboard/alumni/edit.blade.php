@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{route('alumni.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <form action="{{route('alumni.update', $data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3" id="tipeDiv">
            <label for="tipe" id="tipeLabel">Tipe:</label>
            <select name="tipe" id="tipe" style="display: inline-block; vertical-align: middle;" onchange="toggleBeritaDropdown()">
                <option value="">-Pilih-</option>
                <option value="Portal Alumni" {{ $data->tipe == "Portal Alumni" ? "selected" : "" }}>Portal Alumni</option>
                <option value="Informasi Alumni" {{ $data->tipe == "Informasi Alumni" ? "selected" : "" }}>Informasi Alumni</option>
            </select>
        </div>
        
        <script>
            function toggleBeritaDropdown() {
                var tipeDiv = document.getElementById("tipeDiv");
                var detailDiv = document.getElementById("detailDiv");
                var tipe = document.getElementById("tipe");
        
                // Menampilkan atau menyembunyikan dropdown sub-tipe berdasarkan pilihan di dropdown tipe
                if (tipe.value === "Portal Alumni") {
                    // Jika pilihan tipe adalah "Portal Alumni", tampilkan dropdown sub-tipe
                    detailDiv.style.display = "block";
                } else {
                    // Jika pilihan tipe bukan "Portal Alumni", sembunyikan dropdown sub-tipe
                    detailDiv.style.display = "none";
                }
            }
        </script>
        <div class="mb-3" id="detailDiv" style="display: none;">
            <label for="detail">Sub Tipe:</label>
            <select name="detail" id="detail">
                <option value="">-Pilih-</option>
                <option value="Surat" {{ $data->detail_tipe == "Surat" ? "selected" : "" }}>Surat Alumni</option>
                <option value="Lowongan" {{ $data->detail_tipe == "Lowongan" ? "selected" : "" }}>Lowongan Pekerjaan</option>
            </select>
        </div>
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
          <img style="max-width:100px;max-height:100px" src="{{ asset('foto/alumni') . '/' . $data->foto }}">
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