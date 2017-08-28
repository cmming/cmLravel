<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Admin\Controllers\Controller;
use App\Post;

class HomeController extends Controller
{
	public function index(){
		return view('/admin/home/index');
	}
	public function show(){}
	public function store(){}
}
