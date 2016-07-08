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
<!-- Contents -->
<div id="Contents">
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
dd.find("a").click(function(){dt.html($(this).html());_hide();});
$("body").click(function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});})})
</script>
<style type="text/css">
#PageNum li a.act{background-color: #9b9b9b;color: #fff;}
</style>
<!-- BtmMain -->
<div style="height:38px;margin-bottom:10px;">
<div class="txtbox floatL mag_r20">
<span class="sttl">订单时间：</span>
<input name="starttime" type="text" size="16" class="Wdate" id="changeTime" onclick="WdatePicker({dateFmt:'yyyy-MM'})" onchange="changeTime(this);" value="<?php echo ($nowMonth); ?>">
</div>
<!-- /txtbox -->
<?php if($authJudge['Bench']['add']): ?><div class="btn_box floatR mag_l20"><a href="<?php echo U('Bench/add');?>"><input type="button" value="信息录入" onmousemove="this.className='input_move'" onmouseout="this.className='input_out'"></a>
</div><?php endif; ?>
<!-- /btn_box -->
</div>
<!-- /BtmMain -->
<!-- MainForm -->
<div id="MainForm">

<div class="form_boxB">
<h2><?php echo ($nowMonth); ?>月收入列表</h2>
<table cellpadding="0" cellspacing="0">
<tr>
<td colspan="21" class="info_boxA">日期：<?php echo ($nowMonth); ?>　　销售总额：<?php echo (number_format($totalInfo["sp"],2)); ?>元&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;收入总额：<?php echo (number_format($totalInfo["inc"],2)); ?>元&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;提成总额：<?php echo (number_format($totalInfo["cis"],2)); ?>元</td>
</tr>
<tr>
<th>时间</th>
<th>姓名</th>
<th>微信名</th>
<th>微信号</th>
<th>电话</th>
<th>总额</th>
<th>收入</th>
<th>提成</th>
<th>类型</th>
<th>线下时间</th>
<th>欠款</th>
<th>支付</th>
<th>导师</th>
<th>备注</th>
<th>经办人</th>
<th>渠道</th>
<th>学员</th>
<th>书</th>
<th>补余款</th>
<th>填写人</th>
<th>操作</th>
</tr>
<?php if(is_array($orderInfo)): foreach($orderInfo as $key=>$vo): if(is_array($vo["list"])): foreach($vo["list"] as $k=>$id): if($k == 0): ?><tr>
<td rowspan="<?php echo ($id["colspan"]); ?>"><?php echo ($key); ?></td>
<td><?php echo ($id["username"]); ?></td>
<td><?php echo ($id["weiname"]); ?></td>
<td><?php echo ($id["weino"]); ?></td>
<td><?php echo ($id["phonenum"]); ?></td>
<td class="f_cA"><?php echo ($id["saleprice"]); ?></td>
<td class="f_cA"><?php echo ($id["income"]); ?></td>
<td class="f_cA"><?php echo ($id["commission"]); ?></td>
<td><?php echo ($id["ctype"]); ?></td>
<td><?php if($id['linetime'] != 0): echo (date("Y年m月d日",$id["linetime"])); endif; ?></td>
<td><?php echo ($id["arrears"]); ?></td>
<td><?php echo ($id["paymethod"]); ?></td>
<td><?php echo ($id["zteacher"]); ?></td>
<td><?php echo ($id["remarks"]); ?></td>
<td  class="f_cA"><?php echo ($id["dealno"]); ?></td>
<td><?php echo ($id["channels"]); ?></td>
<td><?php if($id['is_student']): ?>是<?php else: ?>否<?php endif; ?></td>
<td><?php if($id['is_book']): ?>是<?php else: ?>否<?php endif; ?></td>
<td><?php if($id['is_balance']): ?>是<?php else: ?>否<?php endif; ?></td>
<td class="f_cA"><?php echo ($id["filledname"]); ?></td>
<td class="last">
	<?php if($authJudge['Bench']['update']): ?><a href="<?php echo U('Bench/update',array('orderid'=>$id['orderid']));?>">修改</a> |<?php endif; ?>
	<?php if($authJudge['Bench']['dorder']): ?><a href="javascript:if(confirm('订单删除后将无法恢复,你确定要删除?')) location.href='<?php echo U('Bench/dorder',array('orderid'=>$id['orderid']));?>'" >删除</a><?php endif; ?>
