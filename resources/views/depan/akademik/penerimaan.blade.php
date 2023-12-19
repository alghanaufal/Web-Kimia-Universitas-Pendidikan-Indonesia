@extends('depan.layout')
@section('konten')

    <a href="{{route('depan.akademik')}}" >
      <img class="back_btn" src="{{ asset('depan') }}/images/back.png" alt="button">
    </a> 
    <!-- start content -->
    <div class="custom_heading-container">
      <h2 class="riset_menu-title">PENERIMAAN MAHASISWA</h2>
    </div>
    <div class="pedoman-container">
    <div class="pedoman-title">Sarjana</div>
    @foreach ($data as $item)
      @if($item->detail_tipe === 'Sarjana')
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
      @endif
    @endforeach
    <div class="pedoman-title">Magister</div>
    @foreach ($data as $item)
      @if($item->detail_tipe === 'Magister')
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
      @endif
    @endforeach
      </div>
    <!-- end content -->

  @endsection