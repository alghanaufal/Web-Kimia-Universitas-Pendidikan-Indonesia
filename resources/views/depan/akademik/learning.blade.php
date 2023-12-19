@extends('depan.layout')
@section('konten')
    <!-- content section -->
    <a href="{{route('depan.akademik')}}" >
      <img class="back_btn" src="{{ asset('depan') }}/images/back.png" alt="button">
    </a> 
    <div class="custom_heading-container">
        <h2 class="riset_menu-title">LEARNING MANAGEMENT SYSTEM</h2>
    </div>

    <div class = "pedoman-container">
        @foreach ($data as $item)
        <div class="pedoman-download_container">
            <div class="learningMS-download_filename">
                {{$item->judul  }}
            </div>
            <a href="{{$item->link}}" class="pedoman-download_button">Kunjungi</a>
        </div>
        @endforeach
        
    </div>

    <br/>
    <!-- end content section -->
@endsection