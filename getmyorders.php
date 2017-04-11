<?php
error_reporting(0);
require 'mysql_connect.php';
if(isset($_GET['user_id'])){
	$user_id = $_GET['user_id'];
}

$sql = "select wa.these_courses,wa.teacher_name,oa.id,oa.others from wait_answer as wa,order_answer as oa
 where oa.deleted = 0 and wa.id = oa.wait_answer_id and oa.user_id = '$user_id'";

//echo $sql;



mysql_query("set names utf8");
$result = mysql_query($sql);
$arr=[];
while ($row = mysql_fetch_array($result)){

	
	$arr[] = [
		"MOs_id" => $row['id'],
		"these_courses" => $row['these_courses'],
		"teacher_name" => $row['teacher_name'],
		"others" => $row['others']
	];
}
//var_dump($arr);
echo json_encode($arr);
?>