<?php
function getRandStr(){
	$str="qwertyuioplkjjhgfdsazxcvbnm";
	$num = rand(0,22);
	return substr($str, $num,4);
}

function nmd5($password,$cutStr){
	return md5(md5($password).$cutStr);
}
/**
*$nowPage当前页数,$totalCell总条数,$pageSize分页数量
*/
function mulitpages($nowPage,$totalCell,$pageSize){
	$totalPage = ceil($totalCell / $pageSize);
	$data['first'] = 1;
	$data['pre'] = ($nowPage ==1) ? "nopre" : ($nowPage-1);
	$data['next'] = ($nowPage ==$totalPage) ? "nonext" : ($nowPage+1);
	$data['end']=$totalPage;
	if($totalPage <= 7){
		for ($i=1; $i <=$totalPage; $i++) { 
			$data['list'][] = $i;
		}
	}else{
		if($nowPage - 3 < 1){
			for ($i=1; $i <5 ; $i++) { 
				$data['list'][] = $i;
			}
			$data['list'][]='…';
			$data['list'][]=$totalPage;
		}else{
			if($nowPage+3 >= $totalPage ){
				$data['list'][]=1;
				$data['list'][]='…';
				for ($i=$totalPage-3; $i <=$totalPage ; $i++) { 
					$data['list'][] = $i;
				}
			}else{
				$data['list'][]=1;
				$data['list'][]='…';
				for ($i=$nowPage-1; $i <=$nowPage+1 ; $i++) { 
					$data['list'][] = $i;
				}
				$data['list'][]='…';
				$data['list'][]=$totalPage;
			}
		}
	}
	return $data;
}

function fin($data){
	foreach ($data as $key => $value) {
		if(is_string($value)){
			$data[$key] = $value ? addslashes(trim($value)) :'';
		}elseif(is_array($value)){
			$data[$key] = fin($value);
		}else{
			$data[$key] =  $value ? trim($value): 0;
		}
	}
	return $data;
}

/**
	*保存文件
	*/
function mkidFileCache($data,$fileCachePath){
		if(!file_exists($fileCachePath)){
			touch($fileCachePath);
		}
		if($data){
			$fileData = "<?php\r\n return array(\r\n";
			foreach ($data as $key => $value) {
				$fileData .="'".$key."'=>array(\r\n";
					foreach ($value as $k => $v) {
						$fileData .="'".$k."'=>'".$v."',\r\n";
					}
				$fileData .="),\r\n";
			}
			$fileData .=");\r\n?>";

			file_put_contents($fileCachePath, $fileData);
		}
	}
?>