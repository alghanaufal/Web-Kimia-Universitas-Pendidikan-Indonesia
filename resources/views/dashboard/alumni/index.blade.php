@extends('dashboard.layout')
@section('konten')
    <p class="card-title">Informasi Alumni</p>
    <div class="pb-3"><a href="{{route('alumni.create')}}" class="btn btn-primary">+ Tambah Informasi</a></div>

    <div class="table-responsive">
        <p>Informasi Alumni</p>
        <table class="table table-stripped">
            <thead>
                <tre>
                    <th class="col-1">No</th>
                    <th>Judul</th>
                    <th class="col-2">Aksi</th>
                </tre>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                @if ($item->tipe === 'Informasi Alumni')
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{$item->judul}}</td>
                        <td>
                            <a href='{{route('alumni.edit', $item->id)}}' class="btn btn-sm btn-warning">Edit</a> 
                            <form onsubmit="return confirm('Yakin menghapus data ini?')" action="{{route('alumni.destroy', $item->id)}}" class="d-inline" method="POST">
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
        <p>Portal Alumni</p>
        <table class="table table-stripped">
            <thead>
                <tre>
                    <th class="col-1">No</th>
                    <th>Tipe</th>
                    <th>Judul</th>
                    <th class="col-2">Aksi</th>
                </tre>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                @if ( $item->tipe === 'Portal Alumni')
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{$item->detail_portal}}</td>
                        <td>{{$item->judul}}</td>
                        <td>
                            <a href='{{route('alumni.edit', $item->id)}}' class="btn btn-sm btn-warning">Edit</a> 
                            <form onsubmit="return confirm('Yakin menghapus data ini?')" action="{{route('alumni.destroy', $item->id)}}" class="d-inline" method="POST">
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