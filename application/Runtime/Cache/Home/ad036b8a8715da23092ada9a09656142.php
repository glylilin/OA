<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="generator" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<link href="./Public/CSS/haiersoft.css" rel="stylesheet" type="text/css" media="screen,print" />
<link href="./Public/CSS/print.css" rel="stylesheet" type="text/css"  media="print" />
<script src="./Public/JS/jquery-1.10.1.min.js"></script>
<script src="./Public/JS/side.js" type="text/javascript"></script>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body>

<!-- wrap_right -->
<div class="wrap_right">
<header>
<!-- Header -->
<div id="Header">
<!-- Head -->
<div id="Head">
<h1 title="浪迹教育一订单管理"><img src="./Public/IMG/common/page_ttl.gif" width="398" height="26" alt="浪迹教育一订单管理"></h1>
<script language="javascript">
function showmenu(id){id.style.visibility = "visible";}
function hidmenu(){UserList.style.visibility = "hidden";}
document.onclick = hidmenu;
</script>
<div class="user"><a href="javascript:showmenu(UserList)"><?php echo ($adminame); ?></a>
<div id="UserList">
<?php if($authJudge['System']['flushAuth']): ?><a href="<?php echo U('System/flushAuth');?>">权限更新</a><?php endif; ?>
<a href="<?php echo U('Index/logout');?>">用户退出</a></div>
</div>
</div>
<!-- /Head -->
<nav>
<ul id="Navi">
<li <?php if($controllname == 'Index'): ?>class="active"<?php endif; ?>><a  href="<?php echo U('Index/index');?>"><img src="./Public/IMG/common/navi01.png" width="30" height="36" alt="主页管理"><span>主页管理</span></a></li>
<?php if($authJudge['Bench']['index']): ?><li <?php if($controllname == 'Bench'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Bench/index');?>"><img src="./Public/IMG/common/navi04.png" width="34" height="36" alt="基础数据"><span>基础数据</span></a></li><?php endif; ?>
<?php if($authJudge['Member']['index']): ?><li <?php if($controllname == 'Member'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Member/index');?>"><img src="./Public/IMG/common/navi08.png" width="34" height="36" alt="订单会员"><span>订单会员</span></a></li><?php endif; ?>
<!-- <li><a href=""><img src="./Public/IMG/common/navi03.png" width="26" height="36" alt="合同信息"><span>合同信息</span></a></li>
<li><a href=""><img src="./Public/IMG/common/navi05.png" width="24" height="36" alt="预算管理"><span>预算管理</span></a></li>
<li><a href=""><img src="./Public/IMG/common/navi06.png" width="36" height="36" alt="项目管理"><span>项目管理</span></a></li> -->
<?php if($authJudge['User']['index']): ?><li <?php if($controllname == 'User'): ?>class="active"<?php endif; ?>><a href="<?php echo U('User/index');?>"><img src="./Public/IMG/common/navi07.png" width="34" height="36" alt="会员管理"><span>管理员管理</span></a></li><?php endif; ?>
<?php if($authJudge['System']['index']): ?><li <?php if($controllname == 'System'): ?>class="active"<?php endif; ?>><a href="<?php echo U('System/index');?>"><img src="./Public/IMG/common/navi02.png" width="36" height="36" alt="系统管理"><span>系统管理</span></a></li><?php endif; ?>
</ul>
</nav>
</div>
</header>

<script type="text/javascript" src="./Public/JS/wdatePicker/WdatePicker.js"></script>
<style>
.input{display: block;width: 100%;margin-top: 0px 10px;}
#auth_list{margin:0px auto;min-height:100px;background:#fff;margin-bottom: 10px;margin-top: 10px;}
#auth_list h2{text-indent: 2em;height: 30px;line-height: 30px;color:green;}
.auth_dl{float:left; margin: 20px 50px;font-size: 18px;border: 1px dashed #D8BFD8;padding:6px 10px;background:#E6E6FA; }
.auth_detail{text-indent: 2em;height: 28px;line-height: 28px;}
.selectAuth{margin-right: 6px;}
#subBtn{margin:0px auto;display: block;width: 80px;}
.clear{zoom:1;}
.clear:after{
	display: block;content: "";clear: both;
}
</style>
<div id="Popup">

<form method="POST">
<div style="width:80%;margin:0px auto;">

<!-- SubPopup -->
<div id="auth_list" class='clear'>
	<h2><?php echo ($groupInfo["groupname"]); ?>授权</h2>
	<?php if(is_array($auth_list)): foreach($auth_list as $key=>$vo): ?><dl class="auth_dl">
		<dt>
			<input type="checkbox" name="info[auth][]" value="<?php echo ($vo["aid"]); ?>" <?php if($groupInfo['groupauth'][$vo['controll_name']][$vo['action_name']]): ?>checked="checked"<?php endif; ?> class="selectAuth" data="1"/><?php echo ($vo["auth_name"]); ?>
		</dt>
		<?php if(is_array($vo["list"])): foreach($vo["list"] as $key=>$id): if($vo['action_name'] != $id['action_name']): ?><dd class="auth_detail"><input type="checkbox" name="info[auth][]" value="<?php echo ($id["aid"]); ?>" <?php if($groupInfo['groupauth'][$id['controll_name']][$id['action_name']]): ?>checked="checked"<?php endif; ?> class="selectAuth" data='2'/><?php echo ($id["auth_name"]); ?></dd><?php endif; endforeach; endif; ?>
		
	</dl><?php endforeach; endif; ?>
</div>
<div id="SubPopup">
<div class="form_boxC">
<div class="btn_box">
	<input type='hidden' name="groupid" value="<?php echo ($groupInfo["groupid"]); ?>"/>
	<input name="" type="submit" value="提交" id="subBtn" onmousemove="this.className='input_move'" onmouseout="this.className='input_out'">
</div>
</div>
</div>
</div>
</form>
</div>

<script type="text/javascript" src="./Public/JS/popwin.js"></script>
<script type="text/javascript">
$('.selectAuth').click(function(){
	var cflag = $(this).prop("checked");
	var flag = $(this).attr('data');
	console.log(cflag);
	switch(flag){
		case "1":
		if(cflag == false){
$(this).parents(".auth_dl").find('.auth_detail').find('.selectAuth').prop('checked',cflag);
		}
		
		break;
		case "2":
			if(cflag == true){
				$(this).parents(".auth_dl").find('dt').find('.selectAuth').prop('checked',cflag);
			}
		break;
	}
});
</script>
<!-- /footer -->
<footer>
<address>电子邮箱：sales@haiersoft.com  技术支持：人单合一平台项目组<br>青岛海尔软件有限公司版权所有  Copyright &copy; 2015 Haiersoft Corporation, All Rights.</address>
</footer>
<!-- /footer -->

</div>
<!-- /wrap_right -->
</body>
</html>