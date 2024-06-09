<?php

namespace App\Http\Controllers;
use DB;
use DataTables;
use Carbon\Carbon;
use App\Models\Pesanan;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function chart(Request $request) {
        $year = Carbon::now()->year;

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
        
        $resultsnilai1 = DB::table('customers')
            ->select(DB::raw('QUARTER(created_at) as triwulan, COUNT(*) as total'))
            ->where('idpegawai_input', session('id'))
            ->where('status_app_data_customer', '1')
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('QUARTER(created_at)'))
            ->get();

        $resultsnilai2 = Pesanan::with(['customer.pegawai'])
            ->whereHas('customer', function ($query) {
                $query->where('idpegawai_input', session('id'));
            })
            ->where('status_app_pesanan', '1')
            ->select(DB::raw('QUARTER(created_at) as triwulan, SUM(jumlah_order) as total'))
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('QUARTER(created_at)'))
            ->get();

        // dump($resultsnilai2);
            
        $resultsnilai3 = DB::table('pelanggarans')
            ->select(DB::raw('QUARTER(waktu_pelanggaran) as triwulan, COUNT(*) as total'))
            ->where('pegawai_idbpegawai', '3')
            // ->where('pegawai_idbpegawai', session('id'))
            ->whereYear('waktu_pelanggaran', $year)
            ->groupBy(DB::raw('QUARTER(waktu_pelanggaran)'))
            ->get();
            

        foreach ($resultsnilai1 as $resultnilai1) {
            $total = $resultnilai1->total;
            if ($total < 30) {
                $total = 5;
            } elseif ($total >= 30 && $total <= 60) {
                $total = 7;
            } else {
                $total = 9;
            }
            $nilai1default[$resultnilai1->triwulan] = $total;
        }

        foreach ($resultsnilai2 as $resultnilai2) {
            $total = $resultnilai2->total;
            if ($total <300) {
                $total = 5;
            } elseif ($total >= 300 && $total <= 1500) {
                $total = 7;
            } else {
                $total = 9;
            }
            $nilai2default[$resultnilai2->triwulan] = $total;
        }
       

       
        foreach ($resultsnilai3 as $resultnilai3) {
            $total = $resultnilai3->total;
            if ($total ==1 ) {
                $total = 7;
            } else {
                $total = 5;
            }
            $nilai3default[$resultnilai3->triwulan] = $total;
        }
       
        
        $nilai1 = [
            'name' => 'Nilai Input Customer',
            'data' => array_values($nilai1default)
        ];

        $nilai2 = [
            'name' => 'Nilai Input Tender',
            'data' => array_values($nilai2default)
        ];

        $nilai3 = [
            'name' => 'Nilai Input Pelanggaran',
            'data' => array_values($nilai3default)
        ];


        return [
            'nilai1'    => $nilai1,
            'nilai2'    => $nilai2,
            'nilai3'    => $nilai3,
            'message'   => true
        ];  
        
    
      
    }

    public function chart_manager(Request $request) {

        // return $request;
        if ($request->param_range){
            $year = $request->param_range;
        } else {
            $year = Carbon::now()->year;
        }
      

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
        
        // $resultsnilai1 = DB::table('customers')
        //     ->select(DB::raw('QUARTER(created_at) as triwulan, COUNT(*) as total',
        //     DB::table('customers')->select(DB::raw('QUARTER(created_at) as triwulan, COUNT() as total'))
        //     ))
        //     // ->where('idpegawai_input', session('id'))
        //     ->where('status_app_data_customer', '1')
        //     ->whereYear('created_at', $year)
        //     ->groupBy(DB::raw('QUARTER(created_at)'))
        //     ->get();

        $resultsnilai1 = DB::table('detail_penilaians')
        ->where('jenis_penilaian', 'customer')
        ->where(DB::raw('YEAR(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'),$year)
        ->select(
            DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d")) as triwulan'),
            DB::raw('COUNT(iddetail_penialaian) as jumlah_all_pegawai'),
            DB::raw('SUM(nilai) as total_nilai'),
            DB::raw('SUM(nilai)/COUNT(iddetail_penialaian) as nilai'),
            )
        ->groupBy(DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'))
        ->get();

        // return $resultsnilai1;
        
        // $resultsnilai2 = Pesanan::with(['customer.pegawai'])
        //     ->whereHas('customer', function ($query) {
        //         // $query->where('idpegawai_input', session('id'));
        //     })
        //     ->where('status_app_pesanan', '1')
        //     ->select(DB::raw('QUARTER(created_at) as triwulan, SUM(jumlah_order) as total'))
        //     ->whereYear('created_at', $year)
        //     ->groupBy(DB::raw('QUARTER(created_at)'))
        //     ->get();

        $resultsnilai2 = DB::table('detail_penilaians')
        ->where('jenis_penilaian', 'tender')
        ->where(DB::raw('YEAR(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'),$year)
        ->select(
            DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d")) as triwulan'),
            DB::raw('COUNT(iddetail_penialaian) as jumlah_all_pegawai'),
            DB::raw('SUM(nilai) as total_nilai'),
            DB::raw('SUM(nilai)/COUNT(iddetail_penialaian) as nilai'),
            )
        ->groupBy(DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'))
        ->get();

        // return $resultsnilai1;
            
        // $resultsnilai3 = DB::table('pelanggarans')
        //     ->select(DB::raw('QUARTER(waktu_pelanggaran) as triwulan, COUNT(*) as total'))
        //     ->where('pegawai_idbpegawai', '3')
        //     // ->where('pegawai_idbpegawai', session('id'))
        //     ->whereYear('waktu_pelanggaran', $year)
        //     ->groupBy(DB::raw('QUARTER(waktu_pelanggaran)'))
        //     ->get();

        $resultsnilai3 = DB::table('detail_penilaians')
        ->where('jenis_penilaian', 'pelanggaran')
        ->where(DB::raw('YEAR(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'),$year)
        ->select(
            DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d")) as triwulan'),
            DB::raw('COUNT(iddetail_penialaian) as jumlah_all_pegawai'),
            DB::raw('SUM(nilai) as total_nilai'),
            DB::raw('SUM(nilai)/COUNT(iddetail_penialaian) as nilai'),
            )
        ->groupBy(DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'))
        ->get();

        foreach ($resultsnilai1 as $resultnilai1) {
            $total = $resultnilai1->nilai;
            // if ($total < 30) {
            //     $total = 5;
            // } elseif ($total >= 30 && $total <= 60) {
            //     $total = 7;
            // } else {
            //     $total = 9;
            // }
            $nilai1default[$resultnilai1->triwulan] = $total;
        }

        foreach ($resultsnilai2 as $resultnilai2) {
            $total = $resultnilai2->nilai;
            // if ($total <300) {
            //     $total = 5;
            // } elseif ($total >= 300 && $total <= 1500) {
            //     $total = 7;
            // } else {
            //     $total = 9;
            // }
            $nilai2default[$resultnilai2->triwulan] = $total;
        }
       

       
        foreach ($resultsnilai3 as $resultnilai3) {
            $total = $resultnilai3->nilai;
            // if ($total ==1 ) {
            //     $total = 7;
            // } else {
            //     $total = 5;
            // }
            $nilai3default[$resultnilai3->triwulan] = $total;
        }
       
        
        $nilai1 = [
            'name' => 'Nilai Input Customer',
            'data' => array_values($nilai1default)
        ];

        $nilai2 = [
            'name' => 'Nilai Input Tender',
            'data' => array_values($nilai2default)
        ];

        $nilai3 = [
            'name' => 'Nilai Input Pelanggaran',
            'data' => array_values($nilai3default)
        ];


        return [
            'nilai1'    => $nilai1,
            'nilai2'    => $nilai2,
            'nilai3'    => $nilai3,
            'message'   => true
        ];  
        
    
      
    }
}
