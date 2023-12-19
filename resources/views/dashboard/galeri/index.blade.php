@extends('dashboard.layout')
@section('konten')
    <p class="card-title">Galeri</p>
    <div class="pb-3"><a href="{{route('galeri.create')}}" class="btn btn-primary">+ Tambah Galeri</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Judul</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php $judulTampil = []; ?> <!-- Tambahkan array untuk melacak judul yang sudah ditampilkan -->
                @foreach ($data as $item)
                    @if (!in_array($item->judul, $judulTampil)) <!-- Periksa apakah judul sudah ditampilkan sebelumnya -->
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{$item->judul}}</td>
                            <td>
                                <a href='{{route('galeri.show', $item->judul)}}' class="btn btn-sm btn-warning">Lihat Detail</a> 
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endif
                    <?php $judulTampil[] = $item->judul; ?> <!-- Tambahkan judul ke array judulTampil -->
                @endforeach
            </tbody>
        </table>
    </div> 
@endsection
