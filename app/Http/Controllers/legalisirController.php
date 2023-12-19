<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class legalisirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = mahasiswa::orderBy('id', 'asc')->where('tipe', 'Legalisir')->first();
        return view('dashboard.legalisir.index')->with('data', $data);
    }


    public function update(Request $request)
    {
        $request->validate(
            [
                'judul' =>'required',
                '_foto' => 'mimes:jpeg,jpg,png,gif',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                '_foto.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
            ]
        );

        $foto_baru = NULL;
        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto/legalisir'), $foto_baru);

            $data = mahasiswa::where('tipe', 'Legalisir')->first();
            $foto_lama = $data->foto;
            File::delete(public_path('foto/legalisir') . "/" . $foto_lama);        
        }else {
            $data = mahasiswa::where('tipe', 'Legalisir')->first();
            $foto_baru = $data->foto;
        }

        $data = [
            'judul' => $request->judul,
            'tipe' => 'Legalisir',
            'foto' => $foto_baru,
            'isi' => $request->isi,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'link' => $request->link
        ];

        mahasiswa::where('tipe', 'Legalisir')->update($data);

        return redirect()->route('legalisir.index')->with('success', 'Berhasil mengupdate data');
    }

    
}
