<?php
error_reporting(0);
require 'mysql_connect.php';
//echo $_GET['teacher_name'].$_GET['these_courses']."\n";
if(isset($_GET['teacher_name'])){
	$T_N = $_GET['teacher_name'];
}
if(isset($_GET['these_courses'])){
	$T_Cs = $_GET['these_courses'];
}

if($T_N != '' && $T_Cs == ''){
		$sql = "select * from wait_answer where teacher_name like '%".$T_N."%'";
		//echo 1;
	}

else if($T_N == '' && $T_Cs != ''){
		$sql = "select * from wait_answer where these_courses like '%".$T_Cs."%'";
		//echo 2;
	}
    
else if($T_N != '' && $T_Cs != ''){
		//echo 3;
		$sql = "select * from wait_answer where teacher_name like '%".$T_N."%' and these_courses like '%".$T_Cs."%'";
		//var_dump($sql);
	}

else if($T_N == '' && $T_Cs == ''){
		$sql = "select * from wait_answer";
		//echo 4;
	}


//$n = 0;

mysql_query("set names utf8");
$result = mysql_query($sql);
$arr=[];
while ($row = mysql_fetch_array($result)){

	
	$arr[] = [
		"TCs_id" => $row['id'],
		"teacher_name" => $row['teacher_name'],
		"these_courses" => $row['these_courses'],
		"answer_time" => $row['answer_time'],
		"others" => $row['others']
	];
}
//var_dump($arr);
echo json_encode($arr);
?>