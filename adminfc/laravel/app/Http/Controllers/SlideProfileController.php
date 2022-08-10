<?php

namespace App\Http\Controllers;

use App\Models\SlideProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('slideprofile.slideprofile',[
            'title' => 'Slide Profile Page',
            'judulhalaman' => 'Halaman Slide Profile',
            'slideProfile' => SlideProfile::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slideprofile.createslideprofile',[
            'title' => 'Slide Profile Page',
            'judulhalaman' => 'Tambah Slide Profile',
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            'urutan' => 'unique:tb_slideprofil,urutan',
            'aktif' => 'required',
        ]);

        $validate['gambar'] = time().'_'.$request->file('gambar')->getClientOriginalName();

        // return $validate;
        $slideprofile = SlideProfile::create($validate);
        if($slideprofile){
            $request->file('gambar')->storeAs('profil',$validate['gambar']);
            return redirect()->route('slideprofile.index')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SlideProfile  $slideProfile
     * @return \Illuminate\Http\Response
     */
    public function show(SlideProfile $slideProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SlideProfile  $slideProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(SlideProfile $slideprofile)
    {
        // return $slideprofile;
        return view('slideprofile.updateslideprofile',[
            'title' => 'Slide Profile Page',
            'judulhalaman' => 'Edit Slide Profile',
            'slideProfile' => $slideprofile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SlideProfile  $slideProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SlideProfile $slideprofile)
    {
        $validate = $request->validate([
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

        $bn = SlideProfile::where('id',$slideprofile->id)->update($validate);   //update banner dengan id yang diberikan

        if($bn){
            if($request->file('gambar')){
                Storage::delete('profil/'.$request->gbr_lama);
                $request->gambar->storeAs('profil',$validate['gambar']);
            }
            return redirect()->route('slideprofile.index')->with('success','Data Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Gagal Menambah Berita');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SlideProfile  $slideProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(SlideProfile $slideprofile)
    {
        $slideprofile->delete();
        Storage::delete('profil/'.$slideprofile->gambar);
        return redirect()->route('slideprofile.index')->with('success','Data Berhasil Dihapus');
    }
}
