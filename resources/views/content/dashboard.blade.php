@extends('home')

@section('content')

<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->
<style>
    .apexcharts-title-text {
      font-family: Helvetica, sans-serif;
      /* font-weight: bold; */
      /* Add any additional styles you want to apply */
    }
  </style>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 ">Dashboard</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->

    
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->

            <!--end::Row-->
            <!--begin::Row-->


            
            <div class="row">             
              <div class="container">
                  <!--begin::Advance Table Widget 4-->
                <div class="card card-custom card-stretch gutter-b">
                    <div class="container">
                      <!--begin::Card-->
                        <div class="card-body">
                          <!--begin::Details-->
                          <div class="d-flex mb-9">
                            <!--begin: Pic-->
                            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                              <div class="symbol symbol-50 symbol-lg-120" id="photo">
                                <!-- <img src="assets/media/users/300_1.jpg" alt="image" /> -->
                              </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                              <!--begin::Title-->
                              <div class="d-flex justify-content-between flex-wrap mt-1">
                                <div class="d-flex mr-3">
                                <marquee  width="auto" style="margin-bottom: -5px; " class="font-20 weight-600 text-capitalize">
                                    Welcome back 
                                </marquee>
                                </div>
                              </div>
                              <div class="d-flex justify-content-between flex-wrap mt-1">
                                <div class="d-flex mr-3">
                                  <a class=" font-size-h3 font-weight-bold mr-3" style="color: #1c9aaf;" id="namacuy"></a>
                                </div>
                              </div>
                              <!--end::Title-->
                              <!--begin::Content-->
                              <div class="d-flex flex-wrap justify-content-between mt-1">
                                <div class="d-flex flex-column flex-grow-1 pr-8">
                                  <div class="d-flex flex-wrap mb-4">
                                    <!-- <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                    <i class="flaticon2-new-email mr-2 font-size-lg"></i>jason@siastudio.com</a> -->
                                    
                                  </div>
                                  <span class="font-weight-bold text-dark-50"><b>Kepiins</b> Key Performance Index Information System</span>
                                  
                                </div>
                              </div>
                              <!--end::Content-->
                            </div>
                            <!--end::Info-->
                            @if(session()->get('role') === 'Pegawai')
                            <!--start-->
                            <div class="flex-grow-1" style ="align-content:center;">
                                <!--begin::Item-->
                                <div class="d-flex align-items-center rounded p-5" id="rekomen">
                                  
                                </div>
                                <!--end::Item-->
                            </div> 
                            <!-- end -->
                             @endif
    
                            

                          </div>
                          @if(session()->get('role') === 'Pegawai')
                          <!--end::Details-->
                          <div class="separator separator-solid"></div>
                          <!--begin::Items-->
                          <div class="d-flex align-items-center flex-wrap mt-8">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                              <span class="mr-4">
                                <i class="flaticon-customer display-4 text-muted font-weight-bold"></i>
                              </span>
                              <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Total Customer</span>
                                <span class="font-weight-bolder font-size-h5" id='customer-count'>0</span>
                              </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                              <span class="mr-4">
                                <i class="flaticon2-shopping-cart-1 display-4 text-muted font-weight-bold"></i>
                              </span>
                              <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Total Pesanan Tender</span>
                                <span class="font-weight-bolder font-size-h5" id='tender-count'>0</span>
                              </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                              <span class="mr-4">
                                <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
                              </span>
                              <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Total Pelanggaran</span>
                                <span class="font-weight-bolder font-size-h5" id='pelanggaran-count'>0</span>
                              </div>
                            </div>
                            <!--end::Item-->
                          </div>
                          <!--begin::Items-->
                          @endif

                      
                        </div>
                      <!--end::Card-->
                    </div>
                </div>
                  <!--end::Advance Table Widget 4-->
              </div>
            </div>

            
            @if(session()->get('role') === 'Pegawai')
              <div class="row" id="pegawai">
                  <div class="col-lg-12">
                      <!--begin::Advance Table Widget 4-->
                      <div class="card card-custom card-stretch gutter-b" id="chart_dash">
                          <!--begin::Header-->
                          <div class="card-header border-0 py-5">
                              <h3 class="card-title align-items-start flex-column">
                                  <span class="card-label font-weight-bolder text-dark">Laporan Kinerja Karyawan</span>
                                  <!-- <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span> -->
                              </h3>
                              <div class="card-toolbar">
                                  <!-- <a  onclick="select_range()" class="btn btn-info font-weight-bolder font-size-sm mr-3">New Report</a> -->
                                  <a  onclick="downloadPNG()" class="btn btn-danger font-weight-bolder font-size-sm">Print</a>
                              </div>
                          </div>
                          
                          <!-- <div class="form-group row">
                            <label class=" col-lg-3 col-sm-12">Placeholder</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                              <select class="form-control selectpicker" title="Choose one of the following..." id="date">
                                <option value="I">Triwulan I</option>
                                <option value="II">Triwulan II</option>
                                <option value="III">Triwulan III</option>
                                <option value="IV">Triwulan IV</option>
                              </select>
                            </div>
                          </div> -->
                          <!--end::Header-->
                          <!--begin::Body-->
                          <div class="card-body pt-0 pb-3">
                              <div id="chart">
                              </div>
                          </div>
                          <!--end::Body-->
                      </div>
                      <!--end::Advance Table Widget 4-->
                  </div>
              </div>
            @endif
            @if(session()->get('role') === 'HRD')
              <div class="row" id="nonpegawai">
                <div class="container">
                  <div class="card card-custom gutter-b">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                      <div class="card-title">
                        <h3 class="card-label">Data Pegawai
                        <span class="d-block text-muted pt-2 font-size-sm">Data Table Pegawai</span></h3>
                      </div>
                    </div>
                    <div class="card-body">
                      <!--begin: Datatable-->
                      <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                        <thead>
                          <tr>
                            <th>No </th>
                            <!-- <th>ID</th> -->
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Email</th>
                            <th>Jabatan</th> 
                            <th>Actions</th>
                          </tr>
                        </thead>    
                        <tbody> 
                        </tbody>
                      </table>
                      <!--end: Datatable-->
                    </div>
                  </div>
                </div>
              </div>
            @endif
            @if(session()->get('role') === 'Manager')
              <div class="row" id="nonpegawai">
              <div class="col-lg-12">
                      <!--begin::Advance Table Widget 4-->
                      <div class="card card-custom card-stretch gutter-b" id="chart_dash">
                          <!--begin::Header-->
                          <div class="card-header border-0 py-5">
                              <h3 class="card-title align-items-start flex-column">
                                  <span class="card-label font-weight-bolder text-dark">Laporan Kinerja Karyawan</span>
                                  <!-- <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span> -->
                              </h3>
                              <div class="card-toolbar">
                                  <!-- <a  onclick="select_range()" class="btn btn-info font-weight-bolder font-size-sm mr-3">New Report</a> -->
                                  <a  onclick="downloadPNG()" class="btn btn-danger font-weight-bolder font-size-sm">Print</a>
                              </div>
                          </div>
                          
                          <!-- <div class="form-group row">
                            <label class=" col-lg-3 col-sm-12">Placeholder</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                              <select class="form-control selectpicker" title="Choose one of the following..." id="date">
                                <option value="I">Triwulan I</option>
                                <option value="II">Triwulan II</option>
                                <option value="III">Triwulan III</option>
                                <option value="IV">Triwulan IV</option>
                              </select>
                            </div>
                          </div> -->
                          <!--end::Header-->
                          <!--begin::Body-->
                          <div class="card-body pt-0 pb-3">
                              <div id="chart">
                              </div>
                          </div>
                          <!--end::Body-->
                      </div>
                      <!--end::Advance Table Widget 4-->
                  </div>
              </div>
            @endif
            <!--end::Row-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('assets/js/pages/widgets.js')}}"></script>
