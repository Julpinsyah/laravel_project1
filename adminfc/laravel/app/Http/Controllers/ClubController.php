<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('club.club',[
            'title' => 'Club Page',
            'judulhalaman' => 'Halaman Club',
            'club' => Club::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('club.createclub',[
            'title' => 'Club Page',
            'judulhalaman' => 'Halaman Tambah Club',
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
            'nama' => ['required'],
            'tempat' => ['required'],
            'kontak' => ['numeric','digits_between:8,12'],
            'manager' => ['nullable'],
            'pelatih' => ['nullable'],
            'lapangan' => ['nullable'],
            'aktif' => ['required'],
            'map' => ['nullable'],
            'logo' => ['nullable','image','file','max:500','mimes:jpeg,png,jpg,gif,svg'],
        ]);

        if($request->hasFile('logo')){
            $validate['logo'] = time().'_'.$request->file('logo')->getClientOriginalName();
        }
        
        // return $validate;
        
        $data = Club::create($validate);
        if($data){
            $request->file('logo')->storeAs('klub',$validate['logo']);
            return redirect()->route('club.index')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        return view('club.updateclub',[
            'title' => 'Club Page',
            'judulhalaman' => 'Halaman Ubah Club',
            'club' => $club,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        $validate = $request->validate([
            'nama' => ['required'],
            'tempat' => ['required'],
            'kontak' => ['numeric','digits_between:8,12'],
            'manager' => ['nullable'],
            'pelatih' => ['nullable'],
            'lapangan' => ['nullable'],
            'aktif' => ['required'],
            'map' => ['nullable'],
            'logo' => ['nullable','image','file','max:500','mimes:jpeg,png,jpg,gif,svg'],
        ]);

        if($request->hasFile('logo')){
            $validate['logo'] = time().'_'.$request->file('logo')->getClientOriginalName();
        }else{
            $validate['logo'] = $request->gbr_lama;
        }
        
        // return $validate;
        
        $data = $club->update($validate);
        if($data){
            if($request->hasfile('logo')){
                Storage::delete('klub/'.$request->gbr_lama);
                $request->file('logo')->storeAs('klub',$validate['logo']);
            }
            return redirect()->route('club.index')->with('success','Data Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Gagal Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        $data = $club->delete();
        if($data){
            Storage::delete('klub/'.$club->logo);
            return redirect()->route('club.index')->with('success','Data Berhasil Dihapus');
        }else{
            return redirect()->back()->with('error','Gagal Menghapus Data');
        }
    }
}
