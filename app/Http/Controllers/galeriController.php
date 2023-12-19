<?php

namespace App\Http\Controllers;

use App\Models\galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class galeriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = galeri::orderBy('judul', 'asc')->get();
        return view('dashboard.galeri.index')->with('data', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);

        $request->validate(
            [
                'judul' =>'required',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
            ]
        );
        try {
            if ($request->hasFile('_foto')) {
                $files = $request->file('_foto');
                $i = 1;
                foreach ($files as $file) {
                    $foto_ekstensi = $file->extension();
                    $foto_baru = $i . time() . ".$foto_ekstensi";
                    $file->move(public_path('foto/galeri'), $foto_baru);

                    $data = [
                        'judul' => $request->judul,
                        'foto' => $foto_baru
                    ];

                    galeri::create($data);
                    
                    $i++;
                }

                return redirect()->route('galeri.index')->with('success', 'Berhasil menambahkan data');
            }
            return redirect()->route('galeri.index')->with('success', 'Data Kosong');
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = galeri::where('judul', $id)->get();
        return view('dashboard.galeri.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = galeri::where('id', $id)->first();
        return view('dashboard.galeri.edit')->with('data', $data);
    
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
                'judul' =>'required',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
            ]
        );
        try{
            if ($request->hasFile('_foto')) {
                $file = $request->file('_foto');
                    $foto_ekstensi = $file->extension();
                    $foto_baru =  time() . ".$foto_ekstensi";
                    $file->move(public_path('foto/galeri'), $foto_baru);

                    $data = galeri::where('id', $id)->first();
                    $foto_lama = $data->{"foto"};
                    File::delete(public_path('foto/galeri') . "/" . $foto_lama);   
                    $data = [
                        'judul' => $request->judul,
                        'foto' => $foto_baru
                    ];

                    galeri::where('id', $id)->update($data);

                return redirect()->route('galeri.index')->with('success', 'Berhasil menambahkan data');
            }else {
                $data = galeri::where('id', $id)->first();
                $foto_baru = $data->foto;
            }
            return redirect()->route('galeri.index')->with('success', 'Data Kosong');
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        galeri::where('id', $id)->delete();
        return redirect()->route('galeri.index')->with('success', 'Berhasil menghapus data');
    
    }
}
