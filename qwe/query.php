<?php 
require_once 'connect.php';
$CONNECT = new Connect();

$name = "";
$student_id = "";

if(isset($_GET['name']))
{
	$name = $_GET['name'];
}

if(isset($_GET['student_id']))
{
	$student_id = $_GET['student_id'];
}

if($name == "" || $student_id == ""){
	echo "<script>alert('查询失败！');location.href='index.php';</script>";
	exit();
}
$student = $CONNECT->selectOne('scores', array('*'), array('name'=>$name,'student_id'=>$student_id));
if(!$student){
	echo "<script>alert('查询失败！');location.href='index.php';</script>";
	exit();
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>分数详情</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>


<nav class="navbar navbar-dark navbar-fixed-top bg-dark" style="background:#343a40;">
	<div class="container">
		<a  style="color:white" class="navbar-brand" href="index.php">学生成绩管理系统</a>
	</div>
</nav>


<div style="margin-top:100px;">
	<div class="center-block m-auto" style="width:300px;">
		<center><h2>分数详情</h2></center>
	
		<table class="table table-hover mt-3" style="word-wrap:break-word;">
		    <tbody>
			<?php 
				$fields =array('name'=>'姓名','student_id'=>'学号',
						'YU'=>'语文','SHU'=>'数学','WAI'=>'外语',
						'ZHENG'=>'政治','SHI'=>'历史','DI'=>'地理',
						'WU'=>'物理','HUA'=>'化学','SHENG'=>'生物'); 
				$total = 0;
				$count = 0;
				
				foreach($fields as $key=>$value){
					if(!empty($student[$key]) || (is_string($student[$key]) && strlen($student[$key])>0)){
						
						$score = $student[$key];
						if($key != 'name' && $key != 'student_id'){						
							$count++;
							$total += floatval($score);
						}
						echo "<tr><td>$value</td><td>$score</td></tr>";
					}
				}

				$pingjunfen = round($total / $count,2);
				echo "<tr><td>总分</td><td>$total</td></tr>";
				echo "<tr><td>平均分</td><td>$pingjunfen</td></tr>";
			?>
		    </tbody>
		</table>
		<button type="button" style="width:300px;" onclick="javascrtpt:window.location.href='index.php'" class="btn btn-info">返回</button>
	</div>
</div>



</body>
</html>
