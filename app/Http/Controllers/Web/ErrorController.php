<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    //
	public function error404(){
		$errorMsg = ['title'=>'404','msg'=>'网页不存在','isBack'=>true];

		return view('error/404',compact(['errorMsg']));
	}
}
