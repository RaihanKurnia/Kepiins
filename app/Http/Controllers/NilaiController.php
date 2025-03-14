<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use DataTables;
use Carbon\Carbon;
use App\Models\Pesanan;
use App\Models\Customer;
use App\Models\Penilaian;


class NilaiController extends Controller
{
    public function nilaitender() {
        return view('content.masternilai.nilai_table');
    }

    public function nilai_json(Request $request)
    {
        $nilais = DB::table('nilais')
        ->where('tipe' ,$request->param_id)
        ->get();
        return response()->json(['data' => $nilais]);
    }

    public function nilai_view_form_tender() {
        return view('content.masternilai.nilai_add_tender');
    }
    public function nilai_view_form_customer() {
        return view('content.masternilai.nilai_add_customer');
    }

    public function nilai_view_form_rekomen() {
        return view('content.masternilai.nilai_add_rekomendasi');
    }

    public function nilai_add_actionbckp(Request $request) {
       
        DB::beginTransaction();
        try {
            $datanilai = $request->input('params');
            $nilaiTender = [];

            foreach ($datanilai as $nilai) {
               DB::table('nilais')->updateOrInsert(
                    [   
                        'kategori_nilai' => $nilai['kategori'],
                        'tipe' => $nilai['tipe']
                    ], 
                    [
                        'nilai' => $nilai['nilai'],
                        'minimum_bobot' => $nilai['minimum'],
                        'maksimum_bobot' => $nilai['maksimum'],
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]
                );

                $nilaiTender[] = [
                    'kategori_nilai' => $nilai['kategori'],
                    'tipe' => $nilai['tipe'],
                    'nilai' => $nilai['nilai'],
                    'minimum_bobot' => $nilai['minimum'],
                    'maksimum_bobot' => $nilai['maksimum'],
                ];
            }

     
                $pesanans = Pesanan::with(['customer.pegawai', 'barang'])
                ->where(DB::raw('QUARTER(STR_TO_DATE(tanggal_pemesanan, "%Y-%m-%d"))'), Carbon::now()->quarter)
                ->where(DB::raw('YEAR(STR_TO_DATE(tanggal_pemesanan, "%Y-%m-%d"))'), DB::raw('YEAR(CURDATE())'))
                ->get()
                ->map(function ($pesanan) {
                    return [
                        'id_pesanan' => $pesanan->id_pesanan,
                        'id_pegawai' => $pesanan->customer->pegawai->idpegawai,
                        'nama_pegawai' => $pesanan->customer->pegawai->nama_pegawai,
                        'nama_customer' => $pesanan->customer->nama_customer,
                        'email' => $pesanan->customer->email,
                        'nomor_telefon' => $pesanan->customer->nomor_telefon,
                        'pengiriman_idpengiriman' => $pesanan->pengiriman_idpengiriman,
                        'nama_barang' => $pesanan->barang->nama_barang,
                        'jumlah_order' => $pesanan->jumlah_order,
                        'tanggal_pemesanan' => Carbon::parse($pesanan->tanggal_pemesanan)->format('Y-m-d'),
                        'tanggal_pengiriman' => Carbon::parse($pesanan->tanggal_pengiriman)->format('Y-m-d'),
                        'status_app_pesanan' => $pesanan->status_app_pesanan,
                    ];
                });



            $filteredPesanans = $pesanans->filter(function ($pesanan) {
                return $pesanan['status_app_pesanan'] == '1';
            });

            $totalorder = $pesanans->sum('jumlah_order');
            $totalorderacc = $filteredPesanans->sum('jumlah_order');

            // if ($totalorderacc == 0) {
            //     $poin = 0;
            // } else {
            //     $kategori = $nilaiTender->filter(function ($nilai) use ($totalorderacc) {
            //         return $totalorderacc >= $nilai->minimum_bobot && $totalorderacc <= $nilai->maksimum_bobot;
            //     })->first();
            //     $poin = $kategori ? $kategori->nilai : 0;
            // }

            if ($totalorderacc == 0) {
                $poin = 0;
            } else {
                // Gunakan array $nilaiTender yang sudah diisi dari input awal
                $kategori = null;
                foreach ($nilaiTender as $nilai) {
                    if ($totalorderacc >= $nilai['minimum_bobot'] && $totalorderacc <= $nilai['maksimum_bobot']) {
                        $kategori = $nilai;
                        break;
                    }
                }
                $poin = $kategori ? $kategori['nilai'] : 0;
            }
            
            dd($poin);

       

            DB::commit(); 
            return [
                'success' => true,
                'message' => 'Data berhasil disimpan'
            ];

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

    public function nilai_add_action_tender(Request $request) {
       
        DB::beginTransaction();
        try {
            $datanilai = $request->input('params');
            $nilaiTender = [];

            foreach ($datanilai as $nilai) {
               DB::table('nilais')->updateOrInsert(
                    [   
                        'kategori_nilai' => $nilai['kategori'],
                        'tipe' => $nilai['tipe']
                    ], 
                    [
                        'nilai' => $nilai['nilai'],
                        'minimum_bobot' => $nilai['minimum'],
                        'maksimum_bobot' => $nilai['maksimum'],
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]
                );

                $nilaiTender[] = [
                    'kategori_nilai' => $nilai['kategori'],
                    'tipe' => $nilai['tipe'],
                    'nilai' => $nilai['nilai'],
                    'minimum_bobot' => $nilai['minimum'],
                    'maksimum_bobot' => $nilai['maksimum'],
                ];
            }

     
                $pesanans = Pesanan::with(['customer.pegawai', 'barang'])
                ->where(DB::raw('QUARTER(STR_TO_DATE(tanggal_pemesanan, "%Y-%m-%d"))'), Carbon::now()->quarter)
                ->where(DB::raw('YEAR(STR_TO_DATE(tanggal_pemesanan, "%Y-%m-%d"))'), DB::raw('YEAR(CURDATE())'))
                ->get()
                ->map(function ($pesanan) {
                    return [
                        'id_pesanan' => $pesanan->id_pesanan,
                        'id_pegawai' => $pesanan->customer->pegawai->idpegawai,
                        'nama_pegawai' => $pesanan->customer->pegawai->nama_pegawai,
                        'nama_customer' => $pesanan->customer->nama_customer,
                        'email' => $pesanan->customer->email,
                        'nomor_telefon' => $pesanan->customer->nomor_telefon,
                        'pengiriman_idpengiriman' => $pesanan->pengiriman_idpengiriman,
                        'nama_barang' => $pesanan->barang->nama_barang,
                        'jumlah_order' => $pesanan->jumlah_order,
                        'tanggal_pemesanan' => Carbon::parse($pesanan->tanggal_pemesanan)->format('Y-m-d'),
                        'tanggal_pengiriman' => Carbon::parse($pesanan->tanggal_pengiriman)->format('Y-m-d'),
                        'status_app_pesanan' => $pesanan->status_app_pesanan,
                    ];
                });

      


            $filteredPesanans = $pesanans->filter(function ($pesanan) {
                return $pesanan['status_app_pesanan'] == '1';
            });

            $totalorder = $pesanans->sum('jumlah_order');
            $totalorderacc = $filteredPesanans->sum('jumlah_order');

            $totalOrderPerCustomer = $filteredPesanans->groupBy('id_pegawai')->map(function ($orders) {
                return $orders->sum('jumlah_order');
            });


            $poinPerPegawai = $totalOrderPerCustomer->mapWithKeys(function ($totalOrder, $idPegawai) use ($nilaiTender) {
                $kategori = collect($nilaiTender)->first(function ($nilai) use ($totalOrder) {
                    return $totalOrder >= $nilai['minimum_bobot'] && $totalOrder <= $nilai['maksimum_bobot'];
                });
            
                return [$idPegawai => $kategori ? $kategori['nilai'] : 0];
            });


            foreach ($poinPerPegawai as $idPegawai => $poin) {
                $affectedRows = Penilaian::where('pegawai_idpegawai', $idPegawai)
                    ->where('jenis_penilaian', 'tender')
                    ->whereYear('tanggal_penilaian', Carbon::now()->year)
                    ->whereRaw('QUARTER(tanggal_penilaian) = ?', [Carbon::now()->quarter])
                    ->update(['nilai' => $poin]);
            }
            
            
            // if ($totalorderacc == 0) {
            //     $poin = 0;
            // } else {
            //     $kategori = $nilaiTender->filter(function ($nilai) use ($totalorderacc) {
            //         return $totalorderacc >= $nilai->minimum_bobot && $totalorderacc <= $nilai->maksimum_bobot;
            //     })->first();
            //     $poin = $kategori ? $kategori->nilai : 0;
            // }

            // if ($totalorderacc == 0) {
            //     $poin = 0;
            // } else {
            //     // Gunakan array $nilaiTender yang sudah diisi dari input awal
            //     $kategori = null;
            //     foreach ($nilaiTender as $nilai) {
            //         if ($totalorderacc >= $nilai['minimum_bobot'] && $totalorderacc <= $nilai['maksimum_bobot']) {
            //             $kategori = $nilai;
            //             break;
            //         }
            //     }
            //     $poin = $kategori ? $kategori['nilai'] : 0;
            // }
            
          

       

            DB::commit(); 
            return [
                'success' => true,
                'message' => 'Data berhasil disimpan'
            ];

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

    public function nilai_add_action_cust(Request $request) {
       
        DB::beginTransaction();
        try {
            $datanilai = $request->input('params');
            $nilaiCust = [];

            foreach ($datanilai as $nilai) {
               DB::table('nilais')->updateOrInsert(
                    [   
                        'kategori_nilai' => $nilai['kategori'],
                        'tipe' => $nilai['tipe']
                    ], 
                    [
                        'nilai' => $nilai['nilai'],
                        'minimum_bobot' => $nilai['minimum'],
                        'maksimum_bobot' => $nilai['maksimum'],
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]
                );

                $nilaiCust[] = [
                    'kategori_nilai' => $nilai['kategori'],
                    'tipe' => $nilai['tipe'],
                    'nilai' => $nilai['nilai'],
                    'minimum_bobot' => $nilai['minimum'],
                    'maksimum_bobot' => $nilai['maksimum'],
                ];
            }

     
            $jumlahcust = Customer::select(DB::raw('idpegawai_input, COUNT(*) AS total_customers'))
            ->where('status_app_data_customer', '1')
            ->whereYear('created_at', Carbon::now()->year) // Filter berdasarkan tahun berjalan
            ->whereRaw('QUARTER(created_at) = ?', [Carbon::now()->quarter])
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('QUARTER(created_at)'),DB::raw('idpegawai_input'))
            // ->get()
            // ->makeHidden(['timestamps'])
            // ->toArray(); 
            ->pluck('total_customers','idpegawai_input');
    
            
            // dd($jumlahcust);
           
            $poinPerPegawai = $jumlahcust->mapWithKeys(function ($totalCust, $idPegawai) use ($nilaiCust) {
                $kategori = collect($nilaiCust)->first(function ($nilai) use ($totalCust) {
                    return $totalCust >= $nilai['minimum_bobot'] && $totalCust <= $nilai['maksimum_bobot'];
                });
            
                return [$idPegawai => $kategori ? $kategori['nilai'] : 0];
            });


            foreach ($poinPerPegawai as $idPegawai => $poin) {
                $affectedRows = Penilaian::where('pegawai_idpegawai', $idPegawai)
                    ->where('jenis_penilaian', 'customer')
                    ->whereYear('tanggal_penilaian', Carbon::now()->year)
                    ->whereRaw('QUARTER(tanggal_penilaian) = ?', [Carbon::now()->quarter])
                    ->update(['nilai' => $poin]);
            }
            
            
            // if ($totalorderacc == 0) {
            //     $poin = 0;
            // } else {
            //     $kategori = $nilaiTender->filter(function ($nilai) use ($totalorderacc) {
            //         return $totalorderacc >= $nilai->minimum_bobot && $totalorderacc <= $nilai->maksimum_bobot;
            //     })->first();
            //     $poin = $kategori ? $kategori->nilai : 0;
            // }

            // if ($totalorderacc == 0) {
            //     $poin = 0;
            // } else {
            //     // Gunakan array $nilaiTender yang sudah diisi dari input awal
            //     $kategori = null;
            //     foreach ($nilaiTender as $nilai) {
            //         if ($totalorderacc >= $nilai['minimum_bobot'] && $totalorderacc <= $nilai['maksimum_bobot']) {
            //             $kategori = $nilai;
            //             break;
            //         }
            //     }
            //     $poin = $kategori ? $kategori['nilai'] : 0;
            // }
            
          

       

            DB::commit(); 
            return [
                'success' => true,
                'message' => 'Data berhasil disimpan'
            ];

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

    public function nilai_add_action_rekomen(Request $request) {
       
        DB::beginTransaction();
        try {
            $datanilai = $request->input('params');
            $nilaiCust = [];

            foreach ($datanilai as $nilai) {
               DB::table('nilais')->updateOrInsert(
                    [   
                        'kategori_nilai' => $nilai['kategori'],
                        'tipe' => $nilai['tipe']
                    ], 
                    [
                        'nilai' => $nilai['nilai'],
                        'minimum_bobot' => $nilai['minimum'],
                        'maksimum_bobot' => $nilai['maksimum'],
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]
                ); 
            }

            DB::commit(); 
            return [
                'success' => true,
                'message' => 'Data berhasil disimpan'
            ];

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

    public function nilai_prepare_edit(Request $request) {

        try {
            $result = DB::table('nilais')
            ->get();
            return [
                'success'   => $result,
                'message'   => ($result?'Success':'Gagal')
            ];      
        } catch (\Throwable $th) {
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat penyimpanan data',
                'error' => $th->getMessage(),
                'line' => $th->getLine()
            ];
        }
        
    }
}
