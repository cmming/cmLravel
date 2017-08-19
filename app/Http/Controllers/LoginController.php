<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //页面的渲染
	public function index()
	{
		if(\Auth::check()) {
			return redirect("/posts");
		}

		return view("login/index");
	}
}
