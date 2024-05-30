<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\JenisPelanggaran;
use App\Models\Pelanggaran;

class PelanggaranController extends Controller
{
    //JENIS PELANGGARAN
    public function jenis_pelanggaran() {
        return view('content.pelanggaran.jenis_pelanggaran_add');
    }

    public function jns_json()
    {
        $pegawai = DB::table('jenis_pelanggarans')
        ->get();
        return response()->json(['data' => $pegawai]);
    }

    public function jns_pelanggaran_add(Request $request)
    {
        $result = JenisPelanggaran::create([
            'nama_pelanggaran'=> $request->param_nama,
            'bobot_pelanggaran'=> $request->param_bobot,
            'kategori'=>$request->param_kategori
        ]);
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];        
    }

    public function jns_pelanggaran_edit(Request $request)
    {
        $result = JenisPelanggaran::where('idjenis_pelanggaran', $request->param_id)
        ->update([
            'nama_pelanggaran'=> $request->param_nama,
            'bobot_pelanggaran'=> $request->param_bobot,
            'kategori'=>$request->param_kategori
        ]);
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];        
    }

    public function jns_pelanggaran_remove(Request $request)
    {
        $result = JenisPelanggaran::where('idjenis_pelanggaran', $request->param_id)
        ->delete();
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];        
    }

    //PELANGGARAN

    public function pelanggaran_add()
    {
        return view('content.pelanggaran.pelanggaran_add');
    }
}