<!--end::Page Scripts-->

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
  $(document).ready(function(){
    $.ajax({  
          url : "{{route('photoprofile')}}",
          data: {
            "_token": "{{ csrf_token() }}"
          },
          type : "post",
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
            // console.log();
            if (result.foto != null){
              // var foto = 'photoprofile' + '/' + result.foto;
              // console.log(foto);
              // $('#photo').append('<img src="'+foto+'" alt="" style="max-width: 50%; height: auto;border-radius: 50%; margin-top: 10px; margin-left: 10px; margin-bottom: 10px;">')
              // $('#photo').append('<img src="'+foto+'" alt="" style="width:200px; height: 200px;border-radius: 10%; margin-top: 10px; margin-left: 10px; margin-bottom: 10px;">')
              $('#photo').append('<img src="photoprofile/'+result.foto+'" alt="image" />')
              // $('#photo2').append('<img src="'+foto+'" alt="" style="width:200px; height: 200px;border-radius: 10%; margin-top: 10px; margin-left: 10px; margin-bottom: 10px;">')
            } else {
              $('#photo').append('<img src="assets/media/users/blank.png" alt="image" />')
              // $('#photo').append(' <img src="{{asset('assets/media/users/blank.png')}}" alt="" style="width:200px; height: 200px;border-radius: 10%; margin-top: 10px; margin-left: 10px; margin-bottom: 10px;">')
              // $('#photo2').append(' <img src="{{asset('assets/media/users/blank.png')}}" alt="" style="width:200px; height: 200px;border-radius: 10%; margin-top: 10px; margin-left: 10px; margin-bottom: 10px;">')
              // $('#photo').append(' <img src="{{asset('assets/media/users/blank.png')}}" alt="" style="max-width: 200px; height: auto; border-radius: 50%; margin-top: 10px; margin-left: 10px; margin-bottom: 10px;">')
             
            }

        }
    });

    $.ajax({  
          url : "{{route('user_session')}}",
          data: {
            "_token": "{{ csrf_token() }}"
          },
          type : "post",
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
            // console.log(result.data[0].nama_pegawai);
            $('#namacuy').text(result.data[0].nama_pegawai);
        }
    });

  });
