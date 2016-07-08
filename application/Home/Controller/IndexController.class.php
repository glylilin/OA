<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
         $this->display();
    }
   

    public function logout(){
    	$_SESSION["OA"]=array();
    	unset($_SESSION["OA"]);
    	session_destroy();
    	$this->redirect("Login/login");
    }

}