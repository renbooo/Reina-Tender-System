<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\CrudPenawaran;
use App\User;
use Validator, Response;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;
use Auth;
class StatusLelang extends Controller
{
	public function show()
	{
    $id = Auth::user()->id;
		$cruds = DB::table('negotiation')->where('id', $id)->get();
		return view('user/stats', compact('cruds'));
	}
}
