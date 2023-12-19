@extends('depan.layout')
@section('konten')
  <div class="custom_heading-container">
    <main class="content">
      <a href="{{route('depan.informasi.berita')}}" class="cta">Berita</a>
      <a href="{{route('depan.informasi.agenda')}}" class="cta">Agenda</a>
      <a href="{{route('depan.informasi.kegiatan')}}" class="cta">Kegiatan</a>
      <a href="{{route('depan.informasi.pengumuman')}}" class="cta">Pengumuman</a>
      <a href="{{route('depan.informasi.sistem')}}" class="cta">Sistem Penjaminan Mutu</a>
    </main>
  </div>
  <div class="custom_heading-container">
    @if($data->count() != 0)
      <h2 class="visimisi-title">{{$data[0]->tipe}}</h2>
    @else
    <h2 class="visimisi-title">INFORMASI</h2></br></br></br>
    @endif
  </div>

  @php $k = 0 @endphp
  @for ($i = 0; $i < ceil($data->count() / 3); $i++)
  {{-- <tr> --}}
    <div class="berita_main-container">
      @for ($j = 0; $j < 3; $j++)
          @if ($k < $data->count())
              {{-- <td> --}}
                <div class="berita-container">
                  <a href="{{ route('depan.informasi.detail', ['id' => $data[$k]->id]) }}">
                    <img src="{{ asset('foto/informasi') . '/' . $data[$k]->foto }}" alt="" class="img-berita">
                    <p class="berita-tanggal">{{ $data[$k]->tgl_mulai }}</p>
                    <p class="berita-title">{{ $data[$k]->judul }}</p>
                  </a>
                  <div class="berita-desc">{!! $data[$k]->isi !!}</div>
                </div>
              {{-- </td> --}}
              @php $k++ @endphp
          @endif
          @endfor
          <br>
    </div>
{{-- </tr> --}}
@endfor
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
@endsection