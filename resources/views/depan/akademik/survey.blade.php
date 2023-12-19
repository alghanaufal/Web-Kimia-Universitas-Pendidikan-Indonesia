@extends('depan.layout')
@section('konten')

    <!-- content section -->
    <a href="{{route('depan.akademik')}}" >
      <img class="back_btn" src="{{ asset('depan') }}/images/back.png" alt="button">
    </a> 
    <div class="custom_heading-container">
        <h2 class="riset_menu-title">SURVEY KEPUASAN MAHASISWA</h2>
    </div>

    @foreach($data as $item)
    <div class = "pedoman-container">
        <div class="pedoman-download_container">
            <div class="tracer-download_filename">
                {{$item->judul}}
            </div>
            <a href="{{$item->link}}" class="pedoman-download_button">Kunjungi</a>
        </div>
    </div>
    @endforeach

    <!-- end content section -->
    @endsection