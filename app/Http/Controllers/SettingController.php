<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting.index');
    }
    public function show()
    {
        return Setting::first();
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting -> nama_perusahaan = $request->nama_perusahaan;
        $setting -> alamat = $request->alamat;
        $setting -> telepon = $request->telepon;
        $setting -> tipe_nota = $request->tipe_nota;
        // $setting -> diskon = $request->diskon;

        if($request->hasFile('path_logo')){
            $file=$request->file('path_logo');
            $nama='logo-'. date('Y-m-dHis'). $file->getClientOriginalExtension();
            $file->move(public_path('/images'), $nama);
            
            $setting->path_logo = "/images/$nama";
            
        }
        
        if($request->hasFile('path_kartu_member')){
            $file=$request->file('path_kartu_member');
            $nama='logo-'. date('Y-m-dHis'). $file->getClientOriginalExtension();
            $file->move(public_path('/images'), $nama);
            
            $setting->path_kartu_member = "/images/$nama";
            
        }
        $setting->update();
        return response()->json('Data Berhasil Disimpan', 200);
    }
}
