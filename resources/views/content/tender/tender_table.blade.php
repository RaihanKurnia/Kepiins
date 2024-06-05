@extends('home')

@section('content')

@if(session()->get('role') === 'Pegawai')
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
				<!--begin::Notice-->
				<!-- <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
					<div class="alert-icon align-self-start mt-1">
						<i class="flaticon-warning text-primary"></i>
					</div>
					<div class="alert-text">This example shows a vertically scrolling DataTable that makes use of the CSS3 vh unit in order to dynamically resize the viewport based on the browser window height.</div>
				</div> -->
				<!--end::Notice-->
				<!--begin::Card-->
				<div class="card card-custom gutter-b">
					<div class="card-header flex-wrap border-0 pt-6 pb-0">
						<div class="card-title">
							<h3 class="card-label">Master Data Table Tender
							<span class="d-block text-muted pt-2 font-size-sm">Data Table Tender</span></h3>
						</div>
						<div class="card-toolbar">
							<!--begin::Dropdown-->
						
							<!--end::Dropdown-->
							<!--begin::Button-->
							<a href="{{asset('/tender/view_form')}}" class="btn btn-primary font-weight-bolder">
							<span class="svg-icon svg-icon-md">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<circle fill="#000000" cx="9" cy="15" r="6" />
										<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>New Record</a>
							<!--end::Button-->

							
						</div>
					</div>
					<div class="card-body">

						<!-- <form class="kt-form kt-form--fit mb-15"> -->
						<div class="mb-10">
							<div class="row mb-8">
								<div class="col-lg-3 mb-lg-0 mb-6">
									<label><b>Nama Customer:</b></label>
									<select class="form-control datatable-input" data-col-index="6" id='customer'>
										<option value="all" selected>All </option>
									</select>
								</div>
								<div class="col-lg-3 mb-lg-0 mb-6">
									<label><b>Jenis Barang:</b></label>
									<select class="form-control datatable-input" data-col-index="6" id='barang'>
										<option value="all" selected>All </option>
									</select>
								</div>
								<div class="col-lg-3 mb-lg-0 mb-6">
									<label><b>Status:</b></label>
									<select class="form-control datatable-input" data-col-index="7" id='status'>
										<option value="all">All</option>
										<option value="0">Pending</option>
										<option value="1">Approved</option>
										<option value="2">Rejected</option>
									</select>
								</div>
							</div>
						</div>
						<!-- </form> -->

						<!--begin: Datatable-->
						<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
							<thead>
								<tr>
									<th>No </th>
									<th>Nama Pegawai</th>
									<th >Nama Customer</th>
									<th>Email</th>
									<th>No Telepon</th>
									<th>Alamat Pengiriman</th>
									<th>Nama Barang</th>
									<th>Jumlah Order (TON)</th>
									<th>Tgl Pemesanan</th>
									<th>Tgl Pengiriman</th>
									<th>Status Tender</th>
									<th>Actions</th>
								</tr>
							</thead>    
							<tbody> 
								<!-- <tr>
									<td>1</td>
									<td>Sheryl Giddings</td>
									<td>
										<span class="label  label-xl label-inline label-light-primary">
											Female
										</span>
									</td>
									<td>23</td>
									<td>Jl Pancawarna 5.4/11</td>
									<td>0812348178314</td>
									<td>Sheryl@gmail.com</td>
									<td>Ketua Umum</td>
									<td>Berat</td>
									<td nowrap="nowrap"></td>
								</tr>
								<tr>
									<td>2</td>
									<td>Hadi Iwyanto</td>
									<td>
										<span class=" label  label-xl label-inline label-light-success">
											Male
										</span>
									</td>
									<td>23</td>
									<td>Jl Pancawarna 5.4/11</td>
									<td>0812348178314</td>
									<td>Sheryl@gmail.com</td>
									<td>Ketua Umum</td>
									<td>Berat</td>
									<td nowrap="nowrap"></td>
								</tr> -->
							</tbody>
						</table>
						<!--end: Datatable-->
					</div>
				</div>
				<!--end::Card-->

				<!--Begin::Row-->
				<div class="row">
					<div class="col-xl-4">
						<!--begin::Stats Widget 22-->
						<div class="card card-custom bgi-no-repeat  card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{asset('assets/media/svg/shapes/abstract-3.svg')}})">
							<!--begin::Body-->
							<div class="card-body my-4">
								<a href="#" class="card-title font-weight-bolder text-info font-size-h6 mb-4 text-hover-state-dark d-block">Total Jumlah Pesanan</a>
								<div class="font-weight-bold text-muted font-size-sm">
								<span class="text-dark-75 font-weight-bolder font-size-h1 mr-2" id="totalord">0</span>Ton</div>
								<!-- <div class="progress progress-xs mt-7 bg-info-o-60">
									<div class="progress-bar bg-info" role="progressbar" style="width: 67%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div> -->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Stats Widget 22-->
					</div>
					<div class="col-xl-4">
						<!--begin::Stats Widget 23-->
						<div class="card card-custom bg-success card-stretch gutter-b">
							<!--begin::Body-->
							<div class="card-body my-4">
								<a href="#" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Total Jumlah Pesanan Approved</a>
								<div class="font-weight-bold text-white font-size-sm">
								<span class="font-size-h1 mr-2 font-weight-bolder" id="totalordacc">0</span>Ton</div>
								<!-- <div class="progress progress-xs mt-7 bg-white-o-90">
									<div class="progress-bar bg-white" role="progressbar" style="width: 87%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div> -->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Stats Widget 23-->
					</div>
					<div class="col-xl-4">
						<!--begin::Stats Widget 24-->
						<div class="card card-custom bgi-no-repeat bg-warning card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{asset('assets/media/svg/shapes/abstract-3.svg')}})">
							<!--begin::Body-->
							<div class="card-body my-4">
								<a href="#" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Penilaian II</a>
								<div class="font-weight-bold text-white font-size-sm">
								<span class="font-size-h1 mr-2 font-weight-bolder" id="poin">0</span>Poin</div>
								<!-- <div class="progress progress-xs mt-7 bg-white-o-90">
									<div class="progress-bar bg-white" role="progressbar" style="width: 52%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div> -->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Stats: Widget 24-->
					</div>
				</div>
				<!--End::Row-->
				
				<!--end::Card-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->

	<!--begin::Page Scripts(used by this page)-->

	<!--end::Page Scripts-->

	<script type="text/javascript">

	$(document).ready(function(){
		refreshTable();
		search_data();

	});
	
	$('#customer, #barang, #status').change(function() {
		search();
	});

	function search_data() {
		$.ajax({  
			url : "{{route('tender_list')}}",
			type: 'get',
			async : false,
			error: function(xhr, errorType, thrownError) {
				// console.error("Kesalahan AJAX:", thrownError);
				Swal.fire(
						'Error!',
						thrownError,
						'error'
					)
			},
			success : function(result) {
				// console.log(result);
				var customer = '';
				var barang = '';
				for(var i = 0; i < result.data.length; i++){
					// console.log(response.data[i].id,response.data[i].nama);
					customer += '<option value="'+result.data[i].idcustomer+'"> '+result.data[i].nama_customer+'</option>';
				}
				for(var i = 0; i < result.barang.length; i++){
					// console.log(response.data[i].id,response.data[i].nama);
					barang += '<option value="'+result.barang[i].idbarang+'"> '+result.barang[i].nama_barang+'</option>';
				}
				$('#customer').append(customer);
				$('#barang').append(barang);
			}
		});
	}

	function search() {
		var custname = $('#customer').val();
		var barang = $('#barang').val();
		var status = $('#status').val();
		// searchTable(custname,barang,status)

		if (custname == 'all' && barang== 'all' && status == 'all'){
			refreshTable();
		} else {
			searchTable(custname,barang,status)
		}
	}


	function searchTable(custname,barang,status) {
		// console.log('masuk sini');
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
				url : "{{route('tender_serach_data')}}",
				type: 'POST',
				data: {
					"_token": "{{csrf_token()}}",
					param_custname:custname == "all" ? "" : custname,
					param_barang:barang == "all" ? "" : barang,
					param_status:status == "all" ? "" : status
				},
				error: function(xhr, errorType, thrownError) {
					$('.dataTables_empty').text("No data available in table");
					Swal.fire(
						'Error!',
						thrownError,
						'error'
					)
				},
			},
			columns: [
				{
					"data" :null,
					"render": function (data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}  
				},
				{ data: 'nama_pegawai', name: 'nama_pegawai' },
				{ data: 'nama_customer',name: 'nama_customer' },
				{ data: 'email',name: 'email' },
				{ data: 'nomor_telefon',name: 'nomor_telefon' },
				{ data: 'pengiriman_idpengiriman',name: 'pengiriman_idpengiriman' },
				{ data: 'nama_barang',name: 'nama_barang' },
				{ data: 'jumlah_order',name: 'jumlah_order' },
				{ data: 'tanggal_pemesanan',name: 'tanggal_pemesanan' },
				{ data: 'tanggal_pengiriman',name: 'tanggal_pengiriman' },
				{
					data: 'status_app_pesanan',
					name: 'status_app_pesanan',
					render: function (data, type, row) {
						if (data === '0') {
							return  "<span class='label label-xl label-inline label-light-warning'>Pending</span>";
						} else if (data === '1') {
							return "<span class='label label-xl label-inline label-light-success'>Approved</span>";
						} else {
							return "<span class='label label-xl label-inline label-light-danger'>Rejected</span>";
						}
					}
				},
				{ 
				// btn ripple- btn-round btn-3d btn-success
					"data": "id_pesanan",
					"orderable": false,
					"render": function ( data, type, row ) {
					if (row.status_app_pesanan === '0') {
							return "<div style='white-space: nowrap;'>" +
										"<a class='btn btn-icon btn-light-success btn-xs mr-2' href='{{asset('/tender/view_form')}}?id="+data+"&view=1' id ="+data+">"+
										"<i class=' fas fa-eye'></i></a>"+"<a class='btn btn-icon btn-light-warning btn-xs mr-2'   href='{{asset('/tender/view_form')}}?id="+data+"' id ="+data+">"+
										"<i class=' fas fa-pencil-alt'></i></a>"+"<a class='btn btn-icon btn-light-danger btn-xs mr-2' href='#' onclick=\"remove('"+data+"')\" >"+
										"<i class=' fas fa-trash'></i></a>"+
									"</div>";
						} else {
							return "<div style='white-space: nowrap; text-align: center;' >" +
										"<a class='btn btn-icon btn-light-primary btn-xs mr-2' href='{{asset('/tender/view_form')}}?id="+data+"&view=1' id="+data+"><i class='fas fa-eye'></i></a>" +
									"</div>";
						}
					
					
					
					}
				}
			]
		});


		
	}

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
				url: "{{route('tender_json')}}",
				error: function(xhr, errorType, thrownError) {
					$('.dataTables_empty').text("No data available in table");
					Swal.fire(
						'Error!',
						thrownError,
						'error'
					)
				},
				success : function(result){
					$('#totalord').text(result.totalorder);
					$('#totalordacc').text(result.totalorderacc);
					$('#poin').text(result.poin);
					$('#kt_datatable1').DataTable().rows.add(result.data).draw();
				},
			},
			columns: [
				{
					"data" :null,
					"render": function (data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}  
				},
				{ data: 'nama_pegawai', name: 'nama_pegawai' },
				{ data: 'nama_customer',name: 'nama_customer' },
				{ data: 'email',name: 'email' },
				{ data: 'nomor_telefon',name: 'nomor_telefon' },
				{ data: 'pengiriman_idpengiriman',name: 'pengiriman_idpengiriman' },
				{ data: 'nama_barang',name: 'nama_barang' },
				{ data: 'jumlah_order',name: 'jumlah_order' },
				{ data: 'tanggal_pemesanan',name: 'tanggal_pemesanan' },
				{ data: 'tanggal_pengiriman',name: 'tanggal_pengiriman' },
				{
					data: 'status_app_pesanan',
					name: 'status_app_pesanan',
					render: function (data, type, row) {
						if (data === '0') {
							return  "<span class='label label-xl label-inline label-light-warning'>Pending</span>";
						} else if (data === '1') {
							return "<span class='label label-xl label-inline label-light-success'>Approved</span>";
						} else {
							return "<span class='label label-xl label-inline label-light-danger'>Rejected</span>";
						}
					}
				},
				{ 
				// btn ripple- btn-round btn-3d btn-success
					"data": "id_pesanan",
					"orderable": false,
					"render": function ( data, type, row ) {
					if (row.status_app_pesanan === '0') {
							return "<div style='white-space: nowrap;'>" +
										"<a class='btn btn-icon btn-light-success btn-xs mr-2' href='{{asset('/tender/view_form')}}?id="+data+"&view=1' id ="+data+">"+
										"<i class=' fas fa-eye'></i></a>"+"<a class='btn btn-icon btn-light-warning btn-xs mr-2'   href='{{asset('/tender/view_form')}}?id="+data+"' id ="+data+">"+
										"<i class=' fas fa-pencil-alt'></i></a>"+"<a class='btn btn-icon btn-light-danger btn-xs mr-2' href='#' onclick=\"remove('"+data+"')\" >"+
										"<i class=' fas fa-trash'></i></a>"+
									"</div>";
						} else {
							return "<div style='white-space: nowrap; text-align: center;' >" +
										"<a class='btn btn-icon btn-light-primary btn-xs mr-2' href='{{asset('/tender/view_form')}}?id="+data+"&view=1' id="+data+"><i class='fas fa-eye'></i></a>" +
									"</div>";
						}
					
					
					
					}
				}
			]
		});
	};



	function remove(id) {

		swal.fire({
			title: 'Apakah Anda Yakin?',
			text: "Data akan dihapus permanen!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Hapus Data!'
		}).then(function(result) {
			if (result.value) {
				$.ajax({  
					url : "{{url('/pesanan/data_remove')}}",
					type: 'POST',
					data: {
					"_token": "{{ csrf_token() }}",
					param_id:id,
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
						Swal.fire(
							'Terhapus!',
							'Data Telah Dihapus.',
							'success'
						).then((result) => {
							if (result.value || result.isDismissed) {
								refreshTable(); 
							}
						});
					}
				});
			}
		});
	}


	</script>
