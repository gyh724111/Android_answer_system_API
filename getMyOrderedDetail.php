<?php
error_reporting(0);
require 'mysql_connect.php';

if(isset($_GET['wait_answer_id'])){
	$wait_answer_id = $_GET['wait_answer_id'];
}

$sql = 'select oa.id as oa_id,wa.id as wa_id,wa.these_courses,
wa.answer_time,wa.answer_position,oa.others as oa_others,u.id as student_id,u.username as student_name
from wait_answer wa,order_answer oa,user u
where oa.deleted = 0 and  oa.wait_answer_id = wa.id and u.id = oa.user_id 
and wa.id = '.$wait_answer_id;

mysql_query("set names utf8");
$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)){

	
	$arr[] = [
		"My_Ordered_id" => $row['oa_id'],
		"wait_answer_id" => $row['wa_id'],
		"these_courses" => $row['these_courses'],
		"answer_time" => $row['answer_time'],
		"answer_position" => $row['answer_position'],
		"others" => $row['oa_others'],
		"stu_id" => $row['student_id'],
		"stu_name" => $row['student_name']
	];
}
//var_dump($arr);
echo json_encode($arr);

?>