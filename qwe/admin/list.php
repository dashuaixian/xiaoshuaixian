<?php 
require_once '../connect.php';
$CONNECT = new Connect();



$page = 1;
if(isset($_GET['page']) && !empty($_GET['page']))
{
	$page = ($_GET['page'] > 1)? $_GET['page'] : 1;
}

$page_rows = 10;//一页中最多10行
$total_rows = $CONNECT->getTotalRows('scores');//数据库中的 记录数
$max_page = ceil($total_rows / $page_rows);//总页数

$page = ($page > $max_page)? $max_page : $page;
$page = ($page < 1)? 1 : $page;
$row_start = ($page-1) * $page_rows;

$data = $CONNECT->selectByLimit('scores',array('*'), $row_start, $page_rows);
if(!is_array($data))
	$data = array();
?>

<!DOCTYPE html>
<html>
<head>
  <title>分数列表</title>
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
		<div style="float:right;">
			<a style="display:inline-block;color:white;padding:15px;" href="change_password.php" ><u>修改密码</u></a>
			<a style="display:inline-block;color:white;padding:15px;" href="login.php" ><u>退出登录</u></a>
		</div>
	</div>
</nav>

<div style="margin-top:100px;">
	<div class="center-block m-auto" style="width:1000px;">
		<center><h2>分数列表</h2></center>
		<table class="table table-hover mt-6" >
			<thead>
			  <tr>
			    <th>ID</th><th>姓名</th><th>学号</th>
			    <th>语文</th><th>数学</th><th>外语</th>
			    <th>政治</th><th>历史</th><th>地理</th>
			    <th>物理</th><th>化学</th><th>生物</th><th>总分</th><th>平均分</th> 
			    <th>操作</th> 
			  </tr>
			</thead>
			<tbody>
			  <?php 
			  foreach($data as $row){
			  	
			  	$zongfen = $row['YU']+$row['SHU']+$row['WAI']+$row['ZHENG']+$row['SHI']+$row['DI']+$row['WU']+$row['HUA']+$row['SHENG'];
			  	$pingjunfen=$zongfen/9;
			  	$pingjunfen  = round($pingjunfen,2);
			  	echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['student_id']}</td>"
					."<td>{$row['YU']}</td><td>{$row['SHU']}</td><td>{$row['WAI']}</td>"
					."<td>{$row['ZHENG']}</td><td>{$row['SHI']}</td><td>{$row['DI']}</td>"
					."<td>{$row['WU']}</td><td>{$row['HUA']}</td><td>{$row['SHENG']}</td>"
  		            ."</td><td>{$zongfen}</td>"
  		            ."</td><td>{$pingjunfen}</td>"
		  			."<td><a href=\"edit.php?id={$row['id']}\">修改</a>&nbsp;<a href=\"delete.php?id={$row['id']}\">删除</a></td></tr>";
			  }
			  ?>
		
		    </tbody>
		</table>
		<?php 
			if(count($data) == 0){
		  		echo '<center><strong>没有数据！</strong></center>';
		  	}
		?>
		<br/>
		<center>
			<div class="btn-group mt-3" style="width:500px;">

				<?php 
					$pre_page = $page - 1;
					$next_page = $page + 1;

					$has_prev = $pre_page >= 1;
					$has_next = $next_page <= $max_page;
				?>
			    <button type="button" style="width:160px;" 
				<?php if($has_prev) echo " onclick=\"javascrtpt:window.location.href='list.php?page=$pre_page'\" "; ?> 
				class="btn btn-info <?php if(!$has_prev) echo ' disabled ';?>">上一页</button>
				&nbsp;
				<button type="button" style="width:160px;" onclick="javascrtpt:window.location.href='add.php'" class="btn btn-info">添加成绩</button>
				&nbsp;
				<button type="button" style="width:160px;" 
				<?php if($has_next) echo " onclick=\"javascrtpt:window.location.href='list.php?page=$next_page'\" "; ?> 
				class="btn btn-info <?php if(!$has_next) echo ' disabled ';?>">下一页</button>
			</div>
		</center>
		<br/>
		<br/>
		<br/>
		<br/>
	</div>
</div>



</body>
</html>