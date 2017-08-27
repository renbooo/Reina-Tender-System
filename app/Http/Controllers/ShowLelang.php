<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\CrudLelang;
use App\Crud;
use App\CrudPenawaran;
use App\Penawaran;
use Validator, Response;
use Illuminate\Support\Facades\Input;

class ShowLelang extends Controller
{
	public function index(){
		$cruds = DB::table('auction')->orderBy('idlelang', 'desc')->get();
		return view('user/list_auction', compact('cruds'));
	}
	public function show($idlelang)
	{
		$cruds = CrudLelang::find($idlelang);
		return view('user/detail_lelang', compact('cruds'));
	}
	public function store(Request $request) {

		$this->validate($request, [
			'idlelang' => 'required',
			'namalelang' => 'required',
			'nilaitawar' => 'required',
			'uploadtawaran' => 'required|file|mimes:zip,rar|max:2048',
			]);

		$data = DB::table('negotiation')->where(['idlelang'=>$request->idlelang, "id"=>$request->id])->get();

		$fileNama = $request->id."_".$request->namalelang.".zip";
		if (count($data) == 0) {
			$datafile = new CrudPenawaran($request->input());

		}else{
			// DB::table('negotiation')->where(['idlelang'=>$request->idlelang, "id"=>$request->id])->update([
			// 	'namalelang' => $request->namalelang,
			// 	'nilaitawar' => $request->nilaitawar,
			// 	'uploadtawaran' => $fileNama
			// ]);
			$datafile = CrudPenawaran::whereIdlelang($request->idlelang)->whereId($request->id)->firstOrFail();
			$datafile->namalelang = $request->namalelang;
			$datafile->nilaitawar = $request->nilaitawar;
			$datafile->uploadtawaran = $fileNama;
			$datafile->save();
		}


		// if($file = $request->hasFile('uploadtawaran')) {

			$file = $request->file('uploadtawaran');

			//$fileName = $file->getClientOriginalName();
			$destinationPath = public_path().'/Penawaran/';
			$file->move($destinationPath,$fileNama);
			$datafile->uploadtawaran = $fileNama;
		// }
		$datafile->save();

		return redirect()->route('beranda_lelang.index')
		->with('success','You have successfully uploaded your files');

	}
}
