<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    public function jabatan() {
        return view('content.jabatan.jabatan_table');
    }
    

    public function jabatan_json()
    {
        $jabatan = DB::table('jabatans')->get();
        return response()->json(['data' => $jabatan]);
    }

    public function jabatan_add(Request $request)
    {
        $result = Jabatan::create([
            'nama'=> $request->param_nama,
            'status'=> $request->param_status,
        ]);
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];        
    }

    public function jabatan_edit(Request $request)
    {
        $result = Jabatan::where('id', $request->param_id)
        ->update([
            'nama'=> $request->param_nama,
            'status'=> $request->param_status,
        ]);
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];        
    }

    public function jabatan_remove(Request $request)
    {
        $result = DB::table('jabatans')
        ->where('id', $request->param_id)
        ->delete();
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];
    }
}
