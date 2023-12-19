@extends('depan.layout')
@section('konten')
    <div class="custom_heading-container">
        <main class="content">
          <a href="{{route('depan.lembaga')}}" class="cta">Profil</a>
          <a href="{{route('depan.lembaga.visimisi')}}" class="cta">Visi & Misi</a>
          <a href="{{route('depan.lembaga.struktur')}}" class="cta">Struktur<br>Organisasi</a>
          <a href="{{route('depan.lembaga.staff')}}" class="cta">Staff</a>
          <a href="{{route('depan.lembaga.fasilitas')}}" class="cta">Fasilitas</a>
        </main>
    </div>
    <!-- content section -->
    <div class="custom_heading-container">
      <h2 class="riset_menu-title">PROFIL PRODI KIMIA</h2>
    </div>
    <section class="third">
      <div class="container">
        {{-- DINAMIS --}}
        @php
            $translatedIsi = GoogleTranslate::trans($isi, app()->getLocale());
        @endphp
        <div class="left-content">
          {!! $translatedIsi !!}
        </div>

        <div class="right-img">
          {{-- STATIS --}}
          <h4>{{ GoogleTranslate::trans('KETUA', app()->getLocale()) }}</h4>
          <h4>PRODI KIMIA</h4>
          <img src="{{ asset('foto/dosen') . '/' . $kaprodi->foto }}" alt="photo">
          <h4>{{$kaprodi->nama}}</h4>
        </div>
      </div>    <!-- .container -->
    </section> 
    @endsection