<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Crypt;
class CheckUser extends Model
{
    //定义表名
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;  //关闭自动更新时间戳

     //check方法验证登录信息
    //$data [array] 保存用户名,和用户密码
    //校验成功返回,将用户信息保存在session中并返回 true 失败返回 false
    public function check($data){
    	$info = self::where('username',$data['username'])->first();
    	$savePass = Crypt::decrypt($info->password);
    	if ($data['password']!==$savePass) return false;

    	//保存登录人信息,并返回true;
    	$loging = array(
    		'username'=>$info->username,
    		'userid'=>$info->user_id,
    		'logintime'=>time(),
    	);
    	session(['loging'=>$loging]);  //保存session
    	return true;
    }
}	
