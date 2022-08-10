<?php

namespace App\Http\Controllers;

use App\Models\Pemain;
use App\Models\Posisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PemainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pemain.pemain',[
            'title' => 'Pemain Page',
            'judulhalaman' => 'Halaman Pemain',
            'pemain' => Pemain::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemain.createpemain',[
            'title' => 'Pemain Page',
            'judulhalaman' => 'Halaman tambah Pemain',
            'posisi' => Posisi::all(),
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
            'nama' => 'required',
            'nomor' => 'required|numeric|digits_between:1,3',
            'posisi' => 'required',
            'grup_tim' => 'required',
            'kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'negara' => 'required',
            'tinggi' => 'required',
            'berat' => 'required',
            'bermain' => 'nullable',
            'kartu_kuning' => 'required',
            'kartu_merah' => 'required',
            'goal' => 'required',
            'tanggal_masuk' => 'required',
            'aktif' => 'required',
            'informasi_lain' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
        ]);

        $data_posisi = Posisi::where('id',$request->posisi)->first();

        $validate['posisi'] = $data_posisi->keterangan;
        $validate['kode_posisi'] = $data_posisi->kode;
        
        if($request->hasFile('photo')){
            $validate['photo'] = time().'_'.$request->file('photo')->getClientOriginalName();
        }

        // return $validate;

        $data = Pemain::create($validate);

        if($data){
            if($request->hasFile('photo')){
                $request->file('photo')->storeAs('photo',$validate['photo']);
            }
            return redirect('/pemain')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function show(Pemain $pemain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemain $pemain)
    {
        // return Posisi::where('kode',$pemain->kode_posisi)->first()->id;
        return view('pemain.updatepemain',[
            'title' => 'Pemain Page',
            'judulhalaman' => 'Halaman Edit Pemain',
            'pemain' => $pemain,
            'posisi' => Posisi::all(),
            'current_posisi' => Posisi::where('kode',$pemain->kode_posisi)->first()->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemain $pemain)
    {
        // return $request->all();
        $validate = $request->validate([
            'nama' => 'required',
            'nomor' => 'required|numeric|digits_between:1,3',
            'posisi' => 'required',
            'grup_tim' => 'required',
            'kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'negara' => 'required',
            'tinggi' => 'required',
            'berat' => 'required',
            'bermain' => 'nullable',
            'kartu_kuning' => 'required',
            'kartu_merah' => 'required',
            'goal' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'nullable',
            'aktif' => 'required',
            'informasi_lain' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
        ]);

        $data_posisi = Posisi::where('id',$request->posisi)->first();

        $validate['posisi'] = $data_posisi->keterangan;
        $validate['kode_posisi'] = $data_posisi->kode;
        
        if($request->hasFile('photo')){
            $validate['photo'] = time().'_'.$request->file('photo')->getClientOriginalName();
        }else{
            $validate['photo'] = $request->gbr_lama;
        }

        // return $validate;

        $data = $pemain->update($validate);

        if($data){
            if($request->hasFile('photo')){
                $request->file('photo')->storeAs('photo',$validate['photo']);
                Storage::delete('photo/'.$request->gbr_lama);
            }
            return redirect('/pemain')->with('success','Data Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Gagal Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemain $pemain)
    {
        $pemain->delete();
        Storage::delete('photo/'.$pemain->photo);
        return redirect()->route('pemain.index')->with('success','Berita Berhasil Dihapus');
    }
}
