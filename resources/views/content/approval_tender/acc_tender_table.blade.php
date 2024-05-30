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
						<div class="dropdown dropdown-inline mr-2">
							<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="svg-icon svg-icon-md">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
										<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>Export</button>
							<!--begin::Dropdown Menu-->
							<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
								<!--begin::Navigation-->
								<ul class="navi flex-column navi-hover py-2">
									<li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="la la-print"></i>
											</span>
											<span class="navi-text">Print</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="la la-copy"></i>
											</span>
											<span class="navi-text">Copy</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="la la-file-excel-o"></i>
											</span>
											<span class="navi-text">Excel</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="la la-file-text-o"></i>
											</span>
											<span class="navi-text">CSV</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="la la-file-pdf-o"></i>
											</span>
											<span class="navi-text">PDF</span>
										</a>
									</li>
								</ul>
								<!--end::Navigation-->
							</div>
							<!--end::Dropdown Menu-->
						</div>
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
	refreshTable();
	search_data();
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
			url: "{{route('tender_approval_json')}}",
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
					url: "{{ route('tender_action') }}", 
					type: 'POST',
					data: {
						"_token": "{{ csrf_token() }}",
					param_ord:data,
					param_triger:triger
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
		text: "Data Customer Akan di Reject",
		icon: 'warning',
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
					param_triger:triger
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