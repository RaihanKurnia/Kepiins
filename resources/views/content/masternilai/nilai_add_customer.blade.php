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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Nilai Customer</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Data Master</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Nilai Customer</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Form Master Nilai</a>
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
            <div class="card card-custom gutter-b card-sticky" id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3  class="card-label">
                            <span id="nilai_form_title"></span>
                            <i class="mr-2"></i>
                            <small class="">try to scroll the page</small>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!-- <a href="{{ route('nilai') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>Back</a> -->
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-light-danger font-weight-bolder mr-2" onclick="edit(false)" >
                            <i class="ki ki-long-arrow-back  icon-sm"></i>Batal</button>
                        </div>
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-warning font-weight-bolder" onclick="edit(true)" >
                                <i class="fas fa-pencil-alt icon-sm"></i>Edit Form</button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary font-weight-bolder" onclick="add()" >
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
                                    <h3 class="text-dark font-weight-bold mb-10">Kategori <span style="color: white; background-color:#EB5353;">Nilai Rendah</span> : </h3>
                                    <div class="form-group row">
                                        <label class="col-3">Minimum Bobot</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" id="minimum_rendah" />
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-3">Maksimum Bobot</label>
                                        <div class="col-9">
                                            <input class="form-control" type="number" id="maksimum_rendah" placeholder='Input Maksimum Bobot' />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Nilai</label>
                                        <div class="col-9">
                                            <input class="form-control" type="number" id="nilai_rendah" placeholder='Input Nilai' />
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
            <div class="card card-custom gutter-b" id="kt_page_sticky_card">
                <div class="card-body">
                    <!--begin::Form-->
                    <form class="form" id="kt_form">
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="my-5">
                                    <h3 class="text-dark font-weight-bold mb-10">Kategori <span style="color: white; background-color:#F9D923;">Nilai Sedang</span> :</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Minimum Bobot</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" id="minimum_sedang" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Maksimum Bobot</label>
                                        <div class="col-9">
                                            <input class="form-control" type="number" id="maksimum_sedang" placeholder='Input Maksimum Bobot' />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Nilai</label>
                                        <div class="col-9">
                                            <input class="form-control" type="number" id="nilai_sedang" placeholder='Input Nilai' />
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
            <div class="card card-custom gutter-b" id="kt_page_sticky_card">
                <div class="card-body">
                    <!--begin::Form-->
                    <form class="form" id="kt_form">
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="my-5">
                                    <h3 class="text-dark font-weight-bold mb-10">Kategori <span style="color: white; background-color:#36AE7C;">Nilai Tinggi</span> :</h3>
                                    <div class="form-group row">
                                        <label class="col-3">Minimum Bobot</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" id="minimum_tinggi" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Maksimum Bobot</label>
                                        <div class="col-9">
                                            <input class="form-control" type="number" id="maksimum_tinggi" placeholder='Input Maksimum Bobot' />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Nilai</label>
                                        <div class="col-9">
                                            <input class="form-control" type="number" id="nilai_tinggi" placeholder='Input Nilai' />
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
    // let paramid = new URLSearchParams(window.location.search).get('id');
    // let type = new URLSearchParams(window.location.search).get('view');
    let paramid = 'all'
    let type = 'View'
    let debounceTimer;
    if (paramid === null && type== null){
        $('#nilai_form_title').text('Tambah Data Nilai');
        $('#minimum_rendah').val('1');
        $('#minimum_rendah').prop('disabled', true);
        $('#maksimum_rendah').css('border', $(this).val() !== '' || $('#maksimum_rendah').val() === 0? '1px solid green' : '1px solid red');
        $('#nilai_rendah').prop('disabled', true);

        $('#minimum_sedang').prop('disabled', true);
        $('#maksimum_sedang').prop('disabled', true);
        $('#nilai_sedang').prop('disabled', true);

        $('#minimum_tinggi').prop('disabled', true);
        $('#maksimum_tinggi').prop('disabled', true);
        $('#nilai_tinggi').prop('disabled', true);

        $('#maksimum_rendah').on('keyup', function() {   
            
            clearTimeout(debounceTimer); 
            
            debounceTimer = setTimeout(() => {
                let maxRendah = parseFloat($(this).val()) ?? null;
                let minRendah = parseFloat($('#minimum_rendah').val()) || 0;
                let newValue = isNaN(maxRendah) ? 0 : maxRendah + 1;
                
                if (maxRendah > minRendah ) {
                    $(this).addClass('is-valid').css('border', '');
                } else {
                    $(this).removeClass('is-valid').css('border', '1px solid red'); 
                }

                if (maxRendah <= minRendah &&  maxRendah != null) {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Bobot Maksimum Rendah Tidak Boleh Kurang dari Bobot Minimum Rendah",
                        showConfirmButton: false,
                        timer: 2000
                    });
                    return;
                }

                $('#minimum_sedang').val(newValue);

                let fields = ['#nilai_rendah', '#maksimum_sedang', '#nilai_sedang', '#maksimum_tinggi', '#nilai_tinggi'];
                fields.reduce((prev, curr) => {
                    $(curr).val('').prop('disabled', !prev)
                        .css('border', prev ? '1px solid red' : '')
                        .removeClass('is-valid');
                    return $(curr).val() !== '';
                }, maxRendah)

                
            },300);

        })  

        $('#nilai_rendah').on('keyup', function() {   
            clearTimeout(debounceTimer); 
            
            debounceTimer = setTimeout(() => {
                let nilaiRendah = parseFloat($(this).val()) || null;

                if (nilaiRendah != null) {
                    $(this).addClass('is-valid').css('border', '');
                } else {
                    $(this).removeClass('is-valid').css('border', '1px solid red'); 
                }

                let fields = ['#maksimum_sedang', '#nilai_sedang', '#maksimum_tinggi', '#nilai_tinggi'];
                fields.reduce((prev, curr) => {
                    $(curr).val('').prop('disabled', !prev)
                        .css('border', prev ? '1px solid red' : '')
                        .removeClass('is-valid');;
                    return $(curr).val() !== '';
                }, nilaiRendah)
            },300);

        })  
            
        $('#maksimum_sedang').on('keyup', function() {   
            
            clearTimeout(debounceTimer); 
            
            debounceTimer = setTimeout(() => {
                let maxRendahsedang = parseFloat($(this).val()) ?? null;
                let minRendahsedang = parseFloat($('#minimum_sedang').val()) || 0;
                let newValuesedang = isNaN(maxRendahsedang) ? 0 : maxRendahsedang + 1;
                
                if (maxRendahsedang > minRendahsedang ) {
                    $(this).addClass('is-valid').css('border', '');
                } else {
                    $(this).removeClass('is-valid').css('border', '1px solid red'); 
                }
                if (maxRendahsedang <= minRendahsedang &&  maxRendahsedang != null) {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Bobot Maksimum Sedang Tidak Boleh Kurang dari Bobot Minimum Sedang",
                        showConfirmButton: false,
                        timer: 2000
                    });
                    return;
                }
                $('#minimum_tinggi').val(newValuesedang);

                let fields = ['#nilai_sedang', '#maksimum_tinggi', '#nilai_tinggi'];
                fields.reduce((prev, curr) => {
                    $(curr).val('').prop('disabled', !prev)
                        .css('border', prev ? '1px solid red' : '')
                        .removeClass('is-valid');
                    return $(curr).val() !== '';
                }, maxRendahsedang)
            },300);

        })  

        $('#nilai_sedang').on('keyup', function() {   
            
            clearTimeout(debounceTimer); 
            
            debounceTimer = setTimeout(() => {
                let maxnilaisedang = parseFloat($(this).val()) ?? null;
                let minnilaisedang = parseFloat($('#nilai_rendah').val()) || 0;
                
                if (maxnilaisedang > minnilaisedang ) {
                    $(this).addClass('is-valid').css('border', '');
                } else {
                    $(this).removeClass('is-valid').css('border', '1px solid red'); 
                }
                if (maxnilaisedang <= minnilaisedang &&  maxnilaisedang != null) {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Bobot Nilai Sedang Tidak Boleh Kurang dari Bobot Nilai Rendah",
                        showConfirmButton: false,
                        timer: 2000
                    });
                    return;
                }
               
                let fields = ['#maksimum_tinggi', '#nilai_tinggi'];
                fields.reduce((prev, curr) => {
                    $(curr).val('').prop('disabled', !prev)
                        .css('border', prev ? '1px solid red' : '')
                        .removeClass('is-valid');
                    return $(curr).val() !== '';
                }, maxnilaisedang)
            },300);

        })  

        $('#maksimum_tinggi').on('keyup', function() {   
            
            clearTimeout(debounceTimer); 
            
            debounceTimer = setTimeout(() => {
                let maxTinggi = parseFloat($(this).val()) ?? null;
                let minTinggi = parseFloat($('#minimum_tinggi').val()) || 0;
                // let newValuetinggi = isNaN(maxTinggi) ? 0 : minTinggi + 1;
                
                if (maxTinggi > minTinggi ) {
                    $(this).addClass('is-valid').css('border', '');
                } else {
                    $(this).removeClass('is-valid').css('border', '1px solid red'); 
                }
                if (maxTinggi <= minTinggi &&  maxTinggi != null) {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Bobot Maksimum Tinggi Tidak Boleh Kurang dari Bobot Minimum Tinggi",
                        showConfirmButton: false,
                        timer: 2000
                    });
                    return;
                }

                let fields = ['#nilai_tinggi'];
                fields.reduce((prev, curr) => {
                    $(curr).val('').prop('disabled', !prev)
                        .css('border', prev ? '1px solid red' : '')
                        .removeClass('is-valid');
                    return $(curr).val() !== '';
                }, maxTinggi)
            },300);

        })  

        $('#nilai_tinggi').on('keyup', function() {   
            
            clearTimeout(debounceTimer); 
            
            debounceTimer = setTimeout(() => {
                let maxnilaitinggi = parseFloat($(this).val()) ?? null;
                let minnilaitinggi = parseFloat($('#nilai_sedang').val()) || 0;
                 
                if (maxnilaitinggi > minnilaitinggi ) {
                    $(this).addClass('is-valid').css('border', '');
                } else {
                    $(this).removeClass('is-valid').css('border', '1px solid red'); 
                }
                if (maxnilaitinggi <= minnilaitinggi &&  maxnilaitinggi != null) {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Bobot Nilai Tinggi Tidak Boleh Kurang dari Bobot Nilai Sedang dan Rendah",
                        showConfirmButton: false,
                        timer: 2000
                    });
                    return;
                }
            },300);

        })  
        
        trigerUpdate = false;
    } else if ( paramid !== null && type== null){
        idparam =paramid;
        // $('#nilai_form_title').text('Edit Data Nilai');
        // preparedit(paramid);
        // $('#pass_hide').prop('disabled', false);
    } else if (type !== null && paramid !== null) {
        idparam =paramid;
        $('#nilai_form_title').text('View Data Nilai');
        preparedit(2);
        $('#minimum_rendah').prop('disabled', true);
        $('#maksimum_rendah').prop('disabled', true);
        $('#nilai_rendah').prop('disabled', true);
        $('#minimum_sedang').prop('disabled', true);
        $('#maksimum_sedang').prop('disabled', true);
        $('#nilai_sedang').prop('disabled', true);
        $('#minimum_tinggi').prop('disabled', true);
        $('#maksimum_tinggi').prop('disabled', true);
        $('#nilai_tinggi').prop('disabled', true);

    }


});


