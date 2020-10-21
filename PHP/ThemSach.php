<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ThemSach</title>
</head>

<body>
<?php
if ( isset( $_REQUEST[ 'btnThemMoi' ] ) ) {
  include_once( "DataProvider.php" );

  $sql = "insert into book (BookTitle,BookDesc,BookCatID,BookAuthor,BookPubID,BookYear,BookPrice) values (";
  $sql .= "'" . $_REQUEST[ 'txtTenSach' ] . "','";
  $sql .= "'" . $_REQUEST[ 'txtNoiDungTomTat' ] . "','";
  $sql .= $_REQUEST[ 'cmbTheLoai' ] . "','";
  $sql .= "'" . $_REQUEST[ 'txtTacGia' ] . "','";
  $sql .= $_REQUEST[ 'cmbNhaXuatBan' ] . "','";
  $sql .= $_REQUEST[ 'txtNamXuatBan' ] . "','";
  $sql .= $_REQUEST[ 'txtGiaTien' ] . "')'";

  DataProvider::ExecuteQuery( $sql );

  $maSach = -1;
  $sql = "select max(BookID) from book";
  $result = DataProvider::ExecuteQuery( $sql );

  if ( $result != false ) {

    $row = mysqli_fetch_array( $result );
    $maSach = $row[ "max(BookID)" ];

  }
  if ( is_uploaded_file( $_FILES[ 'fileUploadHinhBia' ][ 'tmp_name' ] ) ) {
    $fileName = $_FILES[ 'fileUploadHinhBia' ][ 'name' ];
    $pos = strrpos( $fileName, "." );
    $fileExtension = substr( $fileName, $pos );
    $hinhBia = "upload/" . $maSach . $fileExtension;
    move_uploaded_file( $_FILES[ 'fileUploadHinhBia' ][ 'tmp_name' ], $hinhBia );
    
    $sql = "Update Book Set BookPic='" . $hinhBia . "' Where BookID=" . $maSach;
    DataProvider::ExecuteQuery( $sql );
  }
}

?>
<h2> Thêm một đầu sách mới </h2>
<form action="" method="post" enctype="multipart/form-data" name="ThemSach">
  <fieldset style="width: 600">
    <legend>Thông tin sách</legend>
    <table width="600" border="0">
      <tr>
        <td width="167">Tựa sách</td>
        <td width="423"><input type="text" name="txtTenSach" /></td>
      </tr>
      <tr>
        <td> Ảnh bìa </td>
        <td><input type="file" name="fileUploadHinhBia" /></td>
      </tr>
      <tr>
        <td>Nội dung tóm tắt</td>
        <td><input type="text" name="txtNoiDungTomTat"/></td>
      </tr>
      <tr>
        <td>Thể loại</td>
        <td><select name="cmbTheLoai" id="cmbTheLoai">
            <?php

            include_once( "DataProvider.php" );
            $dsTheLoai = DataProvider::ExecuteQuery( "select * from category" );
            if ( $dsTheLoai != false ) {
              while ( $row = mysqli_fetch_array( $dsTheLoai ) ) {
                $maTheLoai = intval( $row[ "CategoryID" ] );
                $tenTheLoai = $row[ "CategoryName" ];
                ?>
            <option value="<?php echo($maTheLoai);?>"> </option>
            <?php
            }
            }
            ?>
          </select></td>
      </tr>
      <tr>
        <td>Danh sách tên tác giả</td>
        <td><input type="text" name="txtTacGia" /></td>
      </tr>
      <tr>
        <td>Nhà xuất bản</td>
        <td><select name="cmbNhaXuatBan" id="cmbNhaXuatBan">
            <?php
            $dsNhaXuatBan = DataProvider::ExecuteQuery( "select * from publisher" );
            if ( $dsNhaXuatBan != false ) {
              while ( $row = mysqli_fetch_array( $dsNhaXuatBan ) ) {
                $maNhaXB = $row[ "PublisherID" ];
                $tenNXB = $row[ "PublisherName" ];
                ?>
            <option value="<?php echo($maNhaXB);?>"> <?php echo($tenNXB);?> </option>
            <?php
            }
            }
            ?>
          </select></td>
      </tr>
      <tr>
        <td>Năm xuất bản</td>
        <td><input type="text" name="txtNamXuatBan" /></td>
      </tr>
      <tr>
        <td>Giá tiền</td>
        <td><input type="text" name="txtGiaTien" /></td>
      </tr>
      <tr>
        <td align="right"><input type="submit" name="btnThemMoi" value="Thêm mới" /></td>
        <td><input name="btnLamLai" type="reset" value="Làm lại" /></td>
      </tr>
    </table>
  </fieldset>
  <a href="TrangChu.php" >Trở về trang chủ </a>
</form>
</body>
</html>