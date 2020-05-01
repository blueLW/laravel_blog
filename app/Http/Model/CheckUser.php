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
    	$info && $savePass = Crypt::decrypt($info->password);
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

    //更新当前管理员密码
    public function upPass($data){
        $user_id = session()->has('loging.userid') ? session('loging.userid'):false;
        if (!$user_id){
            return false;
        }
        $info = self::find($user_id);
        //校验旧密码
        $saved_pass = Crypt::decrypt($info->password);
        if ($saved_pass!==$data['password_o']){
            return array('msg'=>'旧密码不正确!');
        }else{
            //更新密码
            $info->password = Crypt::encrypt($data['password']);
            if($info->update()){
                return true;
            }
            return array('msg'=>'修改失败,请重试!');
        }        
    }
}	
