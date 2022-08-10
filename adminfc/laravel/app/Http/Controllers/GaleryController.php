<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('galeri.galery',[
            'title' => 'Galery Page',
            'judulhalaman' => 'Halaman Galery',
            'galery' => Galery::paginate(8),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galeri.creategaleri',[
            'title' => 'Galery Page',
            'judulhalaman' => 'Tambah Galery',
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
            'judul' => 'required|max:50',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            'urutan' => 'unique:tb_galery,urutan',
            'aktif' => 'required',
        ]);

        $validate['gambar'] = time().'_'.$request->file('gambar')->getClientOriginalName();

        // return $validate;
        $galeri = Galery::create($validate);
        if($galeri){
            $request->file('gambar')->storeAs('galeri',$validate['gambar']);
            return redirect('/galery')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    // public function show(Galery $galery)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function edit(Galery $galery)
    {
        return view('galeri.updategalery',[
            'title' => 'Galery Page',
            'judulhalaman' => 'Edit Galeri',
            'galery' => $galery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galery $galery)
    {
        $validate = $request->validate([
            'judul' => 'required|max:50',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            'urutan' => 'required',
            'aktif' => 'required',
        ]);

        if($request->file('gambar')){
            $validate['gambar'] = time().'_'.$request->file('gambar')->getClientOriginalName();
        }else{
            $validate['gambar'] = $request->gbr_lama;
        }

        // return $berita;

        $bn = Galery::where('id',$galery->id)->update($validate);   //update banner dengan id yang diberikan

        if($bn){
            if($request->file('gambar')){
                Storage::delete('galeri/'.$request->gbr_lama);
                $request->gambar->storeAs('galeri',$validate['gambar']);
            }
            return redirect('/galery')->with('success','Data Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Gagal Menambah Berita');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galery $galery)
    {
        $galery->delete();
        Storage::delete('galeri/'.$galery->gambar);
        return redirect('/galery')->with('success','Data Berhasil Dihapus');
    }
}
