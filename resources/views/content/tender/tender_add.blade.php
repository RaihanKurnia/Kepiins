@extends('home')

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Pesanan</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <!-- <li class="breadcrumb-item">
                            <a href="" class="text-muted">Data Pesanan</a>
                        </li> -->
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Pesanan</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Form Informasi Pesanan</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3  class="card-label">
                            <span id="pegawai_form_title"></span>
                            <i class="mr-2"></i>
                            <small class="">try to scroll the page</small>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a  href="javascript:void(0);" onclick="window.history.back();" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>Back
                        </a>
                        @if(Request()->view !== '1')
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary font-weight-bolder" onclick="addtender()" id="save_pegawai">
                                <i class="ki ki-check icon-sm"></i>Save Form</button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Form-->
                    

                    <form class="form" id="kt_form">
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="my-5">
                                    <h3 class="text-dark font-weight-bold mb-10">Informasi Pesanan:</h3>
                                    <div class="form-group row" id="pilih_customer">
                                        <label class="col-3">Pilih Cutomer</label>
                                        <div class="col-9">
                                            <select class="custom-select form-control" id="customer">
                                                    <option value="" disabled selected>Open this select menu </option>
                                                    <!-- <option value="1">Åland Islands</option>
                                                    <option value="2">Afghanistan</option>
                                                    <option value="3">Åland Islands</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Nama Customer</label>
                                        <div class="col-9">
                                            <input type="text"  id ="nama" class="form-control" placeholder=" Nama Customer" disabled/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Alamat</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="alamat" placeholder='Alamat Customer' rows="3" disabled ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Email Address</label>
                                        <div class="col-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-at"></i>
                                                    </span>
                                                </div>
                                                <input type="email" class="form-control"
                                                 placeholder="Input Alamat Email" id="email" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">No.Hp/Telepon</label>
                                        <div class="col-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control"
                                                 placeholder="Input No.Telp" id="no_telf" maxlength="15" disabled/>
                                            </div>
                                            <!-- <span class="form-text text-muted">We'll never share your email with anyone
                                                else.</span> -->
                                        </div>
                                    </div>

                                  
                                    <div class="form-group row">
                                        <label class="col-3">Pilih Barang</label>
                                        <div class="col-6">
                                            <select class="custom-select form-control" id="barang">
                                                    <option value="" disabled selected>Open this select menu </option>
                                                    <!-- <option value="1">Åland Islands</option>
                                                    <option value="2">Afghanistan</option>
                                                    <option value="3">Åland Islands</option> -->
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            
                                                <input type="number" class="form-control"
                                                 placeholder="Input Jumlah" id="jml_barang" maxlength="15"/>
                                            <!-- <span class="form-text text-muted">We'll never share your email with anyone
                                                else.</span> -->
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3">Tanggal Pemesanan</label>
                                        <div class="col-6">
                                            <input type="date" class="form-control"  value="" id="tanggal_pesan" />
                                            <!-- <span class="form-text text-muted">Enable clear and today helper buttons</span> -->
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3">Tanggal Pengiriman</label>
                                        <div class="col-6">
                                            <input type="date" class="form-control"  value="" id="tanggal_kirim" />
                                            <!-- <span class="form-text text-muted">Enable clear and today helper buttons</span> -->
                                        </div>
                                    </div>

                                    <div class="form-group row" id="notearea">
                                        <label class="col-3">Note Rejected</label>
                                        <div class="col-6">
                                            <textarea  class="form-control"  value="" id="note" disabled></textarea>
                                            <!-- <span class="form-text text-muted">Enable clear and today helper buttons</span> -->
                                        </div>
                                    </div>

                                    
                                </div>
                            
                            </div>
                            <div class="col-xl-2"></div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

<script type="text/javascript">

let data_cust = [];
let jmlpesananvalue = [];
let selectcust ='';

$(document).ready(function(){
    let paramid = new URLSearchParams(window.location.search).get('id');
    let type = new URLSearchParams(window.location.search).get('view');
    if (paramid === null && type== null){
        $('#pegawai_form_title').text('Tambah Data Tender');
        $('#nama').val('');
        $('#umur').val('');
        $('#alamat').val('');
        $('#no_telf').val('');
        $('#email').val('');
        $('#tanggal_pesan').val('');
        $('#tanggal_kirim').val('');
        $('#jml_barang').val('');
        $('#pilih_customer').show();
        $('#notearea').hide();
        trigerUpdate = false;
        $.ajax({
            url: "{{ route('tender_list') }}", 
            type: "get",
            error: function(xhr, errorType, thrownError) {
				console.error("Kesalahan AJAX:", thrownError);
				Swal.fire(
						'Error!',
						thrownError,
						'error'
					)
			},
            success: function(response){
                var customer = '';
                var barang = '';
                for(var i = 0; i < response.data.length; i++){
                    // console.log(response.data[i].id,response.data[i].nama);
                    customer += '<option value="'+response.data[i].idcustomer+'"> '+response.data[i].nama_customer+'</option>';
                }

                for(var i = 0; i < response.barang.length; i++){
                    // console.log(response.data[i].id,response.data[i].nama);
                    barang += '<option value="'+response.barang[i].idbarang+'"> '+response.barang[i].nama_barang+'</option>';
                }


                $('#customer').append(customer);
                $('#barang').append(barang);
                data_cust = response.data
                // console.log(data_cust);
            }
        });

    } else if ( paramid !== null && type== null){
        $('#pilih_customer').hide();
        $('#notearea').hide();
        $('#barang').prop('disabled', true);
        idparam =paramid;
        $('#pegawai_form_title').text('Edit Data Tender');
        preparedit(paramid);
    } else if (type !== null && paramid !== null) {
        idparam =paramid;
        $('#pilih_customer').hide();
        $('#pegawai_form_title').text('View Data Tender');
        preparedit(paramid);
        $('#barang').prop('disabled', true);
        $('#nama').prop('disabled', true);
        $('#umur').prop('disabled', true);
        $('#alamat').prop('disabled', true);
        $('#no_telf').prop('disabled', true);
        $('#email').prop('disabled', true);
        $('#tanggal_pesan').prop('disabled', true);
        $('#tanggal_kirim').prop('disabled', true);
        $('#jml_barang').prop('disabled', true);
    }
});

