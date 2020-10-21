<?php

class DataProvider
{
	public static function ExecuteQuery($sql)
	{
		$connection = mysqli_connect("localhost","root","");
		
		if(!$connection)
			die("Couldn't connect to localhost");
		
		mysqli_select_db($connection,"bookstore");
		$result = mysqli_query($connection,$sql);
		mysqli_close($connection);			
		return $result;
	}	
}

?>