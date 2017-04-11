<?php
error_reporting(0);
require 'mysql_connect.php';

if(isset($_GET['teacher_id'])){
	$teacher_id = $_GET['teacher_id'];
}

$sql = 'select oa.id as oa_id,wa.id as wa_id,wa.these_courses,
wa.answer_time,wa.answer_position,wa.others as wa_others,count(oa.id) as oa_count
from wait_answer wa,order_answer oa 
where oa.deleted = 0 and  oa.wait_answer_id = wa.id 
and wa.teacher_id = '.$teacher_id.' group by wait_answer_id';
//echo $sql;
mysql_query("set names utf8");
$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)){

	
	$arr[] = [
		"My_Ordered_id" => $row['oa_id'],
		"wait_answer_id" => $row['wa_id'],
		"these_courses" => $row['these_courses'],
		"answer_time" => $row['answer_time'],
		"answer_position" => $row['answer_position'],
		"others" => $row['wa_others'],
		"count" => $row['oa_count']
	];
}
//var_dump($arr);
echo json_encode($arr);

?>