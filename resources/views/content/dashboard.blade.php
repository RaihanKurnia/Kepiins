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
                        <div class="row align-items-center">
                            <div class="col-md-4">
                            <img src="{{asset('assets/media/banner-img.png')}}" alt="" style="max-width: 100%; height: auto;">
                            </div>
                            <div class="col-md-8">
                                <marquee  width="200" style="margin-bottom: -5px; " class="font-20 weight-600 text-capitalize">
                                    Welcome back 
                                </marquee>
                                <h1 class="weight-600 font-30" style="color: #1c9aaf;">{{Session::get('nama')}}</h1>
                                <p class="font-18 max-width-600"><b>Kepiins</b> Key Performance Index Information System</p>
                            </div>
                        </div>

                        <!--end::Header-->
                        <!--begin::Body-->
                       
                        <!--end::Body-->
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
    console.log(update);
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

