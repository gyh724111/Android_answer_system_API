<?php
//stat=0正常
//stat=1错误
require 'mysql_connect.php';
if(isset($_GET['user_id'])){
	$user_id = $_GET['user_id'];
}
if(isset($_GET['password'])){
	$password = $_GET['password'];
}
if(isset($_GET['user_type'])){
	$user_type = $_GET['user_type'];
}
$username = '';

$sql = "select * from user where id = '".$user_id."' and password = '".$password."' and user_type = '".$user_type."'";
//echo $sql;
mysql_query("set names utf8");
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
if($row == null){
	$stat = 1;
	if($user_type == 1){
		$final = '没有该教师或教师密码错误，请检查教师信息是否填写正确！';
	}else if($user_type ==2){
		$final = '没有该学生或学生密码错误，请检查学生信息是否填写正确！';
	}
}else{
	$username = $row['username'];
	$stat = 0;
	$final = '登录成功！';
}
$arr[] = [
		'stat' => $stat,
		'final' => $final,
		'username' => $username
	];
//var_dump($arr);
echo json_encode((object)$arr);

?>