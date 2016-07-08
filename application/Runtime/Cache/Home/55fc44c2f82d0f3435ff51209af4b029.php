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

<!-- MainForm -->
<div id="MainForm">
<script type="text/javascript">
$(function(){
$(".select").each(function(){
var s=$(this);
var z=parseInt(s.css("z-index"));
var dt=$(this).children("dt");
var dd=$(this).children("dd");
var _show=function(){dd.slideDown(200);dt.addClass("cur");s.css("z-index",z+1);};
var _hide=function(){dd.slideUp(200);dt.removeClass("cur");s.css("z-index",z);};
dt.click(function(){dd.is(":hidden")?_show():_hide();});
dd.find("a").click(function(){dt.html($(this).html());_hide();var groupid = $(this).attr('data');if(groupid > 0){$('#groupid').val(groupid);}});
$("body").click(function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});})})
</script>
<div style="width:560px;margin:0px auto;padding-top:10px;">
<div class="form_boxC">
<form method="post" id="subFrom">
<table cellpadding="0" cellspacing="0">
<tr>
<th width="130">分组 <span class="f_cB">*</span></th>
<td><!-- selectbox -->
<div class="selectbox" style="width:400px;">
<dl class="select">
<dt>请选择...</dt>
<dd><ul>
<?php if(is_array($groupList)): foreach($groupList as $key=>$vo): ?><li><a href="#" data="<?php echo ($vo["groupid"]); ?>"><?php echo ($vo["groupname"]); ?></a></li><?php endforeach; endif; ?>
</ul></dd></dl>
</div>
<!-- /selectbox --></td>
</tr>
<tr>
<th>账号</th>
<td><div class="txtbox floatL"><input name="info[adminame]" id="adminame" type="text" size="50" value='' required autofocus ></div></td>
</tr>
<tr>
<th>昵称</th>
<td><div class="txtbox floatL"><input name="info[nickname]" id="nickname" type="text" size="15" value='' required autofocus ></div></td>
</tr>
<tr>
<th>密码</th>
<td><div class="txtbox floatL"><input name="info[password]" id="password" type="text" size="30" value='' required autofocus ></div></td>
</tr>
<tr>
<th>状态</th>
<td><input type="radio" name='info[status]' value="0"> 禁用&nbsp;&nbsp;&nbsp;
<input type="radio" name='info[status]' value="1" checked="checked"> 开启</td>
</tr>
</table>
</div>
</div>
<div style="width:530px;height:36px;margin:0px auto;">
<input type="hidden" name="info[groupid]" id="groupid" value="0">
<div class="btn_boxB floatR mag_l20"><input type="button" value="取消" onmousemove="this.className='input_move'" id="restBtn" onmouseout="this.className='input_out'"></div>
<div class="btn_box floatR"><input type="button" value="提交" onmousemove="this.className='input_move'" id="submitBtn" onmouseout="this.className='input_out'"></div>
</div>
</form>
</div>
<script type="text/javascript" src="./Public/JS/popwin.js"></script>
<script>
$(document).ready(function() {
	$('#adminame').blur(function(){
		var adminame = $(this).val();
		if(adminame == ''){
			return;
		}
		var url="<?php echo U('User/checkajax');?>";
		$.ajax({
			url:url,
			type:"POST",
			data:{field:"adminame",value:adminame},
			dataType:"JOSN",
			success:function(mes){
				if(mes.status){
					popWin.showWin("400","230","提示信息","该账号已被使用");
					$('#adminame').val('');
					return;
				}
			}
		});
	});

$('#nickname').blur(function(){
		var nickname = $(this).val();
		if(nickname == ''){
			return;
		}
		var url="<?php echo U('User/checkajax');?>";
		$.ajax({
			url:url,
			type:"POST",
			data:{field:"nickname",value:nickname},
			dataType:"JOSN",
			success:function(mes){
				if(mes.status){
					popWin.showWin("400","230","提示信息","该昵称已被使用");
					$('#nickname').val('');
					return;
				}
			}
		});
	});

$("#submitBtn").click(function(){
	var groupid = $('#groupid').val();
	var adminame = $('#adminame').val();
	var nickname = $('#nickname').val();
	var password = $('#password').val();
	if(groupid == 0){
		popWin.showWin("400","230","提示信息","分类必须选择");
		return;
	}
	if(adminame == '' || nickname =='' || password == ''){
		popWin.showWin("400","230","提示信息","请将信息填写完整");
		return;
	}
	$('#subFrom').submit();
});
});
$('#restBtn').click(function(){
	$('#groupid').val(0);
	$('#adminame').val('');
	$('#nickname').val('');
	$('#password').val('');
	$('.select').children('dt').html('请选择...');
});
</script>
<!-- /MainForm -->
<!-- /footer -->
<footer>
<address>电子邮箱：sales@haiersoft.com  技术支持：人单合一平台项目组<br>青岛海尔软件有限公司版权所有  Copyright &copy; 2015 Haiersoft Corporation, All Rights.</address>
</footer>
<!-- /footer -->

</div>
<!-- /wrap_right -->
</body>
</html>