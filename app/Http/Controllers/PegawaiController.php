<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function pegawai() {
        return view('content.pegawai.pegawai_table');
    }
    public function pegawai_add_view() {
        return view('content.pegawai.pegawai_add');
    }
    public function json()
    {
        $pegawai = DB::table('pegawais')
        ->where('pegawais.role' ,'=','Pegawai')
        ->select('pegawais.*')
        ->get();
        return response()->json(['data' => $pegawai]);
    }

    public function pegawai_add(Request $request)
    {
        // dd($request);
        $result = Pegawai::create([
            'nama_pegawai'=> $request->param_nama,
            'email'=> $request->param_email,
            'alamat'=> $request->param_alamat,
            'nomor_telepon'=> $request->param_notelp,
            'jabatan'=> $request->param_jabatan,
            'tanggal_lahir'=>$request->param_tgllahir,
            'role'=> 'Pegawai',
            'password'=> $request->param_password,
            'jenjang_pendidikan'=>$request->param_pendidikan
        ]);
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];        
    }

    public function pegawai_get_edit(Request $request)
    {

        $result = DB::table('pegawais')
        ->where('idpegawai', $request->param_id)
        ->get();
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];       
    }

    function pegawai_edit(Request $request) {
        $result = Pegawai::where('idpegawai', $request->param_id)
        ->update([

            'nama_pegawai'=> $request->param_nama,
            'email'=> $request->param_email,
            'alamat'=> $request->param_alamat,
            'nomor_telepon'=> $request->param_notelp,
            'jabatan'=> $request->param_jabatan,
            'tanggal_lahir'=>$request->param_tgllahir,
            'password'=> $request->param_password,
            'jenjang_pendidikan'=>$request->param_pendidikan
        ]);
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];    
    }

    public function pegawai_remove(Request $request)
    {
        $result = DB::table('pegawais')
        ->where('idpegawai', $request->param_id)
        ->delete();
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];
    }

}
