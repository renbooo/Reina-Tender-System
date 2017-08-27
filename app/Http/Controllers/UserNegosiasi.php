<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\CrudPenawaran;
use App\Http\Requests;
use App\Http\Requests\Penawaran\StoreRequest;
// use App\Http\Requests\Crud\UpdateRequest;
use Validator, Response;
use Illuminate\Support\Facades\Input;

class UserNegosiasi extends Controller
{

    public function index(){
        $cruds = CrudPenawaran::all();
        return view('user/detail_lelang', compact('cruds'));
    }

    // public function create()
    // {
    //     return view('crud/tambah_lelang');
    // }
    public function store(Request $request) {

       $this->validate($request, [
          'idlelang' => 'required',
          'namalelang' => 'required',
          'id' => 'required',
          'username' => 'required',
          'nilaitawar' => 'required',
          'uploadtawar' => 'required|file|mimes:zip,rar|max:2048',
       ]);
       //$datafile = new CrudPenawaran($request->input());
       $data = DB::table('negotiation')->where(['idlelang'=>$request->idlelang, "id"=>$request->id])->get();

       if (count($data) == 0) {
         DB::table('negotiation')->insert([
           'idlelang' => $request->idlelang,
           'namalelang' => $request->namalelang."jhgjhgjhgjgjgygygj",
           'id' => $request->id,
           'username' => $request->username,
           'nilaitawar' => $request->nilaitawar,
           'uploadtawaran' => $request->uploadtawaran
         ]);
       }else{
         DB::table('negotiation')->where(['idlelang'=>$request->idlelang, "id"=>$request->id])->update([
           'namalelang' => $request->namalelang,
           'nilaitawar' => $request->nilaitawar,
           'uploadtawaran' => $request->uploadtawaran
         ]);
       }
         if($file = $request->hasFile('uploadtawar')) {

           $file = $request->file('uploadtawar');

           $fileName = $file->getClientOriginalName();
           $destinationPath = public_path().'/Penawaran/';
           $file->move($destinationPath,$fileName);
           $datafile->uploadtawar = $fileName;
       }
       //$datafile->save();
        //return redirect()->route('beranda_lelang.index')
          //             ->with('success','You have successfully uploaded your files');
   }

   public function coba(){
     $data = DB::table('negotiation')->where(['idlelang'=>"2", "id"=>"789"])->get();
     echo count($data);
     echo json_encode($data);
   }
}
