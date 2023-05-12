<?php 
	require_once("dbhelp.php");

	function detailByPostId($id){
	$sql = "select * FROM post inner join account on account.username = post.createdBy WHERE id = '$id'";
	$post = executeResult($sql);
	return $post;
}
?>