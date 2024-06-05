<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;
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
            ->where('pel.pegawai_idbpegawai',session('id'))
            ->select('pel.*','peg.nama_pegawai','jns.nama_pelanggaran','jns.kategori')
            ->get();
        } else {
            if ($request->param_view == 'view') {
                $pelanggaran = DB::table('pelanggarans as pel')
                ->join('pegawais as peg','peg.idpegawai','=','pel.pegawai_idbpegawai')
                ->join('jenis_pelanggarans as jns','jns.idjenis_pelanggaran','=','pel.jenis_pelanggaran_idjenis_pelanggaran')
                ->select('pel.*','peg.nama_pegawai','jns.nama_pelanggaran','jns.kategori')
                ->get();
            } else {
                $pelanggaran = DB::table('pelanggarans as pel')
                ->join('pegawais as peg','peg.idpegawai','=','pel.pegawai_idbpegawai')
                ->join('jenis_pelanggarans as jns','jns.idjenis_pelanggaran','=','pel.jenis_pelanggaran_idjenis_pelanggaran')
                ->where('pel.pegawai_idbpegawai',$request->param_pegawai_idbpegawai)
                ->select('pel.*','peg.nama_pegawai','jns.nama_pelanggaran','jns.kategori')
                ->get();
            }
       
        }

        $pelanggaran = $pelanggaran->map(function($item) {
            $item->waktu_pelanggaran = Carbon::parse($item->waktu_pelanggaran)->format('Y-m-d');
            $item->bukti_pelanggaran = '<div style="white-space: nowrap; text-align: center;"><a href="' . url('filesurat/' . $item->bukti_pelanggaran) . '" target="_blank">Open File</a></div>';
            return $item;
        });

        $totalpelanggaran = $pelanggaran->count();

        if($totalpelanggaran == 0){
            $poin = 9;
        }
        else if($totalpelanggaran <= 2){
            $poin = 7;
        } else {
            $poin = 5;
        }


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
                    $year = Carbon::now()->year;
    
                     Penilaian::create([
                        'nilai' => '1',
                        'jenis_penilaian' => 'pelanggaran',
                        'pegawai_idpegawai' =>  $request->param_idpeg,
                        'periode' => $year
                    ]);
    
                    // return ($gas);
    
                }

                return [
                    'success' => true,
                    'message' => 'Data berhasil disimpan'
                ];
            }
        } catch (\Throwable $th) {
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat penyimpanan data',
                'error' => $th->getMessage()
            ];
        }
    }

    public function pelanggaran_remove_action(Request $request) {
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

            return [
                'success' => true,
                'message' => 'Data berhasil dihapus',
                'file' => $filemessage
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
