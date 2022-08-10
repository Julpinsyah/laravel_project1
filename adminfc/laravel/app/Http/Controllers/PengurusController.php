<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengurus.pengurus',[
            'title' => 'Management Page',
            'judulhalaman' => 'Halaman Management',
            'pengurus' => Pengurus::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengurus.createpengurus',[
            'title' => 'Management Page',
            'judulhalaman' => 'Halaman Tambah Management',
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
            'posisi' => 'required',
            'kelamin' => 'required',
            'tanggal_lahir' => 'nullable|date',
            'tempat_lahir' => 'nullable',
            'negara' => 'nullable',
            'tinggi' => 'required',
            'berat' => 'required',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'tanggal_masuk' => 'nullable|date',
            'urutan' => 'required|unique:tb_pengurus',
            'aktif' => 'required',
            'informasi_lain' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
        ]);

        
        if($request->hasFile('photo')){
            $validate['photo'] = time().'_'.$request->file('photo')->getClientOriginalName();
        }

        // return $validate;

        $data = Pengurus::create($validate);

        if($data){
            if($request->hasFile('photo')){
                $request->file('photo')->storeAs('photo',$validate['photo']);
            }
            return redirect()->route('pengurus.index')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function show(Pengurus $penguru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengurus $penguru)
    {
        return view('pengurus.updatepengurus',[
            'title' => 'Pengurus Page',
            'judulhalaman' => 'Halaman Edit Pengurus',
            'pengurus' => $penguru,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengurus $penguru)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'posisi' => 'required',
            'kelamin' => 'required',
            'tanggal_lahir' => 'nullable|date',
            'tempat_lahir' => 'nullable',
            'negara' => 'nullable',
            'tinggi' => 'required',
            'berat' => 'required',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'tanggal_masuk' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date',
            'urutan' => 'required',
            'aktif' => 'required',
            'informasi_lain' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
        ]);
        
        if($request->hasFile('photo')){
            $validate['photo'] = time().'_'.$request->file('photo')->getClientOriginalName();
        }else{
            $validate['photo'] = $request->gbr_lama;
        }

        // return $validate;

        $data = $penguru->update($validate);

        if($data){
            if($request->hasFile('photo')){
                $request->file('photo')->storeAs('photo',$validate['photo']);
                Storage::delete('photo/'.$request->gbr_lama);
            }
            return redirect()->route('pengurus.index')->with('success','Data Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Gagal Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengurus $penguru)
    {
        $penguru->delete();
        Storage::delete('photo/'.$penguru->photo);
        return redirect()->route('pengurus.index')->with('success','Berita Berhasil Dihapus');
    }
}
