<!DOCTYPE html>
<html>
<head>
  <title>学生个人成绩查询</title>
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
		<div style="float:right;">
			<a style="display:inline-block;color:white;padding:15px;" href="admin/login.php" ><u>管理员登录</u></a>
		</div>
	</div>
</nav>

<div style="margin-top:100px;">
	<div class="center-block m-auto" style="width:400px;">
	  <center><h2>学生个人成绩查询</h2></center>
	  <form method="GET" action="query.php" class="mt-3">
		<div class="form-group">
		      <label for="name" class="text-primary mr-3">姓名:</label>
		      <input type="text" class="form-control" id="name" name="name" 
		      placeholder="请输入姓名" required>
		</div>
	 	<div class="form-group">
		      <label for="student_id" class="text-primary">学号:</label>
		      <input type="text" class="form-control" id="student_id" name="student_id" 
		      placeholder="请输入学号" required>
		</div>
		
		<div class="btn-group mt-3" style="width:400px;">
	      <button type="submit" style="width:400px;" class="btn btn-info">成绩查询</button>
	    </div>
	</form>
	</div>
</div>


</body>
</html>



