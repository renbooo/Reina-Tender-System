<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesan;
use App\Http\Requests;
use App\Http\Requests\Komentar\StoreRequest;
// use App\Http\Requests\Crud\UpdateRequest;
use Validator, Response;
use Illuminate\Support\Facades\Input;

class KelolaPesan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Pesan::all();
        return view('admin/pesan', compact('cruds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 //    public function create()
 //    {
 //     return view('admin/create');
 // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // $rules = array (
        //         'nama' => 'required'
        // );
        // $validator = Validator::make ( Input::all (), $rules );
        // if ($validator->fails ())
        //     return Response::json ( array (

        //             'errors' => $validator->getMessageBag ()->toArray ()
        //     ) );

        // else {

        // $cruds = new Crud();
        // $cruds->id = $request->id;
        // $cruds->username = $request->username;
        // $cruds->pertanyaan = $request->pertanyaan;
        // $cruds->jawaban = $request->jawaban;
        // $cruds->save();
           // return response()->json ( $cruds );
        // return redirect()->route('komentar.index')->with('alert-success', 'Data Berhasil Disimpan.');
        // }
    }


     /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($idpertanyaan)
     {
        //
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idpertanyaan)
    {
        $cruds = Pesan::findOrFail($idpertanyaan);
        return view('admin/edit_pesan', compact('cruds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $idpertanyaan)
    {   
       $cruds = Pesan::findOrFail($request->idpertanyaan);
       $cruds->id=$request->id;
       $cruds->username = $request->username;
       $cruds->pertanyaan = $request->pertanyaan;
       $cruds->jawaban = $request->jawaban;
       $cruds->save();
       return redirect()->route('kelola_pesan.index')->with('alert-success', 'Data Berhasil Diubah.');
        //return response()->json ( $cruds );
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpertanyaan)
    {
        $cruds = Pesan::findOrFail($idpertanyaan);
        $cruds->delete();
        //return response()->json ( $cruds );
        return redirect()->route('kelola_pesan.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
