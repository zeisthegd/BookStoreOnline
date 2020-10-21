<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Đăng nhập BookStore</title>
<link rel="shortcut icon" href="http://designshack.net/favicon.ico">
<link rel="stylesheet" type="text/css" media="all" href="../CSS/style.css">
<link rel="stylesheet" type="text/css" href="../CSS/verticalMenu.css">
<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script> 
<script type="text/javascript" src="../js/requestUser.js"></script> 
<script type="text/javascript" charset="utf-8" src="../js/jquery.leanModal.min.js"></script>
</head>

<body>
<div id="topbar"><a href="TrangChu.php">BOOKSTORE ONLINE</a></div>
<div id="w">
  <div id="content">
    <h1>CHÀO MỪNG BẠN ĐẾN VỚI BOOKSTORE ONLINE</h1>
    <center>
      <a href="#loginmodal" class="flatbtn" id="modaltrigger">ĐĂNG NHẬP</a>
    </center>
    
  </div>
</div>
<div id="loginmodal" style="display:none;">
  <h1>ĐĂNG NHẬP</h1>
  <form id="loginform" name="loginform" method="post" action="DangNhap.php">
    <label for="username">Tên người dùng:</label>
    <input type="text" name="username" id="username" class="txtfield" tabindex="1">
    <label for="password">Mật khẩu:</label>
    <input type="password" name="password" id="password" class="txtfield" tabindex="2">
    <span id="loginMessage"></span>
    <div class="center">
      <input type="submit" name="loginbtn" id="btnLogin" class="flatbtn-blu hidemodal" onClick="" value="Log In" tabindex="3">
    </div>
  </form>
</div>

<script type="text/javascript">
$(function(){
  $('#loginform').submit(function(e){
    return false;
  });
  
  $('#modaltrigger').leanModal({ top: 110, overlay: 0.45 });
});
</script>
</body>
</html>