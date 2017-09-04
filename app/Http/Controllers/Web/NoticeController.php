<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notice;

class NoticeController extends Controller
{
    //
	public function index(){
		$notices = \Auth::user()->notices()->orderBy('created_at','desc')->paginate(2);
		return view('notice/index',compact(['notices']));
	}
}