@endif
@if(session()->get('role') !== 'Pegawai')
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
						<h5 class="text-dark font-weight-bold my-2 mr-5">Penilaian Data Tender</h5>
						<!--end::Page Title-->
						<!--begin::Breadcrumb-->
						<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
							<li class="breadcrumb-item">
								<a href="" class="text-muted">Hasil Penilaian</a>
							</li>
							<li class="breadcrumb-item">
								<a href="" class="text-muted">Penilaian Data Tender</a>
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
				<!--begin::Notice-->
				<!-- <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
					<div class="alert-icon align-self-start mt-1">
						<i class="flaticon-warning text-primary"></i>
					</div>
					<div class="alert-text">This example shows a vertically scrolling DataTable that makes use of the CSS3 vh unit in order to dynamically resize the viewport based on the browser window height.</div>
				</div> -->
				<!--end::Notice-->
				<!--begin::Card-->
				<div class="card card-custom gutter-b">
					<div class="card-header flex-wrap border-0 pt-6 pb-0">
						<div class="card-title">
							<h3 class="card-label">Table Penilaian Data Tender
							<span class="d-block text-muted pt-2 font-size-sm">Data Table Penilaian Tender</span></h3>
						</div>
					</div>
					<div class="card-body">

						<!-- <form class="kt-form kt-form--fit mb-15"> -->
						<div class="mb-10">
							<div class="row mb-8">
								<div class="col-lg-3 mb-lg-0 mb-6">
									<label><b>Nama Pegawai:</b></label>
									<select class="form-control datatable-input" data-col-index="6" id='pegawai'>
										<option value="all" selected>All </option>
									</select>
								</div>
								<div class="col-lg-3 mb-lg-0 mb-6">
									<label><b>Jenis Barang:</b></label>
									<select class="form-control datatable-input" data-col-index="6" id='barang'>
										<option value="all" selected>All </option>
									</select>
								</div>
								<div class="col-lg-3 mb-lg-0 mb-6">
									<label><b>Status:</b></label>
									<select class="form-control datatable-input" data-col-index="7" id='status'>
										<option value="all">All</option>
										<option value="0">Pending</option>
										<option value="1">Approved</option>
										<option value="2">Rejected</option>
									</select>
								</div>
							</div>
						</div>
						<!-- </form> -->

						<!--begin: Datatable-->
						<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
							<thead>
								<tr>
									<th>No </th>
									<th>Nama Pegawai</th>
									<th >Nama Customer</th>
									<th>Email</th>
									<th>No Telepon</th>
									<th>Alamat Pengiriman</th>
									<th>Nama Barang</th>
									<th>Jumlah Order (TON)</th>
									<th>Tgl Pemesanan</th>
									<th>Tgl Pengiriman</th>
									<th>Status Tender</th>
									<th>Actions</th>
								</tr>
							</thead>    
							<tbody> 
							</tbody>
						</table>
						<!--end: Datatable-->
					</div>
				</div>
				<!--end::Card-->

				<!--Begin::Row-->
				<div class="row">
					<div class="col-xl-4">
						<!--begin::Stats Widget 22-->
						<div class="card card-custom bgi-no-repeat  card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{asset('assets/media/svg/shapes/abstract-3.svg')}})">
							<!--begin::Body-->
							<div class="card-body my-4">
								<a href="#" class="card-title font-weight-bolder text-info font-size-h6 mb-4 text-hover-state-dark d-block">Total Jumlah Pesanan</a>
								<div class="font-weight-bold text-muted font-size-sm">
								<span class="text-dark-75 font-weight-bolder font-size-h1 mr-2" id="totalord">0</span>Ton</div>
								<!-- <div class="progress progress-xs mt-7 bg-info-o-60">
									<div class="progress-bar bg-info" role="progressbar" style="width: 67%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div> -->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Stats Widget 22-->
					</div>
					<div class="col-xl-4">
						<!--begin::Stats Widget 23-->
						<div class="card card-custom bg-success card-stretch gutter-b">
							<!--begin::Body-->
							<div class="card-body my-4">
								<a href="#" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Total Jumlah Pesanan Approved</a>
								<div class="font-weight-bold text-white font-size-sm">
								<span class="font-size-h1 mr-2 font-weight-bolder" id="totalordacc">0</span>Ton</div>
								<!-- <div class="progress progress-xs mt-7 bg-white-o-90">
									<div class="progress-bar bg-white" role="progressbar" style="width: 87%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div> -->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Stats Widget 23-->
					</div>
					<div class="col-xl-4">
						<!--begin::Stats Widget 24-->
						<div class="card card-custom bgi-no-repeat bg-warning card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{asset('assets/media/svg/shapes/abstract-3.svg')}})">
							<!--begin::Body-->
							<div class="card-body my-4">
								<a href="#" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Penilaian II</a>
								<div class="font-weight-bold text-white font-size-sm">
								<span class="font-size-h1 mr-2 font-weight-bolder" id="poin">0</span>Poin</div>
								<!-- <div class="progress progress-xs mt-7 bg-white-o-90">
									<div class="progress-bar bg-white" role="progressbar" style="width: 52%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div> -->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Stats: Widget 24-->
					</div>
				</div>
				<!--End::Row-->
				
				<!--end::Card-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->

	<!--begin::Page Scripts(used by this page)-->

	<!--end::Page Scripts-->

	<script type="text/javascript">

	$(document).ready(function(){
		refreshTable();
		search_data();

	});
	
	$('#pegawai, #barang, #status').change(function() {
		search();
	});

	function search_data() {
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
					// console.log(result.data);	
					var pegawai = '';
					var barang = '';

					for(var i = 0; i < result.pegawai.length; i++){
						// console.log(response.data[i].id,response.data[i].nama);
						pegawai += '<option value="'+result.pegawai[i].idpegawai+'"> '+result.pegawai[i].nama_pegawai+'</option>';
					}
					for(var i = 0; i < result.barang.length; i++){
						// console.log(response.data[i].id,response.data[i].nama);
						barang += '<option value="'+result.barang[i].idbarang+'"> '+result.barang[i].nama_barang+'</option>';
					}
					$('#pegawai').append(pegawai);
					$('#barang').append(barang);
					
				}
		});
	}

	function search() {
		var custname = $('#pegawai').val();
		var barang = $('#barang').val();
		var status = $('#status').val();
		console.log({status});
		// searchTable(custname,barang,status)

		if (custname == 'all' && barang== 'all' && status == 'all'){
			refreshTable();
		} else {
			searchTable(custname,barang,status)
		}
	}


	function searchTable(custname,barang,status) {
		// console.log('masuk sini');
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
				url : "{{route('tender_avg_search')}}",
				type: 'POST',
				data: {
					"_token": "{{csrf_token()}}",
					param_custname:custname == "all" ? "" : custname,
					param_barang:barang == "all" ? "" : barang,
					param_status:status == "all" ? "" : status
				},
				error: function(xhr, errorType, thrownError) {
					$('.dataTables_empty').text("No data available in table");
					Swal.fire(
						'Error!',
						thrownError,
						'error'
					)
				},
				success : function(result){
					$('#totalord').text(result.totalorder);
					$('#totalordacc').text(result.totalorderacc);
					$('#poin').text(result.poin);
					$('#kt_datatable1').DataTable().rows.add(result.data).draw();
				},
			},
			columns: [
				{
					"data" :null,
					"render": function (data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}  
				},
				{ data: 'nama_pegawai', name: 'nama_pegawai' },
				{ data: 'nama_customer',name: 'nama_customer' },
				{ data: 'email',name: 'email' },
				{ data: 'nomor_telefon',name: 'nomor_telefon' },
				{ data: 'pengiriman_idpengiriman',name: 'pengiriman_idpengiriman' },
				{ data: 'nama_barang',name: 'nama_barang' },
				{ data: 'jumlah_order',name: 'jumlah_order' },
				{ data: 'tanggal_pemesanan',name: 'tanggal_pemesanan' },
				{ data: 'tanggal_pengiriman',name: 'tanggal_pengiriman' },
				{
					data: 'status_app_pesanan',
					name: 'status_app_pesanan',
					render: function (data, type, row) {
						if (data === '0') {
							return  "<span class='label label-xl label-inline label-light-warning'>Pending</span>";
						} else if (data === '1') {
							return "<span class='label label-xl label-inline label-light-success'>Approved</span>";
						} else {
							return "<span class='label label-xl label-inline label-light-danger'>Rejected</span>";
						}
					}
				},
				{ 
				// btn ripple- btn-round btn-3d btn-success
					"data": "id_pesanan",
					"orderable": false,
					"render": function ( data, type, row ) {
					return "<div style='white-space: nowrap; text-align: center;' >" +
								"<a class='btn btn-icon btn-light-primary btn-xs mr-2' href='{{asset('/tender/view_form')}}?id="+data+"&view=1' id="+data+"><i class='fas fa-eye'></i></a>" +
							"</div>";
						
					
					
					
					}
				}
			]
		});


		
	}

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
				url: "{{route('tender_avg')}}",
				type: 'POST',
				data: {
					"_token": "{{csrf_token()}}",
					param_custname:'',
					param_barang:'',
					param_status:''
				},
				error: function(xhr, errorType, thrownError) {
					$('.dataTables_empty').text("No data available in table");
					Swal.fire(
						'Error!',
						thrownError,
						'error'
					)
				},
				success : function(result){
					$('#totalord').text(result.totalorder);
					$('#totalordacc').text(result.totalorderacc);
					$('#poin').text(result.poin);
					$('#kt_datatable1').DataTable().rows.add(result.data).draw();
				},
			},
			columns: [
				{
					"data" :null,
					"render": function (data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}  
				},
				{ data: 'nama_pegawai', name: 'nama_pegawai' },
				{ data: 'nama_customer',name: 'nama_customer' },
				{ data: 'email',name: 'email' },
				{ data: 'nomor_telefon',name: 'nomor_telefon' },
				{ data: 'pengiriman_idpengiriman',name: 'pengiriman_idpengiriman' },
				{ data: 'nama_barang',name: 'nama_barang' },
				{ data: 'jumlah_order',name: 'jumlah_order' },
				{ data: 'tanggal_pemesanan',name: 'tanggal_pemesanan' },
				{ data: 'tanggal_pengiriman',name: 'tanggal_pengiriman' },
				{
					data: 'status_app_pesanan',
					name: 'status_app_pesanan',
					render: function (data, type, row) {
						if (data === '0') {
							return  "<span class='label label-xl label-inline label-light-warning'>Pending</span>";
						} else if (data === '1') {
							return "<span class='label label-xl label-inline label-light-success'>Approved</span>";
						} else {
							return "<span class='label label-xl label-inline label-light-danger'>Rejected</span>";
						}
					}
				},
				{ 
				// btn ripple- btn-round btn-3d btn-success
					"data": "id_pesanan",
					"orderable": false,
					"render": function ( data, type, row ) {
					return "<div style='white-space: nowrap; text-align: center;' >" +
								"<a class='btn btn-icon btn-light-primary btn-xs mr-2' href='{{asset('/tender/view_form')}}?id="+data+"&view=1' id="+data+"><i class='fas fa-eye'></i></a>" +
							"</div>";
						
					
					
					
					}
				}
			]
		});
	};


	</script>
@endif		
@endsection