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

<center>
  <h2 class="staff-title">
    STAFF PENGAJAR
  </h2>
</center>

@php $k = 0 @endphp
@for ($i = 0; $i < ceil($data->count() / 4); $i++)
  <div class="staff-container">
    @for ($j = 0; $j < 4; $j++)
        @if ($k < $data->count())
        <div class="riset_menu-dosen_img-container">
          <img class="riset_menu-dosen_img" src="{{ asset('foto/dosen') . '/' . $data[$k]->foto }}" />
          <h6>{{$data[$k]->nama }}</h6>
          <a href="{{ route('depan.lembaga.staffdetail', ['id' => $data[$k]->id ]) }}" class="staff-profile_button">Profil</a>
        </div>
            @php $k++ @endphp
        @endif
        @endfor
        <br>
        <br>
  </div>
@endfor

<center>
  <h2 class="staff-title">
    TENAGA KEPENDIDIKAN
  </h2>
</center>

@php $k = 0 @endphp
@for ($i = 0; $i < ceil($data2->count() / 4); $i++)
  <div class="staff-container">
    @for ($j = 0; $j < 4; $j++)
        @if ($k < $data2->count())
        <div class="riset_menu-dosen_img-container">
          <img class="riset_menu-dosen_img" src="{{ asset('foto/tenagaKependidikan') . '/' . $data2[$k]->foto }}" />
          <h6>{{ $data2[$k]->nama }}</h6>
          <div class="nama-bidang">{{ $data2[$k]->bidang}}</div>
        </div>
            @php $k++ @endphp
        @endif
        @endfor
        <br>
        <br>
  </div>
@endfor
@endsection