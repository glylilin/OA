<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>家居魔方后台管理</title>
<link href="./Public/CSS/bootstrap.min.css" rel="stylesheet">
<link href="./Public/CSS/signin.css" rel="stylesheet">
</head>

<body>

<div class="signin">
	<div class="signin-head"><img src="./Public/IMG/head_120.png" alt="" class="img-circle"></div>
	<form class="form-signin" role="form" method="post">
		<input type="text" class="form-control" name="username" placeholder="用户名" required autofocus />
		<input type="password" class="form-control" name="password" placeholder="密码" required />
		<button class="btn btn-lg btn-warning btn-block" type="submit">登录</button>
		<label class="checkbox">
			<input type="checkbox" value="remember-me"> 记住我
		</label>
	</form>
</div>

</body>
</html>