@extends('depan.layout')
@section('konten')

    <!-- start content -->
    <a href="{{route('depan.akademik')}}" >
      <img class="back_btn" src="{{ asset('depan') }}/images/back.png" alt="button">
    </a> 
    <div class="custom_heading-container">
      <h2 class="riset_menu-title">PEDOMAN AKADEMIK</h2>
    </div>
    @foreach ($data as $item)
      <div class="pedoman-container">
        <div class="pedoman-title">{{ $item->judul }}</div>
        <div class="pedoman-desc">
          {!! $item->isi !!}
        </div>
        <div class="pedoman-download_container">
          <div class="pedoman-download_filename">
            {{ $item->judul }}
          </div>
          <a href="{{ $item->link }}" class="pedoman-download_button">Download</a>
        </div>
      </div>
    @endforeach
    {{-- <div class="pedoman-container">
      <div class="pedoman-title">Pedoman Disiplin Mahasiswa</div>
      <div class="pedoman-desc">
        Sikap, perilaku, larangan, serta hak dan kewajiban mahasiswa diatur
        dalam Peraturan Senat Akademik UPI Nomor 001/SENAT AKD./UPI-HK/II/2014.
      </div>
      <div class="pedoman-download_container">
        <div class="pedoman-download_filename">
          PERATURAN-DISIPLIN-MAHASISWA-UPI
        </div>
        <a href="#" class="pedoman-download_button">Download</a>
      </div>
    </div>
    <div class="pedoman-container">
      <div class="pedoman-title">Kode Etik Dosen</div>
      <div class="pedoman-desc">
        Kode etik dosen diatur dalam Peraturan Senat Akademik Nomor:01/Senat
        Akd./UPI-SK/V/2008
      </div>
      <div class="pedoman-download_container">
        <div class="pedoman-download_filename">Kode-etik-Dosen-2008</div>
        <a href="#" class="pedoman-download_button">Download</a>
      </div>
    </div> --}}
    <!-- end content -->
@endsection