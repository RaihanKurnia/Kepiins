<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Models\Barang;

class BarangController extends Controller
{
    public function barang() {
        return view('content.barang.barang_table');
    }
    public function barang_json() {
        $barang = DB::table('barangs')->get();
        return response()->json(['data' => $barang]);
    }

    public function barang_add(Request $request)
    {
        $result = Barang::create([
            'nama_barang'=> $request->param_nama,
            'harga'=> $request->param_harga,
            'deskripsi'=>$request->param_deskripsi
        ]);
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];        
    }

    public function barang_edit(Request $request)
    {
        $result = Barang::where('id', $request->param_id)
        ->update([
            'nama_barang'=> $request->param_nama,
            'harga'=> $request->param_harga,
            'deskripsi'=>$request->param_deskripsi
        ]);
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];        
    }

    public function barang_remove(Request $request)
    {
        $result = DB::table('barangs')
        ->where('id', $request->param_id)
        ->delete();
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];
    }
}
