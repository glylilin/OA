<?php
namespace Home\Controller;
use Think\Controller;
class BenchController extends BaseController {
	public function index(){
		$p = $_GET['p'] ? intval($_GET['p']) : 1;
		$ordersModel = M("Orders");
		$starttime = $_GET['starttime'] ? strtotime(trim($_GET['starttime']).'-01 00:00:01') : strtotime(date('Y-m',time()).'-01 00:00:01');
		$endtime = strtotime('+ 1 month',$starttime);
		
		$totalInfo = $ordersModel->field("sum(saleprice) as sp,sum(income) as inc,sum(commission) as cis")->where('ordertime >='.$starttime." and ordertime<=".$endtime)->find();
		$count = $ordersModel->where('ordertime >='.$starttime." and ordertime<=".$endtime)->order('ordertime asc')->count();
		$limit = (($p-1)*C('pageSize')).",".C('pageSize');
		$orderInfo = $ordersModel->where('ordertime >='.$starttime." and ordertime<=".$endtime)->order('ordertime asc')->limit($limit)->select();
		foreach ($orderInfo as $key => $value) {
			$orderInfo[$key]['ordertime'] = date('Y-m-d',$value['ordertime']);
		}
		$orderInfo = $this->dealTimeTree($orderInfo);
		$pageInfo =mulitpages($p,$count,C("pageSize"));
		$this->assign('orderInfo',$orderInfo);
		$this->assign("pageInfo",$pageInfo);
		$this->assign("totalInfo",$totalInfo);
		$this->assign('nowMonth',date('Y-m',$starttime));
		$this->assign('p',$p);
		$this->display();
	}

	public function dealTimeTree($data){
		$cacheData = array();
		foreach ($data as $key => $value) {
			if(!in_array($value['ordertime'], $cacheData)){
				$cacheData[] = $value['ordertime'];
			}
		}
		$resData = array();
		foreach ($data as $key => $value) {
			foreach ($cacheData as $k => $v) {
				if($value['ordertime'] == $v){
					$resData[$v]['list'][] = $value;
				}
			}
		}
		foreach ($resData as $key => $value) {
			$resData[$key]['list'][0]['colspan'] = count($value['list']);
		}
		return $resData;
	}



	public function add(){
		if($_POST){
			$userModel = M("User");
			$ordersModel = M("orders");
			extract($_POST);
			$info = fin($info);
			$info['ordertime'] = time();
			$userInfo = $userModel->where(array('phonenum'=>$info['phonenum']))->find();
			$info['filledid'] = $_SESSION['OA']['adminid'] ? $_SESSION['OA']['adminid'] : 0;
			$info['linetime'] = $info['linetime'] ? strtotime($info['linetime']) : 0;
			$info['filledname'] = $_SESSION['OA']['adminname'];
			$info['remarks2'] = $info['remarks2'] ? serialize($info['remarks2']) : ''; 
			
			if(!$userInfo){//用户不存在
				$userData['username'] = $info['username'];
				$userData['weiname']=$info['weiname'];
				$userData['weino'] = $info['weino'];
				$userData['phonenum'] = $info['phonenum'];
				$userData['dateline'] = time();
				if($info['arrears']){
					$userData['is_arrears']=1;
					$userData['arrprice'] = $info['arrears'];
				}
				if($uid = $userModel->add($userData)){
					$info['uid']=$uid;
					if($ordersModel->add($info)){
						$this->success("添加成功",U("Bench/index"));
					}else{
						$this->error("添加失败");
					}
				}else{
					$this->error("添加失败");
				}
			}else{
				$info['uid']=$userInfo['uid'];
				if($info['arrears']){
					$userData['is_arrears']=1;
					$userData['arrprice'] = $info['arrears']+$userInfo['arrprice'];
				}else if($info['is_balance']){
					if($userInfo['arrprice'] > $info['saleprice']){
						$userData['is_arrears']=1; 
						$userData['arrprice'] = $userInfo['arrprice'] - $info['saleprice'];
					}else{
						$userData['is_arrears']=0; 
						$userData['arrprice'] = 0;
					}
				}
				if($ordersModel->add($info)){
					$userModel->where(array('uid'=>$userInfo['uid']))->save($userData);
					$this->success("添加成功",U("Bench/index"));
				}else{
					$this->error("添加失败");
				}
			}
		

			
		}
		$this->display();
	}

	public function update(){
		extract($_GET);
		$orderid = $orderid ? intval($orderid) : 0;
		$ordersModel = M("orders");
		$userModel = M("User");
		$orderInfo = $ordersModel->where(array('orderid'=>$orderid))->find();
		if(!$orderInfo){
			$this->error("订单不存在");
		}
		if($_POST){
			extract($_POST);
			$info = fin($info);
			$info['linetime'] = $info['linetime'] ? strtotime($info['linetime']) : 0;
			$info['remarks2'] = $info['remarks2'] ? serialize($info['remarks2']) : ''; 
			$userInfo = $userModel->where(array('phonenum'=>$info['phonenum']))->find();
			if($userInfo['uid'] != $info['uid']){
				$this->error("手机号不可修改");
			}else{
				if($info['arrears']){
					$userData['is_arrears']=1;
					$userData['arrprice'] = $info['arrears']-$orderInfo['arrears']+$userInfo['arrprice'];
				}else if($info['is_balance'] > $orderInfo['is_balance'] ){
					if($userInfo['arrprice'] > $info['saleprice']){
						$userData['is_arrears']=1; 
						$userData['arrprice'] = $userInfo['arrprice'] - $info['saleprice'];
					}else{
						$userData['is_arrears']=0; 
						$userData['arrprice'] = 0;
					}
				}else if($info['is_balance'] < $orderInfo['is_balance'] ){
						$userData['is_arrears']=1; 
						$userData['arrprice'] = $userInfo['arrprice'] + $info['saleprice'];
				}

				$ordersModel->where(array('orderid'=>$info['orderid']))->save($info);
				if($userData){
					$userModel->where(array('uid'=>$userInfo['uid']))->save($userData);
				}
				
				$this->success("修改成功",U("Bench/index"));
				
			}
			
		}
		$orderInfo['remarks2'] = unserialize($orderInfo['remarks2']);
		$this->assign('data',$orderInfo);
		$this->display();
	}


	public function dorder(){
		extract($_GET);
		$orderid = $orderid ? intval($orderid) : 0;
		$ordersModel = M("orders");
		$userModel = M("User");
		$orderInfo = $ordersModel->where(array('orderid'=>$orderid))->find();
		if(!$orderInfo){
			$this->error("订单不存在");
		}
		$userInfo = $userModel->where(array('phonenum'=>$info['phonenum']))->find();
		if($orderInfo['arrears']){
			if($userInfo['arrprice'] > $orderInfo['arrears']){
				$userData['is_arrears']=1;
			}else{
				$userData['is_arrears']=0;
			}
			$userData['arrprice'] = $userData['arrprice'] -$orderInfo['arrears'];
		}else if($orderInfo['is_balance']){
			$userData['arrprice'] +=$orderInfo['saleprice'];
			$userData['is_arrears']=1;
		}
		if($ordersModel->where(array('orderid'=>$orderid))->delete()){
			if($userData){
				$userModel->where(array('uid'=>$orderInfo['uid']))->save($userData);
			}
			$this->success("删除成功",U("Bench/index"));
		}else{
			$this->error("删除失败");
		}
	}
}
?>