</script>


@if(session()->get('role') === 'Pegawai')
<script type="text/javascript">
 
  let range = '';
  let chart;

  $('#date').on('change', function(){
    var selectedOption = $(this).val();
    render_chart(selectedOption)
  });


  $(document).ready(function(){
    var quarterRoman = ["","I","II","III","IV"][Math.floor((new Date().getMonth())/3)+1];
    var querter = new Date().getFullYear();
    render_chart(querter);
  });


  function render_chart(update) {
    // console.log(update);
    $.ajax({  
          url : "{{route('chart')}}",
          data: {
            "_token": "{{ csrf_token() }}",
            param_range:update
          },
          type : "post",
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
            let title ='Bagan Laporan Kinerja Karyawan Periode Triwulan - ' + update;
            var options = {
                // series:result.success,
                series: [
                  result.nilai1,
                  result.nilai2, 
                  result.nilai3],
                legend: {
                  position: 'top',
                  horizontalAlign: 'center',
                  fontSize: '16px',
                  fontFamily: 'Helvetica, Arial, sans-serif'
                },
                chart: {
                  type: 'bar',
                  height: 350,
                  toolbar: {
                          show: false
                      }
                },
                plotOptions: {
                    bar: {
                      dataLabels: {
                      position: 'top',
                      minItemHeight: 100
                      }
                    },
                },
                dataLabels: {
                      enabled: true,
                      formatter: function (val) {
                      return val;
                      },
                      offsetY: -20,
                      style: {
                      fontSize: '12px',
                      colors: ["#2B2B2B"]
                      }
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                  categories: ['Periode 1', 'Periode 2', 'Periode 3','Periode 4'],
                  labels: {
                    style: {
                      fontSize: '14px', 
                      fontFamily: 'Helvetica, Arial, sans-serif'
                    }
                  }
                },
                yaxis: {
                  title: {
                    text: 'Nilai'
                  }
                },
                fill: {
                  opacity: 1
                },
                title: {
                    text: title,
                    align: 'center'

                },
                noData: {
                    text: 'Loading...'
                },
                tooltip: {
                  y: {
                    formatter: function (val) {
                      return val + " Poin"
                    }
                  }
                }
            };
            if (chart) {
              chart.updateOptions(options);
            } else {
              // Jika objek chart belum ada, buat objek chart baru
              chart = new ApexCharts(document.querySelector("#chart"), options);
              chart.render();
            }
            if(result.nilaiRekomen > 5.4){
              $('#rekomen').addClass('bg-light-success');
              $('#rekomen').append('<span class="svg-icon svg-icon-success mr-5">'+
                                    '<span class="svg-icon svg-icon-lg">'+
                                      '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">'+
                                        '<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">'+
                                            '<rect x="0" y="0" width="24" height="24"/>'+
                                            '<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>'+
                                            '<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero"/>'+
                                        '</g>'+
                                      '</svg>'+
                                    '</span>'+
                                  '</span>'+
                                  '<div class="d-flex flex-column flex-grow-1 mr-2">'+
                                    '<a class="font-weight-bold text-dark-75 font-size-lg mb-1">Nilai Anda : '+result.nilaiRekomen+'</a>'+
                                    '<span class="text-muted font-weight-bold">Selamat!!</span>'+
                                    '<span class="text-muted font-weight-bold">Nilai Anda Memenuhi Persyaratan Pegawai Tetap</span>'+
                                  '</div>');
            } else {
              $('#rekomen').addClass('bg-light-warning');
              $('#rekomen').append('<span class="svg-icon svg-icon-warning mr-5">'+
                                    '<span class="svg-icon svg-icon-lg">'+
                                      '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">'+
                                        '<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">'+
                                           '<rect x="0" y="0" width="24" height="24"/>'+
                                            '<path d="M11.1669899,4.49941818 L2.82535718,19.5143571 C2.557144,19.9971408 2.7310878,20.6059441 3.21387153,20.8741573 C3.36242953,20.9566895 3.52957021,21 3.69951446,21 L21.2169432,21 C21.7692279,21 22.2169432,20.5522847 22.2169432,20 C22.2169432,19.8159952 22.1661743,19.6355579 22.070225,19.47855 L12.894429,4.4636111 C12.6064401,3.99235656 11.9909517,3.84379039 11.5196972,4.13177928 C11.3723594,4.22181902 11.2508468,4.34847583 11.1669899,4.49941818 Z" fill="#000000" opacity="0.3"/>'+
                                            '<rect fill="#000000" x="11" y="9" width="2" height="7" rx="1"/>'+
                                            '<rect fill="#000000" x="11" y="17" width="2" height="2" rx="1"/>'+
                                        '</g>'+
                                      '</svg>'+
                                    '</span>'+
                                 ' </span>'+
                                  '<div class="d-flex flex-column flex-grow-1 mr-2" >'+
                                   '<a class="font-weight-bold text-dark-75 font-size-lg mb-1">Nilai Anda : '+result.nilaiRekomen+'</a>'+
                                    '<span class="text-muted font-weight-bold">Belum Memenuhi Persyaratan Pegawai Tetap</span>'+
                                  '</div>');
            }
            $('#customer-count').text(result.jmlhcustomer);
            $('#tender-count').text(result.jmlhpesanan);
            $('#pelanggaran-count').text(result.jmlhpelanggaran);
            
            
            // $('#rekomen').append('HALO');

          }
    });
  }


  function downloadPNG() {
      chart.dataURI().then(({ imgURI }) => {
          var link = document.createElement('a');
          link.href = imgURI;
          link.download = 'chart.png';
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
      });
  }

  function printChart() {
      var printContents = document.getElementById('chart_dash').innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }

        

