<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('video.video',[
            'title' => 'Video Page',
            'judulhalaman' => 'Halaman Video',
            'video' => Video::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('video.createvideo',[
            'title' => 'Video Page',
            'judulhalaman' => 'Tambah Video',
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
            'judul' => 'required|max:50',
            'tanggal' => ['required', 'date', 'after:today'],
            'aktif' => 'required',
            'link' => 'required',
            'keterangan' => ['required'],
        ]);

        $video = Video::create($validate);
        if($video){
            return redirect()->route('video.index')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Data Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        // return $video;
        return view('video.updatevideo',[
            'title' => 'Video Page',
            'judulhalaman' => 'Update Video',
            'video' => $video,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $validate = $request->validate([
            'judul' => 'required',
            'tanggal' => ['required', 'date', 'after:today'],
            'aktif' => 'required',
            'link' => 'required',
            'keterangan' => ['required'],
        ]);

        $videos = $video->update($validate);
        if($videos){
            return redirect()->route('video.index')->with('success','Data Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Data Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('video.index')->with('success','Data Berhasil Dihapus');
    }
}
