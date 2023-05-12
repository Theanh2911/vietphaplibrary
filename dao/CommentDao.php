<?php 
require_once("dbhelp.php");
function getComment(){
	$sql = "select * from comments";
	$list = executeResult($sql);
	return $list;
}
function getCommentByPostId($id){
	$sql = "select * from comments where post_id = '$id'";
	$list = executeResult($sql);
	return $list;
}

function insertComment($content, $createdBy, $postId){
	$sql = "insert INTO comments (content, createdBy, post_id) VALUES ('$content', '$createdBy', '$postId')";
	$list = executeResult($sql);
	return $list;
}
?>