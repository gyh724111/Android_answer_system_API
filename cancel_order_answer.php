<?php
error_reporting(0);
require 'mysql_connect.php';
$order_answer_id = '';
$stat = '';
$action = '';


if(isset($_GET['order_answer_id'])){
	$order_answer_id = $_GET['order_answer_id'];
}


$sqldelete = 'update order_answer set deleted = 1 where id = '.$order_answer_id;
$sqltest = 'select deleted from order_answer where id = '.$order_answer_id;
//echo 'sqldelete:'.$sqldelete."\n";
//echo 'sqltest:'.$sqltest;

mysql_query("set names utf8");

$deleteresult = mysql_query($sqldelete);
$testresult = mysql_query($sqltest);
$testrow = mysql_fetch_array($testresult);
$finaldeleted = $testrow['deleted'];
if($finaldeleted == 1){
	$action = '取消成功！';
	$stat = 0;
}else if ($finaldeleted ==0){
	$action = '取消失败！';
	$stat = 1;
}else{
	$action = '未知错误!';
	$stat = 1;
}
$arr[] = [
	'stat' => $stat,
	'action' => $action
];
echo json_encode((object)$arr);
?>