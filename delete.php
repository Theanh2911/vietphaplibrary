<?php
require_once("dbhelp.php");
$id = $_GET['id'];
$sql = "delete from post where id = '$id' ";
	execute($sql);
	header("location: allPost.php");
?>