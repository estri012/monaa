@extends('layouts.master')
@section('title')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
	<!--Judul card-->
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add ADM</h6>
        </div>
		<div class="card-body">
			<form action="{{ route('saveadm') }}" method="POST">
				<div class="form-row">
					@csrf
					<div class="form-group col-md-6">
						<label for="inputKecamatan" @error('kecamatan')
							class="text-danger"
						@enderror>Kecamatan @error('kecamatan')
							 {{ $message }}
						@enderror</label>
							<select class="custom-select" id="inputKecamatan" name="kecamatan" onchange="kecamatanChange()">
								<option value="">-- Pilih Satu --</option>
								@foreach($kecamatan as $dtkecamatan)
								<option value="{{ $dtkecamatan->kecamatan }}">{{ $dtkecamatan->kecamatan }}</option>
								@endforeach
							</select>
					</div>
					<div class="form-group col-md-6">
						<label for="inputDesa" @error('desa')
							class="text-danger"
						@enderror>Desa @error('desa')
							 {{ $message }}
						@enderror</label>
						<input type="text" class="form-control" id="inputDesa" name="desa">
					</div>
				</div>
		</div>
		<div class="card-footer text-right">
			<a href="{{ route('locadm')}}">
				<button type="button" class="btn btn-secondary btn-sm">Back</button>
			</a>
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
		</div>
	</form>
	</div>


</div>
<!-- /.container-fluid -->

@endsection