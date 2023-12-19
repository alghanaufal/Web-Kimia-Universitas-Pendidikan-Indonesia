@extends('depan.layout')
@section('konten')
    <div class="custom_heading-container">
      <h2 class="akademik_menu-title">pengabdian</h2>
    </div>
    @php $k = 0 @endphp
    @for ($i = 0; $i < ceil($data->count() / 3); $i++)
    {{-- <tr> --}}
      <div class="berita_main-container">
        @for ($j = 0; $j < 3; $j++)
            @if ($k < $data->count())
                {{-- <td> --}}
                  <div class="berita-container">
                    <a href="{{ route('depan.pengabdian.detail', ['id' => $data[$k]->id]) }}">
                      <img src="{{ asset('foto/pengabdian') . '/' . $data[$k]->foto }}" alt="" class="img-berita">
                      <p class="berita-tanggal">{{ $data[$k]->tgl_mulai }}</p>
                      <p class="berita-title">{{ $data[$k]->judul }}</p>
                      <div class="berita-desc">{!! $data[$k]->isi !!}</div>
                    </a>
                  </div>
                {{-- </td> --}}
                @php $k++ @endphp
            @endif
            @endfor
            <br>
      </div>
 {{--    </tr> --}}
  @endfor
  @endsection