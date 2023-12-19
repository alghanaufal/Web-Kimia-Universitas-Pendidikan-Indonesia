@extends('dashboard.layout')

@section('konten')
    <form action="{{ route('kerjaSama.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
            <h3>Program Kerja Sama</h3>
            <div class="mb-3">
                <label for="_isiKerjaSama" class="form-label">Deskripsi</label>
                <textarea name="_isiKerjaSama" rows="5" class="form-control summernote">{{get_meta_value('_isiKerjaSama')}}</textarea>
            </div>
            <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
        </form>
@endsection
