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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Tender</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Data Master</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Tender</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Form Informasi Tender</a>
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
                        <a href="{{asset('/tender/approval')}}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
                        <div class="btn-group">
                            <button type="button"class="btn btn-success font-weight-bolder  mr-2" onclick="reject_approved()" id="approve">
                                <i class="ki ki-bold-check icon-sm"></i>Approved
                            </button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger font-weight-bolder  mr-2" onclick="reject_approved()" id="reject">
                                <i class="ki ki-bold-close icon-sm"></i>Rejected
                            </button>
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
                                    <h3 class="text-dark font-weight-bold mb-10">Informasi Tender:</h3>
                                    <!-- <div class="form-group row">
                                        <label class="col-3">Pilih Cutomer</label>
                                        <div class="col-9">
                                            <select class="custom-select form-control" id="customer">
                                                    <option value="" disabled selected>Open this select menu </option> -->
                                                    <!-- <option value="1">Åland Islands</option>
                                                    <option value="2">Afghanistan</option>
                                                    <option value="3">Åland Islands</option> -->
                                            <!-- </select>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label class="col-3">Nama Pegawai</label>
                                        <div class="col-9">
                                            <input type="text"  id ="namapegawai" class="form-control" placeholder=" Nama Pegawai" disabled/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Nama Customer</label>
                                        <div class="col-9">
                                            <input type="text"  id ="namacustomer" class="form-control" placeholder=" Nama Customer" disabled/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Alama Customer</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="alamat" placeholder='Alamat Customer' rows="3" disabled ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Email Customer</label>
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
                                        <label class="col-3">No.Hp/Telepon Customer</label>
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
                                        <label class="col-3">Pesanan</label>
                                        <div class="col-9" id="listpesanan">
                                            <div class="input-group" id="parent" style="margin-bottom: 15px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-envelope-open-text"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" style="margin-right: 50px;" placeholder=" Pesanan" value="" disabled>  </input>
                                                <input type="number" class="form-control col-3" placeholder="Jumlah Pesanan" value="" />
                                            
                                            </div>

                                            <!-- <div class="input-group" id="1" style="margin-bottom: 15px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-envelope-open-text"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" style="margin-right: 50px;" placeholder="Pesanan" value="">  </input>
                                                <input type="number" class="form-control col-3" placeholder="Jumlah Pesanan" value="" />
                                            
                                            </div> -->
                                        </div>
                                    </div>
                                  

                                    <!-- <div id="pesananlist">
                                    <label class="col-3">Nama Customer</label>
                                        <div class="form-group row">
                                            <label class="col-3"></label>
                                                <div class="col-6">
                                                    <input type="text"  id ="nama" class="form-control" placeholder=" Nama Customer" disabled/>
                                                </div>
                                                <div class="col-3">
                                                    <input type="number" id ="jumlah" class="form-control" placeholder="Jumlah Pesanan" />
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-3"></label>
                                                    <div class="col-6">
                                                        <input type="text"  id ="nama" class="form-control" placeholder=" Nama Customer" disabled/>
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="number" id ="jumlah" class="form-control" placeholder="Jumlah Pesanan" />
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
                var options = '';
                for(var i = 0; i < response.data.length; i++){
                    // console.log(response.data[i].id,response.data[i].nama);
                    options += '<option value="'+response.data[i].id+'">'+response.data[i].nama+'</option>';
                }
                $('#customer').append(options);
                data_cust = response
                console.log(data_cust);
            }
        });
    } else if ( paramid !== null && type== null){
        idparam =paramid;
        $('#pegawai_form_title').text('Edit Data Pegawai');
        preparedit(paramid);
    } else if (type !== null && paramid !== null) {
        idparam =paramid;
        $('#pegawai_form_title').text('Approval Data Tender');
        preparedit(paramid);
    }
});





function listorder(name, id,jumlah) {
    var newOrder = $('<div class="input-group" id="' + id + '" style="margin-bottom: 15px;">'+
                       '<div class="input-group-prepend">'+
                            '<span class="input-group-text">'+
                                '<i class="fa fa-envelope-open-text"></i>'+
                            '</span>'+
                        '</div>'+
                        '<input type="text" class="form-control" style="margin-right: 50px;" id="' + id + '" placeholder="Pesanan" value="'+name+'" disabled>  </input>'+
                        '<input type="number" class="hapus form-control col-3" id="'+id+'" placeholder="Jumlah Pesanan" value="'+jumlah+'" disabled/>'+
                    '</div>');
    $('#listpesanan').append(newOrder);
}

function preparedit(paramid) {
    $.ajax({  
    url : "{{ route('tender_approval_view') }}",
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
        let initialData =result.success[0].pesanan;
        let nama_pegawai = new URLSearchParams(window.location.search).get('name');
        console.log(initialData);
        $('#parent').remove();
        $('#namapegawai').val(nama_pegawai);
        $('#namacustomer').val(result.success[0].nama);
        $('#no_telf').val(result.success[0].notelp);
        $('#alamat').val(result.success[0].alamat);
        $('#email').val(result.success[0].email);
        if (initialData.length > 0){
            initialData.forEach(function(item) {
                listorder(item.nama_pesanan, item.id,item.jumlah);
            });
        }
        
    }
    });
}
let idparam='';

function reject_approved() {
    let idcustomer = new URLSearchParams(window.location.search).get('id');
    
    console.log({idcustomer});
}

</script>

@endsection
