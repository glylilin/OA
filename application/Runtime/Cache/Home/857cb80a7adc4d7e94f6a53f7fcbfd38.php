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

<div style='height:745px;background:#fff;'>
</div>
<!-- /footer -->
<footer>
<address>电子邮箱：sales@haiersoft.com  技术支持：人单合一平台项目组<br>青岛海尔软件有限公司版权所有  Copyright &copy; 2015 Haiersoft Corporation, All Rights.</address>
</footer>
<!-- /footer -->

</div>
<!-- /wrap_right -->
</body>
</html>