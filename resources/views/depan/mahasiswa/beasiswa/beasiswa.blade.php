@extends('depan.layout')
@section('konten')

    <!-- content section -->
    <div class="custom_heading-container">
        <main class="content">
          <a href="{{route('depan.mahasiswa')}}" class="cta">Kemahasiswaan</a>
          <a href="{{route('depan.alumni')}}" class="cta">Alumni</a>
          <a href="{{route('depan.beasiswa')}}" class="cta">Beasiswa</a>
        </main>
      </div>

      <div class="custom_heading-container">
        <h2 class="visimisi-title">beasiswa</h2>
      </div>
    
    @php $k = 0 @endphp
    @for ($i = 0; $i < ceil($data->count() / 3); $i++)
      <div class="berita_main-container">
        @for ($j = 0; $j < 3; $j++)
            @if ($k < $data->count())
                  <div class="berita-container">
                    <a href="{{ route('depan.mahasiswa.detail', ['id' => $data[$k]->id]) }}">
                    <img src="{{ asset('foto/mahasiswa') . '/' . $data[$k]->foto }}" alt="" class="img-berita">
                    <p class="berita-tanggal">{{ $data[$k]->tgl_mulai }} - {{ $data[$k]->tgl_akhir }}</p>
                    <p class="berita-title">{{ $data[$k]->judul }}</p>
                    <div class="berita-desc">{!! $data[$k]->isi !!}</div>
                  </div>
                @php $k++ @endphp
            @endif
            @endfor
            <br>
      </div>
  @endfor

  {{-- $data->links('pagination::bootstrap-4') --}}

  <!-- <nav aria-label="Page navigation example">
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
    </nav> -->
    <!-- end content section -->
@endsection