<?php

namespace App\Http\Controllers\Otentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OtentikasiController extends Controller
{
    public function index(){
		return view('login');
	}
	public function login(Request $request){
		// dd($request->all());
		//CARA MANUAL
		// $data = User::where('email',$request->email)->firstOrFail();
		// if ($data){
		// 	if(Hash::check($request->password,$data->password)){
		// 		session(['berhasil_login' => true]);
		// 		return redirect()->route('home');
		// 	}
		// }

		//PAKE BAWAAN LARAVEL
		if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
			return redirect()->route('home');
		}
		return redirect()->route('index')->with('message','Email atau Password salah!');
	}

	public function logout(Request $request){
		// $request->session()->flush();
		Auth::logout();
		return redirect()->route('index');
	}
}
