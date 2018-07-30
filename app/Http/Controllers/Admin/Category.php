<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Model\Category as CateModel;

class Category extends Common
{
    //  GET  /category  category.index 获取全部分类
   public function index(){
   	$categorys = CateModel::all();
	return view('admin.category.index')->with('data',$categorys);
   }

   // GET   /category/create  category.create 添加分类
   public function create(){

   	echo 'creaate';

   }

   // POST /category  category.store 
   public function store(){


   }

   //  GET /category/{} category.show 显示单个分类
   public function show(){

   }

   // GET /category/{}/edit category.edit 编辑分类
   public function edit(){

   }

   // PUT /category/{} category.update 更新
   public function update(){

   }

   // DELETE /category/{} category.destory 删除
   public function destory(){

   }


}
