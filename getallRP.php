<?php
error_reporting(0); 
//stat=0正常
//stat=1错误
$room_num = '';
$room_division = '';
$phone = '';

require 'mysql_connect.php';
if(isset($_GET['room_num'])){
	$room_num = $_GET['room_num'];
}
if(isset($_GET['room_division'])){
	$room_division = $_GET['room_division'];
}
if(isset($_GET['phone'])){
	$phone = $_GET['phone'];
}

$sql = 'select * from room_phone where 1 ';

if ($room_num != ''){
    $sql .= "and room_num like ('%".$room_num."%')";
}
if ($room_division != ''){
    $sql .= "and room_division like ('%".$room_division."%')";
}
if ($phone != ''){
    $sql .= "and phone like ('%".$phone."%')";
}
//echo "sql = ".$sql;

mysql_query("set names utf8");
$result = mysql_query($sql);



while ($row = mysql_fetch_array($result)){
		$arr[] = array(
		"allRP_id" => $row['id'],
		"room_num" => $row['room_num'],
		"room_division" => $row['room_division'],
		"phone" => $row['phone'],
		"others" => $row['others']
	);
}
//var_dump($arr);
echo json_encode($arr);

?>