<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileMahasiswaController extends Controller
{
    function index()
    {
        return view("dashboard.profileMahasiswa.index");
    }

    function update(Request $request)
    {
        $request->validate([
            'mhs_bem_logo' => 'mimes:jpeg,jpg,png,gif',
            'mhs_bem_tahun' => 'required',
            'mhs_bem_nama' => 'required',
            // 'mhs_bem_visi' => 'required',
            // 'mhs_bem_misi' => 'required',
            'mhs_bem_ketua' => 'required',
            'mhs_bem_ketuaFoto' => 'mimes:jpeg,jpg,png,gif',
            'mhs_dpm_logo' => 'mimes:jpeg,jpg,png,gif',
            'mhs_dpm_nama' => 'required',
            'mhs_dpm_ketua' => 'required',
            'mhs_dpm_ketuaFoto' => 'mimes:jpeg,jpg,png,gif',

        ], [
            'mhs_bem_logo.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
            'mhs_bem_tahun.required' => 'Tahun kepengurusan wajib diisi',
            'mhs_bem_nama.required' => 'Nama Kabinet wajib diisi',
            // 'mhs_bem_visi.required' => 'Visi wajib diisi',
            // 'mhs_bem_misi.required' => 'Misi wajib diisi',
            'mhs_bem_ketua.required' => 'Nama Ketua BEM wajib diisi',
            'mhs_bem_ketuaFoto.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
            'mhs_dpm_logo.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
            'mhs_dpm_nama.required' => 'Nama Parlemen wajib diisi',
            'mhs_dpm_ketua.required' => 'Nama Ketua DPM  wajib diisi',
            'mhs_dpm_ketuaFoto.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
        ]);

        if ($request->hasFile('mhs_bem_logo')) {
            $foto_file = $request->file('mhs_bem_logo');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto/profileMahasiswa'), $foto_baru);
            // kalau ada update foto
            $foto_lama = get_meta_value('mhs_bem_logo');
            File::delete(public_path('foto/profileMahasiswa') . "/" . $foto_lama);

            metadata::updateOrCreate(['meta_key' => 'mhs_bem_logo'], ['meta_value' => $foto_baru]);
        }

        if ($request->hasFile('mhs_bem_ketuaFoto')) {
            $foto_file = $request->file('mhs_bem_ketuaFoto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto/profileMahasiswa'), $foto_baru);
            // kalau ada update foto
            $foto_lama = get_meta_value('mhs_bem_ketuaFoto');
            File::delete(public_path('foto/profileMahasiswa') . "/" . $foto_lama);

            metadata::updateOrCreate(['meta_key' => 'mhs_bem_ketuaFoto'], ['meta_value' => $foto_baru]);
        }

        if ($request->hasFile('mhs_dpm_logo')) {
            $foto_file = $request->file('mhs_dpm_logo');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto/profileMahasiswa'), $foto_baru);
            // kalau ada update foto
            $foto_lama = get_meta_value('mhs_dpm_logo');
            File::delete(public_path('foto/profileMahasiswa') . "/" . $foto_lama);

            metadata::updateOrCreate(['meta_key' => 'mhs_dpm_logo'], ['meta_value' => $foto_baru]);
        }

        if ($request->hasFile('mhs_dpm_ketuaFoto')) {
            $foto_file = $request->file('mhs_dpm_ketuaFoto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto/profileMahasiswa'), $foto_baru);
            // kalau ada update foto
            $foto_lama = get_meta_value('mhs_dpm_ketuaFoto');
            File::delete(public_path('foto/profileMahasiswa') . "/" . $foto_lama);

            metadata::updateOrCreate(['meta_key' => 'mhs_dpm_ketuaFoto'], ['meta_value' => $foto_baru]);
        }

        metadata::updateOrCreate(['meta_key' => 'mhs_bem_tahun'], ['meta_value' => $request->mhs_bem_tahun]);
        metadata::updateOrCreate(['meta_key' => 'mhs_bem_nama'], ['meta_value' => $request->mhs_bem_nama]);
        // metadata::updateOrCreate(['meta_key' => 'mhs_bem_visi'], ['meta_value' => $request->mhs_bem_visi]);
        // metadata::updateOrCreate(['meta_key' => 'mhs_bem_misi'], ['meta_value' => $request->mhs_bem_misi]);
        metadata::updateOrCreate(['meta_key' => 'mhs_bem_ketua'], ['meta_value' => $request->mhs_bem_ketua]);
        metadata::updateOrCreate(['meta_key' => 'mhs_dpm_nama'], ['meta_value' => $request->mhs_dpm_nama]);
        metadata::updateOrCreate(['meta_key' => 'mhs_dpm_ketua'], ['meta_value' => $request->mhs_dpm_ketua]);
        
        return redirect()->route('profileMahasiswa.index')->with('success', 'Berhasil update data HMK');
    }
}
