<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;  
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(){
        return view('login');
        
    }
    
    public function loginproses(Request $request){

        $email=$request->email;
        $pass=$request->password;

        // dd($username);
      
       $data = DB::table('pegawais')
        -> where('email',$email)
        -> first();
        // dd($data);
        if($data){
            if($pass == $data->password){
                session(['berhasil_login'=>true]);
                session(['id'=> $data->idpegawai]);
                session(['nama'=> $data->nama_pegawai]);
                session(['email'=> $data->email]);
                session(['role'=> $data->role]);
                return [
                    'success'   => ($data?'Success':'Gagal'),
                    'message'   => $data
                ];   
            } else {
                return response()->json([
                'success' => false,
                'message' => 'Password yang anda masukkan Salah!'
                ]); 
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Akun Tidak Terdaftar/Salah!'
            ]);  
        }   
    }

    public function logout(Request $request)
    {  
        $request->session()->flush();
        return redirect('/');
    }
}
