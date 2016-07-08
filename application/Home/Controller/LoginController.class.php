<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
   public function login(){
		$AdminModel = M("Admin"); 

		if($_POST){
				extract($_POST);
				$username = $username ? addslashes(trim($username)) : "" ;
				$password = $password ? addslashes(trim($password)) : '';
				if(empty($username) || empty($password)){
					$this->error('用户名或密码不能为空');
				}

				if($username == C('developer') && $password == C("developerpwd")){
					$_SESSION['OA']['adminname']=C('developer');
					$_SESSION['OA']['nickname']="开发者";
					$_SESSION['OA']['auth']="all";
					$this->success('登录成功', U('Index/index'));;
				}else{
					$loginInfo = $AdminModel->where(array('adminname'=>$username))->find();
					$password = md5(md5($password).$loginInfo['cutstr']);
					if($loginInfo['password'] == $password){
						if($loginInfo['status']){
							$_SESSION['OA']['adminname']=$username;
							$_SESSION['OA']['nickname']=$loginInfo['nickname'];
							$_SESSION['OA']['adminid']=$loginInfo['adminid'];
							$_SESSION['OA']['groupid']=$loginInfo['groupid'];
							$this->success('登录成功', U('Index/index'));
						}else{
							$this->error("该账号已被禁用");
						}
						

					}else{
						$this->error("登录失败");
					}
				
			}
		}
		
		$this->display();
	}
}