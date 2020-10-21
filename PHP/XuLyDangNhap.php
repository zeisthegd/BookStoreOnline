<?php
$ketQuaDangNhap = false;
if ( isset( $_POST[ 'username' ] ) && isset( $_POST[ 'password' ] ) ) {
  $username = $_REQUEST[ 'username' ];
  $password = $_REQUEST[ 'password' ];
  $id;
  include_once( "DataProvider.php" );

  $sql = "SELECT * FROM user";
  $dsNguoiDung = DataProvider::ExecuteQuery( $sql );

  if ( $dsNguoiDung != false ) {
    while ( $row = mysqli_fetch_array( $dsNguoiDung ) ) {
      if ( $username == $row[ 'username' ] && $password == $row[ 'password' ] ) {
        $id = $row[ 'userID' ];
        $realname = $row[ 'name' ];
        session_start();
        $_SESSION[ 'userId' ] = $id;
        $_SESSION[ 'username' ] = $realname;
        $ketQuaDangNhap = true;
        echo "success";
      }
    }
  } else {
    echo( "failed" );
  }
}
if ( $ketQuaDangNhap == false )
  echo "failed";
?>