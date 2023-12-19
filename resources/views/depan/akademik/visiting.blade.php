@extends('depan.layout')
@section('konten')
    </div>
    <section class="layout_padding">
      <a href="{{route('depan.akademik')}}" >
        <img class="back_btn" src="{{ asset('depan') }}/images/back.png" alt="button">
      </a> 
      <div class="custom_heading-container">
        <h2 class="riset_menu-title">
          Visiting Professor
        </h2>
      </div>
      @php $k = 0 @endphp
    @for ($i = 0; $i < ceil($data->count() / 3); $i++)
    {{-- <tr> --}}
      <div class="berita_main-container">
        @for ($j = 0; $j < 3; $j++)
            @if ($k < $data->count())
                {{-- <td> --}}
                  <div class="berita-container">
                    <a href="{{ route('depan.akademik.detail', ['id' => $data[$k]->id]) }}">
                    <img src="{{ asset('foto/akademik') . '/' . $data[$k]->foto }}" alt="" class="img-berita">
                    <p class="berita-tanggal">{{ $data[$k]->tgl_mulai }}</p>
                    <p class="berita-title">{{ $data[$k]->judul }}</p>
                    <div class="berita-desc">{!! $data[$k]->isi !!}</div>
                  </div>
                {{-- </td> --}}
                @php $k++ @endphp
            @endif
            @endfor
            <br>
      </div>
 {{--</tr> --}}
  ``@endfor
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
    </section>
  @endsection