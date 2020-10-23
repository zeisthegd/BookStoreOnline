<?php
if ( isset( $_POST[ 'title' ] ) || isset( $_POST[ 'author' ] ) || isset( $_POST[ 'publisher' ] ) || isset( $_POST[ 'category' ] ) ) {
  include_once( "DataProvider.php" );
  $title = $_POST[ 'title' ];
  $author = $_POST[ 'author' ];
  $publisher = $_POST[ 'publisher' ];
  $category = $_POST[ 'category' ];

  $output = '';
  $sql = SetQuery( $title, $author, $publisher, $category );

  $result = DataProvider::ExecuteQuery( $sql );
  if ( mysqli_num_rows( $result ) > 0 ) {
    $output .= '<h4 align="center">Kết quả tìm kiếm</h4>';
    $output .= '<div class="table-responsive">
					<table class="table table bordered">
					<tr>
						<th>Tên sách</th>
						<th>Mô tả</th>
						<th>Thể loại</th>
						<th>Tác giả</th>
						<th>Nhà xuất bản</th>
						<th>Năm xuất bản</th>
						<th>Giá</th>
						<th>Đánh giá</th>
					<tr>';
    while ( $row = mysqli_fetch_array( $result ) ) {
      $output .= '
			<tr>
				<td>' . $row[ "BookTitle" ] . '</td>
				<td>' . $row[ "BookDesc" ] . '</td>
				<td>' . $row[ "BookPrice" ] . '</td>	
				<td>' . $row[ "BookAuthor" ] . '</td>
				<td>' . $row[ "BookPrice" ] . '</td>	
				<td>' . $row[ "BookYear" ] . '</td>
				<td>' . $row[ "BookPrice" ] . '</td>	
				<td>' . $row[ "BookRate" ] . '</td>	
			</tr>
		';
    }
    echo $output;
  } else {
    echo "Book not found";
  }
} else {
  echo '';
}

function SetQuery( string $title, string $author, string $publisher, string $category ) {
  $sql = "select * from book where BookTitle like '%" . $title . "%'";
  if ( $title != "" )
    return "select * from book where BookTitle like '%" . $title . "%'";
  else if ( $author != "" )
    return "select * from book where BookAuthor like '%" . $author . "%'";
  else if ( $publisher != "" )
    return "SELECT * FROM `book` INNER JOIN category on BookID = category.CategoryID WHERE category.CategoryName LIKE '%" . $publisher. "%'";
  else if ( $category != "" )
    return "SELECT * FROM `book` INNER JOIN category on BookID = category.CategoryID WHERE category.CategoryName LIKE '%" . $category. "%'";
  return $sql;
}
?>