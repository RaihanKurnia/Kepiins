<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Customer;
use App\Models\Pesanan;
use App\Models\Penilaian;
use App\Events\CustomerNotification;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function customer() {
        return view('content.customer.customer_table');
    }
    public function customer_view_form() {
        return view('content.customer.customer_add');
    }

    public function customer_json(Request $request)
    {
        $customer = DB::table('customers')
        ->where(DB::raw('QUARTER(created_at)'),$request->param_quarter)
        ->where('idpegawai_input', session('id'))
        ->get();

        $totalcust = DB::table('customers')
        ->where(DB::raw('QUARTER(created_at)'),$request->param_quarter)
        ->where('idpegawai_input', session('id'))
        ->count();

        $totalcustacc = DB::table('customers')
        ->where(DB::raw('QUARTER(created_at)'),$request->param_quarter)
        ->where('idpegawai_input', session('id'))
        ->where('status_app_data_customer', '1')
        ->count();

        if ($totalcustacc == 0){
            $poin = 0;
        } else if($totalcustacc <30){
            $poin = 5;
        } else if ($totalcustacc >= 30 && $totalcustacc <=60){
            $poin = 7;
        } else {
            $poin = 9;
        }

        

        // dd($customer);
        return response()->json([
            'data' => $customer,
            'totalcust' =>$totalcust,
            'totalcustacc' => $totalcustacc,
            'poin' =>$poin
            ]);
    }
    
    public function customer_avg(Request $request)
    {
        try {
            $param_peg = $request->param_peg;
            $param_status = $request->param_status;

            // dd($request);

            if ($param_peg != null || $param_status != null  ){
                $customerquery = DB::table('customers')
                ->where(DB::raw('QUARTER(created_at)'),$request->param_quarter);
                
                if ($param_peg !== null){
                    $customerquery->where('idpegawai_input', $param_peg);
                }
                if ($param_status !== null){
                    $customerquery->where('status_app_data_customer', $param_status);
                }

                $customer=$customerquery->get();
                $totalcust = $customerquery->count();
        
                $totalcustacc =
                    $customerquery
                    ->where('status_app_data_customer', '1')
                    ->count();
        
                if ($totalcustacc ==0){
                    $poin = 0;
                }
                else if($totalcustacc <30){
                    $poin = 5;
                } else if ($totalcustacc >= 30 && $totalcustacc <=60){
                    $poin = 7;
                } else {
                    $poin = 9;
                }
            } else {
                $customer = DB::table('customers')
                ->where(DB::raw('QUARTER(created_at)'),$request->param_quarter)
                ->get();
        
                $totalcust = DB::table('customers')
                ->where(DB::raw('QUARTER(created_at)'),$request->param_quarter)
                ->count();
        
                // $totalcustacc = DB::table('customers')
                // ->where('status_app_data_customer', '1')
                // ->count();

                $totalcustaccperpeg = DB::table('customers')
                ->where(DB::raw('QUARTER(created_at)'),$request->param_quarter)
                ->where('status_app_data_customer', '1')
                ->distinct()
                ->count('idpegawai_input');

                $totalcustacc = DB::table('customers')
                ->where(DB::raw('QUARTER(created_at)'),$request->param_quarter)
                ->where('status_app_data_customer', '1')
                ->count();
                
        
        
                if(($totalcustacc) <30){
                    $poin = 5;
                } else if ($totalcustacc >= 30 && $totalcustacc <=60){
                    $poin = 7;
                } else {
                    $poin = 9;
                }
            
            
               
            }

            return response()->json([
                'data' => $customer,
                'totalcus' =>$totalcust,
                'totalcustacc' => $totalcustacc,
                'poin' =>$poin
                ]);
            

        } catch (\Throwable $th) {
             return response()->json([
                'success' => false,
                'message' => 'data tidak ditemukan!'
                ]);
        }
        
    }

    public function customer_get_edit(Request $request)
    {

        $result = DB::table('customers')
        ->where('idcustomer', $request->param_id)
        ->first();



        return [
            'success' => $result,
            'message' => 'Success'
        ];
    }


    public function customer_add(Request $request) {
        // dd($request);
        DB::beginTransaction();
        try {

            $getcustomer = DB::table('customers')
            ->where('nama_customer', 'like', '%' .$request->param_nama . '%')
            ->get();

            // $customerfound =$getcustomer[0]->nama_customer;

            if ($getcustomer->isEmpty()){
                // dd('masuk');
                $customer = Customer::create([
                    'nama_customer' => $request->param_nama,
                    'alamat' => $request->param_alamat,
                    'nomor_telefon' => $request->param_notelpt,
                    'email' => $request->param_email,
                    'idpegawai_input' => session('id')
                ]);
                
                DB::commit();
                $customer->nama_pegawai= session('nama') ;
                $customer->pesan = 'telah menambahkan Customer Baru';
                $customer->type = 'customer';
                $getcustomer = $customer->getAttributes();

                event (new CustomerNotification($getcustomer));
             
            
                return [
                    'success' => true,
                    'message' => 'Data berhasil disimpan.'
                ];

               

            } else {
                return [
                    'success' => false,
                    'message' => 'Customer "' . $getcustomer[0]->nama_customer . '" sudah ada dalam Database',
                ];
            }


            
        } catch (\Exception $e) {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data.'
            ];
        }
    }

    public function customer_edit(Request $request)
    {   
        // dump($request);
        DB::beginTransaction();
        try {
            $result = Customer::where('idcustomer', $request->param_id)
            ->update([
                'nama_customer' => $request->param_nama,
                'alamat' => $request->param_alamat,
                'nomor_telefon' => $request->param_notelpt,
                'email' => $request->param_email,
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
                'message' => 'Terjadi kesalahan saat memperbarui data pelanggan dan pesanannya.'
            ];
        }
      
    }

    public function customer_remove(Request $request)
    {
        try {
            $customer = Customer::where('idcustomer', $request->param_id)->first();
        
            if ($customer) {
                // cek pesanan terkait
                $hasOrder = Pesanan::where('customer_idcustomer', $request->param_id)->exists();
        
                if ($hasOrder) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Customer memiliki pesanan yang terkait.',
                        'hasOrder' => true // 
                    ]);
                } else {
                    
                    $customer->delete();
                    return response()->json([
                        'success' => true,
                        'message' => 'Customer berhasil dihapus.'
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Customer tidak ditemukan.'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus customer: ' . $e->getMessage()
            ], 500);
        }
    }

    public function customer_search(Request $request){
        
        // dd($request);
        try {

            if ($request->param_custname == null){
                $getcustomer = DB::table('customers')
                ->where('status_app_data_customer', $request->param_status)
                ->where(DB::raw('QUARTER(created_at)'),$request->param_quarter)
                ->get();

                return response()->json(['data' => $getcustomer]);
            } else if ($request->param_status == 'all'){
                $getcustomer = DB::table('customers')
                ->where('nama_customer', 'like', '%' .$request->param_custname. '%')
                ->where(DB::raw('QUARTER(created_at)'),$request->param_quarter)
                ->get();

                return response()->json(['data' => $getcustomer]);
            }else {
                $getcustomer = DB::table('customers')
                ->where('nama_customer', 'like', '%' .$request->param_custname. '%')
                ->where(DB::raw('QUARTER(created_at)'),$request->param_quarter)
                ->where('status_app_data_customer', $request->param_status)
                ->get();
                
                return response()->json(['data' => $getcustomer]);
            }

        } catch (\Throwable $th) {
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat pengambilan data.',
                'error' => $th
            ];
        }
    }


    //APPROVAL
    public function acc_cust() {
        return view('content.approval_cust.acc_customer_table');
    }

    public function customer_all_acc() {
        try{
            $customers = Customer::with(['pegawai:idpegawai,nama_pegawai']) // Load related pegawai with only idpegawai and nama_pegawai
            ->get()
            ->map(function ($item) {

                $customerArray = $item->toArray();

                if ($item->pegawai) {
                    $customerArray['idpegawai'] = $item->pegawai->idpegawai;
                    $customerArray['nama_pegawai'] = $item->pegawai->nama_pegawai;
                } else {
                    $customerArray['idpegawai'] = null;
                    $customerArray['nama_pegawai'] = null;
                }

                // Remove pegawai array
                unset($customerArray['pegawai']);

                return $customerArray;
            });

            return response()->json([
            'data' => $customers,
            'success' => true
            ]);


        }catch (\Exception $e){
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat pengambilan data',
                'error' => $e
            ];
        }
        
    }

    public function customer_search_acc(Request $request) {
        try{
            $customers = Customer::with(['pegawai:idpegawai,nama_pegawai']) 
            ->where('idpegawai_input', 'like', '%' .$request->param_peg. '%')
            ->where('status_app_data_customer', 'like', '%' .$request->param_status. '%')
            ->get()
            ->map(function ($item) {

                $customerArray = $item->toArray();

                if ($item->pegawai) {
                    $customerArray['idpegawai'] = $item->pegawai->idpegawai;
                    $customerArray['nama_pegawai'] = $item->pegawai->nama_pegawai;
                } else {
                    $customerArray['idpegawai'] = null;
                    $customerArray['nama_pegawai'] = null;
                }

                // Remove pegawai array
                unset($customerArray['pegawai']);

                return $customerArray;
            });

            return response()->json([
            'data' => $customers,
            'success' => true
            ]);


        }catch (\Exception $e){
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat pengambilan data',
                'error' => $e
            ];
        }
        
    }

    
    public function cust_action(Request $request){
        // dd($request);
        DB::beginTransaction();
        try {
            $year = Carbon::now()->year;
            $result = Customer::where('idcustomer', $request->param_cust)
            ->update([
                'status_app_data_customer' => $request->param_triger
            ]);

            if ($result) {
                $customeracc = Customer::where('idcustomer', $request->param_cust)
                ->first();

               
                $customeracc_year = $customeracc->created_at->year;
                $customeracc_quarter = $customeracc->created_at->quarter;

                if ($customeracc){
                    $jumlahcust = Customer::select(DB::raw('COUNT(*) AS total_customers'))
                    ->where('idpegawai_input', $customeracc->idpegawai_input)
                    ->where('status_app_data_customer', '1')
                    ->where(DB::raw('YEAR(created_at)'),$customeracc_year)
                    ->where(DB::raw('QUARTER(created_at)'),$customeracc_quarter)
                    ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('QUARTER(created_at)'))
                    ->get();

                    foreach ($jumlahcust as $jumlahcust_nilai) {
                        if ($jumlahcust_nilai->total_customers < 30) {
                            $nilai = 5;
                        } elseif ($jumlahcust_nilai->total_customers >= 30 && $jumlahcust_nilai->total_customers <= 60) {
                            $nilai = 7;
                        } else {
                            $nilai = 9;
                        }
                    }

                    //cek apakh sudah ada que dan year yg sama
                    $pegawainilai = Penilaian::where('pegawai_idpegawai', $customeracc->idpegawai_input)
                    ->where('jenis_penilaian','customer')
                    ->where(DB::raw('YEAR(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'),$customeracc_year)
                    ->where(DB::raw('QUARTER(STR_TO_DATE(tanggal_penilaian, "%Y-%m-%d"))'),$customeracc_quarter)
                    ->first();

                    //jika tidak ada yg sama, insert kuy
                    if(!$pegawainilai){ 
                        Penilaian::create([
                            'nilai' => $nilai ,
                            'jenis_penilaian' => 'customer',
                            'pegawai_idpegawai' =>  $customeracc->idpegawai_input,
                            'periode' => $customeracc_year,
                            'tanggal_penilaian'=>$customeracc->created_at
                        ]);
                        $nilaimessage = 'insert nilai baru';
                    } else { // jika ada yg sama, cek apakah nilainya sama//
                        if($pegawainilai->nilai != $nilai){
                            $pegawainilai->update([
                                'nilai' => $nilai
                            ]);
                            $nilaimessage = 'update nilai to '.$nilai;
                        } else {
                            $nilaimessage = 'no update nilai';
                        }
                       
                    }
                }

            }
            DB::commit();
            return [
                'success' => true,
                'message' => 'Data berhasil disimpan.',
                'jumlahcust' => $jumlahcust[0]->total_customers,
                'customeracc_year' => $customeracc_year,
                'customeracc_quarter' => $customeracc_quarter,
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
