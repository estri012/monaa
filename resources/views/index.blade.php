@extends('layouts.master')
@section('title')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dashboard Monitoring Aktivitas ADM</h6>
        </div>

		<!--Card Body-->
        <div class="card-body">
            <div class="row">
                <div class="col-auto">
                    <form action="{{ route('search') }}" method="POST">
						@csrf
                        <div class="form-row align-items-center">
							<span>From : </span>
                            <div class="col-auto my-1 calendar">
                                <input type="date" class="form-control form-control-sm" id="fromDate" name="fromDate">
                            </div>
                            {{-- <div class="col-auto my-1 calendar">
                                <span>s/d</span>
                            </div> --}}
							<span>To : </span>
                            <div class="col-auto my-1 calendar">
                                <input type="date" class="form-control form-control-sm" id="toDate" name="toDate">
                            </div>
							<div class="col-auto my-1">
								<button type="submit" id="btn-tanggal" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-search"></i></button>
							</div>
					</form>
                            {{-- <div class="col-auto my-1">
                                <i class="fas fa-calendar" id="btn-date" style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Date Search"></i>
                            </div> --}}

                            <div class="col-auto my-1">
                                <button type="button" id="btn-reset" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-sync" aria-hidden="true" title="Reset"></i></button>
                            </div>
                        </div>
                </div>
            </div>

			<!--Tabel Data-->
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
                        </tr>
					</thead>
					<tbody>
						@foreach($tampildata as $no => $dttampil)
						<tr>
                            <td></th>
                            <td>{{ $dttampil->tanggal }}</td>
                            <td>{{ $dttampil->desa }}</td>
                            <td>{{ $dttampil->aktalahir }}</td>
                            <td>{{ $dttampil->aktamati }}</td>
                            <td>{{ $dttampil->biodata }}</td>
                            <td>{{ $dttampil->kk }}</td>
                            <td>{{ $dttampil->kia }}</td>
                            <td>{{ $dttampil->surpin }}</td>
                            <td>{{ $dttampil->aktalahir + $dttampil->aktamati + $dttampil->biodata + $dttampil->kk + $dttampil->kia + $dttampil->surpin }}</td>
                        </tr>
						@endforeach
					</tbody>
                </table>
				{{-- <div class="mx-auto pb-10 w-4/5">
					{{ $tampildata->links() }}
					<span>Total Result = {{ $tampildata->total() }}</span>
				</div> --}}
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@push('script-reset')
<script>
	$('#btn-reset').click(function(){
		location.replace('dashboard');
	})
</script>

@endpush

@push('refresh')
<script>
    setTimeout(function(){
    location = ''
  },30000)
</script>
@endpush