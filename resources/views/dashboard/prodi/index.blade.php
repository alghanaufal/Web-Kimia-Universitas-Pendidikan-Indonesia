@extends('dashboard.layout')

@section('konten')
    <form action="{{ route('prodi.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
                <h3>Profile Program Studi Kimia</h3>
                <div class="mb-3">
                    <label for="_judul" class="form-label">Judul</label>
                    <input type="text"
                      class="form-control form-control-sm" name="_judul" id="_judul" aria-describedby="helpId" placeholder="Judul" value="{{get_meta_value('_judul') }}">
                </div>
                <div class="mb-3">
                      <label for="_isi" class="form-label">Deskripsi</label>
                      <textarea name="_isi" rows="5" class="form-control summernote">{{get_meta_value('_isi')}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="_visi" class="form-label">Visi</label>
                    <textarea name="_visi" rows="5" class="form-control summernote">{{get_meta_value('_visi')}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="_misi" class="form-label">Misi</label>
                    <textarea name="_misi" rows="5" class="form-control summernote">{{get_meta_value('_misi')}}</textarea>
                </div>
                @if (get_meta_value('_foto'))
                <img style="max-width:100px;max-height:100px" src="{{ asset('foto/profileProdi') . '/' . get_meta_value('_foto') }}">
                @endif
                <div class="mb-3">
                    <label for="_foto" class="form-label">Foto Struktur Organisasi</label>
                    <input type="file" class="form-control form-control-sm" name="_foto" id="_foto">   
                </div>
                {{-- <div class="form-group row">
                    <label class="col-sm-2">Ketua Prodi</label>
                    <div class="col-sm-6">
                        <select class="form-control form-control-sm" name="_kaprodi">
                            <option value="">-pilih-</option>
                            @foreach ($datadosen as $item)
                                <option value="{{ $item->nama }}"
                                    {{ get_meta_value('_kaprodi') == $item->nama ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Pimpinan 1</label>
                    <div class="col-sm-6">
                        <select class="form-control form-control-sm" name="_pimpinan1">
                            <option value="">-pilih-</option>
                            @foreach ($datadosen as $item)
                                <option value="{{ $item->nama }}"
                                    {{ get_meta_value('_pimpinan1') == $item->nama ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Pimpinan 2</label>
                    <div class="col-sm-6">
                        <select class="form-control form-control-sm" name="_pimpinan2">
                            <option value="">-pilih-</option>
                            @foreach ($datadosen as $item)
                                <option value="{{ $item->nama }}"
                                    {{ get_meta_value('_pimpinan2') == $item->nama ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Pimpinan 3</label>
                    <div class="col-sm-6">
                        <select class="form-control form-control-sm" name="_pimpinan3">
                            <option value="">-pilih-</option>
                            @foreach ($datadosen as $item)
                                <option value="{{ $item->nama }}"
                                    {{ get_meta_value('_pimpinan3') == $item->nama ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Pimpinan 4</label>
                    <div class="col-sm-6">
                        <select class="form-control form-control-sm" name="_pimpinan4">
                            <option value="">-pilih-</option>
                            @foreach ($datadosen as $item)
                                <option value="{{ $item->nama }}"
                                    {{ get_meta_value('_pimpinan4') == $item->nama ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Koordinator 1</label>
                    <div class="col-sm-6">
                        <select class="form-control form-control-sm" name="_koordinator1">
                            <option value="">-pilih-</option>
                            @foreach ($datadosen as $item)
                                <option value="{{ $item->nama }}"
                                    {{ get_meta_value('_koordinator1') == $item->nama ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Koordinator 2</label>
                    <div class="col-sm-6">
                        <select class="form-control form-control-sm" name="_koordinator2">
                            <option value="">-pilih-</option>
                            @foreach ($datadosen as $item)
                                <option value="{{ $item->nama }}"
                                    {{ get_meta_value('_koordinator2') == $item->nama ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Koordinator 3</label>
                    <div class="col-sm-6">
                        <select class="form-control form-control-sm" name="_koordinator3">
                            <option value="">-pilih-</option>
                            @foreach ($datadosen as $item)
                                <option value="{{ $item->nama }}"
                                    {{ get_meta_value('_koordinator3') == $item->nama ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Koordinator 4</label>
                    <div class="col-sm-6">
                        <select class="form-control form-control-sm" name="_koordinator4">
                            <option value="">-pilih-</option>
                            @foreach ($datadosen as $item)
                                <option value="{{ $item->nama }}"
                                    {{ get_meta_value('_koordinator4') == $item->nama ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
        </div>

        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
