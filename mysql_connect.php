<?php

	$con = mysql_connect("localhost","root","");
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET CHARACTER_SET_RESULT=utf8");

	if (!$con){
		die(mysql_error());
	}

	mysql_select_db("answer_system",$con);
?>