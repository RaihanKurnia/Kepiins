<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
    public function user_add_view($id) {
     
        $session = session('id');
        if ($id != $session ){
            abort(404);
        }
        return view('content.profile');
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
        DB::beginTransaction();
        try {
            if($request->hasfile('param_file')){
                // return 'halo';
                $file_ext = $request->file('param_file')->getClientOriginalExtension();
                $unq_filename=Str::uuid()->toString().'.'.$file_ext;
                $request->file('param_file')->move('photoprofile/',$unq_filename);

                Pegawai::create([
                    'nama_pegawai'=> $request->param_nama,
                    'email'=> $request->param_email,
                    'alamat'=> $request->param_alamat,
                    'nomor_telepon'=> $request->param_notelp,
                    'jabatan'=> $request->param_jabatan,
                    'tanggal_lahir'=>$request->param_tgllahir,
                    'role'=> 'Pegawai',
                    'password'=> $request->param_password,
                    'jenjang_pendidikan'=>$request->param_pendidikan,
                    'foto' => $unq_filename
                ]);

                DB::commit(); 

                return [
                        'success' => true,
                        'message' => 'Data berhasil disimpan'
                    ];
            }else {
                // return 'halo gaada hehe';
                Pegawai::create([
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
                   DB::commit(); 

                return [
                        'success' => true,
                        'message' => 'Data berhasil disimpan'
                    ];
            }

            // $result = Pegawai::create([
            //     'nama_pegawai'=> $request->param_nama,
            //     'email'=> $request->param_email,
            //     'alamat'=> $request->param_alamat,
            //     'nomor_telepon'=> $request->param_notelp,
            //     'jabatan'=> $request->param_jabatan,
            //     'tanggal_lahir'=>$request->param_tgllahir,
            //     'role'=> 'Pegawai',
            //     'password'=> $request->param_password,
            //     'jenjang_pendidikan'=>$request->param_pendidikan
            // ]);
            // return [
            //     'success' => true,
            //     'message' => 'Data berhasil disimpan'
            // ];

           
        } catch (\Throwable $th) {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat penyimpanan data',
                'error' => $th->getMessage(),
                'line' => $th->getLine()
            ];
        }
         
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
        DB::beginTransaction();
        try {
            
            
           

            // return $filemessage;

            if($request->hasfile('param_file')){
                $pegawai = Pegawai::where('idpegawai', $request->param_id)->first();
                $filemessage = '';
                if($pegawai->foto){
                $fotopath = public_path("photoprofile/".$pegawai->foto);
                if(file_exists($fotopath)){
                        unlink($fotopath);
                        $filemessage = 'Berhasil Hapus File!';
                    } else {
                        $filemessage = 'Gagal Hapus! File Tidak ditemukan';
                    }
                }
                
                // return 'halo';
                $file_ext = $request->file('param_file')->getClientOriginalExtension();
                $unq_filename=Str::uuid()->toString().'.'.$file_ext;
                $request->file('param_file')->move('photoprofile/',$unq_filename);
               
                Pegawai::where('idpegawai', $request->param_id)
                ->update([
    
                'nama_pegawai'=> $request->param_nama,
                'email'=> $request->param_email,
                'alamat'=> $request->param_alamat,
                'nomor_telepon'=> $request->param_notelp,
                'jabatan'=> $request->param_jabatan,
                'tanggal_lahir'=>$request->param_tgllahir,
                // 'password'=> $request->param_password,
                'jenjang_pendidikan'=>$request->param_pendidikan,
                'foto' => $unq_filename
                ]);
                DB::commit(); 

                return [
                    'success' => true,
                    'message' => 'Data berhasil dihapus',
                    'file' => $filemessage
                ];   
            
            } else {
                // return 'lanjut';
                Pegawai::where('idpegawai', $request->param_id)
                ->update([
                'nama_pegawai'=> $request->param_nama,
                'email'=> $request->param_email,
                'alamat'=> $request->param_alamat,
                'nomor_telepon'=> $request->param_notelp,
                'jabatan'=> $request->param_jabatan,
                'tanggal_lahir'=>$request->param_tgllahir,
                // 'password'=> $request->param_password,
                'jenjang_pendidikan'=>$request->param_pendidikan
                ]);
                DB::commit(); 
                return [
                    'success' => true,
                    'message' => 'Data berhasil dihapus'
                ];   
            }

            
              
        } catch (\Throwable $th) {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat update data',
                'error' => $th->getMessage(),
                'line' => $th->getLine()
            ];
        }
        
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

    public function changepassword(Request $request)
    {
        DB::beginTransaction();
        try {
           Pegawai::where('idpegawai', session('id'))
            ->update([
                'password'=>$request->newpassowrd
            ]);
        //   return session('id');
        DB::commit();
        return [
            'success' => true,
            'message' => 'Untuk Keamanan, Silahkan Login Kembali'
        ];
        } catch (\Throwable $th) {
        DB::rollback();
        return [
            'success' => false,
            'message' => 'Terjadi kesalahan saat update data',
            'error' => $th->getMessage(),
            'line' => $th->getLine()
        ];
        }
    }

}
