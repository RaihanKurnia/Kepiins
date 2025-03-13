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
					<h5 class="text-dark font-weight-bold my-2 mr-5">Nilai</h5>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Data Master</a>
						</li>
						<li class="breadcrumb-item">
							<a href="" class="text-muted">Nilai</a>
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
						<h3 class="card-label">Master Data Table Nilai
						<span class="d-block text-muted pt-2 font-size-sm">Data Table Nilai</span></h3>
					</div>
					<div class="card-toolbar">
						<!--begin::Dropdown-->
						<div class="dropdown dropdown-inline mr-2">
							<!-- <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
							

						</div>
						<!--end::Dropdown-->
						<!--begin::Button-->
						<a href="{{asset('/nilai/view_form')}}" class="btn btn-primary font-weight-bolder">
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
					<!--begin: Datatable-->
					<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
						<thead>
							<tr>
								<th>No </th>
								<!-- <th>ID</th> -->
								<th >Kategori</th>
								<th >Bobot Minimum</th>
								<th >Bobot Maksimum</th>
								<!-- <th>Password</th> -->
								<th>Nilai</th>
								<th >Actions</th>
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
			url: "{{ route('nilai_json') }}",
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
	        { data: 'kategori_nilai', name: 'kategori_nilai' },
			{ data: 'minimum_bobot',name: 'minimum_bobot' },
			{ data: 'maksimum_bobot',name: 'maksimum_bobot' },
			{ data: 'nilai',name: 'nilai' },
	        { 
	          // btn ripple- btn-round btn-3d btn-success
	            "data": "idnilai",
	            "orderable": false,
	            "render": function ( data, type, row ) {
                return "<a class='btn btn-icon btn-light-success btn-xs mr-2' href='{{asset('/nilai/view_form')}}?id="+data+"&view=1' id ="+data+">"+
					"<i class=' fas fa-eye'></i></a>"+"<a class='btn btn-icon btn-light-warning btn-xs mr-2'   href='{{asset('/nilai/view_form')}}?id="+data+"' id ="+data+">"+
					"<i class=' fas fa-pencil-alt'></i></a>"+"<a class='btn btn-icon btn-light-danger btn-xs mr-2' href='#' onclick=\"remove('"+data+"')\" >"+
					"<i class=' fas fa-trash'></i></a>"
                }
	        }
	    ]
    });
};

function remove(id) {
	console.log(id);

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
				url : "{{ route('user_remove') }}",
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