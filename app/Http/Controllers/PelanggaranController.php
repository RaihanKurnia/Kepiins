<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function pelanggaran_add_action(Request $request)
    {
        try {
            
            if($request->hasfile('param_file')){
                $request->file('param_file')->move('filesurat/',$request->file('param_file')->getClientOriginalName());
                $file_name = $request->file('param_file')->getClientOriginalName();

                Pelanggaran::create([
                    'bukti_pelanggaran' => $file_name,
                    'waktu_pelanggaran' => $request->param_tgl,
                    'pegawai_idbpegawai' => $request->param_idpeg,
                    'jenis_pelanggaran_idjenis_pelanggaran' => $request->param_idjenispel
                ]);

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

    // public function pelanggaran_edit_prepare(Request $request) {
    //     try {
    //         $pelanggaran = Pelanggaran::where('idpelanggaran',$request->param_id)->first();
    //         $pathfile = "filesurat/".$pelanggaran->bukti_pelanggaran;


    //         if(file_exists($pathfile)){
    //             $file = url($pathfile);
    //             $filemessage = 'File Ditemukan!';
    //         } else {
    //             $file = 'url_notFound';
    //             $filemessage = 'Gagal Termukan File!!';
    //         }

    //         // Pelanggaran::where('idpelanggaran',$request->param_id)->delete();

    //         return [
    //             'success' => true,
    //             'message' => 'Data berhasil dihapus',
    //             'file' => $file,
    //             'filemessage'=> $filemessage
    //         ];   

    //     } catch (\Throwable $th) {
    //         return [
    //             'success' => false,
    //             'message' => 'Terjadi kesalahan saat hapus data',
    //             'error' => $th->getMessage(),
    //             'line' => $th->getLine()
    //         ];
    //     }
    // }
}