</script>
@endif
@if(session()->get('role') === 'HRD')
  <script type="text/javascript">

    $(document).ready(function(){
      refreshTable();
    });

    function refreshTable(){
      $('#kt_datatable1').DataTable({
        "bDestroy": true,
          "responsive":true,
          // "orderCellsTop": true,
          "fixedHeader": true,
          scrollCollapse: true,
        autoWidth: false,
        responsive: true,
          // ajax: "{{url('/pegawai/data_json')}}",
        ajax: {
          url: "{{url('/pegawai/data_json')}}",
          error: function(xhr, errorType, thrownError) {
            $('.dataTables_empty').text("No data available in table");
            console.error("Kesalahan AJAX:", thrownError);
            Swal.fire(
                'Error!',
                thrownError,
                'error'
              )
          }
        },
          columns: [
            {
              "data" :null,
              "render": function (data, type, row, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1;
                  }  
            },
              { data: 'nama_pegawai', name: 'nama' },
          { data: 'alamat',name: 'alamat' },
          { data: 'nomor_telepon',name: 'no_telf' },
          { data: 'email',name: 'email' },
          { data: 'jabatan',name: 'jabatan' },
              // { data: 'pelanggaran', name: 'pelanggaran' },
              { 
                // btn ripple- btn-round btn-3d btn-success
                  "data": "idpegawai",
                  "orderable": false,
                  "render": function ( data, type, row ) {
                    return "<div style='white-space: nowrap;'><a class='btn btn-icon btn-light-success btn-xs mr-2' href='{{asset('/pegawai/view_form')}}?id="+data+"&view=1' id ="+data+">"+
                    "<i class=' fas fa-eye'></i></a>"
                    }
              }
          ]
        });
    };




  </script>
