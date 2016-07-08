<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends BaseController {
	/**
	*后台会员列表
	*/
   public function index(){
   		$adminModel = M('Admin');
   		$p = $_GET['p'] ? intval($_GET['p']) : 1;
   		$count = $adminModel->table("financial_admin as fa ")->join("financial_group as fg on fa.groupid = fg.groupid")->count();
   		$limit= (($p-1)*C("pageSize")).",".C("pageSize");
   		$adminInfo = $adminModel->table("financial_admin as fa ")->join("financial_group as fg on fa.groupid = fg.groupid")->field("fa.adminame,fa.adminid,fa.nickname,fa.dateline,fa.status,fg.groupname")->order("fa.adminid asc")->limit($limit)->select();
   		$pageInfo =mulitpages($p,$count,C("pageSize"));
   	
   		$this->assign('adminInfo',$adminInfo);
   		$this->assign("pageInfo",$pageInfo);
   		$this->display();
   }

   public function add(){
   	$groupModel = M("Group");
   	$adminModel = M('Admin');
   	$groupList = $groupModel->order("groupid asc")->select();
   	if($_POST){
   		extract($_POST);
   		$info['adminame'] = $info['adminame'] ? addslashes(trim($info['adminame'])) : '';
   		$info['nickname'] = $info['nickname'] ? addslashes(trim($info['nickname'])) : '';
   		$info['password'] = $info['password'] ? addslashes(trim($info['password'])) : '';
   		$info['groupid'] = $info['groupid'] ? intval($info['groupid']) : 0;
   		if(!$info['groupid']){
   			$this->error("分组必须选择");
   		}else if(!$info['adminame'] || !$info['nickname'] || !$info['password']){
   			$this->error("请将基本信息补充完整");
   		}else if($this->checkField('adminame',$info['adminame'])){
   			$this->error("该账号已经存在");
   		}else if($this->checkField('nickname',$info['nickname'])){
   			$this->error("该昵称已经存在");
   		}else{
   			$info['cutstr'] = getRandStr();
   			$info['password'] = nmd5($info['password'],$info['cutstr']);
   			$info['dateline'] = time();
   			if($adminModel->add($info)){
   				$this->success("添加成功",U("User/index"));
   			}else{
   				$this->error("添加失败");
   			}
   		}

   	}
   	$this->assign("groupList",$groupList);
   	$this->display();
   }

   public function checkajax(){
   		$res['status'] = true;
   		if($_POST){
   			extract($_POST);
   			$res['status'] = $this->checkField($field,$value);
   		}
   		echo json_encode($res);
   		exit();
   }
   /*
   *根据字段判断用户是否存在
   */
   public function checkField($field,$value){
   		$adminModel = M('Admin');
   		$value=addslashes(trim($value));
   		$data =  $adminModel->where(array($field=>$value))->find();
   		return $data ? true : false;
   }
   /**
   *权限修改
   */
   public function update(){
      $adminid = $_GET['adminid'] ? intval($_GET['adminid']) : 0;
      $groupModel = M("Group");
      $adminModel = M('Admin');
      $groupList = $groupModel->order("groupid asc")->select();
      $adminInfo = $adminModel->where(array('adminid'=>$adminid))->find();
      if(!$adminInfo){
         $this->error("该管理员不存在");
      }
      if($_POST){
         extract($_POST);

         $info['adminame'] = $info['adminame'] ? addslashes(trim($info['adminame'])) : '';
         $info['nickname'] = $info['nickname'] ? addslashes(trim($info['nickname'])) : '';
         $info['password'] = $info['password'] ? addslashes(trim($info['password'])) : '';
         $info['groupid'] = $info['groupid'] ? intval($info['groupid']) : 0;
         if(!$info['groupid']){
            $this->error("分组必须选择");
         }else if(!$info['adminame'] || !$info['nickname']){
            $this->error("请将基本信息补充完整");
         }else{
            if($info['password']){
               $info['cutstr'] = getRandStr();
               $info['password'] = nmd5($info['password'],$info['cutstr']);
            }
            
      
            $adminModel->where(array('adminid'=>$info['adminid']))->save($info);
            $this->success("添加成功",U("User/index"));
           
         }
      }
      $cache = $groupModel->field('groupname')->where(array('groupid'=>$adminInfo['groupid']))->find();
      $adminInfo['groupname'] = $cache['groupname'];
      $this->assign('groupList',$groupList);
      $this->assign('data',$adminInfo);
      $this->display();
   }

   public function dadmin(){
      extract($_GET);
      $adminid  = $adminid ? intval($adminid) : 0;
      $adminModel = M('Admin');
      if($adminModel->where(array('adminid'=>$adminid))->delete()){
          $this->success("删除成功");
      }else{
          $this->error("添加失败");
      }
   }
}