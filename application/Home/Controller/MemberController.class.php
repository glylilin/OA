<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends BaseController {
	public function index(){
		$UserModel = M("User");
		$p = $_GET['p'] ? intval($_GET['p']) : 1;
		$limit = (($p-1)*C('pageSize')).",".C('pageSize');
		$phonenum = $_GET['phonenum'] ? $_GET['phonenum'] : '';
		if($phonenum){
			$where =array('phonenum' =>$phonenum);
		}
		$count = $UserModel->where($where)->order("uid asc")->count();
		$userInfo = $UserModel->where($where)->limit($limit)->order("uid asc")->select();
		$pageInfo =mulitpages($p,$count,C("pageSize"));
		$this->assign('data',$userInfo);
		$this->assign('phonenum',$phonenum);
		$this->assign("pageInfo",$pageInfo);
		$this->assign('p',$p);
		$this->display();
	}

	public function ordersByUser(){
		extract($_GET);
		$uid = $uid ? intval($uid) : 0;
		$UserModel = M("User");
		$orderModel = M("orders");
		$userInfo = $UserModel->where(array('uid' =>$uid))->find();
		if(!$userInfo){
			$this->error("用户已被删除");
		}
		$orderInfo = $orderModel->where(array('uid'=>$uid,'phonenum'=>$userInfo['phonenum']))->order("orderid asc")->select();
		$userInfo['list'] = $orderInfo;
		$userInfo['colspan'] = count($orderInfo);

		$this->assign('data',$userInfo);
		$this->display();
	}
	/***
	*删除用户
	*/
	public function duser(){
		extract($_GET);
		$uid = $uid ? intval($uid) : 0;
		$UserModel = M("User");
		if($UserModel->where(array('uid' =>$uid))->delete()){
			$this->success("用户删除成功");
		}else{
			$this->error("用户删除失败");
		}
		exit();
	}
}
?>