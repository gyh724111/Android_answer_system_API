<?php
//error_reporting(0);
require 'mysql_connect.php';
//echo $_GET['teacher_name'].$_GET['these_courses']."\n";
if(isset($_GET['wait_answer_id'])){
	$wait_answer_id = $_GET['wait_answer_id'];
}

		$sql = "select count(id) as order_count from order_answer where deleted = 0 and wait_answer_id = ".$wait_answer_id;
	
	//echo $sql;

mysql_query("set names utf8");
$result = mysql_query($sql);
//var_dump($result);

$row = mysql_fetch_array($result);

$order_count = $row['order_count'];

$arr[] = [
	'order_count' => $order_count
];
//var_dump($arr);
echo json_encode((object)$arr);
?>