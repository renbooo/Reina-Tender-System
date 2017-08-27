<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CrudLelang;
use App\Http\Requests;
use App\Http\Requests\Lelang\StoreRequest;
use App\Http\Requests\Lelang\UpdateRequest;
use DB;
// use App\Http\Requests\Crud\UpdateRequest;
use Validator, Response;
use Illuminate\Support\Facades\Input;
use Datatables;
class UploadLelang extends Controller
{
    public function index(){
        return view('admin/lelang');
    }

    public function data(Request $request){
      if($request->ajax()){
              $cruds = CrudLelang::select('idlelang', 'namalelang', 'deskripsi', 'tanggaltutup', 'uploadfile', 'pemenang')->get();
              return Datatables::of($cruds)
                      // tambah kolom untuk aksi edit dan hapus
                      ->addColumn('action', function ($crud) {
                          return "<a href='/admin/auctioneers/show/{$crud->idlelang}' title='Lihat Penawar Lelang'><button class='btn-success' type='button'><i class='fa fa-users' aria-hidden='true'></i></button></a>
                          <a href='/admin/auction/edit/{$crud->idlelang}' title='Edit & Tentukan Pemenang'><button class='btn-warning' type='button'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button></a>
                          <form onsubmit='delete_lelang({$crud->idlelang})' style='display: inline'>
                              <input name='_method' type='hidden' value='DELETE'>
                              <input name='id' type='hidden' value='{$crud->idlelang}'>
                              <input name='_token' type='hidden' value='" . csrf_token() . "'>
                              <button class='btn-danger' type='submit' title='Hapus'><i class='fa fa-trash' aria-hidden='true'></i></button>
                          </form>";
                      })->make(true);
          } else {
              exit("AJAX, You have no power");
          }
    }
    public function create()
    {
        return view('admin/tambah_lelang');
    }

    public function show($id)
    {
      $cruds = DB::table('negotiation')->where('idlelang',$id)->get();
      return view('admin/penawaran', compact('cruds'));
      // var_dump($data);
    }

    public function store(Request $request) {

  		$this->validate($request, [
  			'namalelang' => 'required',
  			'deskripsi' => 'required',
        'tanggaltutup' => 'required',
        'uploadfile' => 'required|file|mimes:zip, rar, pdf|max:2048',
  			]);
        dd($request->all());

  		$data = DB::table('auction')->where('idlelang',$request->idlelang)->get();

  		$fileNama = $request->idlelang."_".$request->namalelang.".zip";
  		if (count($data) == 0) {
  			$datafile = new CrudLelang($request->input());
  		}else{
  			$datafile = CrudLelang::whereIdlelang($request->idlelang)->firstOrFail();
        $datafile->namalelang = $request->namalelang;
        $datafile->deskripsi = $request->deskripsi;
        $datafile->tanggaltutup = $request->tanggaltutup;
        $datafile->uploadfile = $fileName;
        $datafile->save();
  		}


  		// if($file = $request->hasFile('uploadtawaran')) {

  			$file = $request->file('uploadfile');

  			//$fileName = $file->getClientOriginalName();
  			$destinationPath = public_path().'/Penawaran/';
  			$file->move($destinationPath,$fileNama);
  			$datafile->uploadfile = $fileNama;
  		// }
  		$datafile->save();

  		return redirect()->route('crud_lelang.index')
  		->with('success','You have successfully uploaded your files');
  	}
    // public function store(Request $request) {
    //
    //    $this->validate($request, [
    //      'namalelang' => 'required',
    //      'deskripsi' => 'required',
    //      'tanggaltutup' => 'required',
    //      'kodelelang' => 'required',
    //     //  'status' => 'required',
    //      'uploadfile' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
    //    ]);
    //    $datafile = new CrudLelang($request->input());
    //
    //     if($file = $request->hasFile('uploadfile')) {
    //
    //        $file = $request->file('uploadfile');
    //
    //        $fileName = $file->getClientOriginalName();
    //        $destinationPath = public_path().'/images/';
    //        $file->move($destinationPath,$fileName);
    //        $datafile->uploadfile = $fileName;
    //    }
    //    $datafile->save();
    //    return redirect()->route('crud_lelang.index')
    //     ->with('success','You have successfully uploaded your files');
    //  }
     public function edit($idlelang){
       $cruds = CrudLelang::findOrFail($idlelang);
       return view('admin/edit_lelang', compact('cruds'));
     }
     public function update(UpdateRequest $request, $idlelang)
     {
      // dd($request->all());
      // $cruds = Crud::findOrFail($request->idperusahaan);
      $cruds = CrudLelang::where('idlelang', $idlelang)->first();
      $fileNama = $request->idlelang."_".$request->namalelang.".zip";
      $cruds->namalelang = $request->namalelang;
      $cruds->deskripsi = $request->deskripsi;
      $cruds->tanggaltutup = $request->tanggaltutup;
      $cruds->uploadfile = $fileNama;
      $cruds->pemenang = $request->pemenang;

      $file = $request->file('uploadfile');

      //$fileName = $file->getClientOriginalName();
      $destinationPath = public_path().'/Penawaran/';
      $file->move($destinationPath,$fileNama);
      $cruds->uploadfile = $fileNama;
    // }
      $cruds->save();

      return redirect()->route('crud_lelang.index')
      ->with('success','You have successfully uploaded your files');

      // $cruds->save();
      // return redirect()->route('crud_lelang.index')->with('alert-success', 'Data Berhasil Diubah.');
      //    //return response()->json ( $cruds );
     }
     public function destroy($idlelang)
     {
         $cruds = CrudLelang::findOrFail($idlelang);
         $cruds->delete();
        //  return response()->json($cruds);
        return redirect()->route('crud_lelang.index')->with('alert-success', 'Data Berhasil Dihapus.');
     }
     public function pemenang(){
       $data = DB::table('auction')->where('idlelang',$request->idlelang)->get();

   		if (count($data) == 0) {
   			$datafile = new CrudLelang($request->input());
   		}else{
   			 $datafile = CrudLelang::whereIdlelang($request->idlelang)->firstOrFail();
         $datafile->pemenang = $request->pemenang;
         $datafile->save();
   		}
     }
}
