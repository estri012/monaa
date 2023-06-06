<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
	//HOME
	//tampil halaman home
	public function home(){
		$tampildata = DB::table('inputdata')
			->select('id','tanggal','desa','aktalahir','aktamati','biodata','kk','kia','surpin')
			->get();

		return view('index', ['tampildata'=>$tampildata]);
	}
	//search date
	public function search(Request $request){
		$fromDate = $request->input('fromDate');
		$toDate = $request->input('toDate');

		$tampildata = DB::table('inputdata')
			->select('id','tanggal','desa','aktalahir','aktamati','biodata','kk','kia','surpin')
			->where('tanggal', '>=', $fromDate)
			->where('tanggal', '<=', $toDate)
			->get();

		// $tampildata->appends($request->all());
		// dd($tampildata);
		return view('index', compact('tampildata'));
	}


	//INPUT DATA//

    //tampil halaman input data
	public function inputdata(){
		$inputdata = DB::table('inputdata')
			->select('id', 'tanggal', 'desa', 'aktalahir', 'aktamati', 'biodata', 'kk', 'kia', 'surpin')
			->get();

		return view('inputdata', ['inputdata'=>$inputdata]);
	}
	//search date-inputdata
	public function searchdate(Request $request){
		$fromDate = $request->input('fromDate');
		$toDate = $request->input('toDate');

		$inputdata = DB::table('inputdata')
			->select('id','tanggal','desa','aktalahir','aktamati','biodata','kk','kia','surpin')
			->where('tanggal', '>=', $fromDate)
			->where('tanggal', '<=', $toDate)
			->get();

		// $tampildata->appends($request->all());
		// dd($tampildata);
		return view('inputdata', compact('inputdata'));
	}
	//methode get data lokasi atau tampil halaman add input data
	public function lokasi(){
		$lokasi = DB::table('lokasi')
			->select('id', 'desa', 'kecamatan')
			->get();

		return view('inputdata-add', ['lokasi'=>$lokasi]);
	}
	//methode untuk simpan data add data
	public function adddata(Request $request){
		$validation = $request->validate([
			'desa' => 'required',
			'tanggal' => 'required',
			'aktalahir' => 'required',
			'aktamati' => 'required',
			'biodata' => 'required',
			'kk' => 'required',
			'kia' => 'required',
			'surpin' => 'required',
		],
		[
			'desa.required' => 'harus diisi',
			'tanggal.required' => 'harus diisi',
			'aktalahir.required' => 'harus diisi',
			'aktamati.required' => 'harus diisi',
			'biodata.required' => 'harus diisi',
			'kk.required' => 'harus diisi',
			'kia.required' => 'harus diisi',
			'surpin.required' => 'harus diisi',
		]);
		// dd($request->all());
		DB::table('inputdata')->insert([
			'desa' => $request->desa,
			'tanggal' => $request->tanggal,
			'aktalahir' => $request->aktalahir,
			'aktamati' => $request->aktamati,
			'biodata' => $request->biodata,
			'kk' => $request->kk,
			'kia' => $request->kia,
			'surpin' => $request->surpin,
		]);
		return redirect()->route('inputdata')->with('message', 'Data berhasil disimpan!');
	}
	//private methode untuk error lokasi adm
	private function data_validation(Request $request){
		$validation = $request->validate([
			'desa' => 'required',
			'tanggal' => 'required',
			'aktalahir' => 'required',
			'aktamati' => 'required',
			'biodata' => 'required',
			'kk' => 'required',
			'kia' => 'required',
			'surpin' => 'required',
		],
		[
			'desa.required' => 'harus diisi',
			'tanggal.required' => 'harus diisi',
			'aktalahir.required' => 'harus diisi',
			'aktamati.required' => 'harus diisi',
			'biodata.required' => 'harus diisi',
			'kk.required' => 'harus diisi',
			'kia.required' => 'harus diisi',
			'surpin.required' => 'harus diisi',
		]);
	}
	//methode untuk hapus data inputdata
	public function deletedata($id){
		DB::table('inputdata')->where('id',$id)->delete();
		return redirect()->back();
	}
	//methode untuk edit data inputdata
	public function editdata($id){
		// echo $id;
		$inputdata = DB::table('inputdata')->where('id',$id)->first();
		$lokasi = DB::table('lokasi')
			->select('id', 'desa', 'kecamatan')
			->get();
		return view('inputdata-edit',['inputdata'=>$inputdata, 'lokasi'=>$lokasi]);
	}
	//methode untuk update data inputdata
	public function updatedata(Request $request,$id){
		$this->data_validation($request);
		// dd($request->all());
		DB::table('inputdata')->where('id',$id)->update([
			'desa' => $request->desa,
			'tanggal' => $request->tanggal,
			'aktalahir' => $request->aktalahir,
			'aktamati' => $request->aktamati,
			'biodata' => $request->biodata,
			'kk' => $request->kk,
			'kia' => $request->kia,
			'surpin' => $request->surpin,
		]);
		return redirect()->route('inputdata')->with('message', 'Data berhasil diupdate');
	}

