<?php
require_once("dbhelp.php");
$id = $_GET['id'];
$sql = "delete from comments where id = '$id' ";
	execute($sql);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>