<?php

namespace App\Http\Controllers;

use App\Models\Tanding;
use Illuminate\Http\Request;

class TandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pertandingan.pertandingan',[
            'title' => 'Kelompok Pertandingan Page',
            'judulhalaman' => 'Halaman kelompok Pertandingan',
            'tanding' => Tanding::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertandingan.createpertandingan',[
            'title' => 'Kelompok Pertandingan Page',
            'judulhalaman' => 'Tambah kelompok Pertandingan',
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
            'nama' => ['required'],
            'tanggal' => ['required', 'date'],
            'waktu' => ['required'],
            'tempat' => ['nullable'],
            'aktif' => ['required'],
        ]);

        // return $validate;
        
        $data = tanding::create($validate);
        if($data){
            return redirect()->route('tanding.index')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanding  $tanding
     * @return \Illuminate\Http\Response
     */
    public function show(Tanding $tanding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanding  $tanding
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanding $tanding)
    {
        return view('pertandingan.updatepertandingan',[
            'title' => 'Liga Page',
            'judulhalaman' => 'Halaman Ubah Liga',
            'tanding' => $tanding,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanding  $tanding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanding $tanding)
    {
        // return $request->all();
        $validate = $request->validate([
            'nama' => ['required'],
            'tanggal' => ['required', 'date'],
            'waktu' => ['required'],
            'tempat' => ['nullable'],
            'aktif' => ['required'],
        ]);

        // return $validate;
        
        $data = $tanding->update($validate);
        if($data){
            return redirect()->route('tanding.index')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanding  $tanding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanding $tanding)
    {
        $data = $tanding->delete();
        if($data){
            return redirect()->route('tanding.index')->with('success','Data Berhasil Dihapus');
        }else{
            return redirect()->back()->with('error','Gagal Menghapus Data');
        }
        
    }
}
