@extends('dashboard.layout')
@section('konten')
    <p class="card-title">dosen</p>
    <div class="pb-3"><a href="{{route('dosen.create')}}" class="btn btn-primary">+ Tambah Dosen</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tre>
                    <th class="col-1">No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>jabatan</th>
                    <th class="col-2">Aksi</th>
                </tre>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{$item->nip}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->jabatan}}</td>
                        <td>
                            <a href='{{route('dosen.edit', $item->id)}}' class="btn btn-sm btn-warning">Edit</a> 
                            <form onsubmit="return confirm('Yakin menghapus data ini?')" action="{{route('dosen.destroy', $item->id)}}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" name='submit'>Del</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div> 
@endsection