$('#customer').change(function() {
    selectcust = $('#customer').val();
    var selectedData = null;
    
    $.each(data_cust, function(index, item) {
        if (item.idcustomer == selectcust) {
            selectedData = item;
            return false;
        }
    });
    console.log('Selected cust:', selectcust);
    // console.log('Selected data:', selectedData);
    $('#nama').val(selectedData.nama_customer);
    $('#alamat').val(selectedData.alamat);
    $('#no_telf').val(selectedData.nomor_telefon);
    $('#email').val(selectedData.email);
});

// function pesan() {
//     console.log({selectcust});
//     $('#listpesanan .hapus').each(function() {
//             var id = $(this).closest('.input-group').attr('id');
//             var value = $(this).val();
//             if(value) {
//                 jmlpesananvalue.push({idcustomer : selectcust, idpesanan: id, value: value });
//         }
//         });
//         return jmlpesananvalue;
// }

function addtender() {
    var idbarang = $('#barang').val();
    var jmlbarang = $('#jml_barang').val();
    var tgl_pesan = $('#tanggal_pesan').val();
    var tgl_kirim = $('#tanggal_kirim').val();

    // console.log({idbarang});
    // console.log({jmlbarang});
    // console.log({selectcust});
    // console.log({tgl_pesan});
    // console.log({tgl_kirim});

    if (!idbarang || !jmlbarang || !selectcust || !tgl_pesan || !tgl_kirim) {
        swal.fire({
        position: "center",
        icon: "error",
        title: "Lengkapi Data terlebih Dahulu",
        showConfirmButton: false,
        timer: 1000
         });
        return; 
    }

    // console.log({selectcust});
    // console.log({idbarang});
    // console.log({jmlbarang});
    
    
    $.ajax({  
        url : (!trigerUpdate?"{{route('add_pesanan')}}":"{{route('update_pesanan')}}"),
        type: 'POST',
        data: {
            "_token": "{{ csrf_token() }}",
        param_cust:selectcust,
        param_ordervalue:jmlbarang,
        param_barang:idbarang,
        param_psn : tgl_pesan,
        param_kirim:tgl_kirim
        },
        dataType : "json",
        async : false,
        success : function(result) {
            if(result.success){
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Simpan Data !',
                    text: 'Data berhasil disimpan',
			    }).then((result) => {
                    if (result.value || result.isDismissed) {
                        window.location.href = "{{ route('tender') }}"; 
                    }
                 }); 
        	} else{
                Swal.fire({
                    icon: 'warning',
                    title: 'Gagal Simpan Data!',
                    text: 'Tidak ada perubahan pada data!',
			    })
            }
          
        }
    });


	
}

// function listorder(name, id) {
//     var newOrder = $('<div class="input-group" id="' + id + '" style="margin-bottom: 15px;">'+
//                        '<div class="input-group-prepend">'+
//                             '<span class="input-group-text">'+
//                                 '<i class="fa fa-envelope-open-text"></i>'+
//                             '</span>'+
//                         '</div>'+
//                         '<input type="text" class="form-control" style="margin-right: 50px;" id="' + id + '" placeholder="Pesanan" value="'+name+'" disabled>  </input>'+
//                         '<input type="number" class="hapus form-control col-3" id="'+id+'" placeholder="Jumlah Pesanan" value="" />'+
//                     '</div>');
//     $('#listpesanan').append(newOrder);
// }

function preparedit(paramid) {
    $.ajax({  
    url : "{{ route('tender_preedit') }}",
    type : "get", 
    data: {
        param_id: paramid
    },
    dataType : "json",
    async : false,
    error: function(xhr, errorType, thrownError) {
        console.error("Kesalahan AJAX:", thrownError);
        Swal.fire(
                'Error!',
                thrownError,
                'error'
            )
    },
    success : function(result){
        console.log(result.success.note);
        if (result.success.status_app_pesanan == 2){
            $('#notearea').show();
            $('#note').val(result.success.note);
        } else{
            $('#notearea').hide();
        }
        trigerUpdate = true;
        selectcust = result.success.customer.idcustomer;
        $('#nama').val(result.success.customer.nama_customer);
        $('#alamat').val(result.success.customer.alamat);
        $('#email').val(result.success.customer.email);
        $('#no_telf').val(result.success.customer.nomor_telefon);
        // $('#barang').val(result.success.barang.nama_barang);
        $('#barang').empty().append('<option value="'+result.success.id_pesanan+'">'+result.success.barang.nama_barang+'</option>');
        // $('#barang').val(result.success.barang.barang_idbarang);
        $('#jml_barang').val(result.success.jumlah_order);
        $('#tanggal_pesan').val(result.success.tanggal_pemesanan.split(' ')[0]);
        $('#tanggal_kirim').val(result.success.tanggal_pengiriman.split(' ')[0]); 
    }
});
}
let idparam='';


</script>

@endsection
