<?php

namespace App\Http\Controllers;

use App\Models\programKimia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class programKimiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = programKimia::orderBy('id', 'asc')->get();
        return view('dashboard.programKimia.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.programKimia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Session::flash('judul', $request->judul);
        Session::flash('info1', $request->info1);
        Session::flash('info3', $request->info3);
        Session::flash('info4', $request->info4);
        Session::flash('info5', $request->info5);
        $request->validate(
            [
                // 'judul' =>'required',
                'info2' => 'mimes:jpeg,jpg,png,gif',
                '_foto' => 'mimes:jpeg,jpg,png,gif',
            ],
            [
                // 'judul.required' => 'Judul wajib diisi',
                '_foto.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
                'info2.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
            ]
        );
        $foto_baru = NULL;
        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto/programKimia'), $foto_baru);
        }

        $foto_baru2 = NULL;
        if ($request->hasFile('info2')) {
            $foto_file = $request->file('info2');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru2 = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto/programKimia'), $foto_baru2);
        }

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $foto_baru2,
            'info3' => $request->info3,
            'info4' => $request->info4,
            'info5' => $request->info5,
            'foto' => $foto_baru,
        ];
        programKimia::create($data);

        // return view('programKimia.create', compact('jenis_kelamin'));

        return redirect()->route('programKimia.index')->with('success', 'Berhasil menambahkan data');
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
        $data = programKimia::where('id', $id)->first();
        return view('dashboard.programKimia.edit')->with('data', $data);
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
                // 'judul' =>'required',
                'info2' => 'mimes:jpeg,jpg,png,gif',
                '_foto' => 'mimes:jpeg,jpg,png,gif',
            ],
            [
                // 'judul.required' => 'Judul wajib diisi',
                '_foto.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
                'info2.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
            ]
        );

        $foto_baru = NULL;
        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto/programKimia'), $foto_baru);
        
            $data = programKimia::where('id', $id)->first();
            $foto_lama = $data->foto;
            File::delete(public_path('foto/programKimia') . "/" . $foto_lama);        
        }else {
            $data = programKimia::where('id', $id)->first();
            $foto_baru = $data->foto;
        }

        $foto_baru2 = NULL;
        if ($request->hasFile('info2')) {
            $foto_file = $request->file('info2');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru2 = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto/programKimia'), $foto_baru2);

            $data = programKimia::where('id', $id)->first();
            $foto_lama = $data->info2;
            File::delete(public_path('foto/programKimia') . "/" . $foto_lama);        
        }else {
            $data = programKimia::where('id', $id)->first();
            $foto_baru2 = $data->info2;
        }

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $foto_baru2,
            'info3' => $request->info3,
            'info4' => $request->info4,
            'info5' => $request->info5,
            'foto' => $foto_baru,
        ];
        programKimia::where('id', $id)->update($data);

        return redirect()->route('programKimia.index')->with('success', 'Berhasil mengubah data');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        programKimia::where('id', $id)->delete();
        return redirect()->route('programKimia.index')->with('success', 'Berhasil menghapus data');
    
    }
}
