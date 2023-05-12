<?php 

require_once 'book.php';
class Category{

	public $id;

	public $name;
}
	$cate = new Category;
	$cate->id = 5;
	$cate->name = 6;
	
	echo $cate->id+ $cate->name;
?>