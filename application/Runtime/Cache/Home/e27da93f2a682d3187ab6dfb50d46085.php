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
<style type="text/css">
#PageNum li a.act{background-color: #9b9b9b;color: #fff;}
</style>
<div class="txtbox floatL mag_r20" style="margin-left:20px;margin-top:8px;">
<span class="sttl">电话号码：</span>
<input name="sph" type="text" size="20" id="sph"  value="">
</div>
<div id="MainForm">
<div class="form_boxA">
<h2>会员列表</h2>

<table cellpadding="0" cellspacing="0">
<tr>
<th>序号</th>
<th>姓名</th>
<th>微信名</th>
<th>微信号</th>
<th>电话号码</th>
<th>添加时间</th>
<th>是否欠款</th>
<th>欠款金额</th>
<th>操作</th>
</tr>
<?php if(is_array($data)): foreach($data as $k=>$vo): if(($k % 2) == 0): ?><tr class="bgcC">
<td><?php echo ($vo["uid"]); ?></td>
<td><?php echo ($vo["username"]); ?></td>
<td><?php echo ($vo["weiname"]); ?></td>
<td><?php echo ($vo["weino"]); ?></td>
<td><?php echo ($vo["phonenum"]); ?></td>
<td><?php echo (date("Y-m-d H:i",$vo["dateline"])); ?></td>

<td><?php if($vo['is_arrears']): ?><span style="color:red;">是</span><?php else: ?><span style="color:#000;">否</span><?php endif; ?></td>
<td><?php if($vo['arrprice']): ?><span style="color:red;"><?php echo (number_format($vo["arrprice"],2)); ?></span><?php else: ?><span style="color:#000;">0</span><?php endif; ?></td>
<td>
<?php if($authJudge['Member']['ordersByUser']): ?><a href="<?php echo U('Member/ordersByUser',array('uid'=>$vo['uid']));?>">查看详情</a> |<?php endif; ?>
<?php if($authJudge['Member']['duser']): ?><a href="javascript:if(confirm('客户删除后将无法恢复,你确定要删除?')) location.href='<?php echo U('Member/duser',array('uid'=>$vo['uid']));?>'">删除</a><?php endif; ?>
</td>
</tr>
<?php else: ?>
<tr class="bgcD">
<td><?php echo ($vo["uid"]); ?></td>
<td><?php echo ($vo["username"]); ?></td>
<td><?php echo ($vo["weiname"]); ?></td>
<td><?php echo ($vo["weino"]); ?></td>
<td><?php echo ($vo["phonenum"]); ?></td>
<td><?php echo (date("Y-m-d H:i",$vo["dateline"])); ?></td>

<td><?php if($vo['is_arrears']): ?><span style="color:red;">是</span><?php else: ?><span style="color:#000;">否</span><?php endif; ?></td>
<td><?php if($vo['arrprice']): ?><span style="color:red;"><?php echo (number_format($vo["arrprice"],2)); ?></span><?php else: ?><span style="color:#000;">0</span><?php endif; ?></td>
<td>
<?php if($authJudge['Member']['ordersByUser']): ?><a href="<?php echo U('Member/ordersByUser',array('uid'=>$vo['uid']));?>">查看详情</a> |<?php endif; ?>
<?php if($authJudge['Member']['duser']): ?><a href="javascript:if(confirm('客户删除后将无法恢复,你确定要删除?')) location.href='<?php echo U('Member/duser',array('uid'=>$vo['uid']));?>'">删除</a><?php endif; ?>
</td>
</tr><?php endif; endforeach; endif; ?>
</table>

<!-- PageNum -->
<ul id="PageNum">
<li><a href="<?php echo U('Member/index',array('phonenum'=>$phonenum,'p'=>$pageInfo['first']));?>">首页</a></li>
<li><a <?php if($pageInfo['pre'] == 'nopre'): ?>href="javascript:;"<?php else: ?>href="<?php echo U('Member/index',array('phonenum'=>$phonenum,'p'=>$pageInfo['pre']));?>"<?php endif; ?>>上一页</a></li>
<?php if(is_array($pageInfo["list"])): foreach($pageInfo["list"] as $key=>$vo): if($vo == '…'): ?><li><a href="javascript:;"><?php echo ($vo); ?></a></li>
<?php else: ?>
<li><a <?php if($vo == $p): ?>class="act" href="javascript:;"<?php else: ?>href="<?php echo U('Member/index',array('phonenum'=>$phonenum,'p'=>$vo));?>"<?php endif; ?>><?php echo ($vo); ?></a></li><?php endif; endforeach; endif; ?>
<li><a <?php if($pageInfo['next'] == 'nonext'): ?>href="javascript:;"<?php else: ?> href="<?php echo U('Member/index',array('phonenum'=>$phonenum,'p'=>$pageInfo['next']));?>"<?php endif; ?>>下一页</a></li>
<li><a href="<?php echo U('Member/index',array('phonenum'=>$phonenum,'p'=>$pageInfo['end']));?>">尾页</a></li>
</ul>
<!-- /PageNum -->
</div>
</div>
<script type="text/javascript">
$('#sph').blur(function(){
	var phonenum = $(this).val();
	var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(14[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
	if(!myreg.test(phonenum)){
		$(this).attr('placeholder',"电话号码错误");
		$(this).val('');
		return;
	}
	
	window.location.href="<?php echo U('Member/index');?>&phonenum="+phonenum;
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