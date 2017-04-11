<?php
error_reporting(0);
require 'mysql_connect.php';
$wait_answer_id = '';
$user_id = '';
$others = '';

if(isset($_GET['wait_answer_id'])){
	$wait_answer_id = $_GET['wait_answer_id'];
}
if(isset($_GET['user_id'])){
	$user_id = $_GET['user_id'];
}
if(isset($_GET['others'])){
	$others = $_GET['others'];
}

$sqltest = 'select id from order_answer r2 where deleted = 0 and wait_answer_id = '.$wait_answer_id.
' and user_id = '.$user_id;

//$sqlinsert = 'insert into order_answer(id,wait_answer_id,user_id,others,deleted) 
//values(,'.$wait_answer_id.','.$user_id.','.$others.',)';
$sqlinsert = "insert into order_answer(id,wait_answer_id,user_id,others,deleted) 
values('','$wait_answer_id','$user_id','$others',0)";


$sqlupdate = 'update order_answer as r1 ,(select r2.id from order_answer r2 where 
	r2.deleted = 0 and r2.wait_answer_id = '.$wait_answer_id.' and r2.user_id = '.$user_id.') as r2 
set others = "'.$others.'" where r1.id = r2.id';

//echo "sqltest = ".$sqltest.'\n';
//echo "sqlinsert = ".$sqlinsert.'\n';
//echo "sqlupdate = ".$sqlupdate.'\n';

mysql_query("set names utf8");
$testresult = mysql_query($sqltest);
$testrow = mysql_fetch_array($testresult);
//var_dump($testrow);
if($testrow == NULL){
	//insert
//	echo "insert";
	$action = '创建成功!';
	mysql_query($sqlinsert);
}else{
	//update
//	echo "update";
	$action = '更新成功!';
	mysql_query($sqlupdate);
}
$arr[] = [
	'stat' => 0,
	'action' => $action
];
echo json_encode((object)$arr);
?>