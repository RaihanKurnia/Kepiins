<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Customer;
use App\Models\Pesanan;
use App\Events\CustomerNotification;

class CustomerController extends Controller
{
    public function customer() {
        return view('content.customer.customer_table');
    }
    public function customer_view_form() {
        return view('content.customer.customer_add');
    }

    public function customer_json()
    {
        $customer = DB::table('customers')
        ->where('idpegawai_input', session('id'))
        ->get();

        $totalcust = DB::table('customers')
        ->where('idpegawai_input', session('id'))
        ->count();

        $totalcustacc = DB::table('customers')
        ->where('idpegawai_input', session('id'))
        ->where('status_app_data_customer', '1')
        ->count();


        if($totalcustacc <30){
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
                // Memeriksa apakah ada pesanan terkait dengan pelanggan
                $hasOrder = Pesanan::where('customer_idcustomer', $request->param_id)->exists();
        
                if ($hasOrder) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Customer memiliki pesanan yang terkait.',
                        'hasOrder' => true // Mengirimkan flag bahwa ada pesanan terkait
                    ]);
                } else {
                    // Menghapus pelanggan jika tidak ada pesanan terkait
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
                ->get();

                return response()->json(['data' => $getcustomer]);
            } else if ($request->param_status == 'all'){
                $getcustomer = DB::table('customers')
                ->where('nama_customer', 'like', '%' .$request->param_custname. '%')
                ->get();

                return response()->json(['data' => $getcustomer]);
            }else {
                $getcustomer = DB::table('customers')
                ->where('nama_customer', 'like', '%' .$request->param_custname. '%')
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
            $customers = Customer::with(['pegawai:idpegawai,nama_pegawai']) // Load related pegawai with only idpegawai and nama_pegawai
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
            $result = Customer::where('idcustomer', $request->param_cust)
            ->update([
                'status_app_data_customer' => $request->param_triger
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
}
