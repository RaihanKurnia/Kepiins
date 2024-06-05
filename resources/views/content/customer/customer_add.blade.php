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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Customer</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Data Master</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Customer</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Form Informasi Customer</a>
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
                            <span id="form_title"></span>
                            <i class="mr-2"></i>
                            <small class="">try to scroll the page</small>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>Back
                        </a>
                        @if(Request()->view !== '1')
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary font-weight-bolder" onclick="add()" id="save_customer">
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
                                    <h3 class="text-dark font-weight-bold mb-10">Informasi Customer:</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Nama Customer</label>
                                        <div class="col-9">
                                            <input type="text"  id ="nama" class="form-control" placeholder="Input Nama Customer" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Alamat</label>
                                        <div class="col-9">
                                           <textarea class="form-control" id="alamat" placeholder='Input Alamat' rows="3" ></textarea>
                                            <span class="form-text text-muted">*Masukkan alamat dengan lengkap</span>
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
                                                 placeholder="Input No.Telp" id="no_telp" maxlength="15" />
                                            </div>
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
                                                 placeholder="Input Alamat Email" id="email" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div  id="pesananrepeat"> 
                                        <div class="form-group row">
                                            <label class="col-3">Pesanan</label>
                                            <div class="col-9" id="listpesanan">
                                               
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group row">
                                            <div class="col-3"></div>
                                            <div class="col-9">
                                                <div id="tambahpesanan" class="btn font-weight-bold btn-warning">
                                                <i class="la la-plus"></i>Tambah Pesanan</div>
                                                <div id="checkpesanan" class="btn font-weight-bold btn-success">
                                                <i class="la la-plus"></i>check Pesanan</div>
                                            </div>
                                        </div>
                                    </div> -->
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
let idparam='';
var counter = 1;
var uniqueId = Date.now();

function listorder(name, id) {
    var newOrder = $('<div class="input-group" id="' + id + '" style="margin-bottom: 10px;">' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text">' +
        '<i class="fa fa-envelope-open-text"></i>' +
        '</span>' +
        '</div>' +
        '<input type="text" class="form-control" placeholder="Input Pesanan" value="' + name + '" />' +
        '<div class="input-group-append">' +
        '<a href="javascript:;" class="btn font-weight-bold btn-danger btn-icon" id="hapus">' +
        '<i class="la la-close"></i>' +
        '</a>' +
        '</div>' +
        '</div>');
    $('#listpesanan').append(newOrder);
}


$("#tambahpesanan").click(function(){
     // Menggunakan timestamp sebagai ID unik
    listorder("", uniqueId);
});



function getallpesananvalue() {
        var orderValues = [];
        $('#listpesanan .form-control').each(function() {
            var id = $(this).closest('.input-group').attr('id');
            var name = $(this).attr('name');
            var value = $(this).val();
            if(value) {
            orderValues.push({ id: id, name: name, value: value });
        }
        });
        return orderValues;
}

$("#checkpesanan").click(function() {
    var values = getallpesananvalue();
});   

// Hapus pesanan
$(document).on('click', '#hapus', function() {
    var id = $(this).closest('.input-group').attr('id');
    $(this).closest('.input-group').remove();       
    $.ajax({  
        url : "{{ route('data_remove') }}",
        type : "post", 
        data: {
            "_token": "{{ csrf_token() }}",
            param_id: id
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
              
        }
    });


    // $(this).closest('.input-group').remove();
});


function delete_pesanan(params) {
    var pesanan_choose = getallpesananvalue();

    
}

    // batas
$(document).ready(function(){
    let paramid = new URLSearchParams(window.location.search).get('id');
    let type = new URLSearchParams(window.location.search).get('view');
    if (paramid === null && type== null){               //untuk new
        $('#form_title').text('Tambah Data Customer');
        $('#nama').val('');
        $('#alamat').val('');
        $('#no_telp').val('');
        $('#email').val('');
        // $('#status').empty();
        trigerUpdate = false;
    } else if ( paramid !== null && type== null){       //untuk edit
        idparam =paramid;
        $('#form_title').text('Edit Data Customer');
        preparedit(paramid,type);
        // $('#status').empty();
    } else if (type !== null && paramid !== null) {     //untuk view
        idparam =paramid;
        $('#form_title').text('View Data Customer');
        preparedit(paramid,type);
        $('#nama').prop('disabled', true);
        $('#alamat').prop('disabled', true);
        $('#no_telp').prop('disabled', true);
        $('#ket').prop('disabled', true);
        $('#email').prop('disabled', true);
        $('#jabatan').prop('disabled', true); 
    }
});

function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}


function preparedit(paramid,view) {
    $.ajax({  
        url : "{{ route('customer_preedit') }}",
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
            console.log(result.success.nama_customer);
            var data = result.success
            trigerUpdate = true;
            // console.log(initialData);
            $('#nama').val(data.nama_customer);
            $('#alamat').val(data.alamat);
            $('#no_telp').val(data.nomor_telefon);
            $('#email').val(data.email);
            // if (view !== null) {
            //     if (stat == 0) {
            //         $('#status').append(`
            //             <label class="col-3">Status</label>
            //             <div class="col-9">
            //                 <span class="label label-lg label-light-success label-inline mr-2">Open Order</span>
            //             </div>`);
            //     } else {
            //         $('#status').append(`
            //             <label class="col-3">Status</label>
            //             <div class="col-9">
            //                 <span class="label label-lg label-light-danger label-inline mr-2">Closed Order</span>
            //             </div>`);
            //     }
            // }
            
        }
    });
}


function add() {
	var nama = $('#nama').val();
	var alamat = $('#alamat').val();
	var notelp = $('#no_telp').val();
	var emailval = $('#email').val();
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var email = emailReg.test( emailval );

    var pesanan = getallpesananvalue();
    console.log({pesanan});
    if (!nama || !alamat || !notelp || !emailval) {
        swal.fire({
        position: "center",
        icon: "error",
        title: "Lengkapi Data terlebih Dahulu",
        showConfirmButton: false,
        timer: 1000
         });
        return; 
    }
    if(!email){
        swal.fire({
        position: "center",
        icon: "error",
        title: "Format Email Tidak Sesuai",
        showConfirmButton: false,
        timer: 1000
         });
        return; 
    }
    $.ajax({  
        url : (!trigerUpdate?"{{route('customer_add')}}":"{{route('customer_edit')}}"),
        type : "post",
        data: {
            "_token": "{{ csrf_token() }}",
            param_id:idparam,
            param_nama:nama,
            param_alamat:alamat,
			param_notelpt:notelp,
			param_email:emailval
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
        	if(result.success){
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Simpan Data !',
                    text: 'Data berhasil disimpan',
			    }).then((result) => {
                    if (result.value || result.isDismissed) {
                        window.location.href = "{{ route('customer') }}"; 
                    }
                 }); 
        	} else{
                Swal.fire({
                    icon: 'warning',
                    title: 'Gagal Simpan Data!',
                    text: result.message,
			    })
            }
        }
    });

	
}
</script>

@endsection
