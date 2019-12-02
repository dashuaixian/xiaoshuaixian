<?php 
require_once '../connect.php';
$CONNECT = new Connect();


$id = "";

if(isset($_GET['id']))
{
	$id = $_GET['id'];
}

if(!empty($id)){
	$CONNECT->delete('scores',array('id'=>$id));
}

header("Location: list.php");
?>