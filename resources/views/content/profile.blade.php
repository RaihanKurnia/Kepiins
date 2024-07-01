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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Profil</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Data Profil</a>
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
                                        <label class="col-3">Foto</label>
                                        <div class="col-9" >
                                        <!-- <img src="{{ asset('assets/media/users/blank.png')}}" alt="" class= "d-flex align-self-start rounded mr-3" height="64"> -->
                                        <!-- <input id="file" type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" onchange="loadFile(event)" style="margin: auto;" /> -->
                                       
                                        
                                            <div class="image-input image-input-empty image-input-outline" id="show_img" style="background-image: url({{ asset('assets/media/users/blank.png') }})">
                                                <div class="image-input-wrapper"></div>
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" >
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input id="file" type="file" name="profile_image" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="profile_avatar_remove" />
                                                </label>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>

                                        </div>
                                        <!-- <div class="col-3">
                                            <img src="{{ asset('assets/media/users/blank.png')}}" alt="" class= "d-flex align-self-start rounded mr-3" height="64">
                                            <input id="file" type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" onchange="loadFile(event)" />
                                        </div> -->

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Nama Pegawai</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" id="nama" placeholder='Input Nama Pegawai' />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3">Alamat</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="alamat" placeholder='Input Alamat' rows="3" ></textarea>
                                            <span class="form-text text-muted">Masukkan alamat tempat tinggal anda dengan lengkap</span>
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
                                        <label class="col-3">Tanggal Lahir</label>
                                        <div class="col-4">
                                            <input type="date" class="form-control"  value="" id="tanggal_lahir" />
                                            <!-- <span class="form-text text-muted">Enable clear and today helper buttons</span> -->
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
                                                 placeholder="Input No.Telp" id="no_telf" maxlength="15" />
                                            </div>
                                            <!-- <span class="form-text text-muted">We'll never share your email with anyone
                                                else.</span> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Pendidikan</label>
                                        <div class="col-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-school"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control"
                                                 placeholder="Input Jenjang Pendidikan" id="pendidikan" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" style= "display:none;">
                                        <label class="col-3">Jabatan</label>
                                        <div class="col-9">
                                            <select class="custom-select form-control" id="jabatan">
                                                    <option value="" disabled selected>Open this select menu </option>
                                                    <option value="kontrak">PEGAWAI KONTRAK</option>
                                                    <option value="tetap">PEGAWAI TETAP</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-2"></div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <!--begin::Row-->
                        <div class ="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="my-52">
                                    <h3 class="text-dark font-weight-bold mb-10">Change Password:</h3>
                                    <div class="form-group row mt-10">
                                        <label class="col-3"></label>
                                        <div class="col-9">
                                            <button type="button" class="btn btn-light-danger font-weight-bold btn-sm">Deactivate your account ?</button>
                                            <div class="form-text text-muted mt-3">After you log in, you will be asked for additional information to confirm your identity and protect your account from being compromised.
                                            <a href="#">Learn more</a>.</div>
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
    let url = window.location.href;
    let split = url.split('/');
    let paramid = split[split.length - 1];
    // console.log(paramid);
    let type = new URLSearchParams(window.location.search).get('view');
    if (paramid === null && type== null){
        $('#pegawai_form_title').text('Tambah');
        $('#nama').val('');
        $('#alamat').val('');
        $('#email').val('');
        $('#tanggal_lahir').val('');
        $('#no_telf').val('');
        $('#foto').val('');
        $('#jabatan').val('');
        $('#pendidikan').val('');
        
        trigerUpdate = false;
    } else if ( paramid !== null && type== null){
        idparam =paramid;
        $('#pegawai_form_title').text('Edit Profil');
        preparedit(paramid);
    } else if (type !== null && paramid !== null) {
        idparam =paramid;
        $('#pegawai_form_title').text('View Profil');
        preparedit(paramid);
        $('#nama').prop('disabled', true);
        $('#alamat').prop('disabled', true);
        $('#email').prop('disabled', true);
        $('#tanggal_lahir').prop('disabled', true);
        $('#no_telf').prop('disabled', true);
        $('#foto').prop('disabled', true);
        $('#jabatan').prop('disabled', true);
        $('#pendidikan').prop('disabled', true);
    }
});

let passwordhint = '';

function preparedit(paramid) {
    $.ajax({  
    url : "{{ route('pegawai_preedit') }}",
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
        // console.log(result);
        trigerUpdate = true;
        $('#nama').val(result.success[0].nama_pegawai);
        $('#alamat').val(result.success[0].alamat);
        $('#no_telf').val(result.success[0].nomor_telepon);
        $('#email').val(result.success[0].email);
        $('#jabatan').val(result.success[0].jabatan);
        $('#tanggal_lahir').val(result.success[0].tanggal_lahir);
        $('#pendidikan').val(result.success[0].jenjang_pendidikan);
        passwordhint = result.success[0].password;

        if (result.success[0].foto){
            var photoUrl = '{{ url("/") }}' + '/photoprofile/' + result.success[0].foto;
            $('#show_img').css('background-image', 'url(' + photoUrl + ')');
        }
    }
    
});
}
let idparam='';

function add() {
	var nama = $('#nama').val();
    var alamat = $('#alamat').val();
    var email = $('#email').val();
    var tgl_lahir = $('#tanggal_lahir').val();
    var no_telp = $('#no_telf').val();
    var foto =  $('#foto').val();
    var jabatan = $('#jabatan').val();
    var password = passwordhint;
    var pendidikan = $('#pendidikan').val();

    var img = $('#file').val();
    var myimg = document.getElementById('file');

    if (!nama || !alamat || !email || !tgl_lahir || !no_telf ) {
        swal.fire({
        position: "center",
        icon: "error",
        title: "Lengkapi Data terlebih Dahulu",
        showConfirmButton: false,
        timer: 1000
         });
        return; 
    } else {
        var file = new FormData();
        file.append('param_id',idparam);
        file.append('param_nama',nama);
        file.append('param_alamat',alamat);
        file.append('param_email',email);
        file.append('param_notelp',no_telp);
        file.append('param_jabatan',jabatan);
        file.append('param_password',password);
        file.append('param_tgllahir',tgl_lahir);
        file.append('param_pendidikan',pendidikan);
        file.append('param_file',$("#file")[0].files[0]); 

        $.ajax({
            url : (!trigerUpdate?"{{ route('pegawai_add') }}":"{{ route('pegawai_edit') }}"),
            type : "POST",
            headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
            data: file,
            dataType : "json",
            async : false,
            processData: false,
            contentType: false,
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
                            window.location.reload(); 
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


	
}

// $('input[type="file" ] [name="profile_image"]').val('');
$('#file').on('change', function(){
    var path_img =$(this)[0].value;
    var show_img = $('#show_img');
    var extensi = path_img.substring(path_img.lastIndexOf('.')+1).toLowerCase();

    if(typeof(FileReader) != 'undefined' ){
        // console.log('HALOO');
        // show_img.empty();
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#show_img').css('background-image','url(' + e.target.result + ')');
            // console.log(e.target.result);
        }
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
})

</script>

@endsection