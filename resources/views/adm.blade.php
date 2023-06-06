@extends('layouts.master')
@section('title')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Mesin ADM</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-auto mr-auto">
                    <div class="form-row align-items-center">
                        <div class="col-auto my-1">
                            <a href="{{ route('tambahadm') }}">
								<button type="button" id="btnAddAdm" class="btn btn-outline-primary btn-sm">
									<i class="fa fa-plus-circle"></i> <span>Add</span></button>
							</a>
                        </div>
                    </div>
                </div>
            </div>
			@if(session('message'))
			<div class="alert alert-success alert-dismissible show fade">
				<div class="alert-body">
					<button class="close" data-dismiss="alert">
						<span>x</span>
					</button>
					{{ session('message') }}
				</div>
			</div>
			@endif
            <div class="table-responsive">
                <table class="table table-bordered" id="tableadm" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Desa</th>
                            <th>Kecamatan</th>
                            <th>Action</th>
                        </tr>
					</thead>
					<tbody>
						@foreach($lokasi as $no => $dtloc)
						<tr>
							<td></td>
							<td>{{ $dtloc->desa }}</td>
							<td>{{ $dtloc->kecamatan }}</td>
							<td>
								{{-- <button class="btn btn-success btn-circle btn-sm"><i class="fa fa-eye"></i></button> --}}
								<a href="{{ route('editadm', $dtloc->id) }}">
									<button class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit"></i></button>
								</a>
								<button data-id="{{ $dtloc->id }}" class="btn btn-danger btn-circle btn-sm delete-confirm"><i class="fa fa-trash"></i>
									<form action="{{ route('deleteadm',$dtloc->id) }}" id="delete{{ $dtloc->id }}" method="POST">
										@csrf
										@method('delete')
									</form>
								</button>
							</td>
						</tr>
						@endforeach
					</tbody>


                </table>
				{{-- <div class="mx-auto pb-10 w-4/5">
					{{ $lokasi->links() }}
				</div> --}}


            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@push('script1')

<script>
	$(".delete-confirm").click(function(id) {
		id = $(this).data('id');
	swal({
		title: 'Apakah anda yakin menghapus ADM '+id,
		text: 'Data yang sudah dihapus tidak dapat dikembalikan',
		icon: 'warning',
		buttons: true,
		dangerMode: true,
	  })
	  .then((willDelete) => {
		if (willDelete) {
			swal('Data sudah terhapus!', {
		  	icon: 'success',
			});
			$(`#delete${id}`).submit();
		} else {
		// swal('Your imaginary file is safe!');
		}
	  });
  });
</script>

@endpush

@push('datatable-adm')
<script>
	$(document).ready(function () {
    var t = $('#tableadm').DataTable({
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: 0,
            },
        ],
        order: [[1, 'asc']],
    });

    t.on('order.dt search.dt', function () {
        let i = 1;

        t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
        });
    }).draw();


});
</script>

@endpush