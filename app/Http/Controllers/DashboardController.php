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
        // $year = Carbon::now()->year;

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
        

        $resultsnilai1 = DB::table('detail_penilaians')
        ->where('jenis_penilaian', 'customer')
        ->where(DB::raw('YEAR(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'),$year)
        ->where('pegawai_idpegawai', session('id'))
        ->select(
            DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d")) as triwulan'),
            DB::raw('nilai as nilai')
            )
        ->get();

        $resultsnilai2 = DB::table('detail_penilaians')
        ->where('jenis_penilaian', 'tender')
        ->where(DB::raw('YEAR(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'),$year)
        ->where('pegawai_idpegawai', session('id'))
        ->select(
            DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d")) as triwulan'),
            DB::raw('nilai as nilai'),
            )
        ->get();
     

        $resultsnilai3 = DB::table('detail_penilaians')
        ->where('jenis_penilaian', 'pelanggaran')
        ->where('pegawai_idpegawai', session('id'))
        ->where(DB::raw('YEAR(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'),$year)
        ->select(
            DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d")) as triwulan'),
            DB::raw('nilai as nilai'),
            )
        ->get();
 
        $nilaiRekomendasi = DB::table('nilais')
        ->where('tipe', 3)
        ->get();
        
        $nilaiRekomen = 0 ;
        if ($nilaiRekomendasi->isEmpty()) {
            $nilaiRekomen = 0;
        } else {
            $nilaiRekomen = $nilaiRekomendasi[0]->nilai;
        }
        

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

        $jumlahcustomerall = DB::table('customers')
        ->where('idpegawai_input', session('id'))
        ->where('status_app_data_customer','1')
        ->count();


        

        $jumlahpesanantenderrall = Pesanan::with(['customer.pegawai'])
        ->whereHas('customer', function ($query) {
            $query->where('idpegawai_input', session('id'));
        })
        ->where('status_app_pesanan','1')
        ->sum('jumlah_order');


        $jumlahpelanggaranall = DB::table('pelanggarans')
        ->where('pegawai_idbpegawai', session('id'))
        ->count();

        // return $jumlahpesanantenderrall;


        return [
            'nilai1'    => $nilai1,
            'nilai2'    => $nilai2,
            'nilai3'    => $nilai3,
            'nilaiRekomen' => $averagerekomen,
            'jmlhcustomer' => $jumlahcustomerall,
            'jmlhpesanan' =>$jumlahpesanantenderrall,
            'jmlhpelanggaran'=>$jumlahpelanggaranall,
            'nilaiRekomenMain' => $nilaiRekomen,
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
        
        

        $resultsnilai1 = DB::table('detail_penilaians as nilai')
        ->where('jenis_penilaian', 'customer')
        ->select(
            DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d")) as triwulan'),
            DB::raw('ROUND(SUM(nilai) / (select count(idpegawai) from pegawais where role = "Pegawai"),1) as nilai'),
            )
        ->groupBy(DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'))
        ->get();

        

       

        $resultsnilai2 = DB::table('detail_penilaians as nilai')
        ->where('jenis_penilaian', 'tender')
        ->select(
            DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d")) as triwulan'),
            DB::raw('ROUND(SUM(nilai) / (select count(idpegawai) from pegawais where role = "Pegawai"),1) as nilai'),
            )
            ->groupBy(DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'))
        ->get();

    

        $resultsnilai3 = DB::select(
            "SELECT '1' AS triwulan, ROUND(AVG(COALESCE(dp.nilai, 9)),1) AS nilai
            FROM pegawais p
            LEFT JOIN (SELECT pegawai_idpegawai, nilai FROM detail_penilaians WHERE jenis_penilaian = 'pelanggaran' AND QUARTER(tanggal_penilaian) = 1) dp
                ON p.idpegawai = dp.pegawai_idpegawai
            WHERE p.role = 'Pegawai'
            UNION ALL
            SELECT '2' AS triwulan, ROUND(AVG(COALESCE(dp.nilai, 9)),1) AS nilai
            FROM pegawais p
            LEFT JOIN (SELECT pegawai_idpegawai, nilai FROM detail_penilaians WHERE jenis_penilaian = 'pelanggaran' AND QUARTER(tanggal_penilaian) = 2) dp
                ON p.idpegawai = dp.pegawai_idpegawai
            WHERE p.role = 'Pegawai'
            UNION ALL
            SELECT '3' AS triwulan, ROUND(AVG(COALESCE(dp.nilai, 9)),1) AS nilai
            FROM pegawais p
            LEFT JOIN (SELECT pegawai_idpegawai, nilai FROM detail_penilaians WHERE jenis_penilaian = 'pelanggaran' AND QUARTER(tanggal_penilaian) = 3) dp
                ON p.idpegawai = dp.pegawai_idpegawai
            WHERE p.role = 'Pegawai'
            UNION ALL
            SELECT '4' AS triwulan, ROUND(AVG(COALESCE(dp.nilai, 9)),1) AS nilai
            FROM pegawais p
            LEFT JOIN (SELECT pegawai_idpegawai, nilai FROM detail_penilaians WHERE jenis_penilaian = 'pelanggaran' AND QUARTER(tanggal_penilaian) = 4) dp
                ON p.idpegawai = dp.pegawai_idpegawai
            WHERE p.role = 'Pegawai';"
        );


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

        // return $nilai3;

        return [
            'nilai1'    => $nilai1,
            'nilai2'    => $nilai2,
            'nilai3'    => $nilai3,
            'message'   => true
        ];  
        
    
      
    }

    public function photoprofile() {
        $photo = DB::table('pegawais')
        ->select('foto')
        ->where('idpegawai',  session('id'))
        ->get();
        return $photo[0];
    }
}
