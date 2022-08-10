<?php

namespace App\Http\Controllers;

use App\Models\JadwalLatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JadwalLatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jadwal_latihan.jadwal_latihan',[
            'title' => 'Jadwal Latihan Page',
            'judulhalaman' => 'Halaman Jadwal Latihan',
            'latihan' => JadwalLatihan::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwal_latihan.create_jadwal_latihan',[
            'title' => 'Jadwal Latihan Page',
            'judulhalaman' => 'Halaman Tambah Jadwal Latihan',
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
            'hari' => ['required'],
            'waktu_mulai' => ['required'],
            'waktu_selesai' => ['required'],
            'lapangan' => ['required'],
            'lokasi' => ['required'],
            'aktif' => ['required'],
            'map' => ['nullable'],
        ]);

        // return $validate;
        
        $data = JadwalLatihan::create($validate);
        if($data){
            return redirect()->route('latihan.index')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JadwalLatihan  $jadwalLatihan
     * @return \Illuminate\Http\Response
     */
    public function show(JadwalLatihan $latihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JadwalLatihan  $jadwalLatihan
     * @return \Illuminate\Http\Response
     */
    public function edit(JadwalLatihan $latihan)
    {
        // return $latihan;
        return view('jadwal_latihan.update_jadwal_latihan',[
            'title' => 'Jadwal Latihan Page',
            'judulhalaman' => 'Halaman Ubah Jadwal Latihan',
            'latihan' => $latihan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JadwalLatihan  $jadwalLatihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JadwalLatihan $latihan)
    {
        $validate = $request->validate([
            'nama' => ['required'],
            'hari' => ['required'],
            'waktu_mulai' => ['required'],
            'waktu_selesai' => ['required'],
            'lapangan' => ['required'],
            'lokasi' => ['required'],
            'aktif' => ['required'],
            'map' => ['nullable'],
        ]);
        
        // return $validate;
        
        $data = $latihan->update($validate);
        if($data){
            return redirect()->route('latihan.index')->with('success','Data Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Gagal Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JadwalLatihan  $jadwalLatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JadwalLatihan $latihan)
    {
        $data = $latihan->delete();
        if($data){
            return redirect()->route('latihan.index')->with('success','Data Berhasil Dihapus');
        }else{
            return redirect()->back()->with('error','Gagal Menghapus Data');
        }
    }
}
