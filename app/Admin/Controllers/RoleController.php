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
		$formParams = [
				'isEdit'=>false,
				'method'=>'post',
				'url'=>'/admin/roles/store',
				'title'=>'增加角色'
		];
		return view('admin/role/create',compact(['formParams']));
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
	//用户信息修改的 渲染页面
	public function editRole(AdminRole $role){
		$formParams = [
				'isEdit'=>true,
				'method'=>'post',
				'url'=>'/admin/roles/'.$role->id.'/edit',
				'params'=>$role,
				'title'=>'修改用户信息'
		];
		return view('/admin/role/create',compact(['formParams']));
	}
	//修改用户的信息 提交页面
	public function editRoleStore(AdminRole $role){
		$this->validate(request(),[
				'name'=>'required|min:3|unique:users,name',
				'desc'=>'required|min:5'
		]);
		$password = bcrypt(request('password'));
		$name = request('name');
		$desc = request('desc');
		$role->update(compact('name', 'desc'));
		return redirect('/admin/roles');
	}

}