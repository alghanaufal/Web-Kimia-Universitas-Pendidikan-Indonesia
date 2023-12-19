<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class akunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderBy('role', 'desc')->get();
        return view('dashboard.akun.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.akun.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('role', $request->role);
        $request->validate(
            [
                'email' =>'required',
                'role' =>'required',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'role.required' => 'role wajib diisi',
            ]
        );
        $user = User::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => "",
                'google_id' => "",
                'role' => $request->role,
            ]
        );
        // User::create($user);
        if ($user->wasRecentlyCreated) {
            return redirect()->route('akun.index')->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->route('akun.index')->with('success', 'Email tidak unik');
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
        $data = User::where('id', $id)->first();
        return view('dashboard.akun.edit')->with('data', $data);
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
                'email' =>'required',
                'role' =>'required',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'role.required' => 'role wajib diisi',
            ]
        );
        $data = [
            'email' => $request->email,
            'role' => $request->role,
        ];

        User::where('id', $id)->update($data);

        return redirect()->route('akun.index')->with('success', 'Berhasil mengubah data');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('akun.index')->with('success', 'Berhasil menghapus data');
    }
}
