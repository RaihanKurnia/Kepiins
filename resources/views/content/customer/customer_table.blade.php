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

				<!--begin::table-->
				<div class="card card-custom gutter-b">
					<div class="card-header flex-wrap border-0 pt-6 pb-0">
						<div class="card-title">
							<h3 class="card-label">Master Data Table Customer
							<span class="d-block text-muted pt-2 font-size-sm">Data Table Customer</span></h3>
						</div>
						<div class="card-toolbar">
							<!-- begin::Dropdown-->
						
							<!--end::Dropdown -->
							<!--begin::Button-->
							<a href="{{asset('/customer/view_form')}}" class="btn btn-primary font-weight-bolder"  id="button_add">
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
						<div class="mb-7">
							<div class="row align-items-center">
								<div class="col-lg-9 col-xl-8">
									<div class="row ">
										<div class="col-md-3 my-2 my-md-0">
											<div class="input-icon">
												<input type="text" class="form-control" placeholder="Cari Nama Customer" id="kt_datatable_search_query" />
												<span>
													<i class="flaticon2-search-1 text-muted"></i>
												</span>
											</div>
										</div>
										<div class="col-md-3 my-2 my-md-0">
											<div class="d-flex align-items-center">
												<label class="mr-3 mb-0 d-none d-md-block">Status:</label>
												<select class="form-control" id="kt_datatable_search_status">
													<option value="all">All</option>
													<option value="0">Pending</option>
													<option value="1">Approved</option>
													<option value="2">Rejected</option>
												</select>
											</div>
										</div>
										<div class="col-md-3 my-2 my-md-0">
											<div class="d-flex align-items-center">
												<label class="mr-3 mb-0 d-none d-md-block">Periode:</label>
												<select class="form-control datatable-input" data-col-index="7" id='periode'>
													<option value="1">Periode 1</option>
													<option value="2">Periode 2</option>
													<option value="3">Periode 3</option>
													<option value="4">Periode 4</option>
												</select>
											</div>
										</div>
										
										<div class="col-md-3 my-2 my-md-0">
										<a href="#" onclick="cari()" class="btn btn-light-success px-6 font-weight-bold">Search</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!--begin: Datatable-->
						<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
							<thead>
								<tr>
									<th>No </th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>No Telp</th>
									<th>Email</th>
									<th>Tanggal Input</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>    
							<tbody> 
								<!-- <tr>
									<td></td>
								</tr> -->
							</tbody>
						</table>
						<!--end: Datatable-->
					</div>

				</div>
				<!--begin::table-->

			
				<!--Begin::Row-->
				<div class="row">
					<div class="col-xl-4">
						<!--begin::Stats Widget 22-->
						<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-3.svg)">
							<!--begin::Body-->
							<div class="card-body my-4">
								<a href="#" class="card-title font-weight-bolder text-info font-size-h6 mb-4 text-hover-state-dark d-block">Total Jumlah Customer</a>
								<div class="font-weight-bold text-muted font-size-sm">
								<span class="text-dark-75 font-weight-bolder font-size-h1 mr-2" id="customer-count">0</span>Customer</div>
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
								<a href="#" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Total Jumlah Customer Approved</a>
								<div class="font-weight-bold text-white font-size-sm">
								<span class="font-size-h1 mr-2" id="totalcustacc">0</span>Customer</div>
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
						<div class="card card-custom bg-dark card-stretch gutter-b">
							<!--begin::Body-->
							<div class="card-body my-4">
								<a href="#" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Penilaian I</a>
								<div class="font-weight-bold text-white font-size-sm">
								<span class="font-size-h1 mr-2" id="poin">0</span>Poin</div>
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
				
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->

	<script type="text/javascript">

		$(document).ready(function(){
			var quarterRoman = ["1","2","3","4"][Math.floor((new Date().getMonth()) / 3)];
		// var querter = new Date().getFullYear();
			$('#periode').val(quarterRoman);
			refreshTable(quarterRoman);
		});


		function refreshTable(quarterRoman){
			$('#kt_datatable1').DataTable({
				"bDestroy": true,
				"responsive":true,
				"orderCellsTop": true,
				"fixedHeader": true,
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				ajax: {
				url: "{{route('customer_json')}}",
				data: {
					"_token": "{{ csrf_token() }}",
					param_quarter:quarterRoman
				},
					error: function(xhr, errorType, thrownError) {
						$('.dataTables_empty').text("No data available in table");
						console.error("Kesalahan AJAX:", thrownError);
						Swal.fire(
								'Error!',
								thrownError,
								'error'
							)
					},
					success : function(result){
						$('#customer-count').text(result.totalcust);
						$('#totalcustacc').text(result.totalcustacc);
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
					{ data: 'nama_customer', name: 'nama_customer' },
					{ data: 'alamat', name: 'alamat' },
					{ data: 'nomor_telefon', name: 'nomor_telefon' },
					{ data: 'email', name: 'email' },
					{ data: 'created_at', name: 'created_at' },
					// { data: 'status_app_data_customer', name: 'status_app_data_customer' },
					{
						data: 'status_app_data_customer',
						name: 'status_app_data_customer',
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
						"data": "idcustomer",
						"orderable": false,
						"render": function ( data, type, row ) {
						if (row.status_app_data_customer === '0'){
							return "<div style='white-space: nowrap;'>"+
										"<a class='btn btn-icon btn-light-success btn-xs mr-2' href='{{asset('/customer/view_form')}}?id="+data+"&view=1' id ="+data+">"+
										"<i class=' fas fa-eye'></i></a>"+"<a class='btn btn-icon btn-light-warning btn-xs mr-2'   href='{{asset('/customer/view_form')}}?id="+data+"' id ="+data+">"+
										"<i class=' fas fa-pencil-alt'></i></a>"+"<a class='btn btn-icon btn-light-danger btn-xs mr-2' href='#' onclick=\"remove('"+data+"')\" >"+
										"<i class=' fas fa-trash'></i></a>"+
									"</div>";
						} else {
							return "<div style='white-space: nowrap;  text-align: center;'>"+
										"<a class='btn btn-icon btn-light-success btn-xs mr-2' href='{{asset('/customer/view_form')}}?id="+data+"&view=1' id ="+data+">"+
										"<i class=' fas fa-eye'></i></a>"+
									"</div>";
						}

						
						}
					}
				]
			});
		};

		function searchtable(custname,status,quarterRoman){
			$('#kt_datatable1').DataTable({
				"bDestroy": true,
				"responsive":true,
				"orderCellsTop": true,
				"fixedHeader": true,
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				ajax: {
					url: "{{route('customer_search')}}",
					type : "post",
					data: {
						"_token": "{{ csrf_token() }}",
						param_custname:custname,
						param_status:status,
						param_quarter:quarterRoman
					},
					error: function(xhr, errorType, thrownError) {
						$('.dataTables_empty').text("No data available in table");
						Swal.fire(
							'Error!',
							thrownError,
							'error'
						);
					}
				},
				columns: [
					{
						"data" :null,
						"render": function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;
						}  
					},
					{ data: 'nama_customer', name: 'nama_customer' },
					{ data: 'alamat', name: 'alamat' },
					{ data: 'nomor_telefon', name: 'nomor_telefon' },
					{ data: 'email', name: 'email' },
					{ data: 'created_at', name: 'created_at' },
					// { data: 'status_app_data_customer', name: 'status_app_data_customer' },
					{
						data: 'status_app_data_customer',
						name: 'status_app_data_customer',
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
						"data": "idcustomer",
						"orderable": false,
						"render": function ( data, type, row ) {
						if (row.status_app_data_customer === '0'){
							return "<div style='white-space: nowrap;'>"+
										"<a class='btn btn-icon btn-light-success btn-xs mr-2' href='{{asset('/customer/view_form')}}?id="+data+"&view=1' id ="+data+">"+
										"<i class=' fas fa-eye'></i></a>"+"<a class='btn btn-icon btn-light-warning btn-xs mr-2'   href='{{asset('/customer/view_form')}}?id="+data+"' id ="+data+">"+
										"<i class=' fas fa-pencil-alt'></i></a>"+"<a class='btn btn-icon btn-light-danger btn-xs mr-2' href='#' onclick=\"remove('"+data+"')\" >"+
										"<i class=' fas fa-trash'></i></a>"+
									"</div>";
						} else {
							return "<div style='white-space: nowrap;  text-align: center;'>"+
										"<a class='btn btn-icon btn-light-success btn-xs mr-2' href='{{asset('/customer/view_form')}}?id="+data+"&view=1' id ="+data+">"+
										"<i class=' fas fa-eye'></i></a>"+
									"</div>";
						}

						
						}
					}
				]
			
			});
		};

		function cari() {
			var custname = $('#kt_datatable_search_query').val();
			var status = $('#kt_datatable_search_status').val();
			var periode = $('#periode').val();

			if (custname == '' && status == 'all'){
				refreshTable(periode);
			} else{
				searchtable(custname,status,periode);
			}


			// console.log({custname});
			// console.log({status});

			// var table = $('#kt_datatable1').DataTable();
			// $('#kt_datatable1').DataTable().clear().draw();
		}

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
						url : "{{route('customer_remove')}}",
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
							// console.log(!result.success);	
							if (!result.success){
								Swal.fire(
									'Gagal Hapus Data!',
									result.message,
									'error'
								)
							} else {
								Swal.fire(
								'Terhapus!',
								result.message,
								'success'
								).then((result) => {
									if (result.value || result.isDismissed) {
										refreshTable(); 
									}
								});
							}
							
						}
					});
				}
			});
		}


	</script>
