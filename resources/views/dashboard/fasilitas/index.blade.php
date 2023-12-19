@extends('dashboard.layout')
@section('konten')
    <p class="card-title">Fasilitas</p>
    <div class="pb-3"><a href="{{route('fasilitas.create')}}" class="btn btn-primary">+ Tambah Fasilitas</a></div>
    <div class="table-responsive">
        <p>Fasilitas Umum Fakultas</p>
        <table class="table table-stripped">
            <thead>
                <tre>
                    <th class="col-1">No</th>
                    <th>Nama</th>
                    <th class="col-2">Aksi</th>
                </tre>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    @if ($item->tipe === 'Fasilitas Umum')
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{$item->nama}}</td>
                        <td>
                            <a href='{{route('fasilitas.edit', $item->id)}}' class="btn btn-sm btn-warning">Edit</a> 
                            <form onsubmit="return confirm('Yakin menghapus data ini?')" action="{{route('fasilitas.destroy', $item->id)}}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" name='submit'>Del</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div> 
    <div class="table-responsive">
        <p>Laboratorium</p>
        <table class="table table-stripped">
            <thead>
                <tre>
                    <th class="col-1">No</th>
                    <th>Nama</th>
                    <th class="col-2">Aksi</th>
                </tre>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                @if ($item->tipe === 'Laboratorium')
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{$item->nama}}</td>
                        <td>
                            <a href='{{route('fasilitas.edit', $item->id)}}' class="btn btn-sm btn-warning">Edit</a> 
                            <form onsubmit="return confirm('Yakin menghapus data ini?')" action="{{route('fasilitas.destroy', $item->id)}}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" name='submit'>Del</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div> 
@endsection