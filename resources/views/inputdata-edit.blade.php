@extends('layouts.master')
@section('title')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
	<!--Judul card-->
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
        </div>
		<div class="card-body">
			<form action="{{ route('updatedata',$inputdata->id) }}" method="POST">
				<div class="form-row">
					@csrf
					@method('patch')
					<div class="form-group col-md-6">
						<label for="inputDesa" @error('desa')
							class="text-danger"
						@enderror>Desa @error('desa')
							 {{ $message }}
						@enderror</label>
							<select class="custom-select" id="inputDesa" name="desa" onchange="desaChange()">
								<option value="{{ $inputdata->desa }}">{{ $inputdata->desa }}</option>
								@foreach($lokasi as $dtlokasi)
								<option value="{{ $dtlokasi->desa }}">{{ $dtlokasi->desa }}</option>
								@endforeach
							</select>
					</div>
					<div class="form-group col-md-6">
						<label for="inputTanggal" @error('tanggal')
							class="text-danger"
						@enderror>Tanggal @error('tanggal')
							 {{ $message }}
						@enderror</label>
						<input type="date" class="form-control" id="inputTanggal" name="tanggal" placeholder="Pick Date" value="{{ $inputdata->tanggal }}">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputAktalahir" @error('aktalahir')
							class="text-danger"
						@enderror>Akta Lahir @error('aktalahir')
							 {{ $message }}
						@enderror</label>
						<input type="text" class="form-control" id="inputAktalahir" name="aktalahir" value="{{ $inputdata->aktalahir }}">
					</div>
					<div class="form-group col-md-6">
						<label for="inputAktamati" @error('aktamati')
							class="text-danger"
						@enderror>Akta Mati @error('aktamati')
							 {{ $message }}
						@enderror</label>
						<input type="text" class="form-control" id="inputAktamati" name="aktamati" value="{{ $inputdata->aktamati }}">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputBiodata" @error('biodata')
							class="text-danger"
						@enderror>Biodata @error('biodata')
							 {{ $message }}
						@enderror</label>
						<input type="text" class="form-control" id="inputBiodata" name="biodata" value="{{ $inputdata->biodata }}">
					</div>
					<div class="form-group col-md-6">
						<label for="inputKk" @error('kk')
							class="text-danger"
						@enderror>KK @error('kk')
							 {{ $message }}
						@enderror</label>
						<input type="text" class="form-control" id="inputKk" name="kk" value="{{ $inputdata->kk }}">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputKia" @error('kia')
							class="text-danger"
						@enderror>KIA @error('kia')
							 {{ $message }}
						@enderror</label>
						<input type="text" class="form-control" id="inputKia" name="kia" value="{{ $inputdata->kia }}">
					</div>
					<div class="form-group col-md-6">
						<label for="inputSurpin" @error('surpin')
							class="text-danger"
						@enderror>Surpin @error('surpin')
							 {{ $message }}
						@enderror</label>
						<input type="text" class="form-control" id="inputSurpin" name="surpin" value="{{ $inputdata->surpin }}">
					</div>
				</div>
		</div>
		<div class="card-footer text-right">
			<a href="{{ route('inputdata')}}">
				<button type="button" class="btn btn-secondary btn-sm">Back</button>
			</a>
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
		</div>
	</form>
	</div>


</div>
<!-- /.container-fluid -->

@endsection