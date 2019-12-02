<?php 
require_once '../connect.php';
$CONNECT = new Connect();


$err = false;


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$username = (isset($_POST["username"]))?$_POST["username"]:'';
	$password = (isset($_POST["password"]))?$_POST["password"]:'';
	if($username!= '' && $password != ''){
		$user = $CONNECT->selectOne('admin',array('password'),array('username'=>$username));
		if($user && $user['password'] == $password){
			header("Location: list.php");
			exit();
		}
	}
	$err = true;
}

?>



<!DOCTYPE html>
<html>
<head>
  <title>管理员登录</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-dark navbar-fixed-top bg-dark" style="background:#343a40;">
	<div class="container">
		<a  style="color:white" class="navbar-brand" href="../index.php">学生成绩管理系统</a>
	</div>
</nav>

<div style="margin-top:100px;">
<div class="center-block m-auto" style="width:400px;">
  <center><h2>管理员登录</h2></center>
  <form method="post" action="login.php" class="mt-3">
	<div class="form-group">
	      <label for="username" class="text-primary mr-3">用户名:</label>
	      <input type="text" class="form-control" id="username" name="username" 
	      placeholder="<?php  if(isset($username))echo $username; else echo '请输入用户名'; ?>">
	</div>
 	<div class="form-group">
	      <label for="password" class="text-primary">密码:</label>
	      <input type="password" class="form-control" id="password" name="password" 
	      placeholder="<?php  if($err) echo '登录失败！'; else echo '请输入密码';?>">
	</div>
	
    <div class="form-group mt-3">
      <button type="submit" name="submit" style="width:400px;" class="btn btn-info">登录</button>
    </div>
</form>
</div>
</div>
</body>
</html>
