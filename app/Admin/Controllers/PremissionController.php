<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 16:05
 */

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Admin\Controllers\Controller;
use App\AdminUser;
use App\AdminPremission;

class PremissionController extends Controller
{
	//权限列表页面
	public function index(){
		//获取所有的权限 列表数据
		$premissions = AdminPremission::paginate(10);
		return view('admin/premission/index',compact(['premissions']));
	}
	//创建权限的页面
	public function create(){
		return view('admin/premission/create');
	}
	//创建权限的行为
	public function store(){
		$this->validate(request(),[
				'name'=>'required|min:3',
				'desc'=>'required'
		]);
		//保存数据
		AdminPremission::create(request(['name','desc']));

		return redirect('admin/premissions');
	}
	//修改的页面
	public function edit(AdminPremission $Premission){
		//将这个权限对象传递给页面
		return view('admin/premission/create',compact(['Premission']));
	}
	//修改一个权限的描述
	public function editStore(AdminPremission $Premission){
		$this->validate(request(),[
				'name'=>'required|min:3',
				'desc'=>'required'
		]);
		//保存数据
//		dd(request(['name','desc']));
		$Premission->update(request(['name','desc']));

		return redirect('admin/premissions');
	}
}