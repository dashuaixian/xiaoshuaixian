<?php 
require_once '../connect.php';
$CONNECT = new Connect();


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$fields = array('name'=>'姓名','student_id'=>'学号',
			'YU'=>'语文','SHU'=>'数学','WAI'=>'外语',
			'ZHENG'=>'政治','SHI'=>'历史','DI'=>'地理',
			'WU'=>'物理','HUA'=>'化学','SHENG'=>'生物','zongfen'=>'总分','pingjunfen'=>'平均分');
	$data_set = array();
	
	foreach ($fields as $key=>$value){
		if(isset($_POST[$key]) && is_string($_POST[$key]) && strlen($_POST[$key])>0){
			$data_set[$key] = $_POST[$key];
		}
	}
	$CONNECT->insert('scores', $data_set);
	header("Location: list.php");
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>添加成绩</title>
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
			<a style="display:inline-block;color:white;padding:15px;" href="change_password.php" ><u>修改密码</u></a>
			<a style="display:inline-block;color:white;padding:15px;" href="login.php" ><u>退出登录</u></a>
		</div>
	</div>
</nav>

<div style="margin-top:100px;">
	<div class="center-block m-auto" style="width:600px;">
		<center><h2>添加成绩</h2></center>
		<form method="POST" action="add.php" class="mt-3">
			<table class="table mt-3" style="word-wrap:break-word;">
			    <tbody>
					<tr><th>姓名:</th><th><input type="text" name="name" /></th>
					<th>学号:</th><th><input type="text" name="student_id" /></th></tr>
					<tr><th>语文:</th><th><input type="text" name="YU" /></th>
					<th>数学:</th><th><input type="text" name="SHU" /></th></tr>
					<tr><th>外语:</th><th><input type="text" name="WAI" /></th>
					<th>政治:</th><th><input type="text" name="ZHENG" /></th></tr>
					<tr><th>历史:</th><th><input type="text" name="SHI" /></th>
					<th>地理:</th><th><input type="text" name="DI" /></th></tr>
					<tr><th>物理:</th><th><input type="text" name="WU" /></th>
					<th>化学:</th><th><input type="text" name="HUA" /></th></tr>
					<tr><th>生物:</th><th><input type="text" name="SHENG" /></th></tr>
			    </tbody>
			</table>
			<center>
				<div class="btn-group mt-3" style="width:500px;">
					<button type="submit" style="width:240px;" class="btn btn-info">添加</button>
					&nbsp;
					<button type="button" style="width:240px;" onclick="javascrtpt:window.location.href='list.php'" class="btn btn-info">返回</button>
				</div>
			</center>
		</form>
	</div>
</div>



</body>
</html>