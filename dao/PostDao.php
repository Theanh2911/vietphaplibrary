<?php 
require_once("dbhelp.php");

function getPostByCategoryId($id){
	$sql = "select * from post where category_id = '$id' limit 3";
	$list = executeResult($sql);
	return $list;
}

function getPostByCategoryIdNoAcept($id){
	$sql = "select * from post where category_id = '$id' and daduyet = 1 limit 3";
	$list = executeResult($sql);
	return $list;
}

function getTopPost($id){
	$sql = "select * from post inner join account on account.username = post.createdBy where category_id='$id' order by post.createddate desc limit 10";
	$list = executeResult($sql);
	return $list;
}

function getTopPostNoAcept($id){
	$sql = "select * from post inner join account on account.username = post.createdBy where category_id='$id' and daduyet = 1 order by post.createddate desc limit 10";
	$list = executeResult($sql);
	return $list;
}

function getTopPostHome(){
	$sql = "select * from post inner join account on account.username = post.createdBy order by post.createddate desc limit 10";
	$list = executeResult($sql);
	return $list;
}

function getTopPostHomeNoAcept(){
	$sql = "select * from post inner join account on account.username = post.createdBy where daduyet = 1 order by post.createddate desc limit 10 ";
	$list = executeResult($sql);
	return $list;
}

function insetPost($title, $conten, $category_id, $image, $description,$createdBy){
	$sql = "insert into post(title, content,createdBy, category_id, image,description) value ('$title', '$conten','$createdBy', '$category_id', '$image', '$description')";
	execute($sql);
}

function insetPostForUser($title, $conten, $category_id, $image, $description,$createdBy){
	$sql = "insert into post(title, content,createdBy, category_id, image,description, daduyet) value ('$title', '$conten','$createdBy', '$category_id', '$image', '$description','0')";
	execute($sql);
}

function updatePost($title, $conten, $category_id, $image, $description, $id){
	if($image == "n"){
		$sql = "update post set title = '$title', content = '$conten', category_id='$category_id', description = '$description' where id =".$id;
		execute($sql);
	}
	else{
		$sql = "update post set title = '$title', content = '$conten', category_id='$category_id',image = '$image', description = '$description' where id =".$id;
		execute($sql);
	}
}

function getAllPost(){
	$sql = "select * from post ";
	$list = executeResult($sql);
	return $list;
}

function getPostById($id){
	$sql = "select * from post where id = '$id'";
	$list = executeResult($sql);
	return $list;
}

function search($param, $id){
	$sql = 'select * from post where title like "%'.$param.'%" and category_id = '.$id.' and daduyet = 1';
	$list = executeResult($sql);
	return $list;
}

function selectTopThree(){
	$sql = "select * FROM post order by createddate desc limit 3";
	$list = executeResult($sql);
	return $list;
}

function selectTopThreeNoAcept(){
	$sql = "select * FROM post where daduyet = 1 order by createddate desc limit 3";
	$list = executeResult($sql);
	return $list;
}

function searchInHome($param){
	$sql = 'select * from post where title like "%'.$param.'%" and daduyet = 1';
	$list = executeResult($sql);
	return $list;
}
?>