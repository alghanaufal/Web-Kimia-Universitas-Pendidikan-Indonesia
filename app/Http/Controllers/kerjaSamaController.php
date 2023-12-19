<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use App\Models\kerjaSama;
use Illuminate\Http\Request;

class kerjaSamaController extends Controller
{
    public function index()
    {
        // return view('dashboard.prodi.index');
        // $datadosen = dosen::orderBy('nama', 'asc')->get();
        return view("dashboard.kerjaSama.index");
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                '_isiKerjaSama' =>'required',
            ],[
                '_isiKerjaSama.required' => 'Isian tulisan wajib diisi',
            ]
        );

        metadata::updateOrCreate(['meta_key' => '_isiKerjaSama'], ['meta_value' => $request->_isiKerjaSama]);

        return redirect()->route('kerjaSama.index')->with('success', 'Berhasil update data prodi');
    }
}
