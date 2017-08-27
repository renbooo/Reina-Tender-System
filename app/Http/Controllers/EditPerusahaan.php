<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
// use App\Http\Requests\Crud\StoreRequest;
use App\Http\Requests\Perusahaan\UpdateRequest;
use Validator, Response;
use Illuminate\Support\Facades\Input;

class EditPerusahaan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = User::all();
        return view('user/profil', compact('cruds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   //  public function create()
   //  {
   //     return view('admin/create');
   // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreRequest $request)
    // {
    //     // $rules = array (
    //     //         'nama' => 'required'
    //     // );
    //     // $validator = Validator::make ( Input::all (), $rules );
    //     // if ($validator->fails ())
    //     //     return Response::json ( array (

    //     //             'errors' => $validator->getMessageBag ()->toArray ()
    //     //     ) );

    //     // else {

    //     $cruds = new Crud();
    //     $cruds->username = $request->username;
    //     $cruds->alamatperusahaan = $request->alamatperusahaan;
    //     $cruds->kotaperusahaan = $request->kotaperusahaan;
    //     $cruds->npwp = $request->npwp;
    //     $cruds->notelepon = $request->notelepon;
    //     $cruds->save();
    //        // return response()->json ( $cruds );
    //     return redirect()->route('user_members.index')->with('alert-success', 'Data Berhasil Disimpan.');
    //     // }
    // }


     /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
         $cruds = User::find($id);
         return view('user/profil', compact('cruds'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   //  public function edit($idperusahaan)
   //  {
   //     $cruds = Crud::findOrFail($idperusahaan);
   //     return view('user/profil', compact('cruds'));
   // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
     // $cruds = Crud::findOrFail($request->idperusahaan);
     $cruds = User::where('id', $id)->first();
     $cruds->username = $request->username;
     $cruds->alamatperusahaan = $request->alamatperusahaan;
     $cruds->kotaperusahaan = $request->kotaperusahaan;
     $cruds->npwp = $request->npwp;
     $cruds->notelepon = $request->notelepon;
     $cruds->save();
     return redirect()->route('user_members.index')->with('alert-success', 'Data Berhasil Diubah.');
        //return response()->json ( $cruds );
    }
}
