<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<form method="POST" enctype="multipart/form-data">
	<input type="file" name="anh">
	<input type="submit" name="submit" value="up anh">
</form>
</body>
<?php 
if (isset($_POST['submit']))  {
$thumuc = "images/";
$anh1 = $thumuc . basename($_FILES['anh']['name']);
  if (move_uploaded_file($_FILES["anh"]["tmp_name"], $anh1)) {
    echo "Bạn đã upload file thành công";
    echo '
    <img src="'.$anh1.'">';
  }
}
?>
</html>