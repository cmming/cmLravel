<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;

class NoticeController extends Controller
{
    //
	public function index(){
		$notices = \Auth::user()->notices()->orderBy('created_at','desc')->paginate(2);
		return view('notice/index',compact(['notices']));
	}
}
