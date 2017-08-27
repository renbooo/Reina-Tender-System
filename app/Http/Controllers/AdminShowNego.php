<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CrudPenawaran;
use App\CrudLelang;
use App\User;
use Validator, Response;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;
use Datatables;
class AdminShowNego extends Controller
{
	public function index(){
			$cruds = CrudPenawaran::all();
			return view('admin/penawaran', compact('cruds'));
	}

	public function show($idlelang)
	{
		$cruds = DB::table('negotiation')->where('idlelang', $idlelang)->get();
		return view('admin/penawaran/', compact('cruds'));
	}
	public function store(Request $request) {

		$this->validate($request, [
			'idlelang' => 'required',
			'namalelang' => 'required',
			'hargamaksimal' => 'required',
			'nilaitawar' => 'required',
			'uploadtawaran' => 'required|file|mimes:zip,rar|max:2048',
			]);
		$datafile = new CrudPenawaran($request->input());

		if($file = $request->hasFile('uploadtawaran')) {

			$file = $request->file('uploadtawaran');

			$fileName = $file->getClientOriginalName();
			$destinationPath = public_path().'/Penawaran/';
			$file->move($destinationPath,$fileName);
			$datafile->uploadtawaran = $fileName;
		}
		$datafile->save();
		return redirect()->route('beranda_lelang.index')
		->with('success','You have successfully uploaded your files');
	}
	public function edit($idlelang){
		$cruds = CrudLelang::findOrFail($idlelang);
		return view('admin/edit_lelang', compact('cruds'));
	}
	public function update(UpdateRequest $request, $idlelang)
	{

	 $cruds = CrudLelang::where('idlelang', $idlelang)->first();
	 $cruds->pemenang = $request->pemenang;
	 $cruds->save();

	 return redirect()->route('auctioneers.index')
	 ->with('success','You have successfully uploaded your files');
	// public function kirimPesan($id)
	// {
	// 	$cruds = CrudPenawaran::find($id);
	// 	$cruds->pemenang = 1;
	// 	$cruds->save();
	// 	return response()->json([
	// 		// 'message' => 'Sukses mengirim pesan! :D',
	// 		'id' => $id
	// 	]);
	// }
	}
}
