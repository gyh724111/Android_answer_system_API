<?php
//error_reporting(0);
require 'mysql_connect.php';

$n = 0;
$result = mysql_query("select * from wait_answer");
while ($row = mysql_fetch_array($result)){
	$arr[$n++] = array(
		"TCs_id" => $row['id'],
		"teacher_name" => $row['teacher_name'],
		"these_courses" => $row['these_courses'],
		"answer_time" => $row['answer_time'],
		"others" => $row['others']
	);
}

echo json_encode($arr);
?>