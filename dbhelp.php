<?php
require_once('config.php');
// insert, update, delete,
function execute($sql){
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_query($conn, $sql);
	mysqli_close($conn);
}
function executeresult($sql){
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die("connect fail");
	$resultset = mysqli_query($conn, $sql);
	$List = [];
	while ($row = mysqli_fetch_array($resultset,1)) {
		$List[] = $row;
	}return $List;
}
?>