<?php

namespace App\Http\Controllers;

use App\Models\posisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class posisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = posisi::orderBy('tipe', 'asc')->get();
        return view('dashboard.posisi.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posisi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('tipe', $request->tipe);
        Session::flash('nama', $request->nama);
        $request->validate(
            [
                'tipe' =>'required',
                'nama' =>'required',
            ],
            [
                'nama.required' => 'Nama wajib diisi',
                'tipe.required' => 'Tipe wajib diisi',
            ]
        );
        $data = [
            'nama' => $request->nama,
            'tipe' => $request->tipe,
        ];
        posisi::create($data);
        
        return redirect()->route('posisi.index')->with('success', 'Berhasil menambahkan data');        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = posisi::where('id', $id)->first();
        return view('dashboard.posisi.edit')->with('data', $data);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = posisi::where('id', $id)->first();
        return view('dashboard.posisi.edit')->with('data', $data);
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
                'tipe' =>'required',
                'nama' =>'required',
            ],
            [
                'nama.required' => 'Nama wajib diisi',
                'tipe.required' => 'Tipe wajib diisi',
            ]
        );
        $data = [
            'nama' => $request->nama,
            'tipe' => $request->tipe,
        ];

        posisi::where('id', $id)->update($data);

        return redirect()->route('posisi.index')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        posisi::where('id', $id)->delete();
        return redirect()->route('posisi.index')->with('success', 'Berhasil menghapus data');
    }
}
