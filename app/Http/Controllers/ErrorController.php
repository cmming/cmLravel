<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    //
	public function error404(){
		$errorMsg = ['title'=>'404','msg'=>'网页不存在','isBack'=>true];

		return view('error/404',compact(['errorMsg']));
	}
}
