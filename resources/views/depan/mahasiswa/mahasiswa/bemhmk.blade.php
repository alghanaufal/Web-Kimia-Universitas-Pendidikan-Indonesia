@extends('depan.layout')
@section('konten')
    <!-- content section -->
    <center>

      <div class="custom_heading-container">
        <h2 class="riset_menu-title">HIMPUNAN MAHASISWA KIMIA</h2>
      </div>
  
      <div class="riset_menu_img-container">
        <img src="{{ asset('depan') }}/images/logo-bem.png" />
      </div>
  
      <div class="custom_heading-container">
        <h2 class="riset_menu-title">BEM HMK</h2>
      </div>

      <div class="bem_logo_img">
        <img src="{{ asset('foto/profileMahasiswa') . '/' . $data['logoBEM'] }}" />
      </div>

      <div class="kabinet-title">Kabinet {{$data['namaBEM']}}</div>
  
      <div class="bem-nama_ketua">KETUA BEM HMK</div>
      
      <div class="bem-ketua_img">
        <img src="{{ asset('foto/profileMahasiswa') . '/' . $data['fotoKetuaBEM'] }}" />
      </div>
  
      <div class="bem-nama_ketua">{{$data['ketuaBEM']}}</div>
      
      </br>
  
      <div class="custom_heading-container">
        <h2 class="riset_menu-title">DPM HMK</h2>
      </div>

      <div class="bem_logo_img">
        <img src="{{ asset('foto/profileMahasiswa') . '/' . $data['logoDPM'] }}" />
      </div>

      <div class="kabinet-title">Parlemen {{$data['namaDPM']}}</div>

      <div class="bem-nama_ketua">KETUA DPM HMK</div>
      
      <div class="bem-ketua_img">
        <img src="{{ asset('foto/profileMahasiswa') . '/' . $data['fotoKetuaDPM'] }}" />
      </div>
  
      <div class="bem-nama_ketua">{{$data['ketuaDPM']}}</div>
  
    </center>

    <!-- end content section -->
@endsection