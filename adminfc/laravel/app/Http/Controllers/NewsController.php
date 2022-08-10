<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.news',[
            'title' => 'News Page',
            'judulhalaman' => 'Halaman Berita',
            'berita' => berita::orderBy('updated_at', 'desc')->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.createnews',[
            'title' => 'Create News',
            'judulhalaman' => 'Tambah Berita',
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

        // dd(berita::all());
        $validate = $request->validate([
            'title' => 'required|min:5',
            'content' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
        ]);
        
        $gambar = time().'_'.$request->file('gambar')->getClientOriginalName();

        $berita = [
            'judul' => $validate['title'],
            'gambar' => $gambar,
            'tanggal' => date('Y-m-d',time()),
            'tentang'=>Str::words(strip_tags($request['content']),'15','...'),
            'deskripsi'=>$request['content'],
            'aktif'=>'Y',
        ];

        $news = berita::create($berita);

        if($news){
            $request->gambar->storeAs('berita',$gambar);
            return redirect('news')->with('success','Berita berhasil ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambah Berita');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(berita $news)
    {
        return view('news.detailnews',[
            'title' => 'Detail News',
            'judulhalaman' => 'Detail Berita',
            // 'berita' => berita::find($id),
            'berita' => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(berita $news)
    {
        return view('news.updatenews',[
            'title' => 'Update News',
            'judulhalaman' => 'Ubah Berita',
            'berita' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, berita $news)
    {
        // dd($request->gbr_lama);
        $validate = $request->validate([
            'title' => 'required|min:5',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            'content' => 'required',
        ]);

        if($request->file('gambar')){
            $gambar = time().'_'.$request->file('gambar')->getClientOriginalName();
        }else{
            $gambar = $request->gbr_lama;
        }
        

        $berita = [
            'judul' => $validate['title'],
            'gambar' => $gambar,
            'tanggal' => date('Y-m-d',time()),
            'tentang'=>Str::words(strip_tags($request['content']),'20','...'),
            'deskripsi'=>$request['content'],
            'aktif'=>'Y',
        ];

        // return $berita;

        $news = berita::where('id',$news->id)->update($berita);   //update berita dengan id yang diberikan

        if($news){
            if($request->file('gambar')){
                Storage::delete('berita/'.$request->gbr_lama);
                $request->gambar->storeAs('berita',$gambar);
            }
            return redirect('/news')->with('success','Berita Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Gagal Menambah Berita');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(berita $news)
    {
        $news->delete();
        Storage::delete('berita/'.$news->gambar);
        return redirect('/news')->with('success','Berita Berhasil Dihapus');
    }
    
}
