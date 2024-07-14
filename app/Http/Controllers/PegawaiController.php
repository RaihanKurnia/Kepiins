<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;
use DataTables;
use App\Models\Pegawai;
use Carbon\Carbon;


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
        
        $year = Carbon::now()->year;

        $pegawais = DB::table('pegawais')
        ->where('pegawais.role' ,'=','Pegawai')
        ->select('pegawais.*')
        ->get();
        
        foreach ($pegawais as $pegawai) {

            $defaultvalues = function () {
                return [
                    1 => 0,
                    2 => 0,
                    3 => 0,
                    4 => 0,
                ];
            };
    
            $defaultvaluespelanggaran = function () {
                return [
                    1 => 9,
                    2 => 9,
                    3 => 9,
                    4 => 9,
                ];
            };
    
            $nilai1default = $defaultvalues();
            $nilai2default = $defaultvalues();
            $nilai3default = $defaultvaluespelanggaran();
            // $pegawai->nilai =$pegawai->idpegawai;
            // return [$pegawai->idpegawai];

            $resultsnilai1 = DB::table('detail_penilaians')
            ->where('jenis_penilaian', 'customer')
            ->where(DB::raw('YEAR(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'),$year)
            ->where('pegawai_idpegawai', $pegawai->idpegawai)
            ->select(
                DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d")) as triwulan'),
                DB::raw('nilai as nilai')
                )
            ->get();
            

            $resultsnilai2 = DB::table('detail_penilaians')
            ->where('jenis_penilaian', 'tender')
            ->where(DB::raw('YEAR(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'),$year)
            ->where('pegawai_idpegawai', $pegawai->idpegawai)
            ->select(
                DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d")) as triwulan'),
                DB::raw('nilai as nilai'),
                )
            ->get();
        

            $resultsnilai3 = DB::table('detail_penilaians')
            ->where('jenis_penilaian', 'pelanggaran')
            ->where('pegawai_idpegawai', $pegawai->idpegawai)
            ->where(DB::raw('YEAR(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'),$year)
            ->select(
                DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d")) as triwulan'),
                DB::raw('nilai as nilai'),
                )
            ->get();
            
            foreach ($resultsnilai1 as $resultnilai1) {
                $total = $resultnilai1->nilai;
                $nilai1default[$resultnilai1->triwulan] = $total;
            }
    
            foreach ($resultsnilai2 as $resultnilai2) {
                $total = $resultnilai2->nilai;
                $nilai2default[$resultnilai2->triwulan] = $total;
            }
           
            foreach ($resultsnilai3 as $resultnilai3) {
                $total = $resultnilai3->nilai;
                $nilai3default[$resultnilai3->triwulan] = $total;
            }
    
            
            $nilai1 = [
                'name' => 'Nilai Input Customer',
                'data' => array_values($nilai1default)
            ];
            
            // return $nilai1['data'];

            $nilai2 = [
                'name' => 'Nilai Input Tender',
                'data' => array_values($nilai2default)
            ];
    
            $nilai3 = [
                'name' => 'Nilai Input Pelanggaran',
                'data' => array_values($nilai3default)
            ];
    
            $rekomenperiode1 = (ROUND((($nilai1['data'][0])*0.25),2))+(ROUND((($nilai2['data'][0])*0.5),2))+(ROUND((($nilai3['data'][0])*0.25),2));
            $rekomenperiode2 = (ROUND((($nilai1['data'][1])*0.25),2))+(ROUND((($nilai2['data'][1])*0.5),2))+(ROUND((($nilai3['data'][1])*0.25),2));
            $rekomenperiode3 = (ROUND((($nilai1['data'][2])*0.25),2))+(ROUND((($nilai2['data'][2])*0.5),2))+(ROUND((($nilai3['data'][2])*0.25),2));
            $rekomenperiode4 = (ROUND((($nilai1['data'][3])*0.25),2))+(ROUND((($nilai2['data'][3])*0.5),2))+(ROUND((($nilai3['data'][3])*0.25),2));
    
            $averagerekomen = ROUND((($rekomenperiode1+$rekomenperiode2+$rekomenperiode3+$rekomenperiode4)/4),2);

            $pegawai->nilai = $averagerekomen;

        }


       
        return response()->json([
            'data' => $pegawais,
            'message' => true
        ]);

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
