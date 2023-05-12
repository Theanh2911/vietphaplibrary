<?php 
require_once("dbhelp.php");
function listCategory(){
	$sql = "select * from category";
	$list = executeResult($sql);
	return $list;
}

function insertCategory(){
	$sql = "select * from category";
	$list = executeResult($sql);
	return $list;
}
?>