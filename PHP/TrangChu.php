<?php
include_once("SessionStarted.php");
$username = CheckSessionStarted();
?>
<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Đăng nhập BookStore</title>
<link rel="shortcut icon" href="http://designshack.net/favicon.ico">
<link rel="stylesheet" type="text/css" media="all" href="../CSS/style.css">
<link rel="stylesheet" type="text/css" href="../CSS/verticalMenu.css">
<script src="../js/bootstrap-4.5.3-dist/js/bootstrap.js"></script>
<script src="https://kit.fontawesome.com/af774a8861.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script> 
<script type="text/javascript" src="../js/requestUser.js"></script> 
<script type="text/javascript" charset="utf-8" src="../js/jquery.leanModal.min.js"></script>
</head>

<body>
<div id="topbar"><a href="TrangChu.php">BOOKSTORE ONLINE</a></div>
<div id="w">
  <div id="content">
    <h1>Chào mừng <?php echo $username?> đến với BookStoreOnline <a href="DangXuat.php" ><i class="fas fa-sign-out-alt"></i></a></h1>
   
    <center>
      <a href="#actionmodal" class="flatbtn" id="modaltrigger">CHỨC NĂNG</a>
    </center>
  </div>
</div>
<div id="actionmodal" style="display: none">
	<h1>CHỌN TÍNH NĂNG</h1>
	<center>
	<div class="vertical-menu" align="center"> 
	  <a href="TimSach.php" class="flatbtn">Tìm Sách</a> 
	  <a href="ThemSach.php" class="flatbtn">Thêm Sách</a> 
	  <a href="CapNhatSach.php" class="flatbtn">Cập Nhật Sách</a> </div>
	</div> 
	</center>
  
<script>
	$(function(){ 
  $('#modaltrigger').leanModal({ top: 110, overlay: 0.45 });
});
	</script>
</body>
</html>