<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Product;	      // Eloquent ORM
use App\Models\Gubun;	
use App\Models\Jangbuo;	      // Eloquent ORM
use App\Models\Jangbu;
use App\Models\Member;




class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check()
	{
		$uid = request('uid31');
		$pwd = request('pwd31');
		
		$row = Member::where('uid31','=',$uid)->
									where('pwd31','=',$pwd)->first();
									if ($row)
									{
										session()->put('uid31',$row->uid31);
										session()->put('rank31',$row->rank31);
									}
									
									return view('main');
	}
	
	public function logout()
	{
		session()->forget('uid31');
		session()->forget('rank31');
		
		return view('main');
	}


	
}
