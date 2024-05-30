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



            // dump($isnottender);

            return response()->json([
                'data' => $isnottender,
                'barang' => $barang,
                'pegawai' => $pegawai,
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
            $result = Pesanan::where('id_pesanan', $request->param_ord)
            ->update([
                'status_app_pesanan'=> $request->param_triger
                
            ]);

            DB::commit();
            return [
                'success' => true,
                'message' => 'Data berhasil disimpan.'
            ];

        }catch (\Exception $e) {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui data.'
            ];
        } 
    }
   
}
