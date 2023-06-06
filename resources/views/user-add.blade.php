@extends('layouts.master')
@section('title')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
	<!--Judul card-->
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add User</h6>
        </div>
		<div class="card-body">
			<form action="{{ route('saveuser') }}" method="POST">
				<div class="form-row">
					@csrf
					<div class="form-group col-md-6">
						<label for="inputRole" @error('role')
							class="text-danger"
						@enderror>Role @error('role')
							 {{ $message }}
						@enderror</label>
							<select class="custom-select" id="inputRole" name="role" onchange="roleChange()">
								<option value="">-- Pilih Satu --</option>
								@foreach($role as $dtrole)
								<option value="{{ $dtrole->nama_role }}">{{ $dtrole->nama_role }}</option>
								@endforeach
							</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputNama" @error('nama')
							class="text-danger"
						@enderror>Nama Lengkap @error('nama')
							 {{ $message }}
						@enderror</label>
						<input type="text" class="form-control" id="inputNama" name="nama">
					</div>
					<div class="form-group col-md-6">
						<label for="inputUsername" @error('username')
							class="text-danger"
						@enderror>Username @error('username')
							 {{ $message }}
						@enderror</label>
						<input type="text" class="form-control" id="inputUsername" name="username">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputPassword1" @error('password')
							class="text-danger"
						@enderror>Password @error('password')
							 {{ $message }}
						@enderror</label>
						<input type="password" class="form-control" id="inputPassword1" name="password1">
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword2">Ulangi Password</label>
						<input type="password" class="form-control" id="inputPassword2" name="password2" required>
					</div>
				</div>
		</div>
		<div class="card-footer text-right">
			<a href="{{ route('user')}}">
				<button type="button" class="btn btn-secondary btn-sm">Back</button>
			</a>
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
		</div>
	</form>
	</div>


</div>
<!-- /.container-fluid -->

@endsection