function preparedit(paramid) {
    $.ajax({  
    url : "{{ route('nilai_json') }}",
    type : "post", 
    data: {
        "_token": "{{ csrf_token() }}",
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
        console.log(result.data[0]);
        
        if(!result.data[0]) {
            $('#minimum_rendah').val(1);
        } else {
            $('#minimum_rendah').val(result.data[0].minimum_bobot);
            $('#maksimum_rendah').val(result.data[0].maksimum_bobot);
            $('#nilai_rendah').val(result.data[0].nilai);
            $('#minimum_sedang').val(result.data[1].minimum_bobot);
            $('#maksimum_sedang').val(result.data[1].maksimum_bobot);
            $('#nilai_sedang').val(result.data[1].nilai);
            $('#minimum_tinggi').val(result.data[2].minimum_bobot);
            $('#maksimum_tinggi').val(result.data[2].maksimum_bobot);
            $('#nilai_tinggi').val(result.data[2].nilai);
        }
        
                // $('#nama').val(result.success[0].nama_pegawai);
                // $('#role').val(result.success[0].role);
                // $('#email').val(result.success[0].email);
                // $('#password').val(result.success[0].password);
    }
    });
}

function edit(param) {
    if (param) {
        $('#nilai_form_title').text('Edit Data Nilai');
        // $('#minimum_rendah').prop('disabled', false);
        $('#maksimum_rendah').prop('disabled', false);
        $('#nilai_rendah').prop('disabled', false);
        // $('#minimum_sedang').prop('disabled', false);
        $('#maksimum_sedang').prop('disabled', false);
        $('#nilai_sedang').prop('disabled', false);
        // $('#minimum_tinggi').prop('disabled', false);
        $('#maksimum_tinggi').prop('disabled', false);
        $('#nilai_tinggi').prop('disabled', false);
        validasi();
    } else{
        let fields = ['#minimum_rendah','#maksimum_rendah','#nilai_rendah','#minimum_sedang',
         '#maksimum_sedang', '#nilai_sedang', '#minimum_tinggi','#maksimum_tinggi', '#nilai_tinggi'];

        fields.forEach(selector => {
            $(selector)
            .css('border', '')
            .removeClass('is-valid');
        });

        preparedit(2);
        $('#nilai_form_title').text('View Data Nilai');
        $('#minimum_rendah').prop('disabled', true);
        $('#maksimum_rendah').prop('disabled', true);
        $('#nilai_rendah').prop('disabled', true);
        $('#minimum_sedang').prop('disabled', true);
        $('#maksimum_sedang').prop('disabled', true);
        $('#nilai_sedang').prop('disabled', true);
        $('#minimum_tinggi').prop('disabled', true);
        $('#maksimum_tinggi').prop('disabled', true);
        $('#nilai_tinggi').prop('disabled', true);
    }
    
}

