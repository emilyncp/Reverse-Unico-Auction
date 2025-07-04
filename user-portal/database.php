<?php 
class DataBase{
	public static function ExecuteQuery($query){
		$connection=mysqli_connect('localhost','root','','reverse_auction');
		mysqli_query($connection,$query);
		mysqli_close($connection);
	}
	public static function SelectData($query){
		$connection=mysqli_connect('localhost','root','','reverse_auction');
		$datatable=mysqli_query($connection,$query);
		mysqli_close($connection);		
		return $datatable;
	}
	public static function ExecuteQueryReturnID($query){
		$connection=mysqli_connect('localhost','root','','reverse_auction');
		mysqli_query($connection,$query) or die($query);
		$datatable=mysqli_query($connection,"select @@identity as id") or die ($query);
		mysqli_close($connection);
		$rows=mysqli_fetch_array($datatable);
		return $rows["id"];
	}
	public static function RowExists($TableName,$Condition){
		$connection =  mysqli_connect('localhost','root','','reverse_auction') ;
		$DataTable= mysqli_query($connection, "select * from ".$TableName." where ".$Condition) or die("Error");
		mysqli_close( $connection);
		if(mysqli_num_rows($DataTable)>0){return true;}
		else{ return false;}
	}
}
?>

