<?php

namespace App\Http\Controllers;
use DB;
use DataTables;
use App\Models\User;
use App\Models\Pegawai;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function session()  {
          dd(session()->all());
        //   dd(session('id'));

        
    }

    public function user() {
        return view('content.user.user_table');
    }

    public function user_view_form() {
        return view('content.user.user_add');
    }

    public function user_session() {
        $users = DB::table('pegawais')
        ->where('idpegawai' , session('id'))
        ->get();
        return [
            'data' => $users
        ];
       
    }


    public function user_json()
    {
        $users = DB::table('pegawais')
        ->where('pegawais.role' ,'!=','Pegawai')
        ->get();
        return response()->json(['data' => $users]);
    }
    public function user_get_edit(Request $request)
    {

        $result = DB::table('pegawais')
        ->where('idpegawai', $request->param_id)
        ->get();
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];       
    }

    public function user_add(Request $request)
    {
        // dd($request->param_role);
        $result = Pegawai::create([
            'nama_pegawai'=>$request->param_nama,
            'password'=> $request->param_password,
            'email'=>$request->param_email,
            'role'=>$request->param_role
        ]);
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];     
    }

    public function user_edit(Request $request)
    {
        $result = Pegawai::where('idpegawai', $request->param_id)
        ->update([
            'nama_pegawai'=> $request->param_nama,
            'password'=> $request->param_password,
            'role'=>$request->param_role,
            'email'=>$request->param_email
        ]);
        return [
            'success'   => $result,
            'message'   => ($result?'Success':'Gagal')
        ];        
    }

    public function user_remove(Request $request)
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
