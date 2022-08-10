<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sponsor.sponsor',[
            'title' => 'Sponsor Page',
            'judulhalaman' => 'Halaman Sponsor',
            'sponsor' => Sponsor::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sponsor.createsponsor',[
            'title' => 'Sponsor Page',
            'judulhalaman' => 'Tambah Sponsor',
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
            'perusahaan' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            'grup' => ['required'],
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after:tanggal_mulai',
            'aktif' => 'required',
        ]);

        $validate['logo'] = time().'_'.$request->file('logo')->getClientOriginalName();

        // return $validate;
        $sponsor = Sponsor::create($validate);
        if($sponsor){
            $request->file('logo')->storeAs('sponsor',$validate['logo']);
            return redirect()->route('sponsor.index')->with('success','Data Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    // public function show(Sponsor $sponsor)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        return view('sponsor.updatesponsor',[
            'title' => 'Sponsor Page',
            'judulhalaman' => 'Edit Sponsor',
            'sponsor' => $sponsor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        $validate = $request->validate([
            'perusahaan' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            'grup' => ['required'],
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after:tanggal_mulai',
            'aktif' => 'required',
        ]);

        if($request->file('logo')){
            $validate['logo'] = time().'_'.$request->file('logo')->getClientOriginalName();
        }else{
            $validate['logo'] = $request->gbr_lama;
        }

        // return $berita;

        $bn = Sponsor::where('id',$sponsor->id)->update($validate);   //update banner dengan id yang diberikan

        if($bn){
            if($request->file('logo')){
                Storage::delete('sponsor/'.$request->gbr_lama);
                $request->logo->storeAs('sponsor',$validate['logo']);
            }
            return redirect()->route('sponsor.index')->with('success','Data Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Gagal Menambah Berita');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();
        Storage::delete('sponsor/'.$sponsor->logo);
        return redirect()->route('sponsor.index')->with('success','Data Berhasil Dihapus');
    }
}
