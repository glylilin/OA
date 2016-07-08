<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
   	public function __construct(){
   		parent::__construct();
		$this->judgeLogin();
		$authJudge = $this->judgeAuth();
		if($authJudge){
			$this->assign('adminame',$_SESSION['OA']['adminname']);
			$this->initAction($authJudge);
			$this->assign('authJudge',$authJudge);
		}else{
			$this->error('该用户组还没有授权',U("Login/login"));
		}
		$this->assign("controllname",CONTROLLER_NAME);
	}
	/**
	*判断是否登录
	*/
	public function judgeLogin(){
		if(empty($_SESSION['OA'])){
			$this->redirect("Login/login");
		}
	}
	/**
	*判断权限判断
	*/
	public function judgeAuth(){

		$adminame = $_SESSION['OA']['adminname'];
		$fileCachePath = "./Public/fileCache/auth_";
		$authJudge = array();
		switch ($adminame) {
			case C('developer'):
				$fileCachePath.=C('developer').".cache.php";
				if(file_exists($fileCachePath)){
					$authJudge  = require_once ($fileCachePath);
				}else{
					$authModel = M("Auth");
					$authInfo = $authModel->order("aid asc")->select();
					$controllInfo =  $authModel->field("controll_name,auth_name")->order("aid asc")->select();
                 	$finAuthInfo = array();
                 	foreach ($controllInfo as $key => $value) {
                  		$finAuthInfo[$value['controll_name']]['title']=addslashes(trim($value['auth_name']));
                     		foreach ($authInfo as $k => $v) {
                        		if($value['controll_name']=$v['controll_name']){
                           			$finAuthInfo[$value['controll_name']][$v['action_name']]=addslashes(trim($v['aid']));
                        		}
                     		}
                 	}
                 	
            		$authJudge = $finAuthInfo;
            		mkidFileCache($finAuthInfo,$fileCachePath);
				}
				break;
			default:
				$fileCachePath.=$_SESSION['OA']['groupid'].".cache.php";
				if(file_exists($fileCachePath)){
					$authJudge  = require_once ($fileCachePath);
				}else{
					$groupModel = M("Group");
					$cacheGroupAuth = $groupModel->field('groupauth')->where(array('groupid'=>$_SESSION['OA']['groupid']))->find();
					if(empty($cacheGroupAuth)){
						$this->error('该用户组还没有授权',U("Login/login"));
					}else{
						$cacheGroupAuth['groupauth'] = unserialize($cacheGroupAuth['groupauth']);
						$authJudge = $cacheGroupAuth['groupauth'];
						mkidFileCache($cacheGroupAuth['groupauth'],$fileCachePath);
					}

				}
				break;
		}
		
		return $authJudge;	
	}
	
	public function initAction($authJudge){
		if(!$authJudge[CONTROLLER_NAME][ACTION_NAME] && CONTROLLER_NAME != "Index"){
			$this->error("你没有该操作权限");
		}
	}
}