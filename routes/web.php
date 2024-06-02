<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelanggaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// // });

// Route::get('/', function () {
//     if (session('berhasil_login')) {
//         return redirect('/dashboard');
//     } else {
//         return redirect('/');
//     }
// });


Route::get('/', function () {
    if (session('berhasil_login')) {
        return redirect('/dashboard');
    } else {
        return redirect('/login'); // Redirect to login page
    }
});

Route::get('/login', function () {
    if (session('berhasil_login')) {
        return redirect('/dashboard');
    } else {
        return view('login'); // Redirect to login page
    }
});


//LOGIN
// Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login/proses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/session', [UserController::class, 'session'])->name('session');

Route::group(['middleware' => 'CekLogin'], function() {

    //DASHBOARD
    Route::get('/dashboard', function () {return view('content.dashboard');
    })->name('dashboard');

    Route::post('/dashboard/chart', [DashboardController::class, 'chart'])->name('chart');

    
    //USER
    Route::get('/user', [UserController::class, 'user'])->name('user');
    Route::get('/user/view_form',[UserController::class, 'user_view_form']);
    Route::get('/user/data_json',[UserController::class, 'user_json'])->name('user_json');
    Route::get('/user/data_prepare_edit',[UserController::class, 'user_get_edit'])->name('user_preedit');
    Route::post('/user/data_edit',[UserController::class, 'user_edit'])->name('user_edit');
    Route::post('/user/data_add',[UserController::class, 'user_add'])->name('user_add');
    Route::post('/user/data_remove',[UserController::class, 'user_remove'])->name('user_remove');


    // PEGAWAI
    Route::get('/pegawai', [PegawaiController::class, 'pegawai'])->name('pegawai');
    Route::get('/pegawai/view_form',[PegawaiController::class, 'pegawai_add_view']);
    Route::get('/pegawai/data_json',[PegawaiController::class, 'json'])->name('pegawai_json');
    Route::get('/pegawai/data_prepare_edit',[PegawaiController::class, 'pegawai_get_edit'])->name('pegawai_preedit');
    Route::post('/pegawai/data_edit',[PegawaiController::class, 'pegawai_edit'])->name('pegawai_edit');
    Route::post('/pegawai/data_add',[PegawaiController::class, 'pegawai_add'])->name('pegawai_add');
    Route::post('/pegawai/data_remove',[PegawaiController::class, 'pegawai_remove'])->name('data_remove');

    // JABATAN
    Route::get('/jabatan', [JabatanController::class, 'jabatan'])->name('jabatan');
    Route::get('/jabatan/data_json',[JabatanController::class, 'jabatan_json'])->name('jabatan_json');
    Route::post('/jabatan/data_add',[JabatanController::class, 'jabatan_add'])->name('jabatan_add');
    Route::post('/jabatan/data_edit',[JabatanController::class, 'jabatan_edit'])->name('jabatan_edit');
    Route::post('/jabatan/data_remove',[JabatanController::class, 'jabatan_remove'])->name('jabatan_remove');


    //CUSTOMER
    Route::get('/customer', [CustomerController::class, 'customer'])->name('customer');
    Route::get('/customer/view_form',[CustomerController::class, 'customer_view_form']);
    Route::get('/customer/data_json',[CustomerController::class, 'customer_json'])->name('customer_json');
    Route::get('/customer/data_prepare_edit',[CustomerController::class, 'customer_get_edit'])->name('customer_preedit');
    Route::post('/customer/data_add',[CustomerController::class, 'customer_add'])->name('customer_add');
    Route::post('/customer/data_edit',[CustomerController::class, 'customer_edit'])->name('customer_edit');
    Route::post('/customer/data_remove',[CustomerController::class, 'customer_remove'])->name('customer_remove');
    Route::post('/customer/search',[CustomerController::class, 'customer_search'])->name('customer_search');
    Route::post('/customer/search_avg',[CustomerController::class, 'customer_avg'])->name('customer_avg');
    


    //PESANAN
    Route::post('/pesanan/data_remove',[PesananController::class, 'data_remove'])->name('data_remove');


    //TENDER
    Route::get('/tender', [TenderController::class, 'tender'])->name('tender');
    Route::get('/tender/json_tender', [TenderController::class, 'tender_json'])->name('tender_json');
    Route::get('/tender/view_form', [TenderController::class, 'tender_view_form'])->name('tender_view_form');
    Route::get('/tender/data_list', [TenderController::class, 'tender_list'])->name('tender_list');
    Route::get('/tender/preedit', [TenderController::class, 'tender_preedit'])->name('tender_preedit');
    Route::post('/tender/pesanan_list', [TenderController::class, 'pesanan_list'])->name('pesanan_list');
    Route::post('/tender/pesanan_add', [TenderController::class, 'add_pesanan'])->name('add_pesanan');
    Route::post('/tender/pesanan_update', [TenderController::class, 'updatepesanan'])->name('update_pesanan');
    Route::post('/tender/search_data', [TenderController::class, 'tender_serach_data'])->name('tender_serach_data');
    Route::post('/tender/avg', [TenderController::class, 'tender_avg'])->name('tender_avg');
    Route::post('/tender/avg_search', [TenderController::class, 'tender_avg_search'])->name('tender_avg_search');


    //APPROVAL TENDER
    Route::get('/tender/approval', [TenderController::class, 'tender_approval'])->name('tender_approval');
    Route::get('/tender/json_approval', [TenderController::class, 'tender_approval_json'])->name('tender_approval_json');
    Route::get('/tender/view_approval', [TenderController::class, 'view_approval'])->name('view_approval');
    Route::get('/tender/view_approval/list', [TenderController::class, 'tender_approval_view'])->name('tender_approval_view');
    Route::post('/tender/approval/action', [TenderController::class, 'tender_approval_action'])->name('tender_action');


    //APPROVAL CUST
    Route::get('/customer/approval', [CustomerController::class, 'acc_cust'])->name('acc_cust');
    Route::get('/customer/approval/data', [CustomerController::class, 'customer_all_acc'])->name('acc_cust_data');
    Route::post('/customer/approval/search', [CustomerController::class, 'customer_search_acc'])->name('acc_cust_search');
    Route::post('/customer/approval/action', [CustomerController::class, 'cust_action'])->name('cust_action');
    
    //BARANG
    Route::get('/barang', [BarangController::class, 'barang'])->name('barang');
    Route::get('/barang/json_barang', [BarangController::class, 'barang_json'])->name('barang_json');
    Route::post('/barang/data_add',[BarangController::class, 'barang_add'])->name('barang_add');
    Route::post('/barang/data_edit',[BarangController::class, 'barang_edit'])->name('barang_edit');
    Route::post('/barang/data_remove',[BarangController::class, 'barang_remove'])->name('barang_remove');

    //JENIS PELANGGARAN
    Route::get('/jenis_pelanggaran', [PelanggaranController::class, 'jenis_pelanggaran'])->name('jenis_pelanggaran');
    Route::get('/jenis_pelanggaran/json', [PelanggaranController::class, 'jns_json'])->name('jenis_pelanggaran_json');
    Route::post('/jenis_pelanggaran/data_add',[PelanggaranController::class, 'jns_pelanggaran_add'])->name('jns_pelanggaran_add');
    Route::post('/jenis_pelanggaran/data_edit',[PelanggaranController::class, 'jns_pelanggaran_edit'])->name('jns_pelanggaran_edit');
    Route::post('/jenis_pelanggaran/data_remove',[PelanggaranController::class, 'jns_pelanggaran_remove'])->name('jns_pelanggaran_remove');

    //PELANGGARAN
    Route::get('/pelanggaran/add', [PelanggaranController::class, 'pelanggaran_add'])->name('pelanggaran_add');
    Route::post('/pelanggaran/add_action',[PelanggaranController::class, 'pelanggaran_add_action'])->name('pelanggaran_add_action');
    Route::post('/pelanggaran/remove_action',[PelanggaranController::class, 'pelanggaran_remove_action'])->name('pelanggaran_remove_action');
    Route::get('/pelanggaran/table_view',[PelanggaranController::class, 'pelanggaran_table_view'])->name('pelanggaran_table_view');
    Route::post('/pelanggaran/table_data',[PelanggaranController::class, 'pelanggaran_table_data'])->name('pelanggaran_table_data');

});

