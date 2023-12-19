@extends('dashboard.layout')
@section('konten')
    <p class="card-title">PKM</p>
    <div class="pb-3"><a href="{{route('pkm.create')}}" class="btn btn-primary">+ Tambah PKM</a></div>
    <div class="table-responsive">
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
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{$item->judul}}</td>
                        <td>
                            <a href='{{route('pkm.edit', $item->id)}}' class="btn btn-sm btn-warning">Edit</a> 
                            <form onsubmit="return confirm('Yakin menghapus data ini?')" action="{{route('pkm.destroy', $item->id)}}" class="d-inline" method="POST">
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