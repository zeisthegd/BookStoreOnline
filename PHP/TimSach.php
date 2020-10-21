<?php
include_once( "SessionStarted.php" );
$username = CheckSessionStarted();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Tìm sách</title>
<link rel="shortcut icon" href="http://designshack.net/favicon.ico">
<link rel="stylesheet" type="text/css" media="all" href="../CSS/style.css">
<link rel="stylesheet" type="text/css" href="../CSS/verticalMenu.css">
<link rel="stylesheet" type="text/css" href="../js/bootstrap-4.5.3-dist/css/bootstrap.css">
<script src="../js/bootstrap-4.5.3-dist/js/bootstrap.js"></script> 
<script src="https://kit.fontawesome.com/af774a8861.js" crossorigin="anonymous"></script> 
<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script> 
<script type="text/javascript" src="../js/requestUser.js"></script> 
<script type="text/javascript" charset="utf-8" src="../js/jquery.leanModal.min.js"></script>
</head>

<body>
<div id="topbar"><a href="TrangChu.php">BOOKSTORE ONLINE</a></div>
<div id="content">
  <h1>Chào mừng <?php echo $username?> đến với BookStoreOnline <a href="DangXuat.php" ><i class="fas fa-sign-out-alt"></i></a></h1>
  <div class="container">
    <h1 align="center">Tìm Sách</h1>
    <div class="form-group">
      <div class="input-group"> 
		  <span class="input-group-addon">Search</span></br>
        <input type="text" name="searchText" id="searchText" onKeyUp="SearchBook()"  placeholder="Seach by BookTitle" class="form-control"/>
      </div>
    </div>
    <div id="result"> </div>
  </div>
</div>
<script type="text/javascript">
function SearchBook()
{
		var text = document.getElementById("searchText").value;
		if(text !='')
		{
			$.ajax({
				url:"XuLyTimSachs.php",
				method:"post",
				data:{search:text},
				dataType:"text",
				success:function(data)
				{
					$('#result').html(data);
				}
			});
		}
		else
		{
			$('#result').html('');
		}

}

</script>
</body>
</html>
