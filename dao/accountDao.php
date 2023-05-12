<?php 
require_once("dbhelp.php");

function regis($username, $password, $name){
	$sql = "insert into account(username, password, name, role) value ('$username', '$password', '$name', 'user')";
	execute($sql);
}
function checkUser($username){
	$sql = "select * from account where username = '$username'";
	$list = executeResult($sql);
	return $list;
}

function getRoleByUser($username){
	$sql = "select * from account where username = '$username'";
	$list = executeResult($sql);
	return $list[0]['role'];
}
?>