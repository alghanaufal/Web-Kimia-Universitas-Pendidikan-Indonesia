@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{route('dosen.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <form action="{{route('dosen.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text"
            class="form-control form-control-sm" name="nama" id="nama" aria-describedby="helpId" placeholder="Nama" value="{{Session::get('nama')}}">
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text"
              class="form-control form-control-sm" name="nip" id="nip" aria-describedby="helpId" placeholder="NIP" value="{{Session::get('nip')}}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="text"
              class="form-control form-control-sm" name="email" id="email" aria-describedby="helpId" placeholder="e-mail" value="{{Session::get('email')}}">
        </div>
        <div class="mb-3">
          <label for="jabatan">Jabatan:</label>
          <select name="jabatan" id="jabatan">
            <option value="">-Pilih-</option>
            <option value="Asisten Ahli">Asisten Ahli</option>
            <option value="Lektor">Lektor</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="bidang">Bidang Keahlian:</label>
          <select name="bidang" id="bidang">
            <option value="">-Pilih-</option>
            <option value="Biokimia">Biokimia</option>
            <option value="Kimia Organik">Kimia Organik</option>
            <option value="Kimia Anorganik">Kimia Anorganik</option>
            <option value="Kimia Fisik">Kimia Fisik</option>
            <option value="Kimia Analitik">Kimia Analitik</option>
          </select>
        </div>
        {{-- <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text"
              class="form-control form-control-sm" name="no_hp" id="no_hp" aria-describedby="helpId" placeholder="No HP" value="{{Session::get('no_hp')}}">
        </div> --}}
        {{-- <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text"
              class="form-control form-control-sm" name="alamat" id="alamat" aria-describedby="helpId" placeholder="Alamat" value="{{Session::get('alamat')}}">
        </div> --}}
        <div class="mb-3">
          <label for="scopus" class="form-label">Link Scopus</label>
          <input type="text"
            class="form-control form-control-sm" name="scopus" id="scopus" aria-describedby="helpId" placeholder="Scopus" value="{{Session::get('scopus')}}">
        </div>
        <div class="mb-3">
          <label for="scholar" class="form-label">Link Scholar</label>
          <input type="text"
            class="form-control form-control-sm" name="scholar" id="scholar" aria-describedby="helpId" placeholder="Scholar" value="{{Session::get('scholar')}}">
        </div>
        <div class="mb-3">
          <label for="sinta" class="form-label">Link Sinta</label>
          <input type="text"
            class="form-control form-control-sm" name="sinta" id="sinta" aria-describedby="helpId" placeholder="Sinta" value="{{Session::get('sinta')}}">
        </div>
        <div class="mb-3">
            <label for="_foto" class="form-label">Foto</label>
            <input type="file" class="form-control form-control-sm" name="_foto" id="_foto">   
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
    
@endsection