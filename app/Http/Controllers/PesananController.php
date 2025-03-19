<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Models\Customer;
use App\Models\Pesanan;

class PesananController extends Controller
{
    public function data_remove(Request $request){
        $result = DB::table('pesanans')
        ->where('id', $request->param_id)
        ->delete();
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];   
    }
}
