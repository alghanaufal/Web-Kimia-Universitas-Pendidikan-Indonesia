@extends('depan.layout')
@section('konten')
    <div class="custom_heading-container">
      <h2 class="riset_menu-title">portal alumni</h2>
    </div>

    <div class="portal_menu-container">
      <h4 class="portal-subtitle">Isi Form Tracer Study Alumni <br>Program Strudi Kimia</h4>
      <div class="space"></div>
      <div class="custom_heading-container">
        <main class="content">
          <a href="https://docs.google.com/forms/d/e/1FAIpQLScHmJ6nl1ZpkiOhhO8bJnKcEdfzKZZs8m1lLtKnR_UF8Cvdnw/viewform" class="cta">
            Kunjungi
          </a>
        </main>
      </div>
      </main>
    </div>

    <h3 class="akademik_menu-subtitle">Surat Alumni</h3>
    @php $k = 0 @endphp
    @for ($i = 0; $i < ceil($data->count() / 3); $i++)
    {{-- <tr> --}}
      <div class="berita_main-container">
        @for ($j = 0; $j < 3; $j++)
            @if ($k < $data->count())
              @if($data[$k]->detail_portal === 'Surat')
                {{-- <td> --}}
                  <div class="berita-container">
                    <a href="{{ route('depan.mahasiswa.alumnidetail', ['id' => $data[$k]->id]) }}">
                      <img src="{{ asset('foto/alumni') . '/' . $data[$k]->foto }}" alt="" class="img-berita">
                    <p class="berita-tanggal">{{ $data[$k]->tgl_mulai }}</p>
                    <p class="berita-title">{{ $data[$k]->judul }}</p>
                    <div class="berita-desc">{!! $data[$k]->isi !!}</div>
                  </div>
                {{-- </td> --}}
                @endif
                @php $k++ @endphp
            @endif
            @endfor
            <br>
      </div>
 {{--    </tr> --}}
  @endfor
  <h3 class = "akademik_menu-subtitle">Lowongan Kerja</h3>
  @php $k = 0 @endphp
  @for ($i = 0; $i < ceil($data->count() / 3); $i++)
  {{-- <tr> --}}
    <div class="berita_main-container">
      @for ($j = 0; $j < 3; $j++)
          @if ($k < $data->count())
            @if($data[$k]->detail_portal === 'Lowongan')
              {{-- <td> --}}
                <div class="berita-container">
                  <img src="{{ asset('foto/alumni') . '/' . $data[$k]->foto }}" alt="" class="img-berita">
                  <p class="berita-tanggal">{{ $data[$k]->tgl_mulai }}</p>
                  <p class="berita-title">{{ $data[$k]->judul }}</p>
                  <div class="berita-desc">{!! $data[$k]->isi !!}</div>
                </div>
              {{-- </td> --}}
            @endif
            @php $k++ @endphp
          @endif
          @endfor
          <br>
    </div>
{{--    </tr> --}}
  @endfor
    </section>
@endsection