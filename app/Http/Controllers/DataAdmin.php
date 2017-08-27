<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminCrud;
use App\Http\Requests;
use App\Http\Requests\Crud\StoreAdminRequest;
use App\Http\Requests\Crud\UpdateAdminRequest;
use Validator, Response;
use Illuminate\Support\Facades\Input;

class DataAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = AdminCrud::all();
        return view('admin/members', compact('cruds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         return view('admin/create_admin');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
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

        $cruds = new AdminCrud();
        $cruds->namaadmin = $request->namaadmin;
        $cruds->alamatadmin = $request->alamatadmin;
        $cruds->tanggallahir = $request->tanggallahir;
        $cruds->kotalahir = $request->kotalahir;
        $cruds->jeniskelamin = $request->jeniskelamin;
        $cruds->save();
        return redirect()->route('members.index')->with('alert-success', 'Data Berhasil Disimpan.');
        //return response()->json ( $cruds );
        // }
    }


     /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($idadmin)
     {
        //
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idadmin)
    {
       $cruds = AdminCrud::findOrFail($idadmin);
       return view('admin/edit_admin', compact('cruds'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, $idadmin)
    {
       // $cruds = AdminCrud::findOrFail($request->idadmin);
        $cruds = AdminCrud::where('idadmin', $idadmin)->first();
        $cruds->namaadmin = $request->namaadmin;
        $cruds->alamatadmin = $request->alamatadmin;
        $cruds->tanggallahir = $request->tanggallahir;
        $cruds->kotalahir = $request->kotalahir;
        $cruds->jeniskelamin = $request->jeniskelamin;
        $cruds->save();
         return redirect()->route('members.index')->with('alert-success', 'Data Berhasil Diubah.');
        //return response()->json ( $cruds );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idadmin)
    {
        $cruds = AdminCrud::find($idadmin);
        $cruds->delete();
        //return response()->json ( $cruds );
         return redirect()->route('members.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}

