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
    <h2 class="visimisi-title">VISI & MISI</h2>
</div>
 <h3 class="visimisi-subtitle">VISI</h3>
<h4 class="visimisi-desc">
    {!! $visi !!}
</h4>
<h3 class="visimisi-subtitle">MISI</h3>
      <ul class="visimisi-desc">
        {!! $misi !!}
      </ul>
    </div>

@endsection