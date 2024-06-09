<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Customer;
use App\Models\Pesanan;
use Carbon\Carbon;
use App\Events\CustomerNotification;
use App\Models\Pegawai;
use App\Models\Barang;
use App\Models\Penilaian;


class TenderController extends Controller
{
    public function tender() {
        return view('content.tender.tender_table');
    }

    public function tender_view_form() {
        return view('content.tender.tender_add');
    }

    public function tender_json() {
        try{
            //select all tender    
            $pesanans = Pesanan::with(['customer.pegawai', 'barang'])
                ->whereHas('customer', function ($query) {
                    $query->where('idpegawai_input', session('id'));
                })
                ->get()
                ->map(function ($pesanan) {
                    return [
                        'id_pesanan' =>$pesanan->id_pesanan,
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

            if ($totalorderacc == 0){
                $poin = 0;
            }else if($totalorderacc <300){
                $poin = 5;
            } else if ($totalorderacc >= 300 && $totalorderacc <=1500){
                $poin = 7;
            } else {
                $poin = 9;
            }

            return response()->json([
                'success' => true,
                'data' => $pesanans,
                'totalorder' =>$totalorder,
                'totalorderacc'=>$totalorderacc,
                'poin'=>$poin
            ]);
        }catch (\Exception $e){
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat pengambilan data'
            ];
        }

    }

    public function tender_avg(Request $request) {
        try{
            //select all tender    
            $pesanans = Pesanan::with(['customer.pegawai', 'barang'])
                // ->whereHas('customer', function ($query) {
                //     $query->where('idpegawai_input', session('id'));
                // })
                ->get()
                ->map(function ($pesanan) {
                    return [
                        'id_pesanan' =>$pesanan->id_pesanan,
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

            if($totalorderacc <300){
                $poin = 5;
            } else if ($totalorderacc >= 300 && $totalorderacc <=1500){
                $poin = 7;
            } else {
                $poin = 9;
            }

            return response()->json([
                'success' => true,
                'data' => $pesanans,
                'totalorder' =>$totalorder,
                'totalorderacc'=>$totalorderacc,
                'poin'=>$poin
            ]);
        }catch (\Exception $e){
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat pengambilan data'
            ];
        }
    }

    public function tender_avg_search_backup(Request $request){
        // dd($request);
        try{
            //select all tender    
            $pesanans = Pesanan::with(['customer.pegawai', 'barang'])
            ->when($request->param_custname, function ($query) use ($request) {
                return $query->whereHas('customer', function ($query) use ($request) {
                    return $query->where('idpegawai_input', $request->param_custname);
                });
            })
            ->when($request->param_barang, function ($query) use ($request) {
                return $query->where('barang_idbarang', $request->param_barang);
            })
            ->when($request->param_status, function ($query) use ($request) {
                return $query->where('status_app_pesanan', $request->param_status);
            })
            ->get()
            ->map(function ($pesanan) {
                return [
                    'id_pesanan' =>$pesanan->id_pesanan,
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
            // return $request->param_status;

            $totalorder = $pesanans->sum('jumlah_order');
            $totalorderacc = $filteredPesanans->sum('jumlah_order');

            if ($totalorderacc == 0){
                $poin = 0;
            }else if($totalorderacc <300){
                $poin = 5;
            } else if ($totalorderacc >= 300 && $totalorderacc <=1500){
                $poin = 7;
            } else {
                $poin = 9;
            }

            return response()->json([
                'success' => true,
                'data' => $pesanans,
                'totalorder' =>$totalorder,
                'totalorderacc'=>$totalorderacc,
                'poin'=>$poin
            ]);
        }catch (\Throwable $th){
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat pengambilan data',
                'pesan' => $th->getMessage()

            ];
        }
    }

    public function tender_avg_search(Request $request){
        // dd($request);
        try{
            //select all tender    
            $pesanans = Pesanan::with(['customer.pegawai', 'barang'])
            ->when($request->param_custname, function ($query) use ($request) {
                return $query->whereHas('customer', function ($query) use ($request) {
                    return $query->where('idpegawai_input', $request->param_custname);
                });
            })
            ->when(isset($request->param_barang), function ($query) use ($request) {
                return $query->where('barang_idbarang', $request->param_barang);
            })
            ->when(isset($request->param_status), function ($query) use ($request) {
                return $query->where('status_app_pesanan', $request->param_status);
            })
            ->get()
            ->map(function ($pesanan) {
                return [
                    'id_pesanan' =>$pesanan->id_pesanan,
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
            // return $request->param_status;

            $totalorder = $pesanans->sum('jumlah_order');
            $totalorderacc = $filteredPesanans->sum('jumlah_order');

            if ($totalorderacc == 0){
                $poin = 0;
            }else if($totalorderacc <300){
                $poin = 5;
            } else if ($totalorderacc >= 300 && $totalorderacc <=1500){
                $poin = 7;
            } else {
                $poin = 9;
            }

            return response()->json([
                'success' => true,
                'data' => $pesanans,
                'totalorder' =>$totalorder,
                'totalorderacc'=>$totalorderacc,
                'poin'=>$poin
            ]);
        }catch (\Throwable $th){
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat pengambilan data',
                'pesan' => $th->getMessage()

            ];
        }
    }


    public function tender_list(){
        try{
            $isnottender = DB::table('customers as cu')
            // ->rightjoin('pesanans as ord', 'cu.id','=','ord.idcustomer')
            ->where('cu.idpegawai_input', session('id'))
            ->where('cu.status_app_data_customer','=','1') 
            ->select('cu.*')
            ->orderBy('nama_customer','ASC')
            ->get();

            $barang = DB::table('barangs')->get();

            $pegawai = DB::table('pegawais')
            ->where('pegawais.role' ,'=','Pegawai')
            ->select('pegawais.*')
            ->get();
            
            $jns_pelanggaran = DB::table('jenis_pelanggarans')->get();
        


            // dump($isnottender);

            return response()->json([
                'data' => $isnottender,
                'barang' => $barang,
                'pegawai' => $pegawai,
                'jns_pelanggaran'=>$jns_pelanggaran,
            ]);


        }catch (\Exception $e){
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat pengambilan data'
            ];
        }
    }

    public function tender_preedit(Request $request) {
        $result=  Pesanan::with(['customer.pegawai', 'barang'])
        ->where('id_pesanan', $request->param_id)
        ->first();
        


        // $result = DB::table('pesanans')
        // ->where('id_pesanan', $request->param_id)
        // ->first();

        return [
            'success' => $result,
            'message' => 'Success'
        ];
    }

    public function pesanan_list(Request $request){
        try{
            $pesanan = DB::table('pesanans as ord')
            ->where('ord.idcustomer', $request->param_idcust)
            ->get();
            // dump($pesanan);

            return response()->json([
                'data' => $pesanan
            ]);


        }catch (\Exception $e){
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat pengambilan data'
            ];
        }
    }



    public function updatepesanan(Request $request)  {
        // dd($request); 
        DB::beginTransaction();
        try{

            $pesanan = Pesanan::where('id_pesanan', $request->param_barang)
            ->update([
                'jumlah_order'=>  $request->param_ordervalue,
                'tanggal_pemesanan' => $request->param_psn,
                'tanggal_pengiriman' => $request->param_kirim
            ]);

            // if (isset($request->param_order) && is_array($request->param_order)) {
            //     foreach ($request->param_order as $order) {
            //         $existingPesanan = Pesanan::where('id', $order['idpesanan'])->first();
            //         if ($existingPesanan) {
            //             // dd($order['value']);
            //             $existingPesanan->update([
            //                 'jumlah' => $order['value'],
            //                 'status' => '1', //aktiftender
            //             ]);
            //         }
            //     }
            // }
        DB::commit();
        return [
            'success' => true,
            'message' => 'Data berhasil disimpan.'
        ];
        }catch(\Exception $e){
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui data pesanan.'
            ];
        };
        
    }

    public function tender_serach_data(Request $request) {
        // dd($request);

        $pesanans = Pesanan::with(['customer.pegawai', 'barang'])
            ->whereHas('customer', function ($query) {
                $query->where('idpegawai_input', session('id'));
            })
            ->where('status_app_pesanan', 'like', '%'.$request->param_status.'%')
            ->where('customer_idcustomer', 'like', '%'.$request->param_custname.'%')
            ->where('barang_idbarang', 'like', '%'.$request->param_barang.'%')
            ->get()
            ->map(function ($pesanan) {
                return [
                    'id_pesanan' =>$pesanan->id_pesanan,
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

    

        return response()->json([
            'data' => $pesanans
            ]);
    }



    public function add_pesanan(Request $request){
        DB::beginTransaction();
        try{
            // dd($request);

            // $now = Carbon::now()->format('Y-m-d H:i:s');

            $result = Pesanan::create([
            'tanggal_pemesanan'=> $request->param_psn,
            'tanggal_pengiriman'=> $request->param_kirim,
            'customer_idcustomer' => $request->param_cust,
            'jumlah_order'=>$request->param_ordervalue,
            'barang_idbarang'=>$request->param_barang
            ]);

            // dd($result);

        DB::commit();

        $result->nama_pegawai= session('nama') ;
        $result->pesan = 'telah menambahkan Tander Baru';
        $result->type = 'tender';
        $getnotif = $result->getAttributes();
        event (new CustomerNotification($getnotif));
        
        return [
            'success' => true,
            'message' => 'Data berhasil disimpan.'
        ];
        }catch(\Exception $e){
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui data pesanan.',
                'error' => $e
            ];
        };
    }

    public function remove_pesanan(Request $request){
        try {

            $pesanan = Pesanan::where('id_pesanan', $request->param_id)->first();
            $pesananstatus = $pesanan->status_app_pesanan;

            if($pesananstatus !== 0){
                $pesanan->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Customer berhasil dihapus.'
                ]);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal Hapus!!! Status Pesanan Approved',
                ]);
            }
            
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus customer',
                'error' => $th->getMessage()
            ], 500);
        }
       


    }

    //APPROVAL TENDER

    public function tender_approval() {
        return view('content.approval_tender.acc_tender_table');
    }
    public function view_approval(){
        return view('content.approval_tender.acc_tender_add');
    }

    public function tender_approval_json() {
        try{
            //select all tender    
            $pesanans = Pesanan::with(['customer.pegawai', 'barang'])
                ->get()
                ->map(function ($pesanan) {
                    return [
                        'id_pesanan' =>$pesanan->id_pesanan,
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
              
            
            return response()->json([
                'success' => true,
                'data' => $pesanans,
            ]);
        }catch (\Exception $e){
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat pengambilan data'
            ];
        }
    }

    public function tender_approval_view(Request $request) {
        $result = DB::table('customers')
        ->where('id', $request->param_id)
        ->first();

        if ($result) {
            $pesanan = DB::table('pesanans')  
                ->where('idcustomer', $result->id)
                ->get();
    
            // Add the orders to the customer data
            $result->pesanan = $pesanan;

        
            // dd($result);
    
            return [
                'success' => [$result],
                'message' => 'Success'
            ];
        }   
    }

    public function tender_approval_action(Request $request) 
    {
        // dump($request);
        DB::beginTransaction();
       
        try {
            $year = Carbon::now()->year;
            $result = Pesanan::where('id_pesanan', $request->param_ord)
            ->update([
                'status_app_pesanan'=> $request->param_triger
                
            ]);

            if ($result) {
                $tenderacc = Pesanan::select('pesanans.*','customers.idpegawai_input')
                ->where('pesanans.id_pesanan', $request->param_ord)
                ->join('customers','pesanans.customer_idcustomer','=','customers.idcustomer')
                ->first();

                $tanggalpemesanan = Carbon::parse($tenderacc->tanggal_pemesanan);
                $tenderacc_year = $tanggalpemesanan->year;
                $tenderacc_quarter = $tanggalpemesanan->quarter;

                
                
                if ($tenderacc){
                    $jumlahorder = Pesanan::select(DB::raw('SUM(jumlah_order) AS jumlah_order'))
                    ->join('customers','pesanans.customer_idcustomer','=','customers.idcustomer')
                    ->where('idpegawai_input',$tenderacc->idpegawai_input)
                    ->where('status_app_pesanan','1')
                    ->where(DB::raw((Carbon::parse($tenderacc->tanggal_pemesanan))->year),$tenderacc_year)
                    ->where(DB::raw((Carbon::parse($tenderacc->tanggal_pemesanan))->quarter),$tenderacc_quarter)
                    ->groupBy(DB::raw('YEAR(STR_TO_DATE(tanggal_pemesanan, "%Y-%m-%d"))'), DB::raw('QUARTER(STR_TO_DATE(tanggal_pemesanan, "%Y-%m-%d"))'))
                    ->get();

                    

                    // return $jumlahorder[0]->jumlah_order;
                    
                    if ($jumlahorder[0]->jumlah_order < 300) {
                        $nilai = 5;
                    } elseif ($jumlahorder[0]->jumlah_order >= 300 && $jumlahorder[0]->jumlah_order <= 1500) {
                        $nilai = 7;
                    } else {
                        $nilai = 9;
                    }

                     //cek apakh sudah ada que dan year yg sama
                     $tendernilai = Penilaian::where('pegawai_idpegawai', $tenderacc->idpegawai_input)
                     ->where('jenis_penilaian','tender')
                     ->where(DB::raw('YEAR(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'),$tenderacc_year)
                     ->where(DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'),$tenderacc_quarter)
                     ->first();

                       if(!$tendernilai){
                        Penilaian::create([
                            'nilai' => $nilai ,
                            'jenis_penilaian' => 'tender',
                            'pegawai_idpegawai' =>  $tenderacc->idpegawai_input,
                            'periode' => $tenderacc_year,
                            'tanggal_penilaian'=>Carbon::createFromFormat('Y-m-d H:i:s', $tenderacc->tanggal_pemesanan)
                        ]);
                        $nilaimessage = 'insert nilai baru';
                       } else{
                            if($tendernilai->nilai != $nilai){
                                $tendernilai->update([
                                    'nilai' => $nilai
                                ]);
                                $nilaimessage = 'update nilai to '.$nilai;
                            } else {
                                $nilaimessage = 'No update nilai';
                            }
                       };
                }
            }

            DB::commit();
            return [
                'success' => true,
                'message' => 'Data berhasil disimpan.',
                'jumlahpesanan' =>$jumlahorder[0]->jumlah_order,
                'pesananacc_year'=>$tenderacc_year,
                'pesanancc_quarter' => $tenderacc_quarter,
                'nilai'=> $nilaimessage
            ];

        }catch (\Throwable $th) {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui data.',
                'error' => $th->getMessage(),
                'lineerror' => $th->getLine()
            ];
        } 

    }
   
}
