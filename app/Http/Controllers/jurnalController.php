<?php

namespace App\Http\Controllers;

use App\Models\jurnal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class jurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = jurnal::orderBy('judul', 'asc')->get();
        return view('dashboard.jurnal.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jurnal.create');
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
        Session::flash('link', $request->link);

        $request->validate(
            [
                'judul' =>'required',
                'link' =>'required',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'link.required' => 'Link tulisan wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'link' => $request->link
        ];
        jurnal::create($data);

        return redirect()->route('jurnal.index')->with('success', 'Berhasil menambahkan data');
    
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
        $data = jurnal::where('id', $id)->first();
        return view('dashboard.jurnal.edit')->with('data', $data);
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
                'link' =>'required',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'link.required' => 'Link tulisan wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'link' => $request->link
        ];
        jurnal::where('id', $id)->update($data);

        return redirect()->route('jurnal.index')->with('success', 'Berhasil menambahkan data');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        jurnal::where('id', $id)->delete();
        return redirect()->route('jurnal.index')->with('success', 'Berhasil menghapus data');
    }
}
