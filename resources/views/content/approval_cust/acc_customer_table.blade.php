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
					<h5 class="text-dark font-weight-bold my-2 mr-5">Approval Customer</h5>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Approval</a>
						</li>
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Approval Customer</a>
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
						<h3 class="card-label">List Table Approval Customer
						<span class="d-block text-muted pt-2 font-size-sm">Data Table Approval Customer</span></h3>
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
									<option value="0">Pending</option>
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
								<th >Nama Pegawai</th>
								<th >Nama Customer</th>
								<th>Alamat</th>
								<th>No Telp</th>
								<th >Email</th>
								<th >Status</th>
								<th >Actions</th>
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
		searchTable(pegawai,status)
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
			url: "{{route('acc_cust_data')}}",
			// type: 'POST',
			error: function(xhr, errorType, thrownError) {
				$('.dataTables_empty').text("No data available in table");
				// console.error("Kesalahan AJAX:", thrownError);
				Swal.fire(
						'Error!',
						thrownError,
						'error'
					)
			},
			success : function(result){
				// console.log(result);
				if (!result.success){
				$('.dataTables_empty').text("No data available in table");
					Swal.fire(
						'Gagal Reject Data!',
						result.message,
						'error'
					)
				}
				// $('#customer-count').text(result.totalcust);
				// $('#totalcustacc').text(result.totalcustacc);
				// $('#poin').text(result.poin);
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
	        { data: 'nama_customer', name: 'nama_customer' },
	        { data: 'alamat', name: 'alamat' },
			{ data: 'nomor_telefon', name: 'nomor_telefon' },
			{ data: 'email', name: 'email' },
			// { data: 'created_at', name: 'created_at' },
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
					if (row.status_app_data_customer === '0') {
						return "<div style='white-space: nowrap;'>" +
									"<a class='btn btn-icon btn-light-primary btn-xs mr-2' href='{{asset('/customer/view_form')}}?id="+data+"&view=1' id="+data+"><i class='fas fa-eye'></i></a>" +
									"<button class='btn btn-sm btn-success btn-hover-undefined ml-1' data-placement='top' title='' onclick=\"action('"+data+"','1')\"><i class='far fa-thumbs-up'></i>Approved</button>" +
									"<button class='btn btn-sm btn-danger btn-hover-undefined ml-1' data-placement='top' title=''onclick=\"action('"+data+"','2')\"><i class='far fa-times-circle'></i>Rejected</button>" +
								"</div>";
					} else {
						return "<div style='white-space: nowrap; text-align: center;' >" +
									"<a class='btn btn-icon btn-light-primary btn-xs mr-2' href='{{asset('/customer/view_form')}}?id="+data+"&view=1' id="+data+"><i class='fas fa-eye'></i></a>" +
								"</div>";
					}
				}
	        }
	    ]
    });
};

function searchTable(pegawai,status){
	$('#kt_datatable1').DataTable({
		"bDestroy": true,
	    "responsive":true,
	    "orderCellsTop": true,
	    "fixedHeader": true,
	    scrollCollapse: true,
		autoWidth: false,
		responsive: true,
		ajax: {
			url : "{{route('acc_cust_search')}}",
			type: 'POST',
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
	        { data: 'nama_customer', name: 'nama_customer' },
	        { data: 'alamat', name: 'alamat' },
			{ data: 'nomor_telefon', name: 'nomor_telefon' },
			{ data: 'email', name: 'email' },
			// { data: 'created_at', name: 'created_at' },
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
					if (row.status_app_data_customer === '0') {
						return "<div style='white-space: nowrap;'>" +
									"<a class='btn btn-icon btn-light-primary btn-xs mr-2' href='{{asset('/customer/view_form')}}?id="+data+"&view=1' id="+data+"><i class='fas fa-eye'></i></a>" +
									"<button class='btn btn-sm btn-success btn-hover-undefined ml-1' data-placement='top' title='' onclick=\"action('"+data+"','1')\"><i class='far fa-thumbs-up'></i>Approved</button>" +
									"<button class='btn btn-sm btn-danger btn-hover-undefined ml-1' data-placement='top' title=''onclick=\"action('"+data+"','2')\"><i class='far fa-times-circle'></i>Rejected</button>" +
								"</div>";
					} else {
						return "<div style='white-space: nowrap;'>" +
									"<a class='btn btn-icon btn-light-primary btn-xs mr-2' href='{{asset('/customer/view_form')}}?id="+data+"&view=1' id="+data+"><i class='fas fa-eye'></i></a>" +
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

function action(data,triger) {
	// console.log(triger);
	if (triger == '1') {
		// console.log('approved');
		swal.fire({
		title: 'Apakah Anda Yakin?',
		text: "Data Customer Akan di Approve",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#1BC5BD',
		cancelButtonColor: '#F64E60',
		confirmButtonText: 'Yes, Approve Data!'
		}).then(function(result) {
			if (result.value) {
				$.ajax({
					url: "{{ route('cust_action') }}", 
					type: 'POST',
					data: {
						"_token": "{{ csrf_token() }}",
					param_cust:data,
					param_triger:triger,
					param_note :''
					},
					dataType : "json",
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
						// console.log(!result.success);	
						if (!result.success){
							Swal.fire(
								'Gagal Approve Data!',
								result.message,
								'error'
							)
						} else {
							Swal.fire(
							'Berhasil Approve Data!',
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

	} else {
		swal.fire({
		title: 'Apakah Anda Yakin?',
		text: "Data Customer Akan di Reject, Masukkan Detail : ",
		icon: 'warning',
		input: "textarea",
		inputValidator: (value) => {
			if (!value) {
				return 'Detail tidak boleh kosong!';
			}
    	},
		showCancelButton: true,
		confirmButtonColor: '#6993FF',
		cancelButtonColor: '#F64E60',
		confirmButtonText: 'Yes, Reject Data!'
    }).then(function(result) {
		if (result.value) {
				$.ajax({
					url: "{{ route('cust_action') }}", 
					type: 'POST',
					data: {
						"_token": "{{ csrf_token() }}",
					param_cust:data,
					param_triger:triger,
					param_note :result.value
					},
					dataType : "json",
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
						// console.log(!result.success);	
						if (!result.success){
							Swal.fire(
								'Gagal Reject Data!',
								result.message,
								'error'
							)
						} else {
							Swal.fire(
							'Berhasil Reject Data!',
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

	// $.ajax({
	// 		url: "{{ route('cust_action') }}", 
	// 		type: 'POST',
	// 		data: {
	// 			"_token": "{{ csrf_token() }}",
	// 		param_cust:data,
	// 		param_triger:triger
	// 		},
	// 		dataType : "json",
    //    		async : false,
	// 		error: function(xhr, errorType, thrownError) {
	// 			// console.error("Kesalahan AJAX:", thrownError);
	// 			Swal.fire(
	// 					'Error!',
	// 					thrownError,
	// 					'error'
	// 				)
	// 		},
	// 		success: function(response){
	// 			refreshTable();
	// 		}
	// 	});
}




</script>
@endsection