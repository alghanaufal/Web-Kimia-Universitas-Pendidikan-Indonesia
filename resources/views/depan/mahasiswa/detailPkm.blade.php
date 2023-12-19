@extends('depan.layout')
@section('konten')
    <!-- content section -->
    <div class="custom_heading-container">
      <h2 class="riset_menu-title">{{ $data->judul }}</h2>
    </div>

    <center>
      <div class="berita_detail-date">{{ $data->tgl_mulai }}</div>
      <div class="berita_detail-img">
        <img src="{{ asset('foto/pkm') . '/' . $data->foto }}" alt="" />
      </div>
    </center>

    <div class="berita_detail-isi">
        {!! $data->isi !!}
    </div>
    <!-- end content section -->
@endsection