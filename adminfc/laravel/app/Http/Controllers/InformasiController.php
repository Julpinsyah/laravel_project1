<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('informasi.informasi',[
            'title' => 'Informasi Page',
            'judulhalaman' => 'Halaman Informasi',
            'informasi' => Informasi::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informasi.createinformasi',[
            'title' => 'Informasi Page',
            'judulhalaman' => 'Tambah Informasi',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'informasi' => ['required'],
            'batas' => ['required','date','after:'.now()->format('m/d/Y').','],
            'aktif' => 'required',
        ]);

        // return $validate;
        $informasi = Informasi::create($validate);
        if($informasi){
            return redirect('/informasi')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function show(Informasi $informasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Informasi $informasi)
    {
        return view('informasi.updateinformasi',[
            'title' => 'Informasi Page',
            'judulhalaman' => 'Ubah Informasi',
            'informasi' => $informasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informasi $informasi)
    {
        // return $request;
        $validate = $request->validate([
            'informasi' => ['required'],
            'batas' => ['required','date','after:'.now()->format('m/d/Y').','],
            'aktif' => 'required',
        ]);

        // return $validate;
        $info = $informasi->update($validate);
        if($info){
            return redirect('/informasi')->with('success','Data Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Gagal Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informasi $informasi)
    {
        $informasi->delete();
        return redirect('/informasi')->with('success','Data Berhasil Dihapus');
    }
}
