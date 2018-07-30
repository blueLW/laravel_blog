<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;

    /* 获取分类树
    *  $pid [int]    父ID
    *  return [arr]  数据集合
    */
    public function cateTree($pid=0){
    	$cates = self::orderBy('cate_order','desc')->get();
    	$data = $this->getTree($cates,'cate_name','cate_id','cate_pid',$pid);
    	return $data;
    }

    /* 组合树形数据
    *  $data [arr]  分类数据
    *  $filed_name [string] 返回结果中,设置的字段名
    *  $filed_id   [string] 分类ID字段名(默认为,id)
    *  $filed_pid  [string] 分类pid字段名(默认为,pid)
    *  $pid        [int]    父id(默认,0)
    *  return $data [arr]   返回树形数据集
    */
    public function getTree($data,$filed_name,$filed_id='id',$filed_pid='pid',$pid=0,$level=0)
    {
    	static $cateArr = [];
    	foreach($data as $k=>$v){
    		if ($v->cate_pid==$pid){
    			if($level>0){
    				$prifex = '├';
	    			for($i=0;$i<$level;$i++){
	    				$prifex .= '─';
	    			}
	    			$v['_'.$filed_name] = $prifex.$v[$filed_name];

	    		}else{
	    			$v['_'.$filed_name] = $v[$filed_name];
	    		}
    			$cateArr[] = $v;
    			$this->getTree($data,$filed_name,$filed_id,$filed_pid,$v->cate_id,$level+1);
    		}
    	}
    	return $cateArr;
    }

    //更新order->
    public function updateOrder($data){
    	$order = self::find($data['id']);
    	$order->cate_order = $data['value'];
    	if($order->update()){
    		return true;
    	}else{
    		return false;
    	}
    }
    
}
