<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin',[
            'title' => 'My Profile Page',
            'judulhalaman' => 'Halaman My Profile',
            'user' => Auth::user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.updateadmin',[
            'title' => 'My Profile Page',
            'judulhalaman' => 'Halaman Ubah Profile',
            'user' => Auth::user(),
            'useradmin' => '',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        // return $admin;
        $rule = [
            'name' =>'nullable',
            'role' =>'nullable',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            'aktif'=>'nullable',
        ];

        if(strtolower($request->username) == strtolower($admin->username)){
            $rule['username'] = 'required';
        }else{
            $rule['username'] = 'required|unique:users,username';
        }

        if($request->email == $admin->email){
            $rule['email'] = 'required';
        }else{
            $rule['email'] = 'required|unique:users,email';
        }

        $validate = $request->validate($rule);
            
        if($request->file('gambar')){
            $validate['gambar'] = time().'_'.$request->file('gambar')->getClientOriginalName();
        }else{
            $validate['gambar'] = $request->gbr_lama;
        }

        // return $validate;
        // $data = $admin->update($validate);
        $data = DB::table('users')
                ->where('id', $admin->id)
                ->update($validate);

        if($data){
            if($request->file('gambar')){
                Storage::delete('admin/'.$request->gbr_lama);
                $request->gambar->storeAs('admin',$validate['gambar']);
            }

            if($request->useradmin != ""){
                return redirect()->route('useradmin')->with('success','Data Berhasil Diubah');
            }else{
                return redirect()->route('admin.index')->with('success','Data Berhasil Diubah');
            }
        }else{
            return redirect()->back()->with('error','Gagal Merubah Data');
        }
    }

    public function adminupdate(Request $request, User $admin)
    {
        // return $admin;
        $rule = [
            'role' =>'required',
            'aktif'=>'required',
        ];

        $validate = $request->validate($rule);

        // return $validate;
        // $data = $admin->update($validate);
        $data = DB::table('users')
                ->where('id', $admin->id)
                ->update($validate);

        if($data){
            return redirect()->route('useradmin')->with('success','Data Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Gagal Merubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        if($admin->role == 'superadmin'){
            return redirect()->back()->with('error','Super Admin Tidak Bisa Dihapus');
        }
        // return $admin;
        $data = $admin->delete();
        if($data){
            Storage::delete('admin/'.$admin->gambar);
            return redirect()->route('useradmin')->with('success','Data Berhasil Dihapus');
        }
    }

    public function editPass()
    {
        return view('admin.updatepass',[
            'title' => 'My Profile Page',
            'judulhalaman' => 'Halaman Ubah Password',
            'user' => Auth::user(),
        ]);
    }

    public function changePassword(Request $request, User $admin)
    {
        // return $admin;
        $rule = [
            'password' => 'required|min:5',
            'repassword' => 'required|min:5|same:password',
        ];
        $validate = $request->validate($rule);
        $password =['password'=>Hash::make($validate['password'])];
        // return $validate;
        $data = $admin->update($password);
        if($data){
            return redirect()->route('admin.index')->with('success','Data Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Gagal Merubah Data');
        }
    }

    public function useradmin(){
        return view('admin.useradmin',[
            'title' => 'Users Page',
            'judulhalaman' => 'Halaman User Admin',
            'user' => User::paginate(5),
        ]);
    } 

    public function edituseradmin(User $user){
        if($user->role == 'superadmin' && Auth::user()->role != 'superadmin'){
            return redirect()->back()->with('error','Anda Tidak Memiliki Akses');
        }

        return view('admin.updateadmin',[
            'title' => 'Users Page',
            'judulhalaman' => 'Halaman Edit User Admin',
            'user' => $user,
            'useradmin'=>"useradmin",
        ]);
    }
}
