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
					<h5 class="text-dark font-weight-bold my-2 mr-5">Approval Tender</h5>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Approval</a>
						</li>
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Approval Tender</a>
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
						<h3 class="card-label">List Table Approval Tender
						<span class="d-block text-muted pt-2 font-size-sm">Data Table Approval Tender</span></h3>
					</div>
					<div class="card-toolbar">
						<!--begin::Dropdown-->
						
						<!--end::Dropdown-->
						<!--begin::Button-->
						
						<!--end::Button-->
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
								<th>Nama Pegawai</th>
								<th style="width: 300px;">Nama Customer</th>
								<th>Email</th>
								<th>No Telepon</th>
								<th>Alamat Pengiriman</th>
								<th>Nama Barang</th>
								<th style="width: 100px;">Jumlah Order (TON)</th>
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
			<!--begin::Card-->
			
			<!--end::Card-->
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
	search_data();
});

$('#pegawai, #barang, #status,#periode').change(function() {
		search();
});
// $('#periode').on('change', function(){
//     var selectedOption = $(this).val();
//     refreshTable(selectedOption);
//   });


function search() {
	var custname = $('#pegawai').val();
	var barang = $('#barang').val();
	var status = $('#status').val();
	var periode = $('#periode').val();
	// searchTable(custname,barang,status)

	if (custname == 'all' && barang== 'all' && status == 'all' && periode != null){
		refreshTable(periode);
	} else {
		searchTable(custname,barang,status,periode)
	}
}

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

function refreshTable(quarter){
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
			url: "{{route('tender_approval_json')}}",
			data: {
				"_token": "{{ csrf_token() }}",
				param_quarter:quarter
				},
			error: function(xhr, errorType, thrownError) {
				$('.dataTables_empty').text("No data available in table");
			}
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
									"<a class='btn btn-icon btn-light-primary btn-xs mr-2' href='{{asset('/tender/view_form')}}?id="+data+"&view=1' id="+data+"><i class='fas fa-eye'></i></a>" +
									"<button class='btn btn-sm btn-success btn-hover-undefined ml-1' data-placement='top' title='' onclick=\"action('"+data+"','1')\"><i class='far fa-thumbs-up'></i>Approved</button>" +
									"<button class='btn btn-sm btn-danger btn-hover-undefined ml-1' data-placement='top' title=''onclick=\"action('"+data+"','2')\"><i class='far fa-times-circle'></i>Rejected</button>" +
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


function searchTable(custname,barang,status,periode) {
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
				param_status:status == "all" ? "" : status,
				param_quarter:periode
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

function action(data,triger) {
	var quarterRoman = ["1","2","3","4"][Math.floor((new Date().getMonth()) / 3)];
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
					url: "{{ route('tender_action') }}", 
					type: 'POST',
					data: {
						"_token": "{{ csrf_token() }}",
					param_ord:data,
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
									refreshTable(quarterRoman); 
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
		text: "Data Customer Akan di Reject, Masukkan Detail :",
		icon: 'warning',
		input: "textarea",
		inputValidator: (value) => {
			if (!value) {
				return 'Textarea tidak boleh kosong!';
			}
    	},
		showCancelButton: true,
		confirmButtonColor: '#6993FF',
		cancelButtonColor: '#F64E60',
		confirmButtonText: 'Yes, Reject Data!'
    }).then(function(result) {
		if (result.value) {
				$.ajax({
					url: "{{ route('tender_action') }}", 
					type: 'POST',
					data: {
						"_token": "{{ csrf_token() }}",
					param_ord:data,
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
									refreshTable(quarterRoman); 
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