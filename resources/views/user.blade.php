@extends('layouts.master')
@section('title')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-auto mr-auto">
                    <div class="form-row align-items-center">
                        <div class="col-auto my-1">
                            <a href="{{ route('tambahuser') }}">
								<button type="button" id="btnAddUser" class="btn btn-outline-primary btn-sm">
									<i class="fa fa-plus-circle"></i> <span>Add</span></button>
							</a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <form id="form-filter-user">
                        <div class="form-row align-items-center">
                            <div class="col-auto my-1">
                                <input type="text" class="form-control form-control-sm" id="keyword" placeholder="Search...">
                            </div>
                            <div class="col-auto my-1">
                                <button type="button" id="btn-filter-user" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-search"></i></button>
                                <button type="button" id="btn-reset-user" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-sync" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
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
                <table class="table table-bordered" id="tableUser" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
						@foreach($user as $no => $data)
						<tr>
							<td>{{ $user->firstItem()+$no }}</td>
							<td>{{ $data->nama }}</td>
							<td>{{ $data->username }}</td>
							<td>{{ $data->role }}</td>
							<td>{{ $data->created_at }}</td>
							<td>
								{{-- <button class="btn btn-success btn-circle btn-sm"><i class="fa fa-eye"></i></button> --}}
								<a href="{{ route ('edituser', $data->id) }}">
									<button class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit"></i></button>
								</a>
								<button data-id="{{ $data->id }}" class="btn btn-danger btn-circle btn-sm swal-confirm"><i class="fa fa-trash"></i>
									<form action="{{ route('deleteuser',$data->id) }}" id="delete{{ $data->id }}" method="POST">
										@csrf
										@method('delete')
									</form>
								</button>
							</td>
						</tr>
						@endforeach
                    </thead>
                </table>
				<div class="mx-auto pb-10 w-4/5">
					{{ $user->links() }}
				</div>


            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection

@push('after-script')

<script>
	$(".swal-confirm").click(function(id) {
		id = $(this).data('id');
	swal({
		title: 'Apakah anda yakin menghapus user id '+id,
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