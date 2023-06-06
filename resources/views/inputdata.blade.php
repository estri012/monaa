@extends('layouts.master')
@section('title')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data Aktivitas Pencetakan Mesin ADM</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-auto mr-auto">
                    <div class="form-row align-items-center">
                        <div class="col-auto my-1">
							<a href="{{ route('tambahdata') }}">
								<button type="button" id="btnAdd" class="btn btn-outline-primary btn-sm">
									<i class="fa fa-plus-circle"></i> <span>Add</span></button>
							</a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <form action="{{ route('searchdate') }}" method="POST">
						@csrf
                        <div class="form-row align-items-center">
							<span>From : </span>
                            <div class="col-auto my-1 calendar">
                                <input type="date" class="form-control form-control-sm" id="fromDate" name="fromDate">
                            </div>
							<span>To : </span>
                            <div class="col-auto my-1 calendar">
                                <input type="date" class="form-control form-control-sm" id="toDate" name="toDate">
                            </div>
							<div class="col-auto my-1">
								<button type="submit" id="btn-tanggal" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-search"></i></button>
							</div>
							</form>
							<div class="col-auto my-1">
								<button type="button" id="btn-reset" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-sync" aria-hidden="true" title="Reset"></i></button>
							</div>
                        </div>
                    </form>
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
			<!--Tabel-->
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
							<th>No</th>
                            <th>Tanggal</th>
                            <th>Desa</th>
                            <th>Akta Lahir</th>
                            <th>Akta Mati</th>
                            <th>Biodata</th>
                            <th>KK</th>
                            <th>KIA</th>
                            <th>Surpin</th>
                            <th>Jumlah</th>
							<th>Action</th>
                        </tr>
					</thead>
					<tbody>
						@foreach($inputdata as $no => $dtdata)
						<tr>
							<td></td>
							<td>{{ $dtdata->tanggal }}</td>
							<td>{{ $dtdata->desa }}</td>
							<td>{{ $dtdata->aktalahir }}</td>
							<td>{{ $dtdata->aktamati }}</td>
							<td>{{ $dtdata->biodata }}</td>
							<td>{{ $dtdata->kk }}</td>
							<td>{{ $dtdata->kia }}</td>
							<td>{{ $dtdata->surpin }}</td>
							<td>{{ $dtdata->aktalahir + $dtdata->aktamati + $dtdata->biodata + $dtdata->kk + $dtdata->kia + $dtdata->surpin }}</td>
							<td>
								{{-- <button class="btn btn-success btn-circle btn-sm"><i class="fa fa-eye"></i></button> --}}
								<a href="{{ route('editdata', $dtdata->id) }}">
									<button class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit"></i></button>
								</a>
								<button data-id="{{ $dtdata->id }}" class="btn btn-danger btn-circle btn-sm delete-data"><i class="fa fa-trash"></i>
									<form action="{{ route('deletedata',$dtdata->id) }}" id="delete{{ $dtdata->id }}" method="POST">
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
					{{ $inputdata->links() }}
				</div> --}}
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@push('script2')

<script>
	$(".delete-data").click(function(id) {
		id = $(this).data('id');
	swal({
		title: 'Apakah anda yakin menghapus data dengan id ' +id,
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

@push('script-reset')
<script>
	$('#btn-reset').click(function(){
		location.replace('inputdata');
	})
</script>

@endpush