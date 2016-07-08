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
<script type="text/javascript" src="./Public/JS/upload/plupload.full.min.js"></script>
<style>
.input{display: block;width: 100%;margin-top: 0px 10px;}
.addportrait{cursor:pointer;diaplay:block;line-hegiht:20px;padding:4px 10px;background:#1fbba6;position:absolute;right:80px;top:140px;color:#fff;border-radius:4px;}
.portrait{float: left;height: 300px;margin-right: 10px;width: 200px;position: relative;}
.portrait img{height: 300px;width: 200px;}
.imgclose{position: absolute;top: 1px;right: 1px;background: black;color: #fff;height: 20px;line-height: 20px;width: 20px;text-align: center;font-size: 14px;cursor: pointer;}
#proce{position:fixed;top:30%;left:25%;z-index:100;border-radius:6px;background:#fff;display:none;}
#proce span{display:block;height:20px;width:600px;border:1px solid green;border-radius:6px;}
#proce p{height:22px;background:green;border-radius:6px;width:0px;}
</style>
<div id="Popup">
<div style="width:60%;margin:0px auto;">
<!-- SubPopup -->
<div id="SubPopup">
<div class="form_boxC">
<p>"<span class="f_cB">*</span>"号为必填项目</p>
<form method='post' id='subForm'>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<th width="100">客户姓名</th>
<td><div class="txtbox floatL" style="width:200px;"><input name="info[username]" type="text" class="input" size="5" value=""></div></td>
<th>微信名 </th>
<td><div class="txtbox floatL" style="width:200px;"><input name="info[weiname]" type="text" size="5" class="input" value=""></div></td>
<th>微信号 </th>
<td><div class="txtbox floatL" style="width:200px;"><input name="info[weino]" type="text" size="5" class="input" value=""></div></td>
</tr>

<tr>
<th>电话号码 <span class="f_cB">*</span></th>
<td><div class="txtbox floatL" style="width:200px;"><input name="info[phonenum]" id="phonenum" type="text" size="5" class="input" value=""></div></td>
<th>销售总额<span class="f_cB">*</span></th>
<td><div class="txtbox floatL" style="width:200px;"><input name="info[saleprice]" id="salephone" type="text" size="5" class="input" value=""></div></td>
<th>收入<span class="f_cB">*</span></th>
<td><div class="txtbox floatL" style="width:200px;"><input name="info[income]" id="income" type="text" size="5" class="input" value=""></div></td>
</tr>

<tr>
<th>提成<span class="f_cB">*</span></th>
<td><div class="txtbox floatL" style="width:200px;"><input name="info[commission]" id="commission" type="text" size="5" class="input" value=""></div></td>
<th>类型<span class="f_cB">*</span></th>
<td><div class="txtbox floatL" style="width:200px;"><input name="info[ctype]" id="ctype" type="text" size="5" class="input" value=""></div></td>
<th>线下时间</th>
<td><div class="txtbox floatL" style="width:200px;"><input name="info[linetime]" type="text" size="5" class="input Wdate" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" value=""></div></td>
</tr>

<tr>
<th>欠款</th>
<td><div class="txtbox floatL" style="width:200px;"><input name="info[arrears]" type="text" size="5" class="input" value=""></div></td>
<th>备注</th>
<td><div class="txtbox floatL" style="width:200px;"><input name="info[remarks]" type="text" size="5" class="input" value=""></div></td>
<th>指导老师</th>
<td><div class="txtbox floatL" style="width:200px;"><input name="info[zteacher]" type="text" size="5" class="input" value=""></div></td>
</tr>

<tr>
<th>经手微信<span class="f_cB">*</span></th>
<td><div class="txtbox floatL" style="width:200px;"><input name="info[dealno]" id='dealno' type="text" size="5" class="input" value=""></div></td>
<th>渠道</th>
<td><div class="txtbox floatL" style="width:200px;"><input name="info[channels]" type="text" size="5" class="input" value=""></div></td>
<th>是否为学员</th>
<td><div class="floatL" style="width:205px;background:#fff;height:38px; border: medium none;font-size: 16px;line-height:38px;"><input name="info[is_student]" type="radio" value="1">是</input><input name="info[is_student]" type="radio" size="5"value="0" checked="checked">否</input></div></td>
</tr>

<tr>

<th>是否要书</th>
<td><div class="floatL" style="width:205px;background:#fff;height:38px; border: medium none;font-size: 16px;line-height:38px;"><input name="info[is_book]" type="radio" value="1" checked="checked">是</input><input name="info[is_book]" type="radio" size="5"value="0" >否</input></div></td>
<th>是否补余款</th>
<td><div class="floatL" style="width:205px;background:#fff;height:38px; border: medium none;font-size: 16px;line-height:38px;"><input name="info[is_balance]" type="radio" value="1">是</input><input name="info[is_balance]" type="radio" size="5"value="0"  checked="checked">否</input></div></td>
<th>支付方式<span class="f_cB">*</span></th>
<td><div class="txtbox floatL" style="width:200px;"><input name="info[paymethod]" id="paymethod" type="text" size="5" class="input" value=""></div></td>
</tr>


<tr>

<th >图片备注2</th>
<td colspan='5'><div class="floatL" style="width:96%;background:#fff;height:300px; border: medium none;position:relative;" id="remaimgs">


<span class="addportrait" id="addportrait">添加备注</span>

</div></td>

</tr>
</table>
</form>
</div>
</div>
<div id="BtmBtn">
<div class="btn_boxB floatR mag_l20"><input name="" type="button" value="取消" id="resetSub" onmousemove="this.className='input_move'" onmouseout="this.className='input_out'"></div>
<div class="btn_box floatR"><input name="" type="button" value="提交" id="subBtn" onmousemove="this.className='input_move'" onmouseout="this.className='input_out'"></div>
</div>
</div>
</div>
<div id="proce">
	<p><span></span></p>
</div>
<script type="text/javascript" src="./Public/JS/popwin.js"></script>
<script type="text/javascript">
$("#resetSub").click(function(){
	$('.input').val("");
});
$('#subBtn').click(function(){
	var phonenum = $('#phonenum').val();
	var salephone = $('#salephone').val();
	var income = $('#income').val();
	var commission = $('#commission').val();
	var ctype = $('#ctype').val();
	var dealno = $('#dealno').val();
	var paymethod = $('#paymethod').val();
	if(phonenum =='' || salephone =='' ||income ==''||commission==''||ctype==''||dealno==''||paymethod==''){
popWin.showWin("400","230","提示信息","请将不填信息填写完整");
return;
	}
	$('#subForm').submit();
});

var uploader = new plupload.Uploader({
	runtimes : 'html5,flash,silverlight,html4',
	browse_button : 'addportrait', // you can pass in id...
	url : "<?php echo U('File/uploadImg');?>",
	flash_swf_url : "/OA/js/upload/Moxie.swf",
	silverlight_xap_url : "/OA/js/upload/Moxie.xap",
	filters : {
		max_file_size : '2mb',
		mime_types: [
			{title : "Image files", extensions : "jpg,gif,png,jpeg"},
		]
	},

	init: {
		PostInit: function() {
			
		},
		FilesAdded: function(up, files) {
			plupload.each(files, function(file) {
				uploader.start();
			});
		},
		UploadProgress: function(up, file) {
			if(file.percent > 0 && file.percent < 100){
				$("#proce").show();
				var height = file.percent * 602 /100;
				$("#proce").find('p').css("width", height );
			}
			if(file.percent == 100){
				$("#proce").hide();
			}
			
		},
		 FileUploaded:function(m,file,data){
			
		 	var obj = eval("("+data.response+")");
		 	if(obj.status){
		 		var html = '<div class="portrait"><img src="'+obj.filename+'"/><span class="imgclose">x</span><input type="hidden" name="info[remarks2][]" value="'+obj.realpath+'"></div>';
		 		$("#remaimgs").append(html);
		 	}

		    },
		Error: function(up, err) {	
		}
	}
});
uploader.init();
$('#remaimgs').on('click','.imgclose',function(){
	$(this).parent().remove();
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