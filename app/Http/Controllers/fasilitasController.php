<?php

namespace App\Http\Controllers;

use App\Models\fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class fasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = fasilitas::orderBy('tipe', 'asc')->get();
        return view('dashboard.fasilitas.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.fasilitas.create');
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
        // Session::flash('isi', $request->isi);
        Session::flash('link', $request->link);
        $request->validate(
            [
                'nama' =>'required',
                // 'isi' =>'required',
                'tipe' =>'required',
                '_foto1' => 'mimes:jpeg,jpg,png,gif',
                '_foto2' => 'mimes:jpeg,jpg,png,gif',
                '_foto3' => 'mimes:jpeg,jpg,png,gif',
                '_foto4' => 'mimes:jpeg,jpg,png,gif',
                '_foto5' => 'mimes:jpeg,jpg,png,gif',
            ],
            [
                'nama.required' => 'nama wajib diisi',
                // 'isi.required' => 'Isian tulisan wajib diisi',
                'tipe.required' => 'Tipe wajib diisi',
                '_foto1.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
                '_foto2.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
                '_foto3.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
                '_foto4.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
                '_foto5.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
            ]
        );

        $foto_baru = [];

        for ($i = 1; $i <= 5; $i++) {
            $foto_baru[$i] = NULL;
            if ($request->hasFile("_foto$i")) {
                $foto_file = $request->file("_foto$i");
                $foto_ekstensi = $foto_file->extension();
                $foto_baru[$i] = $i . date('ymdhis') . ".$foto_ekstensi";
                $foto_file->move(public_path('foto/fasilitas'), $foto_baru[$i]);
            }
        }
        
        $data = [
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'isi' => $request->isi,
            'link' => $request->link,
            'foto' => $foto_baru[1],
            'foto2' => $foto_baru[2],
            'foto3' => $foto_baru[3],
            'foto4' => $foto_baru[4],
            'foto5' => $foto_baru[5],
        ];
        fasilitas::create($data);
        
        return redirect()->route('fasilitas.index')->with('success', 'Berhasil menambahkan data');        
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
        $data = fasilitas::where('id', $id)->first();
        return view('dashboard.fasilitas.edit')->with('data', $data);
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
                // 'isi' =>'required',
                'tipe' =>'required',
                '_foto1' => 'mimes:jpeg,jpg,png,gif',
                '_foto2' => 'mimes:jpeg,jpg,png,gif',
                '_foto3' => 'mimes:jpeg,jpg,png,gif',
                '_foto4' => 'mimes:jpeg,jpg,png,gif',
                '_foto5' => 'mimes:jpeg,jpg,png,gif',
            ],
            [
                'nama.required' => 'nama wajib diisi',
                // 'isi.required' => 'Isian tulisan wajib diisi',
                'tipe.required' => 'Tipe wajib diisi',
                '_foto1.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
                '_foto2.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
                '_foto3.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
                '_foto4.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
                '_foto5.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
            ]
        );
        $foto_baru = [];

        for ($i = 1; $i <= 5; $i++) {
            $foto_baru[$i] = NULL;
            if ($request->hasFile("_foto$i")) {
                $foto_file = $request->file("_foto$i");
                $foto_ekstensi = $foto_file->extension();
                $foto_baru[$i] = $i . date('ymdhis') . ".$foto_ekstensi";
                $foto_file->move(public_path('foto/fasilitas'), $foto_baru[$i]);

                $data = fasilitas::where('id', $id)->first();
                $foto_lama = $data->{"foto$i"};
                File::delete(public_path('foto/fasilitas') . "/" . $foto_lama);   
            }
            else {
                $data = fasilitas::where('id', $id)->first();
                if ($i == 1) {
                    $foto_baru[$i] = $data->foto;
                } else {
                    $foto_baru[$i] = $data->{"foto$i"};
                }
            }
        }
        
        $data = [
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'isi' => $request->isi,
            'link' => $request->link,
            'foto' => $foto_baru[1],
            'foto2' => $foto_baru[2],
            'foto3' => $foto_baru[3],
            'foto4' => $foto_baru[4],
            'foto5' => $foto_baru[5],
        ];

        fasilitas::where('id', $id)->update($data);

        return redirect()->route('fasilitas.index')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        fasilitas::where('id', $id)->delete();
        return redirect()->route('fasilitas.index')->with('success', 'Berhasil menghapus data');
    
    }
}
