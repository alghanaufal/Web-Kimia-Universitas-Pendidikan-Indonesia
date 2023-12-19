@extends('dashboard.layout')
@section('konten')
    <p class="card-title">Galeri</p>
    <div class="pb-3">
        <a href="{{route('galeri.index')}}" class="btn btn-secondary">
            << kembali
        </a>
    </div>
    <div class="row">
        @foreach ($data as $item)
        <div class="col-md-4">
            <div class="card mb-3">
                <img class="card-img-top" style="object-fit: cover; height: 200px;" src="{{ asset('foto/galeri') . '/' . $item->foto }}">
                <div class="card-body">
                    <a href='{{route('galeri.edit', $item->id)}}' class="btn btn-sm btn-warning">Edit</a>
                    <form onsubmit="return confirm('Yakin menghapus data ini?')" action="{{route('galeri.destroy', $item->id)}}" class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit" name='submit'>Del</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
