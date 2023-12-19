@extends('depan.layout')
@section('konten')

    <!-- content section -->
    <div class="custom_heading-container">
        <main class="content">
          <a href="{{route('depan.mahasiswa')}}" class="cta">Kemahasiswaan</a>
          <a href="{{route('depan.alumni')}}" class="cta">Alumni</a>
          <a href="{{route('depan.beasiswa')}}" class="cta">Beasiswa</a>
        </main>
      </div>

    <div class="custom_heading-container">
      <h2 class="visimisi-title">alumni</h2>
    </div>
    <div class="riset_menu-container">
      <div class="riset_menu-col">
        <div class="riset_menu_img-container">
          <a href="{{route('depan.alumni.portal')}}">
            <div class="mhs_menu_img">
              <img src="{{ asset('depan') }}/images/alumni1.png" />
            </div>
          </a>
        </div>
      </div>
      <div class="riset_menu-col">
        <div class="riset_menu_img-container">
          <a href="{{route('depan.alumni.legalisir')}}">
            <div class="mhs_menu_img">
              <img src="{{ asset('depan') }}/images/alumni3.png" />
            </div>
          </a>
        </div>
      </div>
    </div>
    <!-- end content section -->
@endsection