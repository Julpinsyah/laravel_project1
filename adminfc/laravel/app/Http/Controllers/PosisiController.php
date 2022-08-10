<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use Illuminate\Http\Request;

class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posisi.posisi',[
            'title' => 'Posisi Page',
            'judulhalaman' => 'Halaman Posisi',
            'posisi' => Posisi::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posisi.createposisi',[
            'title' => 'Posisi Page',
            'judulhalaman' => 'Tambah Posisi',
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
        // return $request->all();
        $validate = $request->validate([
            'kode' => ['required'],
            'keterangan' => ['required'],
        ]);
        $validate['kode'] = strtoupper($validate['kode']);

        // return $validate;
        $posisi = Posisi::create($validate);
        if($posisi){
            return redirect('/posisi')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function show(Posisi $posisi)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Posisi $posisi)
    {
        return view('posisi.updateposisi',[
            'title' => 'Posisi Page',
            'judulhalaman' => 'Ubah Posisi',
            'posisi' => $posisi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posisi $posisi)
    {
        $validate = $request->validate([
            'keterangan' => ['required','max:100'],
            'kode' => ['required','max:4'],
        ]);
        $validate['kode'] = strtoupper($validate['kode']);

        // return $validate;
        $pos = $posisi->update($validate);
        if($pos){
            return redirect('/posisi')->with('success','Data Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Gagal Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posisi $posisi)
    {
        $posisi->delete();
        return redirect('/posisi')->with('success','Data Berhasil Dihapus');
    }
}