function validasi() {
    let debounceTimer;
    
    $('#maksimum_rendah').on('keyup', function() {   
            
        clearTimeout(debounceTimer); 
        
        debounceTimer = setTimeout(() => {
            let maxRendah = parseFloat($(this).val()) ?? null;
            let minRendah = parseFloat($('#minimum_rendah').val()) || 0;
            let newValue = isNaN(maxRendah) ? 0 : maxRendah + 1;
            
            if (maxRendah > minRendah ) {
                $(this).addClass('is-valid').css('border', '');
            } else {
                $(this).removeClass('is-valid').css('border', '1px solid red'); 
            }

            if (maxRendah <= minRendah &&  maxRendah != null) {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Bobot Maksimum Rendah Tidak Boleh Kurang dari Bobot Minimum Rendah",
                    showConfirmButton: false,
                    timer: 2000
                });
                return;
            }

            $('#minimum_sedang').val(newValue);

            let fields = ['#nilai_rendah', '#maksimum_sedang', '#nilai_sedang', '#maksimum_tinggi', '#nilai_tinggi'];
            fields.reduce((prev, curr) => {
                $(curr).val('').prop('disabled', !prev)
                    .css('border', prev ? '1px solid red' : '')
                    .removeClass('is-valid');
                return $(curr).val() !== '';
            }, maxRendah)

            
        },300);

    })  

    $('#nilai_rendah').on('keyup', function() {   
        clearTimeout(debounceTimer); 
        
        debounceTimer = setTimeout(() => {
            let nilaiRendah = parseFloat($(this).val()) || null;

            if (nilaiRendah != null) {
                $(this).addClass('is-valid').css('border', '');
            } else {
                $(this).removeClass('is-valid').css('border', '1px solid red'); 
            }

            let fields = ['#maksimum_sedang', '#nilai_sedang', '#maksimum_tinggi', '#nilai_tinggi'];
            fields.reduce((prev, curr) => {
                $(curr).val('').prop('disabled', !prev)
                    .css('border', prev ? '1px solid red' : '')
                    .removeClass('is-valid');;
                return $(curr).val() !== '';
            }, nilaiRendah)
        },300);

    })  
        
    $('#maksimum_sedang').on('keyup', function() {   
        
        clearTimeout(debounceTimer); 
        
        debounceTimer = setTimeout(() => {
            let maxRendahsedang = parseFloat($(this).val()) ?? null;
            let minRendahsedang = parseFloat($('#minimum_sedang').val()) || 0;
            let newValuesedang = isNaN(maxRendahsedang) ? 0 : maxRendahsedang + 1;
            
            if (maxRendahsedang > minRendahsedang ) {
                $(this).addClass('is-valid').css('border', '');
            } else {
                $(this).removeClass('is-valid').css('border', '1px solid red'); 
            }
            if (maxRendahsedang <= minRendahsedang &&  maxRendahsedang != null) {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Bobot Maksimum Sedang Tidak Boleh Kurang dari Bobot Minimum Sedang",
                    showConfirmButton: false,
                    timer: 2000
                });
                return;
            }
            $('#minimum_tinggi').val(newValuesedang);

            let fields = ['#nilai_sedang', '#maksimum_tinggi', '#nilai_tinggi'];
            fields.reduce((prev, curr) => {
                $(curr).val('').prop('disabled', !prev)
                    .css('border', prev ? '1px solid red' : '')
                    .removeClass('is-valid');
                return $(curr).val() !== '';
            }, maxRendahsedang)
        },300);

    })  

    $('#nilai_sedang').on('keyup', function() {   
        
        clearTimeout(debounceTimer); 
        
        debounceTimer = setTimeout(() => {
            let maxnilaisedang = parseFloat($(this).val()) ?? null;
            let minnilaisedang = parseFloat($('#nilai_rendah').val()) || 0;
            
            if (maxnilaisedang > minnilaisedang ) {
                $(this).addClass('is-valid').css('border', '');
            } else {
                $(this).removeClass('is-valid').css('border', '1px solid red'); 
            }
            if (maxnilaisedang <= minnilaisedang &&  maxnilaisedang != null) {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Bobot Nilai Sedang Tidak Boleh Kurang dari Bobot Nilai Rendah",
                    showConfirmButton: false,
                    timer: 2000
                });
                return;
            }
            
            let fields = ['#maksimum_tinggi', '#nilai_tinggi'];
            fields.reduce((prev, curr) => {
                $(curr).val('').prop('disabled', !prev)
                    .css('border', prev ? '1px solid red' : '')
                    .removeClass('is-valid');
                return $(curr).val() !== '';
            }, maxnilaisedang)
        },300);

    })  

    $('#maksimum_tinggi').on('keyup', function() {   
        
        clearTimeout(debounceTimer); 
        
        debounceTimer = setTimeout(() => {
            let maxTinggi = parseFloat($(this).val()) ?? null;
            let minTinggi = parseFloat($('#minimum_tinggi').val()) || 0;
            // let newValuetinggi = isNaN(maxTinggi) ? 0 : minTinggi + 1;
            
            if (maxTinggi > minTinggi ) {
                $(this).addClass('is-valid').css('border', '');
            } else {
                $(this).removeClass('is-valid').css('border', '1px solid red'); 
            }
            if (maxTinggi <= minTinggi &&  maxTinggi != null) {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Bobot Maksimum Tinggi Tidak Boleh Kurang dari Bobot Minimum Tinggi",
                    showConfirmButton: false,
                    timer: 2000
                });
                return;
            }

            let fields = ['#nilai_tinggi'];
            fields.reduce((prev, curr) => {
                $(curr).val('').prop('disabled', !prev)
                    .css('border', prev ? '1px solid red' : '')
                    .removeClass('is-valid');
                return $(curr).val() !== '';
            }, maxTinggi)
        },300);

    })  

    $('#nilai_tinggi').on('keyup', function() {   
        
        clearTimeout(debounceTimer); 
        
        debounceTimer = setTimeout(() => {
            let maxnilaitinggi = parseFloat($(this).val()) ?? null;
            let minnilaitinggi = parseFloat($('#nilai_sedang').val()) || 0;
                
            if (maxnilaitinggi > minnilaitinggi ) {
                $(this).addClass('is-valid').css('border', '');
            } else {
                $(this).removeClass('is-valid').css('border', '1px solid red'); 
            }
            if (maxnilaitinggi <= minnilaitinggi &&  maxnilaitinggi != null) {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Bobot Nilai Tinggi Tidak Boleh Kurang dari Bobot Nilai Sedang dan Rendah",
                    showConfirmButton: false,
                    timer: 2000
                });
                return;
            }
        },300);

    })  
}

