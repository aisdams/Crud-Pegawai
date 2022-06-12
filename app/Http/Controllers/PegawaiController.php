<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapegawai = Pegawai::all();
        return view('index', compact('datapegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'nik' => 'required',
            'jk' => 'required',
            'jabatan' => 'required',
            'notelp' => 'required',
            'foto' => 'required',
            'alamat' => 'required',
         ]);
         $pegawai = Pegawai::create($request->all());
         if($request->hasFile('foto')){
             $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
             $pegawai->foto = $request->file('foto')->getClientOriginalName();
             $pegawai->save();
         }
        return Redirect('/pegawai')->with('success','Data Berhasil Ditambahkan');
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
        $pegawai = Pegawai::findorfail($id);
        return view('edit', compact('pegawai'));
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

        $pegawai = Pegawai::findorfail($id);
        $pegawai->update($request->all()); 
        if($request->hasFile('foto')) {

            $gambar = 'fotopegawai/'.$pegawai->foto;
            if(File::exists($gambar))
            {
                File::delete($gambar);
            }
           $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
           $pegawai->foto = $request->file('foto')->getClientOriginalName(); 
           $pegawai->save(); 
       }
        return redirect('/pegawai')->with('success', 'Dataagenda Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findorfail($id);
        $pegawai->delete();
        return back();
    }
}
