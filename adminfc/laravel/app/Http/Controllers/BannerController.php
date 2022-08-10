<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('banner.banner',[
            'title' => 'Banner Page',
            'judulhalaman' => 'Halaman Banner',
            'banner' => Banner::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.createbanner',[
            'title' => 'Banner Page',
            'judulhalaman' => 'Tambah Banner',
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
        // return move_uploaded_file($request->file('gambar'),  public_path('images\benner\\') .'gamber.jpg');
        // return $request->file('gambar');
        $validate = $request->validate([
            'judul' => 'required|max:50',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            'keterangan' => ['required'],
            'urutan' => 'unique:tb_benner,urutan',
            'aktif' => 'required',
        ]);

        $validate['gambar'] = time().'_'.$request->file('gambar')->getClientOriginalName();

        // return $validate;
        $banner = Banner::create($validate);
        if($banner){
            // move_uploaded_file($request->file('gambar'), public_path('images\benner\\').$validate['gambar']);
            $request->file('gambar')->storeAs('benner',$validate['gambar']);
            return redirect('banner')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('banner.detailbanner',[
            'title' => 'Banner Page',
            'judulhalaman' => 'Halaman Banner',
            'banner' => Banner::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('banner.updatebanner',[
            'title' => 'Banner Page',
            'judulhalaman' => 'Edit Banner',
            'banner' => $banner,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $validate = $request->validate([
            'judul' => 'required|max:50',
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

        $bn = Banner::where('id',$banner->id)->update($validate);   //update banner dengan id yang diberikan

        if($bn){
            if($request->file('gambar')){
                Storage::delete('benner/'.$request->gbr_lama);
                $request->gambar->storeAs('benner',$validate['gambar']);
                // unlink(public_path('images\benner\\').$banner->gambar);
                // move_uploaded_file($request->file('gambar'), public_path('images\benner\\').$validate['gambar']);
            }
            return redirect('banner')->with('success','Berita Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Gagal Menambah Berita');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        // return $banner;
        $banner->delete();
        Storage::delete('benner/'.$banner->gambar);
        // unlink(public_path('images\benner\\').$banner->gambar);
        return redirect('banner')->with('success','Data Berhasil Dihapus');
    }
}
