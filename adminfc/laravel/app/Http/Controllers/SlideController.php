<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('slide.slide',[
            'title' => 'Slide Page',
            'judulhalaman' => 'Halaman Slide',
            'slide' => Slide::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slide.createslide',[
            'title' => 'Slide Page',
            'judulhalaman' => 'Tambah Slide',
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
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            'keterangan' => ['required'],
            'urutan' => 'unique:tb_slide,urutan',
            'aktif' => 'required',
        ]);

        $validate['gambar'] = time().'_'.$request->file('gambar')->getClientOriginalName();

        // return $validate;
        $slide = Slide::create($validate);
        if($slide){
            $request->file('gambar')->storeAs('slide',$validate['gambar']);
            return redirect()->route('slide.index')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        return view('slide.updateslide',[
            'title' => 'Slide Page',
            'judulhalaman' => 'Edit Slide',
            'slide' => $slide,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        $validate = $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            'keterangan' => ['required'],
            'urutan' => 'required',
            'aktif' => 'required',
        ]);

        if($request->file('gambar')){
            $validate['gambar'] = time().'_'.$request->file('gambar')->getClientOriginalName();
        }else{
            $validate['gambar'] = $request->gbr_lama;
        }

        // return $berita;

        $bn = Slide::where('id',$slide->id)->update($validate);   //update banner dengan id yang diberikan

        if($bn){
            if($request->file('gambar')){
                Storage::delete('slide/'.$request->gbr_lama);
                $request->gambar->storeAs('slide',$validate['gambar']);
            }
            return redirect()->route('slide.index')->with('success','Berita Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Gagal Menambah Berita');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        $slide->delete();
        Storage::delete('slide/'.$slide->gambar);
        return redirect()->route('slide.index')->with('success','Data Berhasil Dihapus');
    }
}
