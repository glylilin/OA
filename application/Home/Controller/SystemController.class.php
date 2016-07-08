<?php
namespace Home\Controller;
use Think\Controller;
class SystemController extends BaseController {
   	public function index(){
   		$groupModel = M('group');
   		$adminModel = M("Admin");
   		$groupInfo = $groupModel->order('groupid asc')->select();
   		$adminInfo = $adminModel->field('groupid')->order("adminid asc")->select();
   		foreach ($groupInfo as $key => $value) {
   				foreach ($adminInfo as $k => $v) {
   					if($value['groupid'] == $v['groupid']){
   						$groupInfo[$key]['children']++;
   					}
   				}
   		}
   		$this->assign('data',$groupInfo);
         $this->assign("adminname",$_SESSION['OA']['adminname']);
   		$this->display();
   	}
   	/**
   	*权限添加
   	*/
   	public function addAuth(){
   		$authModel = M('auth');
   		if($_POST){
   			extract($_POST);
   			$info = fin($info);
   			if(empty($info['auth_name']) || empty($info['controll_name']) || empty($info['action_name'])){
   				$this->error("必填项不能为空");
   			}else{
              $fcache =  $authModel->where(array('controll_name'=>$info['controll_name'],'action_name'=>$info['action_name']))->find();
              if($fcache){
               $this->error("该权限已录入");
              }else{
               if(!$authModel->add($info)){
                  $this->error("权限录入失败");
               }
              }
   				
   			}

   		}
         $authInfo = $authModel->order("aid asc")->select();
         $totalInfo = $authModel->field("aid,auth_name,controll_name,action_name")->order("aid asc")->group("controll_name")->select();
         foreach ($totalInfo as $key => $value) {
            foreach ($authInfo as $k => $v) {
              if($value['controll_name'] == $v['controll_name']){
                  $totalInfo[$key]['list'][] = $v;
              }
            }
         }

         $this->assign('data',$totalInfo);
   		$this->display();
   	}
      /**
      *添加分组
      */
      public function addGroup(){

         if($_POST){
            $groupModel = M('group');
            $info = fin($_POST['info']);
            if(!$info['groupname']){
               $this->error("分组名称必填");
            }else{
               if($groupModel->add($info)){
                  $this->success("分组添加成功",U('System/index'));
               }else{
                  $this->error("分组添加失败");
               }
            }
         }
         $this->display();
      }
      /**
      *授权
      */
      public function fillAuth(){
         $authModel = M('auth');
         $groupModel = M('group');
         $groupid = $_REQUEST['groupid'] ? intval($_REQUEST['groupid']) : 0;
         $groupInfo = $groupModel->where(array('groupid'=>$groupid))->find();
         if(!$groupInfo){
             $this->error("该分组不存在");
         }
         if($_POST){
            extract($_POST);
            if(empty($info['auth'])){
               $this->error("请选择权限");
            }else{
               $authids = implode(",", $info['auth']);
               $cacheAuthInfo = $authModel->field("controll_name,action_name,aid")->where('aid in ('.$authids.')')->order("aid asc")->select();
               if($cacheAuthInfo){
                 $controllInfo =  $authModel->field("controll_name,auth_name")->where('aid in ('.$authids.')')->order("aid asc")->select();
                 $finAuthInfo = array();
                 foreach ($controllInfo as $key => $value) {
                  $finAuthInfo[$value['controll_name']]['title']=addslashes(trim($value['auth_name']));
                     foreach ($cacheAuthInfo as $k => $v) {
                        if($value['controll_name']=$v['controll_name']){
                           $finAuthInfo[$value['controll_name']][$v['action_name']]=addslashes(trim($v['aid']));
                        }
                     }
                 }
                 $finAuthInfo = serialize($finAuthInfo);
                 $groupModel->where(array('groupid'=>$groupid))->save(array('groupauth'=>$finAuthInfo));
                 $this->success("授权成功",U('System/index'));
               }else{
                   $this->error("权限不存在");
               }
            }
            
         }
         $authInfo = $authModel->order("aid asc")->select();
         $totalInfo = $authModel->field("aid,auth_name,controll_name,action_name")->order("aid asc")->group("controll_name")->select();
         foreach ($totalInfo as $key => $value) {
            foreach ($authInfo as $k => $v) {
              if($value['controll_name'] == $v['controll_name']){
                  $totalInfo[$key]['list'][] = $v;
              }
            }
         }
         $groupInfo['groupauth'] = unserialize($groupInfo['groupauth']);
        $this->assign('groupInfo',$groupInfo);
        
      
         $this->assign('auth_list',$totalInfo);
         $this->display();
      }

      /**
      *组群成员
      */
      public function groupingMember(){
         $groupModel = M('group');
         $groupid = $_GET['groupid'] ? intval($_GET['groupid']) : 0;
         $groupInfo = $groupModel->where(array('groupid'=>$groupid))->find();
         if(!$groupInfo){
             $this->error("该分组不存在");
         }else{
            $adminModel = M("Admin");
            $data =  $adminModel->where(array('groupid'=>$groupid))->order('adminid asc')->select();
            $this->assign('groupInfo',$groupInfo);
            $this->assign("data",$data);
         }
         $this->display();
      }
         /**
         *删除组
         */
       public function delGrouping(){
         $groupModel = M('group');
         $groupid = $_GET['groupid'] ? intval($_GET['groupid']) : 0;
         $groupInfo = $groupModel->where(array('groupid'=>$groupid))->find();
         if(!$groupInfo){
             $this->error("该分组不存在");
         }
         $adminModel = M("Admin");
         $data =  $adminModel->where(array('groupid'=>$groupid))->order('adminid asc')->select();
         if($data){
            $this->error("该分组下存在成员，不能删除");
         }
         if($groupModel->where(array('groupid'=>$groupid))->delete()){
            $this->success("分组删除成功",U('System/index'));
         }else{
             $this->error("该分组删除失败，不能删除");
         }
       }
       /**
       *权限更新
       */
       public function flushAuth(){
        $filePath = "./Public/fileCache";
        if(file_exists($filePath) && is_dir($filePath)){
            if($handle = opendir($filePath)){
              while (($dir = readdir($handle)) !== false) {
                  if($dir !="." && $dir !=".."){
                    unlink($filePath."/".$dir);
                  }
              }
            }

        }
         $this->success("权限刷新成功",U('System/index'));
       }
}