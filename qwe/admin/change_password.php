<?php
require_once '../connect.php';
$CONNECT = new Connect();

/**
 * 接受三个POST参数
 * old_pwd		旧密码
 * new_pwd		新密码
 * repeat_pwd	重复密码
 * */

if($_SERVER["REQUEST_METHOD"] == "POST")
{

	if(!isset($_POST['old_pwd']) || !is_string($_POST['old_pwd']) || strlen($_POST['old_pwd']) < 1){
		echo "<script>alert('缺少参数old_pwd!');</script>";
		exit();
	}

	if(!isset($_POST['new_pwd']) || !is_string($_POST['new_pwd']) || strlen($_POST['new_pwd']) < 1){
		echo "<script>alert('缺少参数new_pwd!');</script>";
		exit();
	}
	if(!isset($_POST['repeat_pwd']) || !is_string($_POST['repeat_pwd']) || strlen($_POST['repeat_pwd']) < 1){
		echo "<script>alert('缺少参数repeat_pwd!');</script>";
		exit();
	}

	$old_pwd = $_POST['old_pwd'];
	$new_pwd = $_POST['new_pwd'];
	$repeat_pwd = $_POST['repeat_pwd'];

	if($new_pwd != $repeat_pwd){
		echo "<script>alert('两次密码不一致！');window.location.href = 'change_password.php';</script>";
		exit();
	}
	if($new_pwd == $old_pwd){
		echo "<script>alert('新密码不能和旧密码相同！');window.location.href = 'change_password.php';</script>";
		exit();
	}
	$user = $CONNECT->selectOne('admin', array('password'),array('username'=>'admin'));
	if($user && $user['password'] == $old_pwd){
		$CONNECT->update('admin', array('password'=>$new_pwd),array('username'=>'admin'));
		echo "<script>alert('修改成功！');window.location.href = 'login.php';</script>";
		exit();
	}else{
		echo "<script>alert('当前密码错误！');window.location.href = 'change_password.php';</script>";
	}


}


?>
<!DOCTYPE html>
<html>
<head>
  <title>修改密码</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
<body>


<nav class="navbar navbar-dark navbar-fixed-top bg-dark" style="background:#343a40;">
	<div class="container">
		<a  style="color:white" class="navbar-brand" href="list.php">学生成绩管理系统</a>
		<div style="float:right;">
			<a style="display:inline-block;color:white;padding:15px;" href="login.php" ><u>退出登录</u></a>
		</div>
	</div>
</nav>

<div style="margin-top:100px;">
	<div class="center-block m-auto" style="width:600px;">
		<center><h2>修改密码</h2></center>
		<form method="POST" action="change_password.php" class="mt-3">
			<table class="table mt-3" style="word-wrap:break-word;">
			    <tbody>
					<tr><th>当前密码</th><th><input type="password" name="old_pwd" required/></th>
					<tr><th>新密码</th><th><input type="password" name="new_pwd" required/></th>
					<tr><th>确认密码</th><th><input type="password" name="repeat_pwd" required/></th>			
		    </tbody>
			</table>

			<center>
				<div class="btn-group mt-3" style="width:500px;">
					<button type="submit" style="width:240px;" class="btn btn-info">修改</button>
					&nbsp;
					<button type="button" style="width:240px;" onclick="javascrtpt:window.location.href='list.php'" class="btn btn-info">返回</button>
				</div>
			</center>
		</form>
	</div>
</div>



</body>
</html>