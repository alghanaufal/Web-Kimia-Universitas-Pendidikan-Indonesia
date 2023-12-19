@extends('depan.layout')
@section('konten')

    <!-- content section -->
    <div class="custom_heading-container">
      <h2 class="riset_menu-title">JURNAL</h2>
    </div>
    @foreach($data as $item)
      <div class="riset_menu">
        <h3 class="riset_menu-subtitle">{{$item->judul}}</h3>
        <div class="space"></div>
        <div class="custom_heading-container">
          <main class="content">
            <a href="{{$item->link}}" class="cta"
              >Kunjungi</a
            >
            {{-- <a href="https://ejournal.upi.edu/index.php/CI/" class="cta"
              >Kunjungi</a
            > --}}
          </main>
        </div>
      </div>
    @endforeach
    <!-- end content section -->
@endsection