////////////////////////////////////////////////
	//LOKASI ADM //

	//tampil halaman lokasi adm
	public function lokasiadm(){
		$lokasi = DB::table('lokasi')
			->select('id', 'desa', 'kecamatan')
			->get();

		return view('adm', ['lokasi'=>$lokasi]);
	}
	//tampil halaman add adm atau get data kecamatan
	public function kecamatan(){
		$kecamatan = DB::table('kecamatan')
			->select('id', 'kode_kecamatan', 'kecamatan')
			->get();

		return view('adm-add', ['kecamatan'=>$kecamatan]);
	}
	//methode untuk simpan data add adm
	public function addadm(Request $request){
		$validation = $request->validate([
			'kecamatan' => 'required',
			'desa' => 'required'
		],
		[
			'kecamatan.required' => 'harus diisi',
			'desa.required' => 'harus diisi',
		]);
		// dd($request->all());
		DB::table('lokasi')->insert([
			'kecamatan' => $request->kecamatan,
			'desa' => $request->desa,
		]);
		return redirect()->route('locadm')->with('message', 'Data berhasil disimpan!');
	}
	//private methode untuk error lokasi adm
	private function adm_validation(Request $request){
		$validation = $request->validate([
			'kecamatan' => 'required',
			'desa' => 'required'
		],
		[
			'kecamatan.required' => 'harus diisi',
			'desa.required' => 'harus diisi',
		]);
	}
	//methode untuk hapus data adm
	public function deleteadm($id){
		DB::table('lokasi')->where('id',$id)->delete();
		return redirect()->back();
	}
	//methode untuk edit data adm
	public function editadm($id){
		// echo $id;
		$lokasi = DB::table('lokasi')->where('id',$id)->first();
		$kecamatan = DB::table('kecamatan')
			->select('id', 'kode_kecamatan', 'kecamatan')
			->get();
		return view('adm-edit',['lokasi'=>$lokasi, 'kecamatan'=>$kecamatan]);
	}
	//methode untuk update data user
	public function updateadm(Request $request,$id){
		$this->adm_validation($request);
		// dd($request->all());
		DB::table('lokasi')->where('id',$id)->update([
			'kecamatan' => $request->kecamatan,
			'desa' => $request->desa,
		]);
		return redirect()->route('locadm')->with('message', 'Data berhasil diupdate');
	}


//////////////////////////////////
	//USER//

	//methode get data role atau tampil halaman add user
	public function role(){
		$role = DB::table('role')
			->select('id', 'kode_role', 'nama_role')
			->get();

		return view('user-add', ['role'=>$role]);
	}
	//methode untuk simpan data add user
	public function adduser(Request $request){
		$validation = $request->validate([
			'role' => 'required',
			'nama' => 'required',
			'username' => 'required',
			'password1' => 'required'
		],
		[
			'role.required' => 'harus diisi',
			'nama.required' => 'harus diisi',
			'username.required' => 'harus diisi',
			'password1.required' => 'harus diisi',
		]
	);
		// dd($request->all());
		DB::table('user')->insert([
			'role' => $request->role,
			'nama' => $request->nama,
			'username' => $request->username,
			'password' => $request->password1
		]);
		return redirect()->route('user')->with('message', 'Data berhasil disimpan!');
	}
	//private methode untuk error user
	private function user_validation(Request $request){
		$validation = $request->validate([
			'role' => 'required',
			'nama' => 'required',
			'username' => 'required',
			'password1' => 'required'
		],
		[
			'role.required' => 'harus diisi',
			'nama.required' => 'harus diisi',
			'username.required' => 'harus diisi',
			'password1.required' => 'harus diisi',
		]);
	}
	//methode untuk get/tampil data user
	public function user(){
		$user = DB::table('user')
            ->select('id', 'nama', 'username', 'role', 'created_at')
            ->paginate(10);

		return view('user', ['user'=>$user]);
	}
	//methode untuk hapus data user
	public function deleteuser($id){
		DB::table('user')->where('id',$id)->delete();
		return redirect()->back();
	}
	//methode untuk edit data user
	public function edituser($id){
		// echo $id;
		$user = DB::table('user')->where('id',$id)->first();
		$role = DB::table('role')
			->select('id', 'kode_role', 'nama_role')
			->get();
		return view('user-edit',['user'=>$user, 'role'=>$role]);
	}
	//methode untuk update data user
	public function updateuser(Request $request,$id){
		$this->user_validation($request);
		// dd($request->all());
		DB::table('user')->where('id',$id)->update([
			'role' => $request->role,
			'nama' => $request->nama,
			'username' => $request->username,
			'password' => $request->password1,
		]);
		return redirect()->route('user')->with('message', 'Data berhasil diupdate');
	}


	///////////////// STATISTIC
	//tampilkan halaman stat
	public function stat(Request $request){
		$aktalahir = DB::table('inputdata')
			->sum('aktalahir');
			//dd($aktalahir);
		$aktamati = DB::table('inputdata')
			->sum('aktamati');
			// dd($aktamati);
		$biodata = DB::table('inputdata')
			->sum('biodata');
			// dd($biodata);
		$kk = DB::table('inputdata')
			->sum('kk');
			// dd($kk);
		$kia = DB::table('inputdata')
			->sum('kia');
			// dd($kia);
		$surpin = DB::table('inputdata')
			->sum('surpin');
			// dd($surpin);
		$datastat = DB::table('inputdata')
			->selectRaw
			('sum(aktalahir) as sum_aktalahir,
			sum(aktamati) as sum_aktamati,
			sum(biodata) as sum_biodata,
			sum(kk) as sum_kk,
			sum(kia) as sum_kia,
			sum(surpin) as sum_surpin,
			desa')
			->groupBy('desa')
			->get();
		// dd($datastat);

		return view('statistic', ['aktalahir'=>$aktalahir,'aktamati'=>$aktamati,'biodata'=>$biodata,'kk'=>$kk,'kia'=>$kia,'surpin'=>$surpin, 'datastat'=>$datastat]);
	}
}
