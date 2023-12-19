@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{route('akun.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <form action="{{route('akun.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="text"
              class="form-control form-control-sm" name="email" id="email" aria-describedby="helpId" placeholder="e-mail" value="{{Session::get('email')}}">
        </div>
        <div class="mb-3">
          <label for="role">Role:</label>
          <select name="role" id="role">
            <option value="">-Pilih-</option>
            <option value="Super Admin">Super Admin</option>
            <option value="Admin">Admin</option>
            <option value="Dosen">Dosen</option>
            <option value="Mahasiswa">Mahasiswa</option>
          </select>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
    
@endsection