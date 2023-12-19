@extends('depan.layout')
@section('konten')
    <div class="custom_heading-container">
      <main class="content">
        <a href="{{route('depan.mahasiswa')}}" class="cta">Kemahasiswaan</a>
        <a href="{{route('depan.alumni')}}" class="cta">Alumni</a>
        <a href="{{route('depan.beasiswa')}}" class="cta">Beasiswa</a>
      </main>
    </div>

    <div class="custom_heading-container">
      <h2 class="visimisi-title">mahasiswa</h2>
    </div>
    <div class="riset_menu-container">
      <div class="riset_menu-col">
        <div class="riset_menu_img-container">
          <a href="{{route('depan.mahasiswa.bemhmk')}}">
            <div class="mhs_menu_img">
              <img src="{{ asset('depan') }}/images/mahasiswa1.png" />
            </div>
          </a>
        </div>
        <div class="riset_menu_img-container">
          <a href="{{route('depan.mahasiswa.kegiatan&prestasi')}}">
            <div class="mhs_menu_img">
              <img src="{{ asset('depan') }}/images/mahasiswa2.png" />
            </div>
          </a>
        </div>
      </div>
      <div class="riset_menu-col">
        <div class="riset_menu_img-container">
          <a href="{{route('depan.mahasiswa.pkm')}}">
            <div class="mhs_menu_img">
              <img src="{{ asset('depan') }}/images/mahasiswa3.png" />
            </div>
          </a>
        </div>
        <div class="riset_menu_img-container">
          <a href="https://student.upi.edu/">
            <div class="mhs_menu_img">
              <img src="{{ asset('depan') }}/images/mahasiswa4.png" />
            </div>
          </a>
        </div>
      </div>
    </div>
@endsection