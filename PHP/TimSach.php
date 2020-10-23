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
        <input type="text" name="txtTitle" id="txtTitle" onKeyUp="SearchBook()"  placeholder="Seach by BookTitle" class="form-control"/>
        <input type="text" name="txtAuthor" id="txtAuthor" onKeyUp="SearchBook()"  placeholder="Seach by Book Author" class="form-control"/>
        <input type="text" name="txtPublisher" id="txtPublisher" onKeyUp="SearchBook()"  placeholder="Seach by Book Publisher" 	class="form-control"/>
        <input type="text" name="txtCategory" id="txtCategory" onKeyUp="SearchBook()"  placeholder="Seach by Book Category" class="form-control"/>
        </div>
    </div>
    <div id="result"> </div>
  </div>
</div>
<script type="text/javascript">
function SearchBook()
{
		var txtTitle = document.getElementById("txtTitle").value;
		var txtAuthor = document.getElementById("txtAuthor").value;
		var txtPublisher = document.getElementById("txtPublisher").value;
		var txtCategory = document.getElementById("txtCategory").value;
		if(txtTitle !='' || txtAuthor !='' || txtPublisher !='' || txtCategory !='')
		{
			$.ajax({
				url:"XuLyTimSachs.php",
				method:"post",
				data:{title:txtTitle, author:txtAuthor, publisher:txtPublisher, category:txtCategory},
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
