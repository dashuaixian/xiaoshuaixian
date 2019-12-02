<?php 
require_once '../connect.php';
$CONNECT = new Connect();

/**
 * 接受一个GET参数
 * id	
 * */
if(!isset($_GET['id']) || empty($_GET['id'])){
	die('缺少参数id!');
}

$id = $_GET['id'];


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$fields = array('name'=>'姓名','student_id'=>'学号',
			'YU'=>'语文','SHU'=>'数学','WAI'=>'外语',
			'ZHENG'=>'政治','SHI'=>'历史','DI'=>'地理',
			'WU'=>'物理','HUA'=>'化学','SHENG'=>'生物');
	$data_set = array();
	
	foreach ($fields as $key=>$value){
		if(isset($_POST[$key])){
			$data_set[$key] = $_POST[$key];
		}
	}
	$CONNECT->update('scores', $data_set, array('id'=>$id));
	header("Location: list.php");
}

$student = $CONNECT->selectOne('scores',array('*'),array('id'=>$id));
if(!$student){
	die('查询失败！');
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>修改成绩</title>
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
		<center><h2>修改成绩</h2></center>
		<form method="POST" action="edit.php?id=<?php echo $student['id'];?>" class="mt-3">
			<table class="table mt-3" style="word-wrap:break-word;">
			    <tbody>
					<tr><th>姓名:</th><th><input type="text" name="name" value="<?php echo $student['name'];?>" /></th>
					<th>学号:</th><th><input type="text" name="student_id"  value="<?php echo $student['student_id'];?>" /></th></tr>
					<tr><th>语文:</th><th><input type="text" name="YU"  value="<?php echo $student['YU'];?>" /></th>
					<th>数学:</th><th><input type="text" name="SHU"  value="<?php echo $student['SHU'];?>" /></th></tr>
					<tr><th>外语:</th><th><input type="text" name="WAI"  value="<?php echo $student['WAI'];?>" /></th>
					<th>政治:</th><th><input type="text" name="ZHENG"  value="<?php echo $student['ZHENG'];?>" /></th></tr>
					<tr><th>历史:</th><th><input type="text" name="SHI"  value="<?php echo $student['SHI'];?>" /></th>
					<th>地理:</th><th><input type="text" name="DI"  value="<?php echo $student['DI'];?>" /></th></tr>
					<tr><th>物理:</th><th><input type="text" name="WU"  value="<?php echo $student['WU'];?>" /></th>
					<th>化学:</th><th><input type="text" name="HUA"  value="<?php echo $student['HUA'];?>" /></th></tr>
					<tr><th>生物:</th><th><input type="text" name="SHENG"  value="<?php echo $student['SHENG'];?>" /></th></tr>
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