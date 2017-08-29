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
use App\AdminRole;
use App\AdminPremission;

class RoleController extends Controller
{
	//角色列表
	public function index(){
		//所有的角色
		$roles = AdminRole::paginate(10);
		return view('admin/role/index',compact(['roles']));
	}
	//创建角色页面
	public function create(){
		return view('admin/role/create');
	}
	//创建角色的行为
	public function store(){
		$this->validate(request(),[
			'name'=>'required|min:3',
			'desc'=>'required'
		]);
		//保存数据
		AdminRole::create(request(['name','desc']));
		return redirect('/admin/roles');
	}
	//角色与权限的关系页面
	public function premission(AdminRole $role){
	    //所有的权限
        $AdminPremissions = AdminPremission::all();
        //角色拥有的权限
        $rolePremissions = $role->premissions;
//        dd($rolePremissions);
		return view('admin/role/premission',compact(['AdminPremissions','role','rolePremissions']));
	}
	//储存 角色与权限的行为
	public function premissionStore(AdminRole $role){
	    $this->validate(request(),[
	        'permissions'=>'required|array',
        ]);
	    //已经拥有的权限
        $myPresisons = $role->premissions;
        //选中的 权限
        $premissions = AdminPremission::findMany(request('permissions'));
//        dd($premissions);
        //获取添加的权限
        $addPremissions = $premissions->diff($myPresisons);
        foreach ($addPremissions as $addPremission){
            $role->grantPremission($addPremission);
        }
        //获取删除的权限
        $deletePremissions = $myPresisons->diff($premissions);
        foreach ($deletePremissions as $deletePremission){
            $role->deletePremission($deletePremission);
        }
        return redirect('/admin/roles');
        //获取删除的权限
    }

}