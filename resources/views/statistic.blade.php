@extends('layouts.master')
@section('title')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Total Pencetakan Per Dokumen</h6>
        </div>

		<!--Card Body-->
        <div class="card-body">
			<div class="row">
				<!-- Card Example -->
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-l font-weight-bold text-primary text-uppercase mb-1">
									AKTA KELAHIRAN</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $aktalahir }}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Card Example -->
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-l font-weight-bold text-success text-uppercase mb-1">
										AKTA KEMATIAN</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $aktamati }}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Card Example -->
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-l font-weight-bold text-info text-uppercase mb-1">BIODATA
									</div>
									<div class="row no-gutters align-items-center">
										<div class="col-auto">
											<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $biodata }}</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- Card Example -->
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-l font-weight-bold text-primary text-uppercase mb-1">
									KARTU KELUARGA</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kk }}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Card Example -->
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-l font-weight-bold text-success text-uppercase mb-1">
										KARTU IDENTITAS ANAK</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kia }}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Card Example -->
				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-l font-weight-bold text-info text-uppercase mb-1">SURAT PINDAH
									</div>
									<div class="row no-gutters align-items-center">
										<div class="col-auto">
											<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $surpin }}</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Total Pencetakan Per Mesin ADM</h6>
		</div>

		<!--Card Body-->
		<div class="card-body">
			<div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
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
						@foreach($datastat as $stat)
						<tr>
							<td></td>
							<td>{{ $stat->desa }}</td>
							<td>{{ $stat->sum_aktalahir }}</td>
							<td>{{ $stat->sum_aktamati }}</td>
							<td>{{ $stat->sum_biodata }}</td>
							<td>{{ $stat->sum_kk }}</td>
							<td>{{ $stat->sum_kia }}</td>
							<td>{{ $stat->sum_surpin }}</td>
							<td>{{ $stat->sum_aktalahir + $stat->sum_aktamati + $stat->sum_biodata + $stat->sum_kk + $stat->sum_kia + $stat->sum_surpin}}</td>
						</tr>
						@endforeach
					</tbody>
                </table>
            </div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

@endsection

@push('refresh-stat')
<script>
    setTimeout(function(){
    location = ''
  },30000)
</script>
@endpush
