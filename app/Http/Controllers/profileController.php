<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    function index()
    {
        // return view('dashboard.profile.index');
        $datadosen = dosen::orderBy('nama', 'asc')->get();
        return view("dashboard.prodi.index")->with('datadosen', $datadosen);
    }

    function update(Request $request)
    {
        $request->validate([
            '_judul' => 'required',
            '_isi' => 'required',
            '_visi' => 'required',
            '_misi' => 'required',
            // '_kaprodi' => 'required',
            '_foto' => 'mimes:jpeg,jpg,png,gif',
            // '_pimpinan1' => 'required',
            // '_pimpinan2' => 'required',
            // '_pimpinan3' => 'required',
            // '_pimpinan4' => 'required',
            // '_koordinator1' => 'required',
            // '_koordinator2' => 'required',
            // '_koordinator3' => 'required',
            // '_koordinator4' => 'required',
        ], [
            '_judul.required' => 'Judul wajib diisi',
            '_isi.required' => 'Deskripsi wajib diisi',
            '_visi.required' => 'Visi wajib diisi',
            '_misi.required' => 'Misi wajib diisi',
            // '_kaprodi.required' => 'Ketua Program Studi wajib diisi',
            '_foto.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
            // '_pimpinan1.required' => 'Pimpinan 1 wajib diisi',
            // '_pimpinan2.required' => 'Pimpinan 2 Studi wajib diisi',
            // '_pimpinan3.required' => 'Pimpinan 3 Studi wajib diisi',
            // '_pimpinan4.required' => 'Pimpinan 4 Studi wajib diisi',
            // '_koordinator1.required' => 'Koordinator 1 wajib diisi',
            // '_koordinator2.required' => 'Koordinator 2 wajib diisi',
            // '_koordinator3.required' => 'Koordinator 3 wajib diisi',
            // '_koordinator4.required' => 'Koordinator 4 wajib diisi',
        ]);

        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto/profileProdi'), $foto_baru);
            // kalau ada update foto
            $foto_lama = get_meta_value('_foto');
            File::delete(public_path('foto/profileProdi') . "/" . $foto_lama);

            metadata::updateOrCreate(['meta_key' => '_foto'], ['meta_value' => $foto_baru]);
        }

        metadata::updateOrCreate(['meta_key' => '_judul'], ['meta_value' => $request->_judul]);
        metadata::updateOrCreate(['meta_key' => '_isi'], ['meta_value' => $request->_isi]);
        metadata::updateOrCreate(['meta_key' => '_visi'], ['meta_value' => $request->_visi]);
        metadata::updateOrCreate(['meta_key' => '_misi'], ['meta_value' => $request->_misi]);
        metadata::updateOrCreate(['meta_key' => '_kaprodi'], ['meta_value' => $request->_kaprodi]);
        // metadata::updateOrCreate(['meta_key' => '_pimpinan1'], ['meta_value' => $request->_pimpinan1]);
        // metadata::updateOrCreate(['meta_key' => '_pimpinan2'], ['meta_value' => $request->_pimpinan2]);
        // metadata::updateOrCreate(['meta_key' => '_pimpinan3'], ['meta_value' => $request->_pimpinan3]);
        // metadata::updateOrCreate(['meta_key' => '_pimpinan4'], ['meta_value' => $request->_pimpinan4]);
        // metadata::updateOrCreate(['meta_key' => '_koordinator1'], ['meta_value' => $request->_koordinator1]);
        // metadata::updateOrCreate(['meta_key' => '_koordinator2'], ['meta_value' => $request->_koordinator2]);
        // metadata::updateOrCreate(['meta_key' => '_koordinator3'], ['meta_value' => $request->_koordinator3]);
        // metadata::updateOrCreate(['meta_key' => '_koordinator4'], ['meta_value' => $request->_koordinator4]);
        
        return redirect()->route('prodi.index')->with('success', 'Berhasil update data prodi');
    }
}


// namespace App\Http\Controllers;

// use App\Models\metadata;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\File;

// class profileController extends Controller
// {
//     function index()
//     {
//         return view('dashboard.profile.index');
//     }

//     function update(Request $request)
//     {
//         $request->validate([
//             '_foto' => 'mimes:jpeg,jpg,png,gif',
//             '_email' => 'required|email'
//         ], [
//             '_foto.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
//             '_email.required' => 'Email wajib diisi',
//             '_email.email' => 'Format email yang dimasukkan tidak valid'
//         ]);

//         if ($request->hasFile('_foto')) {
//             $foto_file = $request->file('_foto');
//             $foto_ekstensi = $foto_file->extension();
//             $foto_baru = date('ymdhis') . ".$foto_ekstensi";
//             $foto_file->move(public_path('foto'), $foto_baru);
//             // kalau ada update foto
//             $foto_lama = get_meta_value('_foto');
//             File::delete(public_path('foto') . "/" . $foto_lama);

//             metadata::updateOrCreate(['meta_key' => '_foto'], ['meta_value' => $foto_baru]);
//         }

//         metadata::updateOrCreate(['meta_key' => '_email'], ['meta_value' => $request->_email]);
//         metadata::updateOrCreate(['meta_key' => '_kota'], ['meta_value' => $request->_kota]);
//         metadata::updateOrCreate(['meta_key' => '_provinsi'], ['meta_value' => $request->_provinsi]);
//         metadata::updateOrCreate(['meta_key' => '_nohp'], ['meta_value' => $request->_nohp]);


//         metadata::updateOrCreate(['meta_key' => '_facebook'], ['meta_value' => $request->_facebook]);
//         metadata::updateOrCreate(['meta_key' => '_twitter'], ['meta_value' => $request->_twitter]);
//         metadata::updateOrCreate(['meta_key' => '_linkedin'], ['meta_value' => $request->_linkedin]);
//         metadata::updateOrCreate(['meta_key' => '_github'], ['meta_value' => $request->_github]);

//         return redirect()->route('profile.index')->with('success', 'Berhasil update data profile');
//     }
// }
