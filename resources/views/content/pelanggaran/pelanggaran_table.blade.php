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
						<h5 class="text-dark font-weight-bold my-2 mr-5">Penilaian Data Pelanggaran</h5>
						<!--end::Page Title-->
						<!--begin::Breadcrumb-->
						<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
							<li class="breadcrumb-item">
								<a href="" class="text-muted">Data Pelanggaran</a>
							</li>
							<li class="breadcrumb-item">
								<a href="" class="text-muted">Penilaian Data Pelanggaran</a>
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
							<h3 class="card-label">Table Penilaian Data Pelanggaran
							<span class="d-block text-muted pt-2 font-size-sm">Data Table Penilaian Pelanggaran</span></h3>
						</div>
				
					</div>
			
					<div class="card-body">
				
					<div class="mb-10">
							<div class="row mb-8">
								<div class="col-lg-3 mb-lg-0 mb-6">
									<label><b>Periode:</b></label>
									<select class="form-control datatable-input" data-col-index="7" id='periode'>
										<option value="1">Periode 1</option>
										<option value="2">Periode 2</option>
										<option value="3">Periode 3</option>
										<option value="4">Periode 4</option>
									</select>
								</div>
							</div>
						</div>

						<!--begin: Datatable-->
						<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
							<thead>
								<tr>
									<th>No </th>
									<!-- <th>Nama Pegawai</th> -->
									<th>Nama Pelanggaran</th>
									<th>Kategori Pelanggaran</th>
									<th>Waktu Pelanggaran</th>
									<th>Surat Pelanggaran</th>
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

			
				<!--Begin::Row penilaian-->
				<div class="row">
					<div class="col-xl-6">
						<!--begin::Stats Widget 22-->
						<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-3.svg)">
							<!--begin::Body-->
							<div class="card-body my-4">
								<a href="#" class="card-title font-weight-bolder text-info font-size-h6 mb-4 text-hover-state-dark d-block">Total Jumlah Pelanggaran</a>
								<div class="font-weight-bold text-muted font-size-sm">
								<span class="text-dark-75 font-weight-bolder font-size-h1 mr-2" id="customer-count">0</span>Pelanggaran</div>
								<!-- <div class="progress progress-xs mt-7 bg-info-o-60">
									<div class="progress-bar bg-info" role="progressbar" style="width: 67%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div> -->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Stats Widget 22-->
					</div>
					<div class="col-xl-6">
						<!--begin::Stats Widget 24-->
						<div class="card card-custom bgi-no-repeat bg-dark card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{asset('assets/media/svg/shapes/abstract-3.svg')}})">
							<!--begin::Body-->
							<div class="card-body my-4">
								<a href="#" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Penilaian III</a>
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
				url: "{{route('pelanggaran_table_data')}}",
                type : "post",
                data: {
						"_token": "{{ csrf_token() }}",
                        param_view: 'view',
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
						$('#customer-count').text(result.totalpelanggaran);
						// $('#totalcustacc').text(result.totalcustacc);
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
					{ data: 'nama_pelanggaran', name: 'nama_pelanggaran' },
					{ data: 'kategori', name: 'kategori' },
					{ data: 'waktu_pelanggaran', name: 'waktu_pelanggaran' },
					{ data: 'bukti_pelanggaran', name: 'bukti_pelanggaran' },
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
					url: "{{route('pelanggaran_table_data')}}",
					type : "post",
					data: {
						"_token": "{{ csrf_token() }}",
                        param_view: 'search',
						param_pegawai_idbpegawai:pegawai_idbpegawai,
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


		$('#periode').on('change', function(){
			var selectedOption = $(this).val();
			refreshTable(selectedOption);
		});
		// function cari() {
		// 	var custname = $('#kt_datatable_search_query').val();
		// 	var status = $('#kt_datatable_search_status').val();

		// 	if (custname == '' && status == 'all'){
		// 		refreshTable();
		// 	} else{
		// 		searchtable(custname,status);
		// 	}


		// 	// console.log({custname});
		// 	// console.log({status});

		// 	// var table = $('#kt_datatable1').DataTable();
		// 	// $('#kt_datatable1').DataTable().clear().draw();
		// }



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
						<h5 class="text-dark font-weight-bold my-2 mr-5">Penilaian Data Pelanggaran</h5>
						<!--end::Page Title-->
						<!--begin::Breadcrumb-->
						<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
							<li class="breadcrumb-item">
								<a href="" class="text-muted">Data Pelanggaran</a>
							</li>
							<li class="breadcrumb-item">
								<a href="" class="text-muted">Penilaian Data Pelanggaran</a>
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
							<h3 class="card-label">Table Penilaian Data Pelanggaran
							<span class="d-block text-muted pt-2 font-size-sm">Data Table Penilaian Pelanggaran</span></h3>
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
							</div>
						</div>

						<!--begin: Datatable-->
						<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
							<thead>
								<tr>
									<th>No </th>
									<th>Nama Pegawai</th>
									<th>Nama Pelanggaran</th>
									<th>Kategori Pelanggaran</th>
									<th>Waktu Pelanggaran</th>
									<th>Surat Pelanggaran</th>
                                    @if(session()->get('role') !== 'Pegawai')
                                    <th>Action</th>
                                    @endif
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

                <!--Begin::Row penilaian-->
				<div class="row">
					<div class="col-xl-6">
						<!--begin::Stats Widget 22-->
						<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-3.svg)">
							<!--begin::Body-->
							<div class="card-body my-4">
								<a href="#" class="card-title font-weight-bolder text-info font-size-h6 mb-4 text-hover-state-dark d-block">Total Jumlah Pelanggaran</a>
								<div class="font-weight-bold text-muted font-size-sm">
								<span class="text-dark-75 font-weight-bolder font-size-h1 mr-2" id="customer-count">0</span>Pelanggaran</div>
								<!-- <div class="progress progress-xs mt-7 bg-info-o-60">
									<div class="progress-bar bg-info" role="progressbar" style="width: 67%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div> -->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Stats Widget 22-->
					</div>
					<div class="col-xl-6">
						<!--begin::Stats Widget 24-->
						<div class="card card-custom bgi-no-repeat bg-dark card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{asset('assets/media/svg/shapes/abstract-3.svg')}})">
							<!--begin::Body-->
							<div class="card-body my-4">
								<a href="#" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Penilaian III</a>
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

        $('#pegawai').change(function() {
			var pegawai = $('#pegawai').val();
		

			// console.log({pegawai});
			// console.log({status});
			// searchTable(custname,barang,status)
			if (pegawai == 'all'){
				refreshTable();
			} else {
				searchtable(pegawai)
			}
		});

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
				url: "{{route('pelanggaran_table_data')}}",
                type : "post",
                data: {
						"_token": "{{ csrf_token() }}",
                        param_view: 'view'
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
						$('#customer-count').text(result.totalpelanggaran);
						// $('#totalcustacc').text(result.totalcustacc);
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
					{ data: 'nama_pelanggaran', name: 'nama_pelanggaran' },
					{ data: 'kategori', name: 'kategori' },
					{ data: 'waktu_pelanggaran', name: 'waktu_pelanggaran' },
					{ data: 'bukti_pelanggaran', name: 'bukti_pelanggaran' },
                    { 
					// btn ripple- btn-round btn-3d btn-success
						"data": "idpelanggaran",
						"orderable": false,
						"render": function ( data, type, row ) {
							return "<div style='white-space: nowrap;  text-align: center;'>"+
                                        "<a class='btn btn-icon btn-light-danger btn-xs mr-2' href='#' onclick=\"remove('"+data+"')\" >"+
										"<i class=' fas fa-trash'></i></a>"+
									"</div>";

						
						}
					}
				]
			});
		};

		function searchtable(pegawai){
			$('#kt_datatable1').DataTable({
				"bDestroy": true,
				"responsive":true,
				"orderCellsTop": true,
				"fixedHeader": true,
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				ajax: {
					url: "{{route('pelanggaran_table_data')}}",
					type : "post",
					data: {
						"_token": "{{ csrf_token() }}",
                        param_view: 'search',
						param_pegawai_idbpegawai:pegawai,
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
						$('#customer-count').text(result.totalpelanggaran);
						// $('#totalcustacc').text(result.totalcustacc);
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
					{ data: 'nama_pelanggaran', name: 'nama_pelanggaran' },
					{ data: 'kategori', name: 'kategori' },
					{ data: 'waktu_pelanggaran', name: 'waktu_pelanggaran' },
					{ data: 'bukti_pelanggaran', name: 'bukti_pelanggaran' },
                    { 
					// btn ripple- btn-round btn-3d btn-success
						"data": "idpelanggaran",
						"orderable": false,
						"render": function ( data, type, row ) {
							return "<div style='white-space: nowrap;  text-align: center;'>"+
                                        "<a class='btn btn-icon btn-light-danger btn-xs mr-2' href='#' onclick=\"remove('"+data+"')\" >"+
										"<i class=' fas fa-trash'></i></a>"+
									"</div>";

						
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
						url : "{{route('pelanggaran_remove_action')}}",
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
@endsection