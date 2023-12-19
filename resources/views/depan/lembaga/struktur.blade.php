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
    <h2 class="riset_menu-title">Struktur Organisasi</h2>
</div>

<div class="struktur_menu-container">
    <div class="struktur_menu-col">
        <div class="struktur_menu_img-container">
            <!-- <div > -->
                <img class="struktur_menu_img" src="{{ asset('foto/profileProdi') . '/' . $foto }}" />
            <!-- </div> -->
        </div>
    </div>
</div>
<div class="custom_heading-container">
    <h3 class="riset_menu-title">PIMPINAN PROGRAM STUDI</h3>
</div>
<div class="riset_menu-container">
    @foreach ($posisi as $item)
        @if ($item->tipe === 'Pimpinan')
            @foreach ($staff as $staffItem)
                @if ($staffItem->id_posisi === $item->id)
                    @foreach ($dosen as $dosenItem)
                        @if ($staffItem->id_dosen === $dosenItem->id)
                            <div class="riset_menu-dosen_img-container">
                                <img class="riset_menu-dosen_img" src="{{ asset('foto/dosen') . '/' . $dosenItem->foto }}" />
                                <h6>{{ $item->nama }}</h6>
                                <h6>{{ $dosenItem->nama }}</h6>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif
    @endforeach
</div>
<div class="custom_heading-container">
    <h3 class="riset_menu-title">KOORDINATOR</h3>
</div>
<div class="riset_menu-container">
    @foreach ($posisi as $item)
        @if ($item->tipe === 'Koordinator')
            @foreach ($staff as $staffItem)
                @if ($staffItem->id_posisi === $item->id)
                    @foreach ($dosen as $dosenItem)
                        @if ($staffItem->id_dosen === $dosenItem->id)
                            <div class="riset_menu-dosen_img-container">
                                <img class="riset_menu-dosen_img" src="{{ asset('foto/dosen') . '/' . $dosenItem->foto }}" />
                                <h6>Koordinator {{ $item->nama }}</h6>
                                <h6>{{ $dosenItem->nama }}</h6>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif
    @endforeach
</div>
<div class="custom_heading-container">
    <h3 class="riset_menu-title">KOORDINATOR KBK KIMIA</h3>
</div>
<div class="riset_menu-container">
    @foreach ($posisi as $item)
        @if ($item->tipe === 'KBK')
            @foreach ($staff as $staffItem)
                @if ($staffItem->id_posisi === $item->id)
                    @foreach ($dosen as $dosenItem)
                        @if ($staffItem->id_dosen === $dosenItem->id)
                            <div class="riset_menu-dosen_img-container">
                                {{-- <div class="riset_menu_img"> --}}
                                    {{-- <img src="{{ asset('foto/dosen') . '/' . $dosenItem->foto }}" /> --}}
                                    <img class="riset_menu-dosen_img" src="{{ asset('foto/dosen') . '/' . $dosenItem->foto }}" />
                                    <h6> KBK {{ $item->nama }}</h6>
                                    <h6>{{ $dosenItem->nama }}</h6>
                                {{-- </div> --}}
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif
    @endforeach
</div>
<div class="custom_heading-container">
    <h3 class="riset_menu-title">KETUA LABORATORIUM</h3>
</div>
<div class="riset_menu-container">
    @foreach ($fasilitas as $item)
        @if ($item->tipe === 'Laboratorium')
            @foreach ($staff as $staffItem)
                @if ($staffItem->id_lab === $item->id)
                    @foreach ($dosen as $dosenItem)
                        @if ($staffItem->id_dosen === $dosenItem->id)
                            <div class="riset_menu-dosen_img-container">
                                {{-- <div class="riset_menu_img"> --}}
                                    {{-- <img src="{{ asset('foto/dosen') . '/' . $dosenItem->foto }}" /> --}}
                                    <img class="riset_menu-dosen_img" src="{{ asset('foto/dosen') . '/' . $dosenItem->foto }}" />
                                    <h6>Lab. {{ $item->nama }}</h6>
                                    <h6>{{ $dosenItem->nama }}</h6>
                                {{-- </div> --}}
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif
    @endforeach
</div>
@endsection