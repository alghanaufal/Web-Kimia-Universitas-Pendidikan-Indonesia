<?php

namespace App\Http\Controllers;

use App\Models\User;
// use App\Models\dosen;
use App\Models\dosen;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class dosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = dosen::orderBy('nip', 'asc')->get();
        return view('dashboard.dosen.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.dosen.create');
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
        Session::flash('nip', $request->nip);
        Session::flash('email', $request->email);
        Session::flash('jabatan', $request->bidang);
        Session::flash('bidang', $request->bidang);
        Session::flash('scopus', $request->scopus);
        Session::flash('scholar', $request->scholar);
        Session::flash('sinta', $request->sinta);

        $request->validate(
            [
                'nama' =>'required',
                'nip' =>'required',
                'email' =>'required',
                'jabatan' => 'required',
                'bidang' => 'required',
                // 'scopus' => 'required',
                // 'scholar' => 'required',
                // 'sinta' => 'required',
                '_foto' => 'mimes:jpeg,jpg,png,gif',
            ],
            [
                'nama.required' => 'Nama wajib diisi',
                'nip.required' => 'NIP wajib diisi',
                'email.required' => 'Email Prodi wajib diisi',
                'jabatan.required' => 'Bidang wajib diisi',
                'bidang.required' => 'Bidang wajib diisi',
                // 'scopus.required' => 'Link scopus wajib diisi',
                // 'scholar.required' => 'Link scholar wajib diisi',
                // 'sinta.required' => 'Link Sinta wajib diisi',
                '_foto.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
            ]
        );

        $foto_baru = NULL;
        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto/dosen'), $foto_baru);
        }

        $data = [
                'nama' => $request->nama,
                'nip' => $request->nip,
                'email' => $request->email,
                'jabatan' => $request->jabatan,
                'bidang' => $request->bidang,
                'scopus' => $request->scopus,
                'scholar' => $request->scholar,
                'sinta' => $request->sinta,
                'foto' => $foto_baru,
            ];
            dosen::create($data);
            $user = User::firstOrCreate(
                ['email' => $request->email],
                [
                    'name' => "",
                    'google_id' => "",
                    'role' => 'Dosen',
                ]
            );
        return redirect()->route('dosen.index')->with('success', 'Berhasil menambahkan data');
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
        $data = dosen::where('id', $id)->first();
        return view('dashboard.dosen.edit')->with('data', $data);
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
                'nama' => 'required',
                'nip' => 'required',
                'email' => 'required',
                'bidang' => 'required',
                // 'scopus' => 'required',
                // 'scholar' => 'required',
                // 'sinta' => 'required',
                '_foto' => 'mimes:jpeg,jpg,png,gif',
            ],
            [
                'nama.required' => 'Nama wajib diisi',
                'nip.required' => 'NIP wajib diisi',
                'email.required' => 'Email Prodi wajib diisi',
                'bidang.required' => 'Bidang keahlian wajib diisi',
                // 'scopus.required' => 'Link scopus wajib diisi',
                // 'scholar.required' => 'Link scholar wajib diisi',
                // 'sinta.required' => 'Link Sinta wajib diisi',
                '_foto.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
            ]
        );

        $foto_baru = NULL;
        
        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto/dosen'), $foto_baru);

            $data = dosen::where('id', $id)->first();
            $foto_lama = $data->foto;
            File::delete(public_path('foto/dosen') . "/" . $foto_lama);
        } else {
            $data = dosen::where('id', $id)->first();
            $foto_baru = $data->foto;
        }

        $data1 = dosen::where('id', $id)->first();
        $user = User::where('email', '=', $data1->email)->first();

        if ($user) {
            $user->update([
                'name' => "",
                'google_id' => "",
                'role' => 'Dosen',
                'email' => $request->email,
            ]);
        } else {
            User::create([
                'name' => "",
                'google_id' => "",
                'email' => $request->email,
                'role' => 'Dosen',
            ]);
        }

        $data = [
            'nama' => $request->nama,
            'nip' => $request->nip,
            'email' => $request->email,
            'bidang' => $request->bidang,
            'scopus' => $request->scopus,
            'scholar' => $request->scholar,
            'sinta' => $request->sinta,
            'foto' => $foto_baru,
        ];

        dosen::where('id', $id)->update($data);

        return redirect()->route('dosen.index')->with('success', 'Berhasil mengubah data');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dosen::where('id', $id)->delete();
        return redirect()->route('dosen.index')->with('success', 'Berhasil menghapus data');
    
    }
}
