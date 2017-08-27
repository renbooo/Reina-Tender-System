<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\CrudPenawaran;
use App\Http\Requests\Crud\StoreRequest;
use App\Http\Requests\Crud\UpdateRequest;
use Validator, Response;
use Datatables;
class CrudUser extends Controller
{
  public function index()
  {
      return view('/admin/index');
  }

  public function data(Request $request){
    if($request->ajax()){
            $cruds = User::select('id', 'username', 'email', 'alamatperusahaan', 'kotaperusahaan', 'npwp', 'notelepon', 'level', 'verified')->get();
            // var_dump($cruds);
            // die;
            return Datatables::of($cruds)
            ->addColumn('action', function ($cruds) {
                return "<a href='/admin/user_members/edit/{$cruds->id}' title='Edit'><button class='btn-warning' type='button'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button></a><br><br>
                <form onsubmit='delete_user({$cruds->id})' style='display: inline'>
                    <input name='_method' type='hidden' value='DELETE'>
                    <input name='id' type='hidden' value='{$cruds->id}'>
                    <input name='_token' type='hidden' value='" . csrf_token() . "'>
                    <button class='btn-danger' type='submit' title='Hapus'><i class='fa fa-trash' aria-hidden='true'></i></button>
                </form>";
            })->make(true);
        } else {
            exit("AJAX, You have no power");
        }
    // // $cruds = CrudLelang::all();
    // // $cruds = DB::select('SELECT * FROM negotiation WHERE idlelang');
    // return view('admin/lelang', compact('cruds'));
  }
    public function create()
    {
        return view('admin/create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $cruds = new User();
      $cruds->id = $request->id;
      $cruds->username = $request->username;
      $cruds->email = $request->email;
      $cruds->password = Hash::make($request->password);
      $cruds->alamatperusahaan = $request->alamatperusahaan;
      $cruds->kotaperusahaan = $request->kotaperusahaan;
      $cruds->npwp = $request->npwp;
      $cruds->notelepon = $request->notelepon;
      $cruds->level = 'User';
      $cruds->verified = 1;
      $cruds->email_token = str_random(10);
      $cruds->save();
      return redirect()->route('user_members.index')->with('alert-success', 'Data Berhasil Disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cruds = User::findOrFail($id);
        return view('admin/edit_user', compact('cruds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        // dd($request->all());
        $cruds = User::where('id', $id)->first();
        $cruds->email = $request->email;
        $cruds->username = $request->username;
        // $cruds->password = $request->password;
        $cruds->alamatperusahaan = $request->alamatperusahaan;
        $cruds->kotaperusahaan = $request->kotaperusahaan;
        $cruds->npwp = $request->npwp;
        $cruds->notelepon = $request->notelepon;
        $cruds->save();
        return redirect()->route('user_members.index')->with('alert-success', 'Data Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         $cruds = User::findOrFail($id);
         $cruds->delete();
         return response()->json($cruds);
        //  return redirect()->route('crud.index')->with('alert-success', 'Data Berhasil Dihapus.');
     }
}
