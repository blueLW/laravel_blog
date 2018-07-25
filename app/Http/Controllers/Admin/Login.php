<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Model\CheckUser;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
require_once 'resources/org/code/Code.class.php';


class Login extends Common
{
	//显示主页
	public function index(Request $request){
        session('loging')->forget('key');
        //验证是否登录
        if($this->checkLogin()){
            //跳转后台
            return redirect('admin/index');
        }
		return view('admin.login');
	}

    //登录,只接受post请求
    public function login(Request $request){
        //验证是否已经登录
        if($this->checkLogin()){
            return redirect('admin/index'); //跳转管理页面
        }

    	if ($request->isMethod('post')){
    		$data = $request->all();
            //获取验证码
            $code =  Str::lower($this->getCode());  //转换成小写
            if ($code!=Str::lower($data['code'])){
                //返回错误信息
                return back()->withInput()->with('msg','验证码不正确!'); 
            }
            //用户名和密码验证,验证成功保存用户信息在session
            $model = new CheckUser;
            if(!$model->check($data)){
               return back()->withInput()->with('msg','密码或用户名错误!');
            }
    	}
    }

//❤️

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


    //验证是否登录
    private function checkLogin(){
        if(session()->has('loging.username')&&session()->has('loging.userid')){
            return true;
        }else{
            return false;
        }
    }

}
