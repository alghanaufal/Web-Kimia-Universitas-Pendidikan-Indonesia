<?php

namespace App\Http\Controllers;

use App\Models\fasilitas;
use Illuminate\Http\Request;
use App\Models\tenagaKependidikan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class tenagaKependidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view("dashboard.prodi.index")->with('datadosen', $datadosen);
        $data = tenagaKependidikan::orderBy('nama', 'asc')->get();
        return view('dashboard.tenagaKependidikan.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datafasilitas = fasilitas::where('tipe', '=', 'Laboratorium')->orderBy('nama', 'asc')->get();
        return view('dashboard.tenagaKependidikan.create')->with('datafasilitas', $datafasilitas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('isi', $request->bidang);
        Session::flash('id_lab', $request->id_lab);
        $request->validate(
            [
                'nama' =>'required',
                'bidang' =>'required',
                '_foto' => 'mimes:jpeg,jpg,png,gif',
            ],
            [
                'nama.required' => 'Nama wajib diisi',
                'bidang.required' => 'Bidang wajib diisi',
                '_foto.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
            ]
        );

        $foto_baru = NULL;
        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto/tenagaKependidikan'), $foto_baru);
      
        }

        $data = [
            'nama' => $request->nama,
            'bidang' => $request->bidang,
            'id_lab' => $request->id_lab,
            'foto' => $foto_baru,
        ];
        tenagaKependidikan::create($data);

        // return view('tenagaKependidikan.create', compact('jenis_kelamin'));

        return redirect()->route('tenagaKependidikan.index')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datafasilitas = fasilitas::where('tipe', '=', 'Laboratorium')->orderBy('nama', 'asc')->get();
        $data = tenagaKependidikan::where('id', $id)->first();
        return view('dashboard.tenagaKependidikan.edit')->with('data', $data)->with('datafasilitas', $datafasilitas);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama' =>'required',
                'bidang' =>'required',
                '_foto' => 'mimes:jpeg,jpg,png,gif',
            ],
            [
                'nama.required' => 'Nama wajib diisi',
                'bidang.required' => 'Bidang wajib diisi',
                '_foto.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
            ]
        );
        $foto_baru = NULL;
        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto/tenagaKependidikan'), $foto_baru);
            // Session::put('foto', $foto_baru);
            // dosen::create(['foto' => $foto_baru]);
            $data = tenagaKependidikan::where('id', $id)->first();
            $foto_lama = $data->foto;
            File::delete(public_path('foto/tenagaKependidikan') . "/" . $foto_lama);        
        }else {
            $data = tenagaKependidikan::where('id', $id)->first();
            $foto_baru = $data->foto;
        }


        $data = [
            'nama' => $request->nama,
            'bidang' => $request->bidang,
            'id_lab' => $request->id_lab,
            'foto' => $foto_baru,

        ];
        tenagaKependidikan::where('id', $id)->update($data);

        return redirect()->route('tenagaKependidikan.index')->with('success', 'Berhasil mengubah data');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tenagaKependidikan::where('id', $id)->delete();
        return redirect()->route('tenagaKependidikan.index')->with('success', 'Berhasil menghapus data');
    
    }
}
