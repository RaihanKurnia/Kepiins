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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">User</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Data Master</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">User</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Form Informasi User</a>
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
                        <a href="{{ route('user') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary font-weight-bolder" onclick="add()" id="save_pegawai">
                                <i class="ki ki-check icon-sm"></i>Save Form</button>
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
                                    <h3 class="text-dark font-weight-bold mb-10">Informasi User:</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Nama User</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" id="nama" placeholder='Input Nama User' />
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
                                    <div class="form-group row">
                                        <label class="col-3">Role</label>
                                        <div class="col-9">
                                            <select class="custom-select form-control" id="role">
                                                    <option value="" disabled selected>Open this select menu </option>
                                                    <option value="Super Admin">Super Admin</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="HRD">HRD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Password</label>
                                        <div class="col-9">
                                            <div class="input-group">
                                                <input class="form-control" type="password" id="password" placeholder='Input Password' />
                                                <!-- <input type="text" class="form-control" placeholder="Search for..." /> -->
                                                <div class="input-group-append">
                                                    <button class="btn btn-success" type="button" id="pass_hide">
                                                    <!-- <i class=' fas fa-eye'></i> -->
                                                    <i class=' fas fa-eye-slash'></i>
                                                    </button>
                                                </div>
                                            </div>
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
$(document).ready(function(){
    $('#pass_hide').click(function(){
        var passwordInput = $('#password');
        var icon = $(this).find('i');
        var newType = (passwordInput.attr('type') === 'password') ? 'text' : 'password';
        passwordInput.attr('type', newType);
        icon.toggleClass('fas fa-eye-slash fas fa-eye');
    });
    
    let paramid = new URLSearchParams(window.location.search).get('id');
    let type = new URLSearchParams(window.location.search).get('view');
    if (paramid === null && type== null){
        $('#pegawai_form_title').text('Tambah Data User');
        $('#nama').val('');
        $('#email').val('');
        $('#role').val('');
        $('#password').val('');
        $('#pass_hide').prop('disabled', false);
        trigerUpdate = false;
    } else if ( paramid !== null && type== null){
        idparam =paramid;
        $('#pegawai_form_title').text('Edit Data User');
        preparedit(paramid);
        $('#pass_hide').prop('disabled', false);
    } else if (type !== null && paramid !== null) {
        idparam =paramid;
        $('#pegawai_form_title').text('View Data User');
        preparedit(paramid);
        $('#nama').prop('disabled', true);
        $('#email').prop('disabled', true);
        $('#role').prop('disabled', true);
        $('#password').prop('disabled', true);
        $('#pass_hide').prop('disabled', true);
    }
});


function preparedit(paramid) {
    $.ajax({  
    url : "{{ route('user_preedit') }}",
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
        trigerUpdate = true;
        
                $('#nama').val(result.success[0].nama_pegawai);
                $('#role').val(result.success[0].role);
                $('#email').val(result.success[0].email);
                $('#password').val(result.success[0].password);
        
        
    }
});
}
let idparam='';

function add() {
	var nama = $('#nama').val();
    var email = $('#email').val();
    var role = $('#role').val();
    var password =$('#password').val();

    console.log(role);
    if (!nama || !email || !role || !password) {
        swal.fire({
        position: "center",
        icon: "error",
        title: "Lengkapi Data terlebih Dahulu",
        showConfirmButton: false,
        timer: 1000
         });
        return; 
    }
    $.ajax({  
        url : (!trigerUpdate?"{{ route('user_add') }}":"{{ route('user_edit')}}"),
        type : "post",
        data: {
            "_token": "{{ csrf_token() }}",
            param_id:idparam,
            param_nama:nama,
            param_email:email,
            param_role:role,
            param_password:password,
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
            console.log(result);
            if(result.success){
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Simpan Data !',
                    text: 'Data berhasil disimpan',
			    }).then((result) => {
                    if (result.value || result.isDismissed) {
                        window.location.href = "{{ route('user') }}"; 
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
</script>

@endsection
