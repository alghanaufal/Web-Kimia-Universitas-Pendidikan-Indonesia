@extends('depan.layout')
@section('konten')
    <!-- content section -->
    <div class="custom_heading-container">
      <h2 class="riset_menu-title">{{ $data->judul }}</h2>
    </div>

    <center>
      <div class="berita_detail-date">{{ $data->tgl_mulai }}</div>
      <div class="berita_detail-img">
        <img src="{{ asset('foto/informasi') . '/' . $data->foto }}" alt="" />
      </div>
    </center>

    <div class="berita_detail-isi">
        {!! $data->isi !!}
    </div>

    <section class="health_section layout_padding">
      <div class="health_carousel-container">
        <h3 class="main_title">update terbaru</h3>
        <!-- <div class="d-flex justify-content-between">
          
        </div> -->
        {{-- <button type="button" class="btn btn-info" href="{{route('depan.informasi.berita')}}"> Berita Lainnya </button> --}}
        <a href="{{route('depan.informasi.berita')}}" class="custom-btn btn-15"> 
          Berita Lainnya
          </a>
        <div class="carousel-wrap layout_padding2">
          <div class="owl-carousel owl-2">
            @php $counter = 0 @endphp
            @foreach ($dataTerbaru as $item)
              @if ($counter < 5)
                <div class="item">
                  <div class="box">
                    <div class="img-box">
                      <img src="{{ asset('foto/informasi') . '/' . $item->foto }}" alt="" />
                    </div>
                    <div class="detail-box">
                      <div class="text">
                        <h6>{{ $item->judul }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
              @php $counter++ @endphp
            @endforeach

          </div>
        </div>
      </div>
    </section>
    <!-- end content section -->
@endsection