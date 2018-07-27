<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Model\CheckUser;

class Admin extends Common
{
    //index模块
    public function index(){
    	return view('admin.index');
    	//return view('welcome',['msg'=>'❤️']); 测试
    }

    //info模块
    public function info(){

    	return view('admin.info');
    }

    //修改密码
    public function pass(Request $request){

    	if($request->isMethod('post')){

    		$this->input = $request->all();
    		//数据验证
    		$rules = [
    			'password'=>'bail|required|between:6,20|confirmed',
    		];
    		$messages = [
    			'password.required'=>'新密码不能为空!',
    			'password.between'=>'密码长度必须为6~20位!',
    			'password.confirmed'=>'两次输入密码不一致!',
    		];

    		$validator = Validator::make($this->input, $rules, $messages);
    		//$validator->passes();验证是否通过
    		//$validator->fails(); 是否有错误

    		if($validator->passes()){  //验证通过后
    			//在验证后钩子
	    		$validator->after(function($validator){
	    			//更新密码
	    			$model = new CheckUser;
	    			$res = $model->upPass($this->input);
	    			//判断是否有返回的错误
	    			if (is_array($res)){
	    				//把错误添加到错误集中
	        			$validator->errors()->add('field',$res['msg']);
	    			}
				});
			}
			//判读是否有错误
			if($validator->fails()){
				return back()->withErrors($validator);
			}else{
				$url = url('admin/info');
				$arr = [
					'msg'=>'修改成功,点击确定返回首页...',
					'url'=>$url,
				];
				return view('notic.notice')->with($arr);
			}
    	}else{
    		return view('admin.pass');
    	}
    }





}