@endif

@if(session()->get('role') === 'Manager')
<script type="text/javascript">
 
  let range = '';
  let chart;

  $('#date').on('change', function(){
    var selectedOption = $(this).val();
    render_chart(selectedOption)
  });


  $(document).ready(function(){
    var quarterRoman = ["","I","II","III","IV"][Math.floor((new Date().getMonth())/3)+1];
    var querter = new Date().getFullYear();
    render_chart(querter);
  });


  function render_chart(update) {
    console.log(update);
    $.ajax({  
          url : "{{route('chart_manager')}}",
          data: {
            "_token": "{{ csrf_token() }}",
            param_range:update
          },
          type : "post",
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
            let title ='Bagan Laporan Kinerja Karyawan Periode Triwulan - ' + update;
            var options = {
                // series:result.success,
                series: [
                  result.nilai1,
                  result.nilai2, 
                  result.nilai3],
                legend: {
                  position: 'top',
                  horizontalAlign: 'center',
                  fontSize: '16px',
                  fontFamily: 'Helvetica, Arial, sans-serif'
                },
                chart: {
                  type: 'bar',
                  height: 350,
                  toolbar: {
                          show: false
                      }
                },
                plotOptions: {
                    bar: {
                      dataLabels: {
                      position: 'top',
                      minItemHeight: 100
                      }
                    },
                },
                dataLabels: {
                      enabled: true,
                      formatter: function (val) {
                      return val;
                      },
                      offsetY: -20,
                      style: {
                      fontSize: '12px',
                      colors: ["#2B2B2B"]
                      }
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                  categories: ['Periode 1', 'Periode 2', 'Periode 3','Periode 4'],
                  labels: {
                    style: {
                      fontSize: '14px', 
                      fontFamily: 'Helvetica, Arial, sans-serif'
                    }
                  }
                },
                yaxis: {
                  title: {
                    text: 'Nilai'
                  }
                },
                fill: {
                  opacity: 1
                },
                title: {
                    text: title,
                    align: 'center'

                },
                noData: {
                    text: 'Loading...'
                },
                tooltip: {
                  y: {
                    formatter: function (val) {
                      return val + " Poin"
                    }
                  }
                }
            };
            if (chart) {
              chart.updateOptions(options);
            } else {
              // Jika objek chart belum ada, buat objek chart baru
              chart = new ApexCharts(document.querySelector("#chart"), options);
              chart.render();
            }
          }
    });
  }


  function downloadPNG() {
      chart.dataURI().then(({ imgURI }) => {
          var link = document.createElement('a');
          link.href = imgURI;
          link.download = 'chart.png';
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
      });
  }

  function printChart() {
      var printContents = document.getElementById('chart_dash').innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }

        

</script>
@endif
@endsection

