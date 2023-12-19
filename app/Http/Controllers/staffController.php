<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use App\Models\staff;
use App\Models\posisi;
use App\Models\fasilitas;
use Illuminate\Http\Request;

class staffController extends Controller
{
    function index()
    {
        $data = staff::orderBy('id', 'asc')->get();
        $datadosen = dosen::orderBy('nama', 'asc')->get();
        $datalab = fasilitas::where('tipe', '=', 'Laboratorium')->orderBy('nama', 'asc')->get();
        $dataposisi = posisi::orderBy('nama', 'asc')->get();
        return view("dashboard.staff.index")->with('data', $data)->with('datadosen', $datadosen)->with('datalab', $datalab)->with('dataposisi', $dataposisi);
    }

    function update(Request $request)
    {

        $n = $request->input('i');
        $m = $request->input('j');
        $dsn = 1;

        
        for ($i = 1; $i <= $n; $i++) 
        {
            $request->validate([
                'id_dosen' . $i => 'required',
            ], [
                'id_dosen' . $i . 'required' => 'Dosen wajib diisi',
            ]);
            $id_posisi = $request->input('id_posisi'. $i);
            $id_dosen = $request->input('id_dosen'. $i);
            staff::updateOrCreate(['id_posisi' => $id_posisi], ['id_dosen' => $id_dosen]);
        }
        for ($i = 1; $i <= $m; $i++) 
        {
            $request->validate([
                'id_dosen' . $i+$n => 'required',
            ], [
                'id_dosen' . $i+$n . 'required' => 'Dosen wajib diisi',
            ]);
            $id_lab = $request->input('id_lab'. $i);
            $id_dosen = $request->input('id_dosen'. $i+$n);
            staff::updateOrCreate(['id_lab' => $id_lab], ['id_dosen' => $id_dosen]);
        }
          
        return redirect()->route('staff.index')->with('success', 'Berhasil update data');
    }

}
