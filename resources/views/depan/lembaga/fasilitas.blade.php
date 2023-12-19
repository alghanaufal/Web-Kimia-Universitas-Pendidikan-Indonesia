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

<div class="custom_heading-container">
    <h1 class="riset_menu-title">FASILITAS UMUM</h1>
</div>
@foreach ($fasilitas as $item)
    @if ($item->tipe === 'Fasilitas Umum')
    <div class="fasilitas-container">
            <h1>{{ $item->nama }}</h1>
            <div class="fasilitas-slider">
                @if($item->foto)
                    <div class="fasilitas-slider_img">
                        <img src="{{ asset('foto/fasilitas') . '/' . $item->foto }}" alt="Image 1">  
                    </div>
                @endif
                @if($item->foto2)
                    <div class="fasilitas-slider_img">
                        <img src="{{ asset('foto/fasilitas') . '/' . $item->foto2 }}" alt="Image 2">
                    </div>
                @endif
                @if($item->foto3)
                    <div class="fasilitas-slider_img">
                        <img src="{{ asset('foto/fasilitas') . '/' . $item->foto3 }}" alt="Image 3">            
                    </div>
                @endif
                @if($item->foto4)
                    <div class="fasilitas-slider_img">
                        <img src="{{ asset('foto/fasilitas') . '/' . $item->foto4 }}" alt="Image 4">
                    </div>
                @endif
                @if($item->foto5)
                    <div class="fasilitas-slider_img">
                        <img src="{{ asset('foto/fasilitas') . '/' . $item->foto5 }}" alt="Image 5">            
                    </div>
                @endif
            </div>
        </div>
    @endif
@endforeach

<div class="custom_heading-container">
    <h1 class="riset_menu-title">LABORATORIUM</h1>
</div>
<!-- content section -->
@foreach ($fasilitas as $item)
    @if ($item->tipe === 'Laboratorium')
        <div class="fasilitas-lab_container">
            <h1>Laboratorium {{ $item->nama }}</h1>
            <div class="fasilitas-lab_descvideo">
                <div class="left-content">
                {!! $item->isi !!}
                </div>
                <div class="right-img">
                    <iframe
                    width="300"
                    height="150"
                    src="{{ $item->link }}"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                ></iframe>
                </div>
            </div>
        </div>
        </br>
        <div class="fasilitas-container">
            <div class="fasilitas-slider">
                @if($item->foto)
                    <div class="fasilitas-slider_img">
                        <img src="{{ asset('foto/fasilitas') . '/' . $item->foto }}" alt="Image 1">  
                    </div>
                @endif
                @if($item->foto2)
                    <div class="fasilitas-slider_img">
                        <img src="{{ asset('foto/fasilitas') . '/' . $item->foto2 }}" alt="Image 2">
                    </div>
                @endif
                @if($item->foto3)
                    <div class="fasilitas-slider_img">
                        <img src="{{ asset('foto/fasilitas') . '/' . $item->foto3 }}" alt="Image 3">            
                    </div>
                @endif
                @if($item->foto4)
                    <div class="fasilitas-slider_img">
                        <img src="{{ asset('foto/fasilitas') . '/' . $item->foto4 }}" alt="Image 4">
                    </div>
                @endif
                @if($item->foto5)
                    <div class="fasilitas-slider_img">
                        <img src="{{ asset('foto/fasilitas') . '/' . $item->foto5 }}" alt="Image 5">            
                    </div>
                @endif
            </div>
        </div>
    @endif
@endforeach
@endsection