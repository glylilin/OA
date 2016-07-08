<?php
namespace Home\Controller;
use Think\Controller;
class FileController extends Controller {
    
    public  function uploadImg(){
        $savePath = "uploads/";
        if (!file_exists("./Public/".$savePath)) {
            mk_dir($savePath,0777);
        }
        if(!empty($_FILES)){
            $current_file = current($_FILES);  //判断是图片还是其他文件doc、docx、txt、pdf、rar、zip、png、jpg、gif
            if (!in_array(strtolower(strrchr($current_file['name'], '.')), array('.png','.jpg','.jpeg'))) {
                $result['status']=false;
                $result['msg'] = "文件类型错误";
            }else{
                import("Think.Upload");
                $upload = new \Think\Upload();
                $upload->maxSize  = 3145728 ;
                $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath="./Public/";
                $upload->savePath =   $savePath;
                 $info = $upload->upload();
              
                if(!$info['file']) {
                    $result['status']=false;
                    $result['msg'] =  $upload->getError();
                }else{
                   
                    $result['status']=true;
                    $result['realpath'] = $info['file']['savepath'].$info['file']['savename'];
                    $result['filename'] = "Public/".$info['file']['savepath'].$info['file']['savename'];
                }
                 
    
            }
        }else{
            $result['status']=false;
            $result['msg'] = "文件不存在";
        }
        echo json_encode($result);exit();
    }
}