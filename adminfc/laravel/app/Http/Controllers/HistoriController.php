<?php

namespace App\Http\Controllers;

use App\Models\Histori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HistoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('histori.histori',[
            'title' => 'Histori Page',
            'judulhalaman' => 'Halaman Histori',
            'histori' => Histori::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('histori.createhistori',[
            'title' => 'Histori Page',
            'judulhalaman' => 'Halaman Tambah Histori',
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
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            'keterangan' => ['required'],
            'tahun' => 'required',
            'aktif' => 'required',
        ]);
        
        $validate['ringakasan'] = Str::words(strip_tags($validate['keterangan']),'10','...');
        $validate['gambar'] = time().'_'.$request->file('gambar')->getClientOriginalName();

        // return $validate;
        $data = Histori::create($validate);
        if($data){
            $request->file('gambar')->storeAs('histori',$validate['gambar']);
            return redirect()->route('histori.index')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function show(Histori $histori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function edit(Histori $histori)
    {
        return view('histori.updatehistori',[
            'title' => 'Histori Page',
            'judulhalaman' => 'Edit Histori',
            'histori' => $histori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Histori $histori)
    {
        $validate = $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            'keterangan' => ['required'],
            'tahun' => 'required',
            'aktif' => 'required',
        ]);
        
        $validate['ringakasan'] = Str::words(strip_tags($validate['keterangan']),'10','...');
        if($request->file('gambar')){
            $validate['gambar'] = time().'_'.$request->file('gambar')->getClientOriginalName();
        }else{
            $validate['gambar'] = $request->gbr_lama;
        }

        // return $validate;
        $data = $histori->update($validate);
        if($data){
            if($request->file('gambar')){
                Storage::delete('histori/'.$request->gbr_lama);
                $request->gambar->storeAs('histori',$validate['gambar']);
            }
            return redirect()->route('histori.index')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Histori $histori)
    {
        $histori->delete();
        Storage::delete('histori/'.$histori->gambar);
        return redirect()->route('histori.index')->with('success','Data Berhasil Dihapus');
    }
}
