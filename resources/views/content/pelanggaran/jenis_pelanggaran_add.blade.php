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
					<h5 class="text-dark font-weight-bold my-2 mr-5">Jenis Pelanggaran</h5>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Data Master</a>
						</li>
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Jenis Pelanggaran</a>
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
						<h3 class="card-label">Master Data Table Jenis Pelanggaran
						<span class="d-block text-muted pt-2 font-size-sm">Data Table Jenis Pelanggaran</span></h3>
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
						<a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#modal_add" id="button_add">
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
				<!-- begin:: Modal Add-->
				<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="addModalLabel"></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<i aria-hidden="true" class="ki ki-close"></i>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label>Nama Pelanggaran</label>
									<input type="text"  id ="nama" class="form-control" placeholder="Input Nama Pelanggaran" />
								</div>
								<div class="form-group">
									<label>Bobot Pelanggaran</label>
									<input type="number"  min="0" max="1000" step="0.01" id ="bobot" class="form-control" placeholder="Input Bobot Pelanggaran" />
								</div>
								<div class="form-group">
									<label>Kategori</label>
									<input type="text"  id ="kategori" class="form-control" placeholder="Input Kategori"> </input>
								</div>
								<!-- <div class="form-group">
									<label>Status Jabatan</label>
									<div></div>
									<select id ="status" class="custom-select form-control">
										<option value="" disabled selected>Open this select menu</option>
										<option value="Kontrak">Kontrak</option>
										<option value="Tetap">Tetap</option>
									</select>
								</div> -->
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary font-weight-bold" data-dismiss="modal" onclick="add_edit()">Save changes</button>
							</div>
						</div>
					</div>
				</div>
				<!-- end:: Modal Add -->
				<div class="card-body">
					<!--begin: Datatable-->
					<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
						<thead>
							<tr>
								<th>No </th>
								<th>Nama Pelanggaran</th>
								<th>Bobot Pelanggaran</th>
								<th>Kategori</th>
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
});

$("#button_add").click(function(){
  	trigerUpdate = false;
  	$('#addModalLabel').text('Tambah Data Jenis Pelanggaran');
	$('#nama').val('');
    $('#bobot').val('');
	$('#kategori').val('');
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
			url: "{{route('jenis_pelanggaran_json')}}",
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
	        { data: 'nama_pelanggaran', name: 'nama_pelanggaran' },
	        { data: 'bobot_pelanggaran', name: 'bobot_pelanggaran' },
			{ data: 'kategori', name: 'kategori' },
	        { 
	          // btn ripple- btn-round btn-3d btn-success
	            "data": "idjenis_pelanggaran",
	            "orderable": false,
	            "render": function ( data, type, row ) {
                return "<div style='white-space: nowrap;'><a class='btn btn-icon btn-light-warning btn-xs mr-2'  data-toggle='modal' onclick=\"prepareupdate(true,'"+data+"','"+row.nama_pelanggaran+"','"+row.bobot_pelanggaran+"','"+row.kategori+"')\" data-target='#modal_add' >"+
					"<i class=' fas fa-pencil-alt'></i></a>"+"<a class='btn btn-icon btn-light-danger btn-xs mr-2' href='#' onclick=\"remove('"+data+"')\" >"+
					"<i class=' fas fa-trash'></i></a></div>";
					(state,id, nama_pelanggaran,bobot_pelanggaran,kategori)
                }
	        }
	    ]
    });
};

trigerUpdate = false;
paramid = '';

function prepareupdate(state,id, nama_pelanggaran,bobot_pelanggaran,kategori) {
    trigerUpdate = state;
    paramid = id;
	$('#addModalLabel').text('Edit Data Jenis Pelanggaran');
    $('#nama').val(nama_pelanggaran);
    $('#bobot').val(bobot_pelanggaran);
	$('#kategori').val(kategori);
}

function add_edit() {
	var nama_pelanggaran = $('#nama').val();
    var bobot = $('#bobot').val();
	var kategori = $('#kategori').val();

	$.ajax({  
        url : (!trigerUpdate?"{{route('jns_pelanggaran_add')}}":"{{route('jns_pelanggaran_edit')}}"),
        type : "post",
        data: {
            "_token": "{{ csrf_token() }}",
            param_id:paramid,
            param_nama:nama_pelanggaran,
			param_bobot:bobot,
            param_kategori:kategori
            },
        dataType : "json",
        async : false,
		error: function(xhr, errorType, thrownError,result) {
			// console.error("Kesalahan AJAX:", result);
			Swal.fire(
					'Error!',
					thrownError,
					'error'
				)
		},
        success : function(result){
        	if(result.success){
        		refreshTable();
        	}
        	mIsUpdate = false;
        	Swal.fire({
			  icon: 'success',
			  title: 'You clicked the button!',
			  text: 'Data Berhasil Simpan !',
			})
        }
    });
	
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
				url : "{{route('jns_pelanggaran_remove')}}",
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
@endsection