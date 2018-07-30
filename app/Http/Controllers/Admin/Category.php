<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Model\Category as CateModel;

class Category extends Common
{
    //  GET  /category  category.index 获取全部分类
   public function index(){
   	$categorys = (new CateModel)->cateTree();
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

   //更新排序
   public function changeOrder(Request $request){
   		if($request->isMethod('post')){
   			$res = (new CateModel)->updateOrder($request->all());
   			if($res){
   				$data=[
   					'status'=>1,
   					'msg'=>'修改成功!'
   				];
   				return $data;
   			}
   		}
   		$data = [
   			'status'=>0,
   			'msg'=>'修改失败!'
   		];
   		return $data;
   }




}
