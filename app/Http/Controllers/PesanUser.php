<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesan;
use App\User;
use App\CrudLelang;
use App\Http\Requests;
// use App\Http\Requests\Komentar\StoreRequest;
use Validator, Response;
use Illuminate\Support\Facades\Input;

class PesanUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cruds = Pesan::all();
        $cruds = CrudLelang::all();
        return view('user/pesan', compact( 'cruds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('user/pesan');
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cruds = new Pesan();
        // $crudsAdmin = new AdminCrud();
        $cruds->id = \Auth::user()->id;
        $cruds->idlelang = $request->idlelang;
        $cruds->namalelang = $request->namalelang;
        $cruds->username = \Auth::user()->username;
        $cruds->pertanyaan = $request->pertanyaan;
        // $crudsAdmin->idadmin = $request->idadmin;
        // $crudsAdmin->namaadmin = $request->namaadmin;
        // $cruds->jawaban = $request->jawaban;
        $cruds->save();
 return redirect()->back()->with('alert-success', 'Data Berhasil Disimpan.');


    }


     /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
         $crud = DB::table('auction')->where('idlelang', $id)->first();
        return view('user/pesan', compact( 'crud'));
     }

}
