<?php
require_once("dbhelp.php");
$id = $_GET['id'];
$sql = "update post set daduyet = '1' where id = '$id' ";
	execute($sql);
	header("location: allPost.php");
?>