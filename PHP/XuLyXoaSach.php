<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Xu Ly Xoa Sach</title>
</head>

<body>
<?php

	$bookIDDeleted = $_REQUEST["BookIDDelted"];
	include_once("DataProvider.php");
	
	$sql = "delete from book where BookID=".$bookIDDeleted;
	DataProvider::ExecuteQuery($sql);
?>
	
	Đã xóa thành công sách có mã là <?php echo($bookIDDeleted) ?>
	<br>
	<a href="TimSach.php" > Tiếp tục tìm kiếm </a>
	<br>
	<a href="TrangChu.php" > Trở về trang chủ </a>
</body>
</html>