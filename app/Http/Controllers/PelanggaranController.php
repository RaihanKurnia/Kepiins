<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Models\JenisPelanggaran;
use App\Models\Pelanggaran;
use App\Models\Penilaian;
use Carbon\Carbon;


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
        // return $request;
        
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

    public function pelanggaran_table_view() {
        return view('content.pelanggaran.pelanggaran_table');
    }

    public function pelanggaran_table_data(Request $request) {
       try {
        // return $request;
        if (session('role') == 'Pegawai'){
        $pelanggaran = DB::table('pelanggarans as pel')
            ->join('pegawais as peg','peg.idpegawai','=','pel.pegawai_idbpegawai')
            ->join('jenis_pelanggarans as jns','jns.idjenis_pelanggaran','=','pel.jenis_pelanggaran_idjenis_pelanggaran')
            ->where(DB::raw('QUARTER(STR_TO_DATE(waktu_pelanggaran, "%Y-%m-%d"))') ,$request->param_quarter)
            ->where('pel.pegawai_idbpegawai',session('id'))
            ->select('pel.*','peg.nama_pegawai','jns.nama_pelanggaran','jns.kategori','jns.bobot_pelanggaran')
            ->get();
        } else {
            if ($request->param_view == 'view') {
                $pelanggaran = DB::table('pelanggarans as pel')
                ->join('pegawais as peg','peg.idpegawai','=','pel.pegawai_idbpegawai')
                ->join('jenis_pelanggarans as jns','jns.idjenis_pelanggaran','=','pel.jenis_pelanggaran_idjenis_pelanggaran')
                ->where(DB::raw('QUARTER(STR_TO_DATE(waktu_pelanggaran, "%Y-%m-%d"))') ,$request->param_quarter)
                ->select('pel.*','peg.nama_pegawai','jns.nama_pelanggaran','jns.kategori','jns.bobot_pelanggaran')
                ->get();
            } else {
                $pelanggaran = DB::table('pelanggarans as pel')
                ->join('pegawais as peg','peg.idpegawai','=','pel.pegawai_idbpegawai')
                ->join('jenis_pelanggarans as jns','jns.idjenis_pelanggaran','=','pel.jenis_pelanggaran_idjenis_pelanggaran')
                ->where(DB::raw('QUARTER(STR_TO_DATE(waktu_pelanggaran, "%Y-%m-%d"))') ,$request->param_quarter)
                ->where('pel.pegawai_idbpegawai',$request->param_pegawai_idbpegawai)
                ->select('pel.*','peg.nama_pegawai','jns.nama_pelanggaran','jns.kategori','jns.bobot_pelanggaran')
                ->get();
            }
       
        }

        $pelanggaran = $pelanggaran->map(function($item) {
            $item->waktu_pelanggaran = Carbon::parse($item->waktu_pelanggaran)->format('Y-m-d');
            $item->bukti_pelanggaran = '<div style="white-space: nowrap; text-align: center;"><a href="' . url('filesurat/' . $item->bukti_pelanggaran) . '" target="_blank">Open File</a></div>';
            return $item;
        });

        // return $pelanggaran;

        $totalpelanggaran = $pelanggaran->count();
        // $bobot = $pelanggaran->bobot_pelanggaran;


        // return $pelanggaran;
        $bobot = 0;
        foreach ($pelanggaran as $pelanggaran_data) {
            $bobot += $pelanggaran_data->bobot_pelanggaran;
        }
/*
        if ($bobot = 0){
            $poin = 10;
  
            }
*/
             if($bobot >= 1 && $bobot <= 20) {
            $poin = 9;
        } else if ($bobot >= 21 && $bobot <= 50) {
            $poin = 5;
        // } else if ($bobot >= 45 && $bobot <= 59) {
        //     $poin = 3; 
        } else if ($bobot > 50){
            $poin = 0;
        }

        // return $poin;

        // foreach ($pelanggaran as $sumbobot) {
        //    return $sumbobot->bobot_pelanggaran;
        // }


        // foreach ($pelanggaran as $sumbobot) {
        //     if ($sumbobot->bobot_pelanggaran < 15){
        //         +$poin = 9;
        //     }else if ($sumbobot->bobot_pelanggaran >= 15 && $sumbobot->bobot_pelanggaran <= 29) {
        //         +$poin = 7;
        //     } else if ($sumbobot->bobot_pelanggaran >= 30 && $sumbobot->bobot_pelanggaran <= 44) {
        //         +$poin = 5;
        //     } else if ($sumbobot->bobot_pelanggaran >= 45 && $sumbobot->bobot_pelanggaran <= 59) {
        //         +$poin = 3; 
        //     } else if ($sumbobot->bobot_pelanggaran > 59){
        //         +$poin = 0;
        //     }
        // }

        
        // return [$sumbobot->bobot_pelanggaran,$poin];


        // if($totalpelanggaran == 0){
        //     $poin = 9;
        // }
        // else if($totalpelanggaran <= 2){
        //     $poin = 7;
        // } else {
        //     $poin = 5;
        // }


        return response()->json([
            'data' => $pelanggaran,
            'totalpelanggaran' => $totalpelanggaran,
            'poin' =>$poin
            ]);


       } catch (\Throwable $th) {
        return [
            'success' => false,
            'message' => 'Terjadi kesalahan saat pengambilan data',
            'error' => $th->getMessage()
        ];
        //throw $th;
       }
    }

    public function pelanggaran_add_action(Request $request)
    {
        DB::beginTransaction();
        try {
            if($request->hasfile('param_file')){
                $file_ext = $request->file('param_file')->getClientOriginalExtension();
                $unq_filename=Str::uuid()->toString().'.'.$file_ext;
                $request->file('param_file')->move('filesurat/',$unq_filename);

                $result = Pelanggaran::create([
                    'bukti_pelanggaran' => $unq_filename,
                    'waktu_pelanggaran' => $request->param_tgl,
                    'pegawai_idbpegawai' => $request->param_idpeg,
                    'jenis_pelanggaran_idjenis_pelanggaran' => $request->param_idjenispel
                ]);


                if ($result) {
                    // return $result;

                    $year = Carbon::now()->year;
                    $pelanggaran = Pelanggaran::where('pegawai_idbpegawai', $request->param_idpeg)
                    ->first();

                    $waktuPelanggaran = Carbon::parse($pelanggaran->waktu_pelanggaran);

                    $pelanggaranacc_year = $waktuPelanggaran->year;
                    $pelanggaranacc_quarter = $waktuPelanggaran->quarter;
                    // return $pelanggaranacc_quarter;
                    // $pelanggaranacc_year = DB::raw('YEAR(STR_TO_DATE(waktu_pelanggaran, "%Y-%m-%d"))');
                    // $pelanggaranacc_quarter = DB::raw('QUARTER(STR_TO_DATE(waktu_pelanggaran, "%Y-%m-%d"))');
                   

                    // return [$pelanggaranacc_year,$pelanggaranacc_quarter];

                    if($pelanggaran){
                        $jumlahbobot = Pelanggaran::select(DB::raw('SUM(bobot_pelanggaran) AS jmlbobot'))
                        ->join('jenis_pelanggarans','jenis_pelanggarans.idjenis_pelanggaran','pelanggarans.jenis_pelanggaran_idjenis_pelanggaran')
                        ->where('pegawai_idbpegawai',$pelanggaran->pegawai_idbpegawai)
                        ->where(DB::raw('YEAR(pelanggarans.waktu_pelanggaran)'),$pelanggaranacc_year)
                        ->where(DB::raw('QUARTER(pelanggarans.waktu_pelanggaran)'),$pelanggaranacc_quarter)
                        ->groupBy(DB::raw('YEAR(pelanggarans.waktu_pelanggaran)'), DB::raw('QUARTER(pelanggarans.waktu_pelanggaran)'))
                        ->get();
                    }

                    // $jumlahbobot=  $jumlahbobot->jmlbobot;

                    // return $jumlahbobot;

                    // $sumbobot= $jumlahbobot[0]->jmlbobot;
                    
                    foreach ($jumlahbobot as $sumbobot) {
                    // return $sumbobot->jmlbobot;
                        if($sumbobot->jmlbobot < 1){
                            $nilai = 10;
                        } else if ($sumbobot->jmlbobot >= 1 && $sumbobot->jmlbobot <= 20) {
                            $nilai = 9;
                        } else if ($sumbobot->jmlbobot >= 21 && $sumbobot->jmlbobot <= 50) {
                            $nilai = 5;
                        // } else if ($sumbobot->jmlbobot >= 45 && $sumbobot->jmlbobot <= 59) {
                        //     $nilai = 3; 
                        } else if ($sumbobot->jmlbobot > 50){
                            $nilai = 0;
                        }
                    }

                    // return [$sumbobot->jmlbobot,$nilai];
                    
                     //cek apakh sudah ada quater dan year yg sama
                    $pelanggarannilai = Penilaian::where('pegawai_idpegawai',$pelanggaran->pegawai_idbpegawai)
                    ->where('jenis_penilaian','pelanggaran')
                    ->where(DB::raw('YEAR(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'),$pelanggaranacc_year)
                    ->where(DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'),$pelanggaranacc_quarter)
                    ->first();

                    // return [$pelanggaranacc_year,$pelanggaranacc_quarter,$pelanggarannilai,$nilai];

                    //jika tidak ada yg sama, insert kuy
                    if(!$pelanggarannilai){ 
                        Penilaian::create([
                            'nilai' => $nilai ,
                            'jenis_penilaian' => 'pelanggaran',
                            'pegawai_idpegawai' =>  $pelanggaran->pegawai_idbpegawai,
                            'periode' => $pelanggaranacc_year,
                            'tanggal_penilaian'=>Carbon::createFromFormat('Y-m-d H:i:s', $pelanggaran->waktu_pelanggaran)
                        ]);
                        $nilaimessage = 'insert nilai baru';
                    } else {
                        if($pelanggarannilai->nilai != $nilai){
                            $pelanggarannilai->update([
                                'nilai' => $nilai
                            ]);
                            $nilaimessage = 'update nilai to '.$nilai;
                        } else {
                            $nilaimessage = 'no update nilai';
                        }
                    }
    
                }
                DB::commit();   
                return [
                    'success' => true,
                    'message' => 'Data berhasil disimpan'
                ];
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat penyimpanan data',
                'error' => $th->getMessage()
            ];
        }
    }

    public function pelanggaran_remove_action(Request $request) {
        DB::beginTransaction();
        try {
            $pelanggaran = Pelanggaran::where('idpelanggaran',$request->param_id)->first();
            $pathfile = public_path("filesurat/".$pelanggaran->bukti_pelanggaran);


            if(file_exists($pathfile)){
                unlink($pathfile);
                $filemessage = 'Berhasil Hapus File!';
            } else {
                $filemessage = 'Gagal Hapus! File Tidak ditemukan';
            }

            Pelanggaran::where('idpelanggaran',$request->param_id)->delete();

            DB::commit();
            return [
                'success' => true,
                'message' => 'Data berhasil dihapus',
                'file' => $filemessage
            ];   

        } catch (\Throwable $th) {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat hapus data',
                'error' => $th->getMessage(),
                'line' => $th->getLine()
            ];
        }
    }

    public function pelanggaran_edit_prepare(Request $request) {
        try {
            $pelanggaran = Pelanggaran::where('idpelanggaran',$request->param_id)->first();
            $pathfile = "filesurat/".$pelanggaran->bukti_pelanggaran;


            if(file_exists($pathfile)){
                $file = url($pathfile);
                $filemessage = 'File Ditemukan!';
            } else {
                $file = 'url_notFound';
                $filemessage = 'Gagal Termukan File!!';
            }

            // Pelanggaran::where('idpelanggaran',$request->param_id)->delete();

            return [
                'success' => true,
                'message' => 'Data berhasil dihapus',
                'file' => $file,
                'filemessage'=> $filemessage
            ];   

        } catch (\Throwable $th) {
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat hapus data',
                'error' => $th->getMessage(),
                'line' => $th->getLine()
            ];
        }
    }
}
