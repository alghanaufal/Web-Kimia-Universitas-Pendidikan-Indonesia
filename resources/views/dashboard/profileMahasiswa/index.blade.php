@extends('dashboard.layout')

@section('konten')
    <form action="{{ route('profileMahasiswa.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
            <div class="col-5">
                <h3>BEM HMK</h3>
                <div class="mb-3">
                    <label for="mhs_bem_tahun" class="form-label">Tahun Kepengurusan</label>
                    <input type="text" class="form-control form-control-sm" name="mhs_bem_tahun" id="mhs_bem_tahun"
                        value="{{ get_meta_value('mhs_bem_tahun') }}">
                </div>
                @if (get_meta_value('mhs_bem_logo'))
                    <img style="max-width:100px;max-height:100px" src="{{ asset('foto/profileMahasiswa') . '/' . get_meta_value('mhs_bem_logo') }}">
                @endif
                <div class="mb-3">
                    <label for="mhs_bem_logo" class="form-label">Logo Kabinet</label>
                    <input type="file" class="form-control form-control-sm" name="mhs_bem_logo" id="mhs_bem_logo">   
                </div>
                <div class="mb-3">
                    <label for="mhs_bem_nama" class="form-label">Nama Kabinet</label>
                    <input type="text" class="form-control form-control-sm" name="mhs_bem_nama" id="mhs_bem_nama"
                        value="{{ get_meta_value('mhs_bem_nama') }}">
                </div>
                {{-- <div class="mb-3">
                    <label for="mhs_bem_visi" class="form-label">Visi</label>
                    <textarea name="mhs_bem_visi" rows="5" class="form-control summernote">{{get_meta_value('mhs_bem_visi')}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="mhs_bem_misi" class="form-label">Misi</label>
                    <textarea name="mhs_bem_misi" rows="5" class="form-control summernote">{{get_meta_value('mhs_bem_misi')}}</textarea>
                </div> --}}
                <div class="mb-3">
                    <label for="mhs_bem_ketua" class="form-label">Nama Ketua</label>
                    <input type="text" class="form-control form-control-sm" name="mhs_bem_ketua" id="mhs_bem_ketua"
                        value="{{ get_meta_value('mhs_bem_ketua') }}">
                </div>
                @if (get_meta_value('mhs_bem_ketuaFoto'))
                    <img style="max-width:100px;max-height:100px" src="{{ asset('foto/profileMahasiswa') . '/' . get_meta_value('mhs_bem_ketuaFoto') }}">
                @endif
                <div class="mb-3">
                    <label for="mhs_bem_ketuaFoto" class="form-label">Foto Ketua BEM</label>
                    <input type="file" class="form-control form-control-sm" name="mhs_bem_ketuaFoto" id="mhs_bem_ketuaFoto">   
                </div>
            </div>
            <div class="col-5">
                <h3>DPM HMK</h3>
                @if (get_meta_value('mhs_dpm_logo'))
                    <img style="max-width:100px;max-height:100px" src="{{ asset('foto/profileMahasiswa') . '/' . get_meta_value('mhs_dpm_logo') }}">
                @endif
                <div class="mb-3">
                    <label for="mhs_dpm_logo" class="form-label">Logo Parlemen</label>
                    <input type="file" class="form-control form-control-sm" name="mhs_dpm_logo" id="mhs_dpm_logo">   
                </div>
                <div class="mb-3">
                    <label for="mhs_dpm_nama" class="form-label">Nama Parlemen</label>
                    <input type="text" class="form-control form-control-sm" name="mhs_dpm_nama" id="mhs_dpm_nama"
                        value="{{ get_meta_value('mhs_dpm_nama') }}">
                </div>
                <div class="mb-3">
                    <label for="mhs_dpm_ketua" class="form-label">Nama Ketua</label>
                    <input type="text" class="form-control form-control-sm" name="mhs_dpm_ketua" id="mhs_dpm_ketua"
                        value="{{ get_meta_value('mhs_dpm_ketua') }}">
                </div>
                @if (get_meta_value('mhs_dpm_ketuaFoto'))
                    <img style="max-width:100px;max-height:100px" src="{{ asset('foto/profileMahasiswa') . '/' . get_meta_value('mhs_dpm_ketuaFoto') }}">
                @endif
                <div class="mb-3">
                    <label for="mhs_dpm_ketuaFoto" class="form-label">Foto Ketua DPM</label>
                    <input type="file" class="form-control form-control-sm" name="mhs_dpm_ketuaFoto" id="mhs_dpm_ketuaFoto">   
                </div>
            </div>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
