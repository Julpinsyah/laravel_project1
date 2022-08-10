<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Tanding;
use App\Models\Pertandingan;
use Illuminate\Http\Request;

class PertandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jadwal_pertandingan.jadwal_pertandingan',[
            'title' => 'Jadwal Pertandingan Page',
            'judulhalaman' => 'Halaman Jadwal Pertandingan',
            'tanding' => Pertandingan::paginate(5),
            'club' => Club::all(),
            'liga' => Tanding::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwal_pertandingan.create_jadwal_pertandingan',[
            'title' => 'Jadwal Pertandingan Page',
            'judulhalaman' => 'Halaman Tambah Jadwal Pertandingan',
            'club' => Club::all(),
            'liga' => Tanding::all()
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
            'idtanding' => ['required'],
            // 'tanggal' => ['required', 'date', 'after:today'],
            'waktu' => ['required'],
            'tanding' => ['required'],
            'tandang' => ['required'],
            'lapangan' => ['required'],
            'lokasi' => ['required'],
            'aktif' => ['required'],
            'map' => ['nullable'],
        ]);

        $validate['tanggal'] = $request->tanggal;

        // return $validate;
        
        $data = Pertandingan::create($validate);
        if($data){
            return redirect()->route('pertandingan.index')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pertandingan  $pertandingan
     * @return \Illuminate\Http\Response
     */
    public function show(Pertandingan $pertandingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pertandingan  $pertandingan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pertandingan $pertandingan)
    {
        return view('jadwal_pertandingan.update_jadwal_pertandingan',[
            'title' => 'Jadwal Latihan Page',
            'judulhalaman' => 'Halaman Ubah Jadwal Latihan',
            'tanding' => $pertandingan,
            'club' => Club::all(),
            'liga' => Tanding::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pertandingan  $pertandingan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pertandingan $pertandingan)
    {
        // return $request->all();
        $validate = $request->validate([
            'idtanding' => ['required'],
            // 'tanggal' => ['required', 'date', 'after:today'],
            'waktu' => ['required'],
            'tanding' => ['required'],
            'tandang' => ['required'],
            'lapangan' => ['required'],
            'lokasi' => ['required'],
            'aktif' => ['required'],
            'map' => ['nullable'],
        ]);

        $validate['tanggal'] = $request->tanggal;

        // return $validate;
        
        $data = $pertandingan->update($validate);
        if($data){
            return redirect()->route('pertandingan.index')->with('success','Data Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Gagal Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pertandingan  $pertandingan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertandingan $pertandingan)
    {
        $data = $pertandingan->delete();
        if($data){
            return redirect()->route('pertandingan.index')->with('success','Data Berhasil Dihapus');
        }else{
            return redirect()->back()->with('error','Gagal Menghapus Data');
        }
    }
}