</td>
</tr>
<?php else: ?>
<tr>

<td><?php echo ($id["username"]); ?></td>
<td><?php echo ($id["weiname"]); ?></td>
<td><?php echo ($id["weino"]); ?></td>
<td><?php echo ($id["phonenum"]); ?></td>
<td class="f_cA"><?php echo ($id["saleprice"]); ?></td>
<td class="f_cA"><?php echo ($id["income"]); ?></td>
<td class="f_cA"><?php echo ($id["commission"]); ?></td>
<td><?php echo ($id["ctype"]); ?></td>
<td><?php if($id['linetime'] != 0): echo (date("Y年m月d日",$id["linetime"])); endif; ?></td>
<td><?php echo ($id["arrears"]); ?></td>
<td><?php echo ($id["paymethod"]); ?></td>
<td><?php echo ($id["zteacher"]); ?></td>
<td><?php echo ($id["remarks"]); ?></td>
<td class="f_cA"><?php echo ($id["dealno"]); ?></td>
<td><?php echo ($id["channels"]); ?></td>
<td><?php if($id['is_student']): ?>是<?php else: ?>否<?php endif; ?></td>
<td><?php if($id['is_book']): ?>是<?php else: ?>否<?php endif; ?></td>
<td><?php if($id['is_balance']): ?>是<?php else: ?>否<?php endif; ?></td>
<td class="f_cA"><?php echo ($id["filledname"]); ?></td>
<td class="last">
	<?php if($authJudge['Bench']['update']): ?><a href="<?php echo U('Bench/update',array('orderid'=>$id['orderid']));?>">修改</a> |<?php endif; ?>
	<?php if($authJudge['Bench']['dorder']): ?><a href="javascript:if(confirm('订单删除后将无法恢复,你确定要删除?')) location.href='<?php echo U('Bench/dorder',array('orderid'=>$id['orderid']));?>'" >删除</a><?php endif; ?>
</td>
</tr><?php endif; endforeach; endif; endforeach; endif; ?>


</table>
<!-- PageNum -->
<ul id="PageNum">
<li><a href="<?php echo U('Bench/index',array('p'=>$pageInfo['first'],'starttime'=>$nowMonth));?>">首页</a></li>
<li><a <?php if($pageInfo['pre'] == 'nopre'): ?>href="javascript:;"<?php else: ?>href="<?php echo U('Bench/index',array('p'=>$pageInfo['pre'],'starttime'=>$nowMonth));?>"<?php endif; ?>>上一页</a></li>
<?php if(is_array($pageInfo["list"])): foreach($pageInfo["list"] as $key=>$vo): if($vo == '…'): ?><li><a href="javascript:;"><?php echo ($vo); ?></a></li>
<?php else: ?>
<li><a <?php if($vo == $p): ?>class="act" href="javascript:;"<?php else: ?>href="<?php echo U('Bench/index',array('p'=>$vo,'starttime'=>$nowMonth));?>"<?php endif; ?>><?php echo ($vo); ?></a></li><?php endif; endforeach; endif; ?>
<li><a <?php if($pageInfo['next'] == 'nonext'): ?>href="javascript:;"<?php else: ?> href="<?php echo U('Bench/index',array('p'=>$pageInfo['next'],'starttime'=>$nowMonth));?>"<?php endif; ?>>下一页</a></li>
<li><a href="<?php echo U('Bench/index',array('p'=>$pageInfo['end'],'starttime'=>$nowMonth));?>">尾页</a></li>
</ul>
<!-- /PageNum -->
</div>
</div>
<!-- /MainForm -->

</div>
<!-- /Contents -->
<script type="text/javascript">
function changeTime(obj){
	var time = $(obj).val();
	window.location.href="<?php echo U('Bench/index');?>&starttime="+time;
}
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