@endif

@if(session()->get('role') != 'Pegawai')
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
						<h5 class="text-dark font-weight-bold my-2 mr-5">Penilaian Data Customer</h5>
						<!--end::Page Title-->
						<!--begin::Breadcrumb-->
						<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
							<li class="breadcrumb-item">
								<a href="" class="text-muted">Hasil Penilaian</a>
							</li>
							<li class="breadcrumb-item">
								<a href="" class="text-muted">Penilaian Data Customer</a>
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

				<!--begin::table-->
				<div class="card card-custom gutter-b">
					<div class="card-header flex-wrap border-0 pt-6 pb-0">
						<div class="card-title">
							<h3 class="card-label">Table Penilaian Data Customer
							<span class="d-block text-muted pt-2 font-size-sm">Data Table Penilaian Customer</span></h3>
						</div>
						
					</div>
			
					<div class="card-body">
						<div class="mb-10">
							<div class="row mb-8">
								<div class="col-lg-3 mb-lg-0 mb-6">
									<label><b>Nama Pegawai:</b></label>
									<select class="form-control datatable-input" data-col-index="6" id='pegawai'>
										<option value="all" selected>All </option>
									</select>
								</div>
								<div class="col-lg-3 mb-lg-0 mb-6">
									<label><b>Status:</b></label>
									<select class="form-control datatable-input" data-col-index="7" id='status'>
										<option value="all">All</option>
										<option value="1">Approved</option>
										<option value="2">Rejected</option>
									</select>
								</div>
							</div>
						</div>

						<!--begin: Datatable-->
						<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
							<thead>
								<tr>
									<th>No </th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>No Telp</th>
									<th>Email</th>
									<th>Tanggal Input</th>
									<th>Status</th>
								</tr>
							</thead>    
							<tbody> 
								<!-- <tr>
									<td></td>
								</tr> -->
							</tbody>
						</table>
						<!--end: Datatable-->
					</div>

				</div>
				<!--begin::table-->

			
				<!--Begin::Row-->
				<div class="row">
					<div class="col-xl-4">
						<!--begin::Stats Widget 22-->
						<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-3.svg)">
							<!--begin::Body-->
							<div class="card-body my-4">
								<a href="#" class="card-title font-weight-bolder text-info font-size-h6 mb-4 text-hover-state-dark d-block">Total Jumlah Customer</a>
								<div class="font-weight-bold text-muted font-size-sm">
								<span class="text-dark-75 font-weight-bolder font-size-h1 mr-2" id="customer-count">0</span>Customer</div>
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
								<a href="#" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Total Jumlah Customer Approved</a>
								<div class="font-weight-bold text-white font-size-sm">
								<span class="font-size-h1 mr-2" id="totalcustacc">0</span>Customer</div>
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
						<div class="card card-custom bg-dark card-stretch gutter-b">
							<!--begin::Body-->
							<div class="card-body my-4">
								<a href="#" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Penilaian I</a>
								<div class="font-weight-bold text-white font-size-sm">
								<span class="font-size-h1 mr-2" id="poin">0</span>Poin</div>
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
				
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->

	<script type="text/javascript">

		$(document).ready(function(){
			refreshTable();
			pegawai_data();
		});

		$('#pegawai, #status').change(function() {
			var pegawai = $('#pegawai').val();
			var status = $('#status').val();

			// console.log({pegawai});
			// console.log({status});
			// searchTable(custname,barang,status)
			if (pegawai == 'all' && status == 'all'){
				refreshTable();
			} else {
				searchtable(pegawai,status)
			}
		});


		function refreshTable(){
			$('#kt_datatable1').DataTable({
				"bDestroy": true,
				"responsive":true,
				"orderCellsTop": true,
				"fixedHeader": true,
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				ajax: {
				url: "{{route('customer_avg')}}",
				type : "post",
				data: {
					"_token": "{{ csrf_token() }}",
					param_peg:'',
					param_status:''
				},
					error: function(xhr, errorType, thrownError) {
						$('.dataTables_empty').text("No data available in table");
						console.error("Kesalahan AJAX:", thrownError);
						Swal.fire(
								'Error!',
								thrownError,
								'error'
							)
					},
					success : function(result){
						$('#customer-count').text(result.totalcus);
						$('#totalcustacc').text(result.totalcustacc);
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
					{ data: 'nama_customer', name: 'nama_customer' },
					{ data: 'alamat', name: 'alamat' },
					{ data: 'nomor_telefon', name: 'nomor_telefon' },
					{ data: 'email', name: 'email' },
					{ data: 'created_at', name: 'created_at' },
					// { data: 'status_app_data_customer', name: 'status_app_data_customer' },
					{
						data: 'status_app_data_customer',
						name: 'status_app_data_customer',
						render: function (data, type, row) {
							if (data === '0') {
								return  "<span class='label label-xl label-inline label-light-warning'>Pending</span>";
							} else if (data === '1') {
								return "<span class='label label-xl label-inline label-light-success'>Approved</span>";
							} else {
								return "<span class='label label-xl label-inline label-light-danger'>Rejected</span>";
							}
						}
					}
				]
			});
		};

		function searchtable(pegawai,status){
			$('#kt_datatable1').DataTable({
				"bDestroy": true,
				"responsive":true,
				"orderCellsTop": true,
				"fixedHeader": true,
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				ajax: {
					url: "{{route('customer_avg')}}",
					type : "post",
					data: {
						"_token": "{{ csrf_token() }}",
						param_peg:pegawai === "all" ? "" : pegawai,
						param_status:status === "all" ? "" : status
					},
					error: function(xhr, errorType, thrownError) {
						$('.dataTables_empty').text("No data available in table");
						Swal.fire(
							'Error!',
							thrownError,
							'error'
						);
					},
					success : function(result){
						$('#customer-count').text(result.totalcus);
						$('#totalcustacc').text(result.totalcustacc);
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
					{ data: 'nama_customer', name: 'nama_customer' },
					{ data: 'alamat', name: 'alamat' },
					{ data: 'nomor_telefon', name: 'nomor_telefon' },
					{ data: 'email', name: 'email' },
					{ data: 'created_at', name: 'created_at' },
					// { data: 'status_app_data_customer', name: 'status_app_data_customer' },
					{
						data: 'status_app_data_customer',
						name: 'status_app_data_customer',
						render: function (data, type, row) {
							if (data === '0') {
								return  "<span class='label label-xl label-inline label-light-warning'>Pending</span>";
							} else if (data === '1') {
								return "<span class='label label-xl label-inline label-light-success'>Approved</span>";
							} else {
								return "<span class='label label-xl label-inline label-light-danger'>Rejected</span>";
							}
						}
					}
				]
			
			});
		};

		function pegawai_data() {
			$.ajax({  
				url : "{{route('pegawai_json')}}",
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

					for(var i = 0; i < result.data.length; i++){
						// console.log(response.data[i].id,response.data[i].nama);
						pegawai += '<option value="'+result.data[i].idpegawai+'"> '+result.data[i].nama_pegawai+'</option>';
					}
					$('#pegawai').append(pegawai);


					
				}
			});
		}


	</script>
@endif
@endsection