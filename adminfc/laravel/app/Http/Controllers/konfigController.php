<?php

namespace App\Http\Controllers;

use App\Models\konfig;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class konfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('konfig.konfig',[
            'title' => 'Konfigurasi Page',
            'judulhalaman' => 'Halaman Konfigurasi',
            'konfig' => Konfig::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('konfig.updatekonfig',[
            'title' => 'Konfigurasi Page',
            'judulhalaman' => 'Halaman Ubah Konfigurasi',
            'konfig' => Konfig::all(),
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
        // dd( $request->file());
        $data=$request->all();
        // return $data['keterangan-0'];
        if($request->hasFile('keterangan-8')){
            $file=$request->file('keterangan-8');
            $namafile=time().'-'.$file->getClientOriginalName();
            $request->file('keterangan-8')->storeAs('img/',$namafile);
            $data['keterangan-8']=$namafile;
        }

        if($request->hasFile('keterangan-20')){
            $file=$request->file('keterangan-20');
            $namafile=time().'-'.$file->getClientOriginalName();
            $request->file('keterangan-20')->storeAs('img/',$namafile);
            $data['keterangan-20']=$namafile;
        }

        if($request->hasFile('keterangan-21')){
            $file=$request->file('keterangan-21');
            $namafile=time().'-'.$file->getClientOriginalName();
            $request->file('keterangan-21')->storeAs('img/',$namafile);
            $data['keterangan-21']=$namafile;
        }

        $nama= [
            "singkatan",
            "kepanjangan",
            "facebook",
            "instagram",
            "twitter",
            "pinterest",
            "copyright",
            "versi",
            "icon",
            "youtube",
            "map_embed",
            "negara",
            "provinsi",
            "kota",
            "kodepos",
            "alamat",
            "telepon",
            "handphone",
            "hari_kerja",
            "jam_kerja",
            "gedung",
            "logo",
            "profil"
        ];
        $id = $request->id;

        foreach ($nama as $key => $value) {
            DB::table('tb_konfig')
                ->where('id', intval($id[$key]))
                ->update(['aktif' => $data['aktif-'.$key],'keterangan' => $data['keterangan-'.$key]]);
        }

        return redirect()->route('konfig.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\konfig  $konfig
     * @return \Illuminate\Http\Response
     */
    public function show(konfig $konfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\konfig  $konfig
     * @return \Illuminate\Http\Response
     */
    public function edit(konfig $konfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\konfig  $konfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, konfig $konfig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\konfig  $konfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(konfig $konfig)
    {
        //
    }
}
