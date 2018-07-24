<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Input;
require_once 'resources/org/code/Code.class.php';

class Login extends Common
{
	//显示主页
	public function index(){
		return view('admin.login');
	}

    //登录()
    public function login(Request $request){
    	if ($request->isMethod('post')) {
    		$data = Input::all();
    		dd($data);
    	}
    }

    //生成验证码
    public function code(){
    	$code = new \code();
    	$code->make();
    }

    //获取验证码
    public function getCode(){
    	$code = new \code();
    	return $code->get();
    }
}
