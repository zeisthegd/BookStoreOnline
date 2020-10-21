<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<title>Xu Ly Tim Sach</title>
</head>

<body>
<p> Kết quả tìm sách</p>
<?php
$rowsPerPage = 20;
$pageNum = 1;

if ( isset( $_GET[ 'page' ] ) ) {
  $pageNum = $_GET[ 'page' ];
}

$offset = ( $pageNum - 1 ) * $rowsPerPage;

$tenSach = $_POST[ "txtTenSach" ];

include_once( "DataProvider.php" );

$sql = "select * from book where booktitle like '%" . $tenSach . "%'";
$sql .= "limit $offset,$rowsPerPage";
$dsSach = DataProvider::ExecuteQuery( $sql );

if ( $dsSach ) {
  if ( mysqli_num_rows( $dsSach ) > 0 ) {
    ?>
<table border="1">
  <tr>
    <th width="50">STT</th>
    <th width="50">Mã sách</th>
    <th width="400">Tựa sách</th>
    <th width="100">Giá tiền</th>
    <th width="100">Xóa</th>
  </tr>
  <?php

  $stt = 1;
  while ( $row = mysqli_fetch_array( $dsSach ) ) {
    $maSach = $row[ "BookID" ];
    $tenSach = $row[ "BookTitle" ];
    $giaTien = $row[ "BookPrice" ];

    ?>
  <tr>
    <td><?php
    echo( $stt );
    $stt++;
    ?></td>
    <td><?php
    echo( $maSach );
    ?></td>
    <td><a href="CapNhatSach.php?BookID=<?php echo($maSach);?>"> <?php echo($tenSach);?></td>
    <td><?php echo($giaTien); ?></td>
    <td><form name="form1" method="post" action="XuLyXoa.php">
        <input type="hidden" name="BookIDDeleted" value="<?php echo($maSach); ?>" >
        <input type="submit" name="btnXoa" value="Xóa" >
      </form></td>
  </tr>
  <?php
  }
  ?>
</table>
<?php

$sql = "select COUNT(BookID) as numrows from book where BookTitle like '%" . $tenSach . "%'";
$result = DataProvider::ExecuteQuery( $sql );

$rows = mysqli_fetch_array( $result );
$numrows = $rows[ 'numrows' ];
$maxPage = ceil( $numrows / $rowsPerPage );

$self = $_SERVER[ 'PHP_SELF' ];
$nav = '';

for ( $page = 1; $page <= $maxPage; $page++ ) {
  if ( $page = $pageNum ) {
    $nav = "$page";
  } else {
    $nav = "<a href'" . $self . "?page" . $page;
    $nav .= "&txtTenSach" . $_REQUEST[ "txtTenSach" ] . "'>" . $page . "</a>";
  }
  echo $nav;
}

?>
<?php
} else {
  echo( "Không tìm thấy sách với tựa " . $tenSach . "<br>" );
}
}

?>
<a href="ThemSach.php">Thêm một đầu sách mới</a>
</body>
</html>