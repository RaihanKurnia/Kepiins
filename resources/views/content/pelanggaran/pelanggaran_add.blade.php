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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Pelanggaran</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <!-- <li class="breadcrumb-item">
                            <a href="" class="text-muted">Data Pesanan</a>
                        </li> -->
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Pelanggaran</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Tambah Data Pelanggaran</a>
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
                        <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary font-weight-bolder" onclick="addtender()" id="save_pegawai">
                                <i class="ki ki-check icon-sm"></i>Save Form</button>
                            <!-- <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="nav nav-hover flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon flaticon2-reload"></i>
                                            <span class="nav-text">Save &amp; continue</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon flaticon2-add-1"></i>
                                            <span class="nav-text">Save &amp; add new</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon flaticon2-power"></i>
                                            <span class="nav-text">Save &amp; exit</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Form-->
                    

                    <form class="form" id="kt_form">
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="my-5">
                                    <h3 class="text-dark font-weight-bold mb-10">Informasi Pelanggaran:</h3>
                                    <div class="form-group row" id="pilih_pelanggaran">
                                        <label class="col-3">Pilih Pegawai</label>
                                        <div class="col-9">
                                            <select class="custom-select form-control" id="pegawai">
                                                    <option value="" disabled selected>Open this select menu </option>
                                                    <!-- <option value="1">Åland Islands</option>
                                                    <option value="2">Afghanistan</option>
                                                    <option value="3">Åland Islands</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Nama Pegawai</label>
                                        <div class="col-9">
                                            <input type="text"  id ="nama" class="form-control" placeholder=" Nama Pegawai" disabled/>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="kategori">
                                        <label class="col-3">Kategori Kesalahan</label>
                                        <div class="col-9">
                                            <select class="custom-select form-control" id="jns_pelanggaran">
                                                    <option value="" disabled selected>Open this select menu </option>
                                                    <!-- <option value="1">Åland Islands</option>
                                                    <option value="2">Afghanistan</option>
                                                    <option value="3">Åland Islands</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-3">Keterangan</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="keterangan" placeholder='Keterangan' rows="3" ></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-3">Tanggal</label>
                                        <div class="col-6">
                                            <input type="date" class="form-control"  value="" id="tanggal_pelanggaran" />
                                            <!-- <span class="form-text text-muted">Enable clear and today helper buttons</span> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Surat Pernyataan</label>
                                        <div class="col-6">
                                            <input type="file"  value="" id="surat" />
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
    pegawai_data();
    if (paramid === null && type== null){
        $('#pegawai_form_title').text('Tambah Data Pelanggaran');
        $('#nama').val('');
        $('#umur').val('');
        $('#alamat').val('');
        $('#no_telf').val('');
        $('#email').val('');
        $('#tanggal_pesan').val('');
        $('#tanggal_kirim').val('');
        $('#jml_barang').val('');
        $('#pilih_customer').show();
        trigerUpdate = false;
    } else if ( paramid !== null && type== null){
        $('#pilih_customer').hide();
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

function pegawai_data() {
	$.ajax({  
		url : "{{route('tender_list')}}",
		type: 'get',
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
		success : function(result) {
			console.log(result.jns_pelanggaran[0].idjenis_pelanggaran);	
			var pegawai = '';
            var jns_pel = '';

			for(var i = 0; i < result.pegawai.length; i++){
				// console.log(response.data[i].id,response.data[i].nama);
				pegawai += '<option value="'+result.pegawai[i].idpegawai+','+result.pegawai[i].nama_pegawai+'"> '+result.pegawai[i].nama_pegawai+'</option>';
			}

            for(var i = 0; i < result.jns_pelanggaran.length; i++){
				// console.log(response.data[i].id,response.data[i].nama);
				jns_pel += '<option value="'+result.jns_pelanggaran[i].idjenis_pelanggaran+'"> '+result.jns_pelanggaran[i].nama_pelanggaran+'</option>';
			}
			$('#pegawai').append(pegawai); 
            $('#jns_pelanggaran').append(jns_pel);

			
		}
	});
}

$('#pegawai').change(function() {
    selectpeg = $('#pegawai').val();
    var selectedData = null;
    selectedData = selectpeg.split(',');
    $('#nama').val(selectedData[1]);
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
        // console.log(result.success.);
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