let idparam='';

function add() {
	var minimum_rendah = $('#minimum_rendah').val();
    var maksimum_rendah = $('#maksimum_rendah').val();
    var nilai_rendah = $('#nilai_rendah').val();

    var minimum_sedang = $('#minimum_sedang').val();
    var maksimum_sedang = $('#maksimum_sedang').val();
    var nilai_sedang = $('#nilai_sedang').val();

    var minimum_tinggi = $('#minimum_tinggi').val();
    var maksimum_tinggi = $('#maksimum_tinggi').val();
    var nilai_tinggi = $('#nilai_tinggi').val();

    if (!minimum_rendah || !maksimum_rendah || !nilai_rendah 
        || !minimum_sedang || !maksimum_sedang || !nilai_sedang
        || !minimum_tinggi || !maksimum_tinggi || !nilai_tinggi ) {
        swal.fire({
        position: "center",
        icon: "error",
        title: "Lengkapi Data terlebih Dahulu",
        showConfirmButton: false,
        timer: 1000
         });
        return; 
    }
    if ($('#maksimum_rendah').prop('disabled')){
        swal.fire({
        position: "center",
        icon: "error",
        title: "Tidak ada Data yang Berubah",
        showConfirmButton: false,
        timer: 1000
         });
        return; 
    }
    $.ajax({  
        // url : (!trigerUpdate?"{{ route('user_add') }}":"{{ route('user_edit')}}"),
        // url : (!trigerUpdate?"{{ route('nilai_add_action_cust') }}":"#"),
        url :"{{ route('nilai_add_action_cust') }}",
        type : "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            params : [
                {   
                    tipe : 2,
                    kategori : 'Rendah',
                    minimum : minimum_rendah,
                    maksimum : maksimum_rendah,
                    nilai : nilai_rendah
                },
                {
                    tipe : 2,
                    kategori : 'Sedang',
                    minimum : minimum_sedang,
                    maksimum : maksimum_sedang,
                    nilai : nilai_sedang
                },
                {
                    tipe : 2,
                    kategori : 'Tinggi',
                    minimum : minimum_tinggi,
                    maksimum : maksimum_tinggi,
                    nilai : nilai_tinggi
                }
            ]
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
                        window.location.href = "{{ route('nilai_view_form_customer') }}"; 
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
