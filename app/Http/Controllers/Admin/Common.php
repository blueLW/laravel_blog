<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class Common extends Controller
{
    //退出
	public function logout(){
		session()->forget('loging');
		return redirect('admin');
